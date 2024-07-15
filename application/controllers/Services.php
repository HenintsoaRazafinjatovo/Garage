<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
	
	public function index()
	{
		$this->load->model("ServiceModel");
        $idUpdate=$this->input->get("idUpdate");
        if(isset($idUpdate)){
            $data['toUpdate']=$this->ServiceModel->getById($idUpdate);
        }
        $data['services'] = $this->ServiceModel->getAll();

        $data['content']='Services';
        $this->load->view('partials/template',$data);
		
	}
    public function insert(){
        $this->load->model("ServiceModel");
        $data = array(
            'intitule' => $this->input->post('intitule'),
            'duree' => $this->input->post('duree'),
            'prix' => $this->input->post('prix')
        );
        $this->ServiceModel->insert($data);
        redirect('services');
    }
    public function update($id){
        $this->load->model("ServiceModel");

        $data = array(
            'intitule' => $this->input->post('intitule'),
            'duree' => $this->input->post('duree'),
            'prix' => $this->input->post('prix')
        );
        $this->ServiceModel->update($id,$data);
        redirect('services');
    }
    public function delete($id){
        $this->load->model("ServiceModel");
        $this->ServiceModel->delete($id);
        redirect('services');
    }
    


	
}
