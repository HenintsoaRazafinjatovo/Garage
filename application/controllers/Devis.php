<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Devis extends CI_Controller {
	public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('admin')){
            redirect('client');
        }
    }
	public function index()
	{
		$message=$this->input->get('message');
		if(isset($message)){
            $data['message']=$message;
        }
		
		$this->load->model('RdvModel');
		$data['rdvs']=$this->RdvModel->getAll();
        $data['content']='ListDevis';
		$this->load->view('partials/template',$data);
	}

    public function paiement($idRdv){
        $this->load->model('RdvModel');
		$data['rdv']=$this->RdvModel->getById($idRdv);
        $data['content']='Paiement';

		$this->load->view('partials/template',$data);
    }

    public function insertPaiement(){
        $this->load->model("PaiementModel");
        $data = array(
            'intitule' => $this->input->post('intitule'),
            'duree' => $this->input->post('duree'),
            'prix' => $this->input->post('prix')
        );
        $this->PaiementModel->insert($data);
        redirect('devis');
    }
}