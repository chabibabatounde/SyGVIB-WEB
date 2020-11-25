<?php
class Immatriculation extends CI_Controller {
	public $data = array();
	function __construct() {
        parent::__construct();
    	init($this);
        $this->data['activePage'] = 'immatriculation';
    }

    public function nouveau()
    {
    	$this->load->model("Departement_model","Departement");
    	$this->data['departements'] = $this->Departement->gets();
    	$this->load->model("Genre_model","Genre");
    	$this->data['genres'] = $this->Genre->gets();
    	$this->load->model("Energie_model","Energie");
    	$this->data['energies'] = $this->Energie->gets();
    	$this->load->model("Carosserie_model","Carosserie");
    	$this->data['carosseries'] = $this->Carosserie->gets();

		$this->load->view('immatriculation_nouveau',$this->data);
    }

    public function ancien()
    {
    	$this->load->model("Proprietaire_model","Proprietaire");
    	$this->data['proprietaires'] = $this->Proprietaire->gets();
    	$this->load->model("Departement_model","Departement");
    	$this->data['departements'] = $this->Departement->gets();
    	$this->load->model("Genre_model","Genre");
    	$this->data['genres'] = $this->Genre->gets();
    	$this->load->model("Energie_model","Energie");
    	$this->data['energies'] = $this->Energie->gets();
    	$this->load->model("Carosserie_model","Carosserie");
    	$this->data['carosseries'] = $this->Carosserie->gets();


		$this->load->view('immatriculation_ancien',$this->data);
    }


    public function Sticker($idVoiture)
    {
    	$this->load->model("Voiture_model","Voiture");
    	$voiture = $this->Voiture->get($idVoiture);
    	$this->data['voiture'] = $voiture;
		$this->load->view('print_Sticker',$this->data);
    }

    public function ajouter()
    {
    	$proprietaire = 0;
    	if(isset($_POST['idProprietaire'])){
    		$proprietaire = $_POST['idProprietaire'];
    	}else{
    		$this->load->model("Proprietaire_model","Proprietaire");
    		$this->Proprietaire->add($_POST);
    		$proprietaire = $this->Proprietaire->getMyId($_POST);
    	}
    	$this->load->model("Voiture_model","Voiture");
    	$immatriculation = $this->Voiture->add($_POST, $proprietaire);
    	$idVoiture = $this->Voiture->getMyId($immatriculation, $proprietaire);
    	$voiture = $this->Voiture->get($idVoiture);

    	$this->data['voiture'] = $voiture;

		$this->load->view('immatriculation_ajoutee',$this->data);
    }
}