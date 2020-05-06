<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembimbing extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != true ) redirect('login');
		
		
	}

	public function index(){
		redirect('login');
	}

	public function administrasi(){
		$data['title'] = 'Daftar Pembimbing Administrasi';
		$data['nama'] =  $this->session->userdata('nama');
		$this->load->view('layout/admin/header',$data);
		$this->load->view('pembimbing/administrasi',$data);
	}
	public function hukum(){
		$data['title'] = 'Daftar Pembimbing Hukum';
		$data['nama'] =  $this->session->userdata('nama');
		$this->load->view('layout/admin/header',$data);
		$this->load->view('pembimbing/hukum',$data);
	}
	public function manajemen(){
	$data['title'] = 'Daftar Pembimbing Manajemen';
		$data['nama'] =  $this->session->userdata('nama');
		$this->load->view('layout/admin/header',$data);
		$this->load->view('pembimbing/manajemen',$data);
	}
	

}