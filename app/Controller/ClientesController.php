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
	
	

	
	private $timeout = 20; // Timeout em segundos

	function index (){

	}
	public function notificationPost() {
	
	}
	private function verify($data) {
	
	}

	function lista(){

		$email = 'heytorthompson@gmail.com';
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
		echo '<pre>';
		var_dump($transaction);
		die;
		$transaction = simplexml_load_string($transaction);

		if(count($transaction -> error) > 0) {
		//Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
		var_dump($transaction);
		}
		echo $transaction -> sender -> email;


	}
	
	
}
