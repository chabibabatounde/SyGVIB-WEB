<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission_model extends CI_Model
{

	public function getUserPermission($id)
	{
		$query = $this->db->query('SELECT Privillege.libellePrivillege FROM Permission,Privillege WHERE Utilisateur = ? AND Permission.privillege = Privillege.idPrivillege' ,array($id));
		$resultat = $query->result_array();
		$retour = array();
		foreach ($resultat as $value) {
			array_push($retour, $value['libellePrivillege']);
		}
		return $retour;
	}

	public function addNewsletter($mail)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Newsletter VALUES (Null,?)',array($mail));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

	public function check($login, $password)
	{
		$reponse = false;
		$query = $this->db->query('SELECT * FROM Utilisateur WHERE login = ? AND password = ? LIMIT 1', array($login, $password));
		$resultat =  ($query->result_array());
		if(!empty($resultat)){
			$reponse = true;
		}
		return $reponse;
	}

	public function getID($login, $password)
	{
		$query = $this->db->query('SELECT idUtilisateur FROM Utilisateur WHERE login = ? AND password = ? LIMIT 1', array($login, $password));
		$resultat =  ($query->result_array());
		return $resultat['0']['idUtilisateur'];
	}

}