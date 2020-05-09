<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komprehensif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('login') != true ) redirect('login');
		$this->load->model("Komprehensif_model");
		$this->load->library("form_validation");


	}

	public function index()
	{
		$model = $this->Komprehensif_model;
		if($this->session->userdata('level') == 0){
			$data['title'] = "Data Komprehensif";
			$data['nama'] = $this->session->userdata('nama');
			$data['datas'] = $model->getBabDone();
			$this->load->view('layout/admin/header',$data);
			$this->load->view('komprehensif/list',$data);
		}
	}

}
