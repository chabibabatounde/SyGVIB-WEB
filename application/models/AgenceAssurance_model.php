<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AgenceAssurance_model extends CI_Model
{
	public function add($post, $idUser)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO AgenceAssurance VALUES (Null,?,?,?,?)',array($post['nomAgence'],$post['contactAgence'],$_SESSION['SyGVIB']['user']['objet']['idMaisonAssurance'], $idUser));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function gets()
	{
		$query = $this->db->query('SELECT * FROM AgenceAssurance ORDER BY libelleAgence ASC');
		return ($query->result_array());
	}

	public function getAgenceAssurances($id=0)
	{
		$query = $this->db->query('SELECT * FROM AgenceAssurance, Ville WHERE AgenceAssurance.ville = Ville.idVille AND idVille = ? ORDER BY libelleAgence ASC', array($id));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}