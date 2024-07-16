<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slot extends CI_Controller {
	public function __construct() {
        parent::__construct();

        if(!$this->session->userdata('admin')){
            redirect('client');
        }
    }
	public function index()
	{
        $data['content']='formSlots';
        $this->load->view('partials/template',$data);	
	}

    public function liste(){
        $date=$this->input->get('date1');

        $this->load->model('SlotModel');
        $data['slots']=$this->SlotModel->etatSlot($date);

        $data['content']='ListeSlot';
        $this->load->view('partials/template',$data);
    }
}
