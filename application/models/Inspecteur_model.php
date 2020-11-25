<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inspecteur_model extends CI_Model
{
	public function add($post,$id)
	{
		$resultat = false;
		$agence = $_SESSION['SyGVIB']['user']['objet']['idAgenceCNSR'];
		$operation = $this->db->query('INSERT INTO Inspecteur VALUES (Null,?,?,?,?)',array($post['nomInpecteur'],$post['prenomInpecteur'],$agence,$id));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Inspecteur ORDER BY nomInspecteur , prenomInspecteur ASC');
		return ($query->result_array());
	}

	public function getInspecteurs($id=0)
	{
		$query = $this->db->query('SELECT * FROM Inspecteur, Ville WHERE Inspecteur.ville = Ville.idVille AND idVille = ? ORDER BY libelleInspecteur ASC', array($id));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}