<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inspection_model extends CI_Model
{
	public function add($post)
	{
		$resultat = false;
		$inspecteur = $_SESSION['SyGVIB']['user']['objet']['idInspecteur'];
		$operation = $this->db->query('INSERT INTO Inspection VALUES (Null,?,?,?,NOW())',array($post['verdict'],$inspecteur,$post['idVoiture']));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function getMyId($post)
	{
		$inspecteur = $_SESSION['SyGVIB']['user']['objet']['idInspecteur'];
		$query = $this->db->query('SELECT idInspection FROM Inspection WHERE verdicte = ? AND inspecteur = ?  AND voiture = ? ORDER BY idInspection DESC LIMIT 1',array($post['verdict'],$inspecteur,$post['idVoiture']));
		return ($query->result_array()['0']['idInspection']);
	}

	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Inspection ORDER BY nomInspection ASC');
		return ($query->result_array());
	}

	public function getInspections($id=0)
	{
		$query = $this->db->query('SELECT * FROM Inspection, Departement WHERE Inspection.departement = Departement.idDepartement AND idDepartement = ? ORDER BY nomInspection ASC', array($id));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}