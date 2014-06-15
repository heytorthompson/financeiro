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
		$postdata = 'Comando=validar&Token=27CF0B0980834A99A84FF278034447B8';
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
	header('Content-Type: text/html; charset=ISO-8859-1');
		if (count($_POST) > 0) {
			
			// POST recebido, indica que é a requisição do NPI.
			
			$result = $this->notificationPost();
			
			
			$transacaoID = isset($_GET['transaction_id']) ? $_GET['transaction_id'] : '';
			
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
		$this->log("PagSeguro");
		echo '<pre>';
			var_dump($result);
			die;
		$this->layout = false;
		$this->render(false);

	}
	
	
}
