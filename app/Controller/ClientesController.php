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
	
	function index (){

	}

	function lista(){
	die('lista');
	}
	/*function getStatusTransacao($code){
		$data['email'] = 'heytorthompson@gmail.com';
		$data['token'] = 'D4CA9D635DBC41DCAC2F5791163B53B2';
		$data['code'] = 'REF1234';

		$curl = curl_init('https://ws.pagseguro.uol.com.br/v2/transactions/notifications/'.$data['code'].'?email=' . $data['email'] . '&token=' . $data['token'] );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$transaction= curl_exec($curl);
		curl_close($curl);

	    return $transaction;

	}*/
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
