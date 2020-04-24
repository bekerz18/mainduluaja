<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('level')) redirect('home');
		

		// $this->load->model('Dashboard_model');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data["nama"] = $this->session->userdata('nama');
		if($this->session->userdata('level')==0){
			$this->load->view('dashboard/admin',$data);
		}elseif ($this->session->userdata('level')==1) {
			$this->load->view('dashboard/dosen',$data);
		}elseif ($this->session->userdata('level')==2) {
			$this->load->view('dashboard/mahasiswa',$data);
		}
	}

}
