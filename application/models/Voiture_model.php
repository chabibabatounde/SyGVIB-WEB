<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voiture_model extends CI_Model
{
	public function add($post, $proprio)
	{
		$quartier = 1;

		$currentNum = $this->getLastNumber();  
		$taille = strlen($currentNum);
		$serie = substr($currentNum, 0, $taille-6);  
		$tailleSerie = strlen($serie);
		$numero = substr($currentNum, $tailleSerie, 4);
		$numeroNew =0;
		if($numero<9999){

			$numeroNew = $numero + 1;
			if(strlen($numeroNew)==1){
				$numeroNew = "000".$numeroNew;
			}
			if(strlen($numeroNew)==2){
				$numeroNew = "00".$numeroNew;
			}
			if(strlen($numeroNew)==3){
				$numeroNew = "0".$numeroNew;
			}
		}else{
			$numeroNew = "0001";
		}

		$code = "";
		for ($i=0; $i < $tailleSerie; $i++) { 
			$code = $code.(ord($serie[$i])-64);
		}

		$numeroImma = $serie.$numeroNew."RB";
		$operation = $this->db->query('INSERT INTO Voiture VALUES (Null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())',array($post['marque'],$post['type'],$post['puissance'],$post['poidVide'],$post['chargeUtile'],($post['poidVide']+$post['chargeUtile']),$post['place'],$post['chassis'],$post['moteur'],$post['dateImmatriculation'],$post['genre'],$post['energie'],$post['carosserie'],$proprio,$numeroImma));
		return $numeroImma;
	}

	public function getLastNumber(){
		$query = $this->db->query('SELECT immatriculation FROM Voiture ORDER BY idVoiture DESC LIMIT 1');
		return ($query->result_array()['0']['immatriculation']);
	}

	public function getMyId($immatriculation, $proprio)
	{
		$query = $this->db->query('SELECT idVoiture FROM Voiture WHERE immatriculation=? AND  proprietaire=? ORDER BY idVoiture DESC',array($immatriculation, $proprio));
		return ($query->result_array()['0']['idVoiture']);
	}

	public function get($id=0)
	{
		$query = $this->db->query('SELECT * FROM Voiture, Proprietaire, Energie, Carosserie, Quartier, Ville, Departement WHERE Proprietaire.idProprietaire = Voiture.proprietaire AND Voiture.energie = Energie.idEnergie AND Voiture.carosserie = Carosserie.idCarosserie AND Proprietaire.quartierDeResidence = Quartier.idQuartier AND Quartier.ville = Ville.idVille AND Ville.departement = Departement.idDepartement AND Voiture.idVoiture  = ? LIMIT 1', array($id));
		return ($query->result_array())[0];
	}

	public function getByImmatriculation($immatriculation=0)
	{
		$query = $this->db->query('SELECT * FROM Voiture, Proprietaire, Energie, Carosserie, Quartier, Ville, Departement WHERE Proprietaire.idProprietaire = Voiture.proprietaire AND Voiture.energie = Energie.idEnergie AND Voiture.carosserie = Carosserie.idCarosserie AND Proprietaire.quartierDeResidence = Quartier.idQuartier AND Quartier.ville = Ville.idVille AND Ville.departement = Departement.idDepartement AND Voiture.immatriculation  = ? LIMIT 1', array($immatriculation));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}