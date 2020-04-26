<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('login') != true ) redirect('login');


	}

	public function index()
	{
		$data["nama"] = $this->session->userdata('nama');
		if($this->session->userdata('level') == 0){
			$this->load->view('dashboard/admin',$data);
		}elseif ($this->session->userdata('level') == 1) {
			$this->load->view('dashboard/dosen',$data);
		}elseif ($this->session->userdata('level') == 2) {
			$this->load->view('dashboard/mahasiswa',$data);
		}else{
			redirect('login');
		}
	}


}
