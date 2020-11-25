<?php
class Quartier extends CI_Controller {

	public function getQuartiers()
	{
		$id =  $_POST['idVille'];
		$this->load->model("Quartier_model","Quartier");
		$resultat=$this->Quartier->getQuartiers($id);
	    echo '<select onchange="loadQuartier(this);"  name="Quartier" class="form-control show-tick">';
			echo '<option value="">---Choisir le quartier ---</option>';
		foreach ($resultat as $quartier) {
			echo '<option value="'.$quartier['idQuartier'].'">'.$quartier['nomQuartier'].'</option>';
		}
		echo '<option value="autre">autre</option>';
	    echo '</select>';
	}
}
