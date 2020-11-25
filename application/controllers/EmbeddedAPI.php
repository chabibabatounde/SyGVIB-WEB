<?php
class EmbeddedAPI extends CI_Controller {

	private function generateToken(){
		$token = openssl_random_pseudo_bytes(32);
		$token = bin2hex($token);
		return $token;
	}

	public function index(){
		$this->load->model("Voiture_model","Voiture");
		print_r(json_encode(array("type"=>"addAssurance","valeur"=>"CheckingSuccess")));
	}
	
	public function getToken()
	{
		$resultat = array("type"=>"erreur","codeErreur"=>"101");
		if(isset($_POST['login'])){
			$token = $this->generateToken();
			$login = $_POST['login'];
			$password = md5($_POST['password']);

			$resultat = array("type"=>"erreur","codeErreur"=>"101");
			$this->load->model('Utilisateur_model','Utilisateur');

			if($this->Utilisateur->check($login,md5($password))){
				$this->load->model('Tokens_model','Tokens');
				$user = $this->Utilisateur->getUser($login,md5($password))['idUtilisateur'];
				$this->Tokens->add($token,$user);
				$resultat = array("token"=>"erreur","echeance"=>"101","valeur"=>$token);
			}
		}else{
			$resultat = array("type"=>"erreur","codeErreur"=>"101");
		}
		print(json_encode($resultat));
	}

	public function checkCar()
	{
		$resultat = array("type"=>"erreur","codeErreur"=>"101");
		if(isset($_POST['immatriculation'])){
			$token = $_POST['token'];
			$immatriculation = $_POST['immatriculation'];
			$this->load->model('Tokens_model','Tokens');

			if($this->Tokens->check($token)){
				$this->load->model('Voiture_model','Voiture');
				$resultat = array("type"=>"erreur","codeErreur"=>"101");
				$resultat =$this->Voiture->getByImmatriculation($immatriculation);
				if(empty($resultat)){
					$resultat = array("type"=>"erreur","codeErreur"=>"101");
				}else{
					$resultat = array("type"=>"checkCar","valeur"=>"CheckingSuccess");
				}
			}else{
				$resultat = array("type"=>"erreur","codeErreur"=>"101");
			}
		}else{
			$resultat = array("type"=>"erreur","codeErreur"=>"101");
		}
		print(json_encode($resultat));
	}


	public function log()
	{
		$resultat = array("type"=>"erreur","codeErreur"=>"101");
		if(isset($_POST['immatriculation'])){
			$token = $_POST['token'];
			$dateTime = $_POST['dateTime'];
			$log = $_POST['log'];
			$this->load->model('Tokens_model','Tokens');
			$resultat = array("type"=>"log","valeur"=>"logSaved");
		}else{
			$resultat = array("type"=>"erreur","codeErreur"=>"101");
		}
		print(json_encode($resultat));
	}

}
