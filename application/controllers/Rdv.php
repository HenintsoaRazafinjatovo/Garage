<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rdv extends CI_Controller {
	public function __construct() {
        parent::__construct();

        if(!($this->session->userdata('admin') || $this->session->userdata('client'))){
            redirect('client');
        }
    }
	public function index()
	{
		$message=$this->input->get('message');
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
		$dateDebut=$this->input->get("dateRdv");
		$heureDebut=$this->input->get("heure");

		$dateHDebut=new DateTime($dateDebut." ".$heureDebut);
		$idService=$this->input->get("type");
		$idClient=$this->session->userdata("client");
		
		$idClient=$idClient['Id_Client'];

		$this->load->model('RdvModel');
		try{
			$idRdv=$this->RdvModel->demandeRdv($dateHDebut,$idService,$idClient);
			 redirect("rdv/devispdf/$idRdv");
		}
		catch(\Throwable $e){
			$mess=$e->getMessage();
			redirect("rdv/index?message=$mess");
		}
	}

	

	public function insertRdv(){

		$dateDebut=$this->input->get("dateRdv");
		$heureDebut=$this->input->get("heure");
		$idClient=$idClient['Id_Client'];

		$dateHDebut=new DateTime($dateDebut." ".$heureDebut);
		$idService=$this->input->get("type");
		$idClient=$this->session->userdata("client");
		
		

		$this->load->model('RdvModel');
		try{
			$idRdv=$this->RdvModel->demandeRdv($dateHDebut,$idService,$idClient);
			 redirect("rdv/devispdf/$idRdv");
		}
		catch(\Throwable $e){
			$mess=$e->getMessage();
			redirect("rdv/index?message=$mess");
		}
	}

	public function getRdv(){
		$idOlona=$this->session->userdata("admin");
		$this->load->model('RdvModel');
		$data['services']=$this->RdvModel->getAll();
		$this->load->view('partials/template');
	}

	public function rdvInsert(){
		$dateDebut=$this->input->get("date");
		$heureDebut=$this->input->get("heure");
		$idCli=$this->input->get("Id_Client");

		$dateHDebut=new DateTime($dateDebut." ".$heureDebut);
		$idService=$this->input->get("type");
		$idSlot=$this->input->get("slot");
		$idClient=$this->session->userdata("admin");
		$data=array(
			'dateHdebut'=>$dateHDebut->format('d/m/Y H:i'),
			'Id_Service'=>$idService,
			'Id_Client'=>$idCli,
			'Id_Slot'=>$idSlot
		);
		
		

		$this->load->model('RdvModel');
		try{
			$idRdv=$this->RdvModel->insert($data);
				redirect("rdv/calendar");
		}
		catch(\Throwable $e){
			$mess=$e->getMessage();
			redirect("rdv/calendar?message=$mess");
		}
	}

	public function formRdv(){
		$idOlona=$this->session->userdata("admin");
		$this->load->model('RdvModel');

		$this->load->view('partials/template',$data);
	}

	public function devispdf($idRdv){
        $this->load->model('RdvModel');
        $rdv = $this->RdvModel->getById($idRdv);
        $this->load->model('ServiceModel');
        $service=$this->ServiceModel->getById($rdv['Id_Service']);
		$dateDebut=new DateTime($rdv['dateHdebut']);
        $dateFin=$this->RdvModel->slotDisponibles($dateDebut,$rdv['Id_Service'])[1];

		$data=array(
			'intitule'=>$service['intitule'],
            'dateDebut'=>$dateDebut->format('d/m/Y H:i'),
            'dateFin'=>$dateFin->format('d/m/Y H:i'),
         	'prix'=>$service['prix']
		);
		$this->load->library("pdfmodel");
		$this->pdfmodel->AddPage();
		$this->pdfmodel->Body($data);
		$this->pdfmodel->Output();
	}
}
