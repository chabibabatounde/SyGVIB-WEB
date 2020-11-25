<?php
class MaisonAssurance extends CI_Controller {
	public $data = array();
	function __construct() {
        parent::__construct();
    	init($this);
        $this->data['activePage'] = 'maisonAssurance';
    }

    public function index()
    {
        $this->data['message'] = "";
        
        $this->load->model("MaisonAssurance_model","MaisonAssurance");

        if(!empty($_POST)){
            $login = chr(rand(65,81)).chr(rand(65,81)).chr(rand(65,81)).chr(rand(65,81))."-".rand(100000,999999);
            $password = chr(rand(97,122)).rand(100,999).chr(rand(65,81)).rand(100,999).chr(rand(97,122)).rand(100,999).chr(rand(65,81)).chr(rand(97,122));
            
            $this->load->model("Utilisateur_model","Utilisateur");
            $this->Utilisateur->add($login, $password);
            $idUser = $this->Utilisateur->getMyId($login, $password);

            $this->MaisonAssurance->add($_POST['nomAssureur'], $idUser);
            $this->data['message'] = '
            <div class="col-sm-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Assureur enregistré avec succès!
                        </h2>
                    </div>
                    <div class="body">
                        <b> Identifiant de connexion : </b> '.$login.' <br>
                        <b> Mot de passe : </b> '.$password.'
                        </div>
                </div>
            </div>';
        }

    	$this->load->model("Departement_model","Departement");
    	$this->data['departements'] = $this->Departement->gets();
    	$this->load->model("Genre_model","Genre");
    	$this->data['genres'] = $this->Genre->gets();
    	$this->load->model("Energie_model","Energie");
    	$this->data['energies'] = $this->Energie->gets();
    	$this->load->model("Carosserie_model","Carosserie");
    	$this->data['carosseries'] = $this->Carosserie->gets();

        $this->data['maisonAssurances'] = $this->MaisonAssurance->gets();

		$this->load->view('maisonAssurance',$this->data);
    }

}