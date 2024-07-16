<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		$this->load->view('LoginBackOffice');
	}

	public function verifLogin(){
		$email=$this->input->post("email");
		$motDePasse=$this->input->post("password");
		$this->load->model('adminModel');

		$result=$this->adminModel->verifLogin($email,$motDePasse);

		if (isset($result['error'])) {
			$this->load->view('LoginBackOffice',$result);
		}
		else{
			/*Page d'accueil*/
			$this->session->set_userdata("admin",$result);
			redirect("rdv/calendar");
		}
	}
}
