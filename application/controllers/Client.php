<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	
	public function index()
	{
		$this->load->view('Login');
	}

	public function verifLogin(){
		$numero=$this->input->post("numero");
		$type=$this->input->post("mdp");
		$this->load->model('clientModel','client');

		$result=$this->client->loginOrSignUp($numero,$type);

		if (isset($result['error'])) {
			$this->load->view('Login',$result);
		}

		else{
			/*Page d'accueil*/
		}
	}
}
