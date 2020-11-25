<?php
class Login extends CI_Controller {
	public $data = array();

	public function redirect()
	{
				//redirect($this->uri->segment(1), $this->uri->segment(2));
	}

	public function deconnexion($value='')
	{
		$this->session->sess_destroy();
		$this->data['erreur'] = "<span style='color:green; font-size:14px;'>Déconnexion réusie</span><br><br>";
			$this->load->view('login_form.php',$this->data);
	}
	public function index()
	{
		$this->load->model('Utilisateur_model','Utilisateur');
		$this->load->model('Permission_model','Permission');

		$login = ($this->input->post('login'));
		$password = md5($this->input->post('password'));
		if($this->Utilisateur->check($login,md5($password))){
			$_SESSION['SyGVIB']['sessionTime']=time();
			$_SESSION['SyGVIB']['user']['login']=$login;
			$_SESSION['SyGVIB']['user']['idUtilisateur']=$this->Utilisateur->getUser($login,md5($password))['idUtilisateur'];
			$_SESSION['SyGVIB']['user']['photoProfil']=$this->Utilisateur->getUser($login,md5($password))['photoProfil'];
			$_SESSION['SyGVIB']['user']['permission']=$this->Permission->getUserPermission($_SESSION['SyGVIB']['user']['idUtilisateur']);
			$check=$this->Utilisateur->checkType($_SESSION['SyGVIB']['user']['idUtilisateur']);
			$_SESSION['SyGVIB']['user']['type']=$check['type'];
			$_SESSION['SyGVIB']['user']['objet']=$check['objet'];

			if($this->uri->segment(1)=='Login'){
				redirect("Acceuil", "");
			}else{
				
				//redirect($this->uri->segment(1), $this->uri->segment(2));
			}

		}else{
			$this->data['erreur'] = "<span style='color:red; font-size:14px;'>Combinaision Identifiant - Mot de passe incorrecte</span><br><br>";
			$this->load->view('login_form.php',$this->data);
		}
	}
}
