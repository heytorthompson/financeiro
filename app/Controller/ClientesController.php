<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::import('Vendor', 'PagSeguroLibrary/PagSeguroLibrary');
App::uses('CakeEmail', 'Network/Email');
App::uses('File', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class ClientesController extends Controller {
	
	

	public $uses = array('Fatura');
	//private $timeout = 20; // Timeout em segundos

	function index (){

	}

	function lista(){
		$statusTransacao = array(
		
			1 => 'Aguardando pagamento: o comprador iniciou a transação, mas até o momento o PagSeguro não recebeu nenhuma informação sobre o pagamento.',
			2 => 'Em análise: o comprador optou por pagar com um cartão de crédito e o PagSeguro está analisando o risco da transação.',
			3 =>	'Paga: a transação foi paga pelo comprador e o PagSeguro já recebeu uma confirmação da instituição financeira responsável pelo processamento.',
			4 =>	'Disponível: a transação foi paga e chegou ao final de seu prazo de liberação sem ter sido retornada e sem que haja nenhuma disputa aberta.',
			5 =>	'Em disputa: o comprador, dentro do prazo de liberação da transação, abriu uma disputa.',
			6 =>	'Devolvida: o valor da transação foi devolvido para o comprador.',
			7 =>	'Cancelada: a transação foi cancelada sem ter sido finalizada.'
		);
		$Email = new CakeEmail();
				$Email->from(array('noreplaymmn@gmail.com' => 'Dinheiro'));
				$Email->to('heytorthompson@gmail.com');
		try {
    		
		$model = $this->modelClass;
        $this->$model->create();

		/* Informando as credenciais  */    
		$credentials = new PagSeguroAccountCredentials(      
		    'tiagoelias.adv@live.com',   
			    //'27CF0B0980834A99A84FF278034447B8'
			    '20C346FCDCF44B069A5AF64C31D68A6D'     
		);  
		  
		/* Tipo de notificação recebida */  
		$type = $this->request->data['notificationType'];  
		  
		/* Código da notificação recebida */  
		$code = $this->request->data['notificationCode'];  
		  
		$json = 'type = '.$type. ' code - '.$code;
		$file = new File('webroot/log/ArquivoLog.txt', true);
		$file->write($json);
		/* Verificando tipo de notificação recebida */  
		if ($type === 'transaction') {  
		      
		    /* Obtendo o objeto PagSeguroTransaction a partir do código de notificação */  
		    $transaction = PagSeguroNotificationService::checkTransaction(  
		        $credentials,  
		        $code // código de notificação  
		    );  
		      
		} 
		/* Data da criação */  
		$date = $transactionSummary->getDate();  
		  
		/* Data da última atualização */  
		$lastEventDate = $transactionSummary->getLastEventDate();  
		  
		/* Código da transação */  
		$code = $transactionSummary->getCode();  
		  
		/* Refência */  
		$reference = $transactionSummary->getReference();  
		  
		/* Valor bruto  */  
		$grossAmount = $transactionSummary->getGrossAmount();  
		  
		/* Tipo */  
		$type = $transactionSummary->getType()->getTypeFromValue();  
		  
		/* Status */  
		$status = $transactionSummary->getStatus()->getTypeFromValue();  
		  
		/* Valor líquido  */  
		$netAmount = $transactionSummary->getNetAmount();  
		  
		/* Valor das taxas cobradas  */  
		$feeAmount = $transactionSummary->getFeeAmount();  
		  
		/* Valor extra ou desconto */  
		$extraAmount = $transactionSummary->getExtraAmount();  
		      
		/* Tipo de meio de pagamento */  
		$paymentMethod = $transactionSummary->getPaymentMethod();

			$this->request->data[$model]['date'] = $date;
            $this->request->data[$model]['last_event_date'] = $lastEventDate;
            $this->request->data[$model]['code'] = $code;
            $this->request->data[$model]['reference'] = $reference;
            $this->request->data[$model]['gross_amount'] = $grossAmount;
            $this->request->data[$model]['type'] = $type;
            $this->request->data[$model]['status'] = $status;
            $this->request->data[$model]['net_amount'] = $netAmount;
            $this->request->data[$model]['fee_amount'] = $feeAmount;
            $this->request->data[$model]['extra_amount'] = $extraAmount;
            $this->request->data[$model]['payment_method'] = $paymentMethod;

            
				

            $existeReference = $this->Fatura->find('first',array('conditions'=>array('Fatura.reference' => $reference)));
            
            if($existeReference){
            	
            	$this->$model->update( array('Fatura.last_event_date' => $lastEventDate,'Fatura.status'=>$status), 
            		array('Fatura.reference' => $reference) );

            	foreach ($statusTransacao as $key => $value) {
            		if ($key == $status){

            			$Email->subject('Alteracao de status');
						$html = "Data : ".$date.'<br/>';
		                $html .= "Reference id : ".$reference.'<br/>';
		                $html .= "status : (".$value.')<br/>';
						$reposta = $Email->send($html);
            		}
            		
            	}
            	
            	

            }else{
            	if ($this->$model->save($this->request->data)) {
	                foreach ($statusTransacao as $key => $value) {
	            		if ($key == $status){

	            			$Email->subject('Referencia Inserida no sistema');
							$html = "Data : ".$date.'<br/>';
			                $html .= "Reference id : ".$reference.'<br/>';
			                $html .= "status : (".$value.')<br/>';
							$reposta = $Email->send($html);
	            		}
	            		
	            	}
              
                } else {
                    die('deu erro');
                }
            
            }

		} catch(Exception $e) {
			$Email->subject('deu algo de errado no Controller de Clientes');
			$html = "Mensagem de erro : ".$e->getMessage().'<br/>';
			$reposta = $Email->send($html);


		    $this->Email->from    = 'Dinheiro <heytorthompson@gmail.com>';
            $this->Email->to      = "Monitoramento <heytorthompson@gmail.com>";
            $this->Email->subject = 'deu algo de errado no Controller de Clientes';
           
            $this->Email->send($html);
		}

		
		die;
		/*$email = 'heytorthompson@gmail.com';
		$token = '27CF0B0980834A99A84FF278034447B8';
		
		$transaction = $_REQUEST['transaction_id'];

		$url = 'https://ws.pagseguro.uol.com.br/v2/transactions/' . $transaction . '?email=' . $email . '&token=' . $token;

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$transaction= curl_exec($curl);
		curl_close($curl);

		if($transaction == 'Unauthorized') {
		//Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
		echo 'You shall not pass';
		exit;//Mantenha essa linha para evitar que o código prossiga
		}
		
		$transaction = simplexml_load_string($transaction);
		echo '<pre>';
		var_dump($transaction);
		die;
		if(count($transaction -> error) > 0) {
		//Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
		var_dump($transaction);
		}
		echo $transaction -> sender -> email;*/


	}
	
	
}
