<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
	
	public function index()
	{
		$this->load->model("ServiceModel");
        $idUpdate=$this->input->get("idUpdate");
        if(isset($idUpdate)){
            $data['idUpdate']=$idUpdate;
        }
        $data['services'] = $this->ServiceModel->getAll();
        $this->load->view('Service',$data);
		
	}
    public function insert(){
        $this->load->model("ServiceModel");
        $data = array(
            'intitule' => $this->input->post('intitule'),
            'duree' => $this->input->post('duree'),
            'prix' => $this->input->post('prix')
        );
        $this->ServiceModel->insert($data);
        $this->load->view('Service');
    }
    public function update($id){
        $this->load->model("ServiceModel");

        $data = array(
            'intitule' => $this->input->post('intitule'),
            'duree' => $this->input->post('duree'),
            'prix' => $this->input->post('prix')
        );
        $this->ServiceModel->update($id,$data);
        $this->load->view('Service');

    }
    public function delete($id){
        $this->load->model("ServiceModel");
        $this->ServiceModel->delete($id);
        $this->load->view('Service');

    }
    


	
}
