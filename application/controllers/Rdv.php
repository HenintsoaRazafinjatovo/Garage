<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rdv extends CI_Controller {
	
	public function index()
	{
		$data['content']='Rdv';
		$data['user']=$this->session->userdata("client");
		$this->load->model('ServiceModel');
		$data['services']=$this->ServiceModel->getAll();
		$this->load->view('partials/template',$data);
	}

	public function demandeRdv(){
		$dateDebut=$this->input->post("date");
		$heureDebut=$this->input->post("heure");

		$dateHDebut=new DateTime($dateDebut+" "+$heureDebut);
		$idService=$this->input->post("type");
		$idClient=$this->session->userdata("client")['Id_Client'];

		$this->load->model('RdvModel');
		try{
			$test=$this->RdvModel->demandeRdv($dateHDebut,$idService,$idClient);

		}
	}
}
