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
	
	header('Content-Type: text/html; charset=ISO-8859-1');

	define('TOKEN', '27CF0B0980834A99A84FF278034447B8');
	private $timeout = 20; // Timeout em segundos

	function index (){

	}
	public function notificationPost() {
		$postdata = 'Comando=validar&Token='.TOKEN;
		foreach ($_POST as $key => $value) {
			$valued    = $this->clearStr($value);
			$postdata .= "&$key=$valued";
		}
		return $this->verify($postdata);
	}

	private function clearStr($str) {
		if (!get_magic_quotes_gpc()) {
			$str = addslashes($str);
		}
		return $str;
	}
	private function verify($data) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "https://pagseguro.uol.com.br/pagseguro-ws/checkout/NPI.jhtml");
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$result = trim(curl_exec($curl));
		curl_close($curl);
		return $result;
	}

	function lista(){
	
		if (count($_POST) > 0) {
			
			// POST recebido, indica que é a requisição do NPI.
			
			$result = $this->notificationPost();
			echo '<pre>';
			var_dump($result);
			die;
			
			$transacaoID = isset($_POST['TransacaoID']) ? $_POST['TransacaoID'] : '';
			
			if ($result == "VERIFICADO") {
				//O post foi validado pelo PagSeguro.
			} else if ($result == "FALSO") {
				//O post não foi validado pelo PagSeguro.
			} else {
				//Erro na integração com o PagSeguro.
			}
			
		} else {
			// POST não recebido, indica que a requisição é o retorno do Checkout PagSeguro.
			// No término do checkout o usuário é redirecionado para este bloco.
			
		    echo '<h3>Obrigado por efetuar a compra.</h3>';
		    
		}


	}
	
	function getUrlPagSeguro() {

	    $data['email'] = 'heytorthompson@gmail.com';
		$data['token'] = 'D4CA9D635DBC41DCAC2F5791163B53B2';
		$data['currency'] = 'BRL';
		$data['itemId1'] = '0001';
		$data['itemDescription1'] = 'Notebook Prata';
		$data['itemAmount1'] = '24.00';
		$data['itemQuantity1'] = '1';
		$data['itemWeight1'] = '1000';
		$data['itemId2'] = '0002';
		$data['itemDescription2'] = 'Notebook Rosa';
		$data['itemAmount2'] = '20.00';
		$data['itemQuantity2'] = '2';
		$data['itemWeight2'] = '750';
		$data['reference'] = 'REF123434';
		$data['senderName'] = 'Joses Comprador';
		$data['senderAreaCode'] = '11';
		$data['senderPhone'] = '56273440';
		$data['senderEmail'] = 'comprador@uol.com.br';
		$data['shippingType'] = '3';
		$data['shippingAddressStreet'] = 'Av. Brig. Faria Lima';
		$data['shippingAddressNumber'] = '1384';
		$data['shippingAddressComplement'] = '5o andar';
		$data['shippingAddressDistrict'] = 'Jardim Paulistano';
		$data['shippingAddressPostalCode'] = '01452002';
		$data['shippingAddressCity'] = 'Sao Paulo';
		$data['shippingAddressState'] = 'SP';
		$data['shippingAddressCountry'] = 'BRA';
		$data['redirectURL'] = 'http://www.sounoob.com.br/paginaDeAgracedimento';
	    
	    $resposta = $this->curlPost('https://ws.pagseguro.uol.com.br/v2/checkout/', $data);

	    return $resposta;
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
