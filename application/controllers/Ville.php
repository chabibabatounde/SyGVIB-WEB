<?php
class Ville extends CI_Controller {

	public function getVilles()
	{
		$id =  $_POST['idDepartement'];
		$this->load->model("Ville_model","Ville");
		$resultat=$this->Ville->getVilles($id);
	    echo '<select onchange="loadQuartier(this);"  name="ville" class="form-control show-tick">';
			echo '<option value="">---Choisir la ville ---</option>';
		foreach ($resultat as $ville) {
			echo '<option value="'.$ville['idVille'].'">'.$ville['nomVille'].'</option>';
		}
	    echo '</select>';
	}
}
