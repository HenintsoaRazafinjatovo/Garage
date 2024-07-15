<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	
	public function index()
	{
		$this->load->view('Login');
	}

	public function verifLogin(){
		$email=$this->input->post("email");
		$motDePasse=$this->input->post("motDePasse");
		$this->load->model('clientModel','client');

		$result=$this->client->loginOrSignUp($email,$type);

		if (isset($result['error'])) {
			$this->load->view('Login',$result);
		}
		else{
			/*Page d'accueil*/
			$this->session->set_userdata("client",$result);
			redirect("rdv");
		}
	}

	public function disconnect(){
		$this->session->sess_destroy();

		redirect("client/login");
	}
}
