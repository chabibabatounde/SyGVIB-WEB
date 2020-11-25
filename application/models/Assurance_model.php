<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assurance_model extends CI_Model
{
	public function add($post)
	{
		$resultat = false;
		$calcule = '+'.$post['duree'].' '.$post['unite'];
		$echeance = date('Y-m-d', strtotime( $calcule));
		$utilisateur = $_SESSION['SyGVIB']['user']['idUtilisateur'];
		$maisonAssurance = $_SESSION['SyGVIB']['user']['objet']['maisonAssurance'];
		$operation = $this->db->query('INSERT INTO Assurance VALUES (Null,?,?,?,?,?,?,?)',array($post['dateDebut'],$post['duree'],$post['unite'],$echeance,$post['idVoiture'],$maisonAssurance,$utilisateur));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function getByVehicule($id=0)
	{
		$query = $this->db->query('SELECT * FROM Assurance WHERE voiture = ? ORDER BY dateAssurance DESC',array($id));
		return ($query->result_array());
	}

	public function getMine($id=0)
	{
		$maisonAssurance = $_SESSION['SyGVIB']['user']['objet']['maisonAssurance'];
		$query = $this->db->query('SELECT * FROM Assurance WHERE maisonAssurance = ? AND voiture = ? ORDER BY dateAssurance DESC',array($maisonAssurance,$id));
		return ($query->result_array());
	}

	

	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Assurance ORDER BY libelleAssurance ASC');
		return ($query->result_array());
	}

	public function getMesAssurances($voiture)
	{
		# code...
	}

	public function getLast($post)
	{
		$resultat = false;
		$calcule = '+'.$post['duree'].' '.$post['unite'];
		$echeance = date('Y-m-d', strtotime( $calcule));
		$utilisateur = $_SESSION['SyGVIB']['user']['idUtilisateur'];
		$maisonAssurance = $_SESSION['SyGVIB']['user']['objet']['maisonAssurance'];
		
		$query = $this->db->query('SELECT * FROM Assurance, MaisonAssurance WHERE dateAssurance = ? AND  duree = ? AND  uniteDuree = ? AND  echeance = ? AND  voiture = ? AND  maisonAssurance = ? AND Assurance.utilisateur = ? AND MaisonAssurance.idMaisonAssurance = Assurance.maisonAssurance ORDER BY idAssurance DESC LIMIT 1',array($post['dateDebut'],$post['duree'],$post['unite'],$echeance,$post['idVoiture'],$maisonAssurance,$utilisateur));
		return ($query->result_array()[0]);
	}

	public function getAssurances($id=0)
	{
		$query = $this->db->query('SELECT * FROM Assurance, Ville WHERE Assurance.ville = Ville.idVille AND idVille = ? ORDER BY libelleAssurance ASC', array($id));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}