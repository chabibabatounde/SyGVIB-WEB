<?php
class CNSR extends CI_Controller {

	public $data = array();
	
	public function visiteTechnique()
	{
		$this->data['activePage'] = 'visiteTechnique';
		$this->data['message'] = '';
		$this->load->view('visiteTechnique',$this->data);
			
	}

	public function visiteTechniqueAdd()
	{
		$this->data['activePage'] = 'visiteTechnique';
		$this->data['message'] = '';
		$this->load->view('visiteTechniqueAdd',$this->data);
			
	}


	public function inspecteurs()
	{
		$this->data['activePage'] = 'inspecteurs';
		$this->data['message'] = "";
        
        $this->load->model("Inspecteur_model","Inspecteur");

        if(!empty($_POST)){
            $login = chr(rand(65,81)).chr(rand(65,81)).chr(rand(65,81)).chr(rand(65,81))."-".rand(100000,999999);
            $password = chr(rand(97,122)).rand(100,999).chr(rand(65,81)).rand(100,999).chr(rand(97,122)).rand(100,999).chr(rand(65,81)).chr(rand(97,122));
            
            $this->load->model("Utilisateur_model","Utilisateur");
            $this->Utilisateur->add($login, $password);
            $idUser = $this->Utilisateur->getMyId($login, $password);

            $this->Inspecteur->add($_POST, $idUser);
            $this->data['message'] = '
            <div class="col-sm-12">
                <div class="card">
                    <div class="header bg-green">
                        <h2>
                            Inspecteur enregistrée avec succès!
                        </h2>
                    </div>
                    <div class="body">
                        <b> Identifiant de connexion : </b> '.$login.' <br>
                        <b> Mot de passe : </b> '.$password.'
                        </div>
                </div>
            </div>';
        }

        $this->data['Listeinspecteurs'] = $this->Inspecteur->gets();
        $this->load->view('inspecteursCNSR',$this->data);
	}



	public function consulterVehicule()
	{
		$this->data['activePage'] = 'consulterVehicule';
		if(!empty($_POST)){
    		$this->load->model("Voiture_model","Voiture");
    		$voiture =  $this->Voiture->getByImmatriculation($_POST['immatriculation']);
    		if(empty($voiture)){
        		$this->data['message'] = '<span style="color:red;"> Aucun véhicule de correspond à votre recherche</span>';
				$this->load->view('visiteTechnique',$this->data);
    		}else{
    			$voiture=$voiture[0];
    			$this->load->model("Assurance_model","Assurance");
        		$this->data['assurances'] = $this->Assurance->getByVehicule($voiture['idVoiture']);
    			 $this->load->model("VisiteTechnique_model","VisiteTechnique");
                $this->data['visites'] = $this->VisiteTechnique->getMine($voiture['idVoiture']);
                $this->data['voiture'] = $voiture;
        		$this->data['voiture'] = $voiture;
				$this->load->view('visiteTechnique_listeRecherche',$this->data);
    		}
    	}else{
			$this->data['message'] = '';
			$this->load->view('visiteTechnique',$this->data);
    	}
	}

	public function addVisite()
	{
        $this->data['activePage'] = 'visiteTechnique';
        $this->load->model("Inspection_model","Inspection");
        $this->Inspection->add($_POST);
        $inspection = $this->Inspection->getMyId($_POST);

        $this->load->model("VisiteTechnique_model","VisiteTechnique");
        $this->VisiteTechnique->add($inspection, $_POST['idVoiture']);
        $this->data['message'] = '<b style="color:green; font-size:14px;">Visite technique enregistrée.</b> <a style="font-size:12px; margin-left:20px;" target="_blank" href="'.lien('CNSR','ImprimerVisite/'.$inspection).'"> <i class="material-icons">print</i> Imprimer </a>';
        
        $this->load->view('visiteTechniqueAdd',$this->data);
	}

	public function listeRecherche()
	{
		$this->data['activePage'] = 'visiteTechnique';
		if(!empty($_POST)){
    		$this->load->model("Voiture_model","Voiture");
    		$voiture =  $this->Voiture->getByImmatriculation($_POST['immatriculation']);
    		if(empty($voiture)){
        		$this->data['message'] = '<span style="color:red;"> Aucun véhicule de correspond à votre recherche</span>';
				$this->load->view('visiteTechnique',$this->data);
    		}else{
    			$voiture=$voiture[0];
    			$this->load->model("Assurance_model","Assurance");
        		$this->data['assurances'] = $this->Assurance->getByVehicule($voiture['idVoiture']);
    			$this->data['visites'] = array();
    			//$this->data['visites'] = $this->Assurance->getMine($voiture['idVoiture']);
        		$this->data['voiture'] = $voiture;
				$this->load->view('visiteTechnique_listeRecherche',$this->data);
    		}
    		//$
    	}
	}

	public function listAdd()
	{
		$this->data['activePage'] = 'visiteTechnique';
		if(!empty($_POST)){
    		$this->load->model("Voiture_model","Voiture");
    		$voiture =  $this->Voiture->getByImmatriculation($_POST['immatriculation']);
    		if(empty($voiture)){
        		$this->data['message'] = '<span style="color:red;"> Aucun véhicule de correspond à votre recherche</span>';
				$this->load->view('visiteTechnique',$this->data);
    		}else{
    			$voiture=$voiture[0];
    			$this->load->model("Assurance_model","Assurance");
        		$this->data['assurances'] = $this->Assurance->getByVehicule($voiture['idVoiture']);
                $this->load->model("VisiteTechnique_model","VisiteTechnique");
    			$this->data['visites'] = $this->VisiteTechnique->getMine($voiture['idVoiture']);
        		$this->data['voiture'] = $voiture;
				$this->load->view('visiteTechnique_listeAdd',$this->data);
    		}
    	}
	}
}
