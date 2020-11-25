<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AgenceCNSR_model extends CI_Model
{
	public function add($nomAssureur,$id)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO AgenceCNSR VALUES (Null,?,?)',array($nomAssureur, $id));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function gets()
	{
		$query = $this->db->query('SELECT * FROM AgenceCNSR ORDER BY libelleAgenceCNSR ASC');
		return ($query->result_array());
	}

	public function getAgenceCNSRs($id=0)
	{
		$query = $this->db->query('SELECT * FROM AgenceCNSR, Ville WHERE AgenceCNSR.ville = Ville.idVille AND idVille = ? ORDER BY libelleAgenceCNSR ASC', array($id));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}