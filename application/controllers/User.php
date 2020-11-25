<?php
class User extends CI_Controller {
	public $data = array();
	function __construct() {
        parent::__construct();
    	init($this);
        $this->data['activePage'] = 'bug';
    }

    public function Profil($value='')
    {
        $this->data['message'] = '';
       if(!empty($_POST) ){
        $this->data['message'] = '<span style="color:green;"> Mot de passe modifié avec succès!</span>';
       }
        /*$this->load->model("Departement_model","Departement");
        $this->data['departements'] = $this->Departement->gets();
        $this->load->model("Genre_model","Genre");
        $this->data['genres'] = $this->Genre->gets();
        $this->load->model("Energie_model","Energie");
        $this->data['energies'] = $this->Energie->gets();
        $this->load->model("Carosserie_model","Carosserie");
        $this->data['carosseries'] = $this->Carosserie->gets();*/

        $this->load->view('user_info',$this->data);
    }
}