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
class PrincipalController extends Controller {
	public $uses = array('Cliente');
	
	function index(){

	}
	function criarLog(){
		$json = '{=="}';
		$file = new File('webroot/log/log4.txt', true);
		$file->write($json);
	}

	function addCliente(){
		$model = $this->modelClass;
        $this->$model->create();
		if ($this->request->is('post')) {
			$reference = time();
			$this->request->data[$model]['nome'] = $this->request->data['nome'];
			$this->request->data[$model]['registro'] = $this->request->data['registro'];
			$this->request->data[$model]['telefone'] = $this->request->data['telefone'];
			$this->request->data[$model]['email'] = $this->request->data['email'];
			$this->request->data[$model]['ddd'] = $this->request->data['ddd'];
			$this->request->data[$model]['logradouro'] = $this->request->data['logradouro'];
			$this->request->data[$model]['numero'] = $this->request->data['numero'];
			$this->request->data[$model]['complemento'] = $this->request->data['complemento'];
			$this->request->data[$model]['cep'] = $this->request->data['cep'];
			$this->request->data[$model]['sobrenome'] = $this->request->data['sobrenome'];
			$this->request->data[$model]['bairro'] = $this->request->data['bairro'];
			$this->request->data[$model]['cidade'] = $this->request->data['cidade'];
			$this->request->data[$model]['estado'] = $this->request->data['estado'];
			$this->request->data[$model]['reference'] = $reference;

			if($this->$model->save($this->request->data)){
				$Email = new CakeEmail();
				$Email->from(array('noreplaymmn@gmail.com' => 'Dinheiro'));
				$Email->to('heytorthompson@gmail.com');
				$Email->subject('novo cliente');
				$html = "Reference id : ".$reference.'</br>';
				$html .= "Nome : ".$this->request->data['nome'].'</br>';
				$html .= "Telefone : ".$this->request->data['telefone'].'</br>';
				$html .= "email : ".$this->request->data['email'].'</br>';
				$html .= "registro : ".$this->request->data['registro'].'</br>';
				$reposta = $Email->send($html);
				$this->set('sucesso', 'cadastrado com sucesso');	
			}else{
				die('erro');
			}
		}
	}


	function getUrlPagSeguro($reference) {
		$cliente = $this->Cliente->findByReference($reference);

		if ($cliente) {
				
			$paymentRequest = new PagSeguroPaymentRequest();
			$paymentRequest->addItem('0001', 'QueroReceber', 1, 13.00); 

			$paymentRequest->setSender(  
			    $cliente['Cliente']['nome'].' '.$cliente['Cliente']['sobrenome'],   
			    $cliente['Cliente']['email'],  
			    //'c51594288315567123751@sandbox.pagseguro.com.br', 
			    $cliente['Cliente']['ddd'],   
			    $cliente['Cliente']['telefone']  
			); 
			$paymentRequest->setShippingAddress(  
			    $cliente['Cliente']['cep'],   
			    $cliente['Cliente']['logradouro'],       
			    $cliente['Cliente']['numero'],       
			    $cliente['Cliente']['complemento'],       
			    $cliente['Cliente']['bairro'],      
			    $cliente['Cliente']['cidade'],      
			    $cliente['Cliente']['estado'],     
			    'BRA'     
			);  
			$paymentRequest->setCurrency("BRL");  

			$paymentRequest->setShippingType(3);

			$paymentRequest->setReference($cliente['Cliente']['reference']);  
			$paymentRequest->addParameter('notificationURL', 'http://107.170.171.150/clientes/lista');  
			//$paymentRequest->addParameter('senderCPF', '12345678901');

			// Informando as credenciais  
			$credentials = new PagSeguroAccountCredentials(  
			    'tiagoelias.adv@live.com',   
			    //'27CF0B0980834A99A84FF278034447B8'
			    '20C346FCDCF44B069A5AF64C31D68A6D'  
			);  
			  
			// fazendo a requisição a API do PagSeguro pra obter a URL de pagamento  
			$url = $paymentRequest->register($credentials);
			echo $url;
			die;
		}
	}
}
