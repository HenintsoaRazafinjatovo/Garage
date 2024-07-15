<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rdv extends CI_Controller {
	
	public function index()
	{
		$data['content']='Rdv';
		$data['user']=$this->session->userdata("client");
		$this->load->view('partials/template',$data);
	}
}
