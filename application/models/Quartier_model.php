<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quartier_model extends CI_Model
{
	public function add($mail)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Quartier VALUES (Null,?)',array($mail));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Quartier ORDER BY nomQuartier ASC');
		return ($query->result_array());
	}

	public function getQuartiers($id=0)
	{
		$query = $this->db->query('SELECT * FROM Quartier, Ville WHERE Quartier.ville = Ville.idVille AND idVille = ? ORDER BY nomQuartier ASC', array($id));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}