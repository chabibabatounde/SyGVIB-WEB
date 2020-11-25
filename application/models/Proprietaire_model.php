<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proprietaire_model extends CI_Model
{
	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Proprietaire,Voiture, Quartier, Ville, Departement WHERE Proprietaire.idProprietaire = Voiture.proprietaire AND Proprietaire.quartierDeResidence = Quartier.idQuartier AND Quartier.ville = Ville.idVille AND Ville.departement = Departement.idDepartement AND Voiture.idVoiture  GROUP BY idProprietaire');
		return ($query->result_array());
	}


	public function add($post)
	{
		$resultat = false;
		$quartier = 1;
		$operation = $this->db->query('INSERT INTO Proprietaire VALUES (Null,?,?,?,?,?,?,?,?)',array($post['nom'],$post['prenom'],$post['dateNaissance'],$post['lieuNaissance'],$post['profession'],$post['adresse'],$post['telephone'],$quartier));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function getMyId($post)
	{
		$quartier = 1;
		$query = $this->db->query('SELECT idProprietaire FROM Proprietaire WHERE nomProprietaire=? AND  prenomProprietaire=? AND  dateNaissance=? AND  lieuNaissance=? AND  profession=? AND  adresse=? AND  telephone=? AND  quartierDeResidence=? ORDER BY idProprietaire DESC',array($post['nom'],$post['prenom'],$post['dateNaissance'],$post['lieuNaissance'],$post['profession'],$post['adresse'],$post['telephone'],$quartier));
		return ($query->result_array()['0']['idProprietaire']);
	}

	public function getProprietaires($id=0)
	{
		$query = $this->db->query('SELECT * FROM Proprietaire, Ville WHERE Proprietaire.ville = Ville.idVille AND idVille = ? ORDER BY libelleProprietaire ASC', array($id));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}