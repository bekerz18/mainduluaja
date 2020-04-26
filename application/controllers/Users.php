<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != true ) redirect('login');
		
		$this->load->model('Users_model');
		$this->load->library('form_validation');
	}

	public function dosen(){
		$model = $this->Users_model;

		$insert = $model->create_dosen(array(
			'username'			=> $this->input->post('nik'),
			'nama'				=> $this->input->post('nama'),
			'prodi'				=> $this->input->post('prodi'),
			'kode_alternatif'	=> $this->input->post('kode'),
			'gender'			=> $this->input->post('gender'),
			'level'				=> '1',
			'password'			=> md5($this->input->post('nik'))	
		));

		if($insert){
			return 'berhasil';
		}else{
			return 'gagal';
		}
	}



}