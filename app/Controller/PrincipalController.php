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
class PrincipalController extends Controller {
	
	function index(){

		
		echo '<pre>';
		var_dump(BASE);  
		die;
		//$dados = $this->getStatusTransacao(1);

		//criando transacao
		/*$dados = $this->getUrlPagSeguro();
		$url = '';
		if ($dados == 'Unauthorized'){

		}else{
			$ano = date('Y');
			$code =	explode($ano, $dados);
			$url = 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code='. $code[0];
		}
		// criando transacao
		echo '<pre>';
		var_dump($url);
		die;*/
	}
	function addCliente(){
		if ($this->request->is('post')) {

		}
	}
	function getUrlPagSeguro() {
		if ($this->request->is('post')) {

			$paymentRequest = new PagSeguroPaymentRequest();
			$paymentRequest->addItem('0001', 'Notebook', 1, 300.00); 

			$paymentRequest->setSender(  
			    'José Comprador',   
			    'comprador@uol.com.br',   
			    '11',   
			    '56273440'  
			); 
			$paymentRequest->setShippingAddress(  
			    '01452002',   
			    'Av. Brig. Faria Lima',       
			    '1384',       
			    'apto. 114',       
			    'Jardim Paulistano',      
			    'São Paulo',      
			    'SP',     
			    'BRA'     
			);  
			$paymentRequest->setCurrency("BRL");  

			$paymentRequest->setShippingType(3);

			$paymentRequest->setReference("I9635");  
			$paymentRequest->addParameter('notificationURL', 'http://107.170.171.150/clientes/lista');  
			//$paymentRequest->addParameter('senderCPF', '12345678901');

			// Informando as credenciais  
			$credentials = new PagSeguroAccountCredentials(  
			    'heytorthompson@gmail.com',   
			    '27CF0B0980834A99A84FF278034447B8'  
			);  
			  
			// fazendo a requisição a API do PagSeguro pra obter a URL de pagamento  
			$url = $paymentRequest->register($credentials);
		}
	}
	function curlPost($url, $data) {

	    $data = http_build_query($data);

		$curl = curl_init($url);

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($curl, CURLOPT_POST, true);

		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

		$xml= curl_exec($curl);


	    return $xml;
	}
}
