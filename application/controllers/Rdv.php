<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rdv extends CI_Controller {
	
	public function index($message)
	{
		if(isset($message)){
			$data['message']=$message;
		}
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
			$idRdv=$this->RdvModel->demandeRdv($dateHDebut,$idService,$idClient);
			redirect("rdv/devispdf/$idRdv");
		}
		catch(\Throwable $e){
			$mess=$e->getMessage();
			redirect("rdv/index/$mess");
		}
	}

	public function devispdf($idRdv){
		$this->load->library("pdfmodel");
		$this->pdfmodel->AddPage();
		$this->pdfmodel->Body($idRdv);
		$this->pdfmodel->Output();
	}
}
