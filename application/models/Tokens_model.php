<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tokens_model extends CI_Model
{
	public function add($Tokens, $user)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Tokens VALUES (Null,?,?,NOW())',array($Tokens, $user));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Tokens ORDER BY nomTokens ASC');
		return ($query->result_array());
	}

	public function check($token)
	{
		$query = $this->db->query('SELECT * FROM Tokens WHERE token = ? LIMIT 1 ', array($token));
		if(!empty($query->result_array())){
			return true;
		}else{
			return false;
		}
	}

	public function getTokenss($id=0)
	{
		$query = $this->db->query('SELECT * FROM Tokens, Ville WHERE Tokens.ville = Ville.idVille AND idVille = ? ORDER BY nomTokens ASC', array($id));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}