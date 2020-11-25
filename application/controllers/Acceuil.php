<?php
class Acceuil extends CI_Controller {

	public $data = array();
	
	public function index()
	{
		$this->data['activePage'] = 'acceuil';
		$this->load->view('acceuil',$this->data);
	}
}
