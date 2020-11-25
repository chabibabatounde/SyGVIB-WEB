<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utilisateur_model extends CI_Model
{
	public function add($login, $password)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Utilisateur VALUES (Null,?,?,?)',array($login, md5(md5($password)), "user.png"));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function getMyId($login, $password)
	{
		$query = $this->db->query('SELECT idUtilisateur FROM Utilisateur WHERE login = ? AND password = ? ORDER BY idUtilisateur DESC LIMIT 1',array($login, md5(md5($password))));
		return ($query->result_array()['0']['idUtilisateur']);
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

	public function getUser($login, $password)
	{
		$query = $this->db->query('SELECT idUtilisateur, photoProfil FROM Utilisateur WHERE login = ? AND password = ? LIMIT 1', array($login, $password));
		$resultat =  ($query->result_array());
		return $resultat['0'];
	}

	public function checkType($user)
	{
		$retour = array();
		$query = $this->db->query('SELECT * FROM Administrateur WHERE utilisateur = ? LIMIT 1', array($user));
		$resultat =  ($query->result_array());
		///--->>>end Administrateur
		if(empty($resultat)){
			$query = $this->db->query('SELECT * FROM MaisonAssurance WHERE utilisateur = ? LIMIT 1', array($user));
			$resultat =  ($query->result_array());
			///--->>>end MaisonAssurance
			if(empty($resultat)){
				$query = $this->db->query('SELECT * FROM AgenceAssurance, MaisonAssurance WHERE AgenceAssurance.maisonAssurance = MaisonAssurance.idMaisonAssurance AND AgenceAssurance.utilisateur = ? LIMIT 1', array($user));
				$resultat =  ($query->result_array());
				///--->>>end AgenceAssurance
				if(empty($resultat)){
					$query = $this->db->query('SELECT * FROM AgenceCNSR WHERE utilisateur = ? LIMIT 1', array($user));
					$resultat =  ($query->result_array());
					///--->>>end AgenceCNSR
					if(empty($resultat)){
						$query = $this->db->query('SELECT * FROM Inspecteur, AgenceCNSR WHERE Inspecteur.utilisateur = ? AND AgenceCNSR.idAgenceCNSR = Inspecteur.agenceCNSR LIMIT 1', array($user));
						$resultat =  ($query->result_array());
						///--->>>end Inspecteur
						if(empty($resultat)){
						//AUtreType
						}
						else{
							$retour = array('type'=>"InspecteurCNSR",'objet'=>$resultat['0']);
						}
					}else{
						$retour = array('type'=>"AgenceCNSR",'objet'=>$resultat['0']);
					}
				}else{
					$retour = array('type'=>"AgenceAssurance",'objet'=>$resultat['0']);
				}
			}else{
				$retour = array('type'=>"Assureur",'objet'=>$resultat['0']);
			}
		}else{
			$retour = array('type'=>"Administrateur",'objet'=>$resultat['0']);
		}
		return $retour;
	}
}