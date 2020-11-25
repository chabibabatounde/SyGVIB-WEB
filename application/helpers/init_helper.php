
<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('init')){
	function init($controler){
		if(isset($_SESSION['SyGVIB']['sessionTime'])){
			if(time()>($_SESSION['SyGVIB']['sessionTime']+60000)) {
				$controler->data['erreur'] = "<span style='color:red; font-size:14px;'>Votre session expirée, reconnectez-vous!</span><br><br>";
				$controler->load->view('login_form.php',$controler->data);
			}
		}else{
			$controler->data['erreur'] = "<span style='color:red; font-size:14px;'>Veuillez vous connecter!</span><br><br>";
			$controler->load->view('login_form.php',$controler->data);
		} 
	}
}

if ( ! function_exists('checkPermission')){
	function checkPermission($permission){
		if(!isset($_SESSION['SyGVIB']['user']['permission'])){
			echo "vous n'etes pas autoriser à accéder à ce service!";
		}else{
			if(in_array($permission, $_SESSION['SyGVIB']['user']['permission'])){
				echo "vous n'etes pas autoriser à accéder à ce service!";
			}
		}
	}
}
