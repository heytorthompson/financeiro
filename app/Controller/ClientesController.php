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
	
	

	public $uses = array('Produto');
	//private $timeout = 20; // Timeout em segundos

	function index (){

	}

	function lista(){
		try {
    		
			$model = $this->modelClass;
        $this->$model->create();

		/* Informando as credenciais  */    
		$credentials = new PagSeguroAccountCredentials(      
		    'heytorthompson@gmail.com',       
		    '27CF0B0980834A99A84FF278034447B8'      
		);  
		  
		/* Tipo de notificação recebida */  
		$type = $_POST['notificationType'];  
		  
		/* Código da notificação recebida */  
		$code = $_POST['notificationCode'];  
		  
		  
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

            $existeReference = $this->Produto->find('first',array('conditions'=>array('Produto.reference' => $reference)));
            if($existeReference){
            	$this->$model->update( array('Produto.last_event_date' => $lastEventDate,'Produto.status'=>$status), 
            		array('Produto.reference' => $reference) );

            	$this->Email->from    = 'Dinheiro <heytorthompson@gmail.com>';
                $this->Email->to      = "Monitoramento <heytorthompson@gmail.com>";
                $this->Email->subject = 'Status Alterado';
                $html = "Data : ".$date.'<br/>';
                $html .= "Reference id : ".$reference.'<br/>';
                $this->Email->send($html);

            }else{
            	if ($this->$model->save($this->request->data)) {
                //disparando email com informações sobre a senha.
                $this->Email->from    = 'Dinheiro <heytorthompson@gmail.com>';
                $this->Email->to      = "Monitoramento <heytorthompson@gmail.com>";
                $this->Email->subject = 'Referencia Inserida no sistema';
                $html = "Data : ".$date.'<br/>';
                $html .= "Reference id : ".$reference.'<br/>';
                $this->Email->send($html);

                die('inserido com sucesso');
                } else {
                    die('deu erro');
                }
            
            }

		} catch(Exception $e) {
		    $this->Email->from    = 'Dinheiro <heytorthompson@gmail.com>';
            $this->Email->to      = "Monitoramento <heytorthompson@gmail.com>";
            $this->Email->subject = 'deu algo de errado no Controller de Clientes';
            $html = "Mensagem de erro : ".$e->getMessage().'<br/>';
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
