<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VisiteTechnique_model extends CI_Model
{
	public function add($inspection, $voiture)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO VisiteTechnique VALUES (Null,NOW(),?,?)',array($inspection, $voiture));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function gets()
	{
		$query = $this->db->query('SELECT * FROM VisiteTechnique ORDER BY nomVisiteTechnique ASC');
		return ($query->result_array());
	}

	public function getVisiteTechniques($id=0)
	{
		$query = $this->db->query('SELECT * FROM VisiteTechnique, Departement WHERE VisiteTechnique.departement = Departement.idDepartement AND idDepartement = ? ORDER BY nomVisiteTechnique ASC', array($id));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

	public function getMine($id=0)
	{
		$query = $this->db->query('SELECT * FROM VisiteTechnique, Inspection, Inspecteur WHERE VisiteTechnique.voiture = ? AND VisiteTechnique.inspection = Inspection.idInspection AND Inspection.inspecteur = Inspecteur.idInspecteur ORDER BY idVisiteTechnique DESC',array($id));
		return ($query->result_array());
	}


}