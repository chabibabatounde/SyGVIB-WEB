<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departement_model extends CI_Model
{
	public function add($mail)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Departement VALUES (Null,?)',array($mail));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Departement ORDER BY nomDepartement ASC');
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}