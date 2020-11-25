<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carosserie_model extends CI_Model
{
	public function add($mail)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Carosserie VALUES (Null,?)',array($mail));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Carosserie ORDER BY libelleCarosserie ASC');
		return ($query->result_array());
	}

	public function getCarosseries($id=0)
	{
		$query = $this->db->query('SELECT * FROM Carosserie, Ville WHERE Carosserie.ville = Ville.idVille AND idVille = ? ORDER BY libelleCarosserie ASC', array($id));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}