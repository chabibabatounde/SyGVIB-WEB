<?php
class Assurance extends CI_Controller {
	public $data = array();
	function __construct() {
        parent::__construct();
    	init($this);
        $this->data['activePage'] = 'ajouterAssurance';
    }

    public function nouveau($value='')
    {
        $this->data['message'] = '';
		$this->load->view('assurance_saisieNumero',$this->data);
    }

    public function ajouter()
    {
    	$this->load->model("Assurance_model","Assurance");
    	$this->Assurance->add($_POST);
    	$this->data['newAssurance'] = $this->Assurance->getLast($_POST);
    	$this->load->view('assurance_nouveau',$this->data);
    }


    public function listeRecherche()
    {
    	if(!empty($_POST)){
    		$this->load->model("Voiture_model","Voiture");
    		$voiture =  $this->Voiture->getByImmatriculation($_POST['immatriculation']);
    		if(empty($voiture)){
        		$this->data['message'] = '<span style="color:red;"> Aucun véhicule de correspond à votre recherche</span>';
				$this->load->view('assurance_saisieNumero',$this->data);
    		}else{
    			$voiture=$voiture[0];
    			$this->load->model("Assurance_model","Assurance");
        		$this->data['assurances'] = $this->Assurance->getByVehicule($voiture['idVoiture']);
    			$this->data['mesAssurances'] = $this->Assurance->getMine($voiture['idVoiture']);
        		$this->data['voiture'] = $voiture;
				$this->load->view('assurance_listeRecherche',$this->data);
    		}
    		//$
    	}
    }

    public function agences()
    {

        $this->data['message'] = "";
        $this->data['activePage'] = 'agenceAssurance';
        
        $this->load->model("AgenceAssurance_model","AgenceAssurance");

        if(!empty($_POST)){
            $login = chr(rand(65,81)).chr(rand(65,81)).chr(rand(65,81)).chr(rand(65,81))."-".rand(100000,999999);
            $password = chr(rand(97,122)).rand(100,999).chr(rand(65,81)).rand(100,999).chr(rand(97,122)).rand(100,999).chr(rand(65,81)).chr(rand(97,122));
            
            $this->load->model("Utilisateur_model","Utilisateur");
            $this->Utilisateur->add($login, $password);
            $idUser = $this->Utilisateur->getMyId($login, $password);


            $this->AgenceAssurance->add($_POST, $idUser);
            $this->data['message'] = '
            <div class="col-sm-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Agence enregistrée avec succès!
                        </h2>
                    </div>
                    <div class="body">
                        <b> Identifiant de connexion : </b> '.$login.' <br>
                        <b> Mot de passe : </b> '.$password.'
                        </div>
                </div>
            </div>';
        }

        $this->data['AgenceAssurances'] = $this->AgenceAssurance->gets();
        $this->load->view('agenceAssureur',$this->data);
    }
}