<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != true ) redirect('login');
		
		$this->load->model('Pengajuan_model');
		$this->load->library('form_validation');
	}

	public function judul()
	{
		if($this->session->userdata('level') == 1) redirect('../login');
		$model = $this->Pengajuan_model;
		$validasi = $this->form_validation;
		
		$validasi->set_rules('nim','NIM','required|trim');
		$validasi->set_rules('nama','Nama','required|trim');
		$validasi->set_rules('prodi','Program Studi','required|trim');
		$validasi->set_rules('judul','Judul','required|trim');
		$validasi->set_rules('konsentrasi','konsentrasi','required|trim');
		$validasi->set_rules('tglpengajuan','Tanggal Pengajuan','required|date');

		if($this->session->userdata('level') == 0){
			$validasi->set_rules('pembimbing1','Pembimbing 1','required|trim');
			$validasi->set_rules('pembimbing2','Pembimbing 2','required|trim');
		}
		if($validasi->run()){
			$model->insert_pengajuan();
			$this->session->set_flashdata('Success','Berhasil menyimpan data');
		}

		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('pengajuan/judul',$data);
	}
	public function index()
	{
		$model = $this->Pengajuan_model;
		$data['pengajuans'] = $model->get_pengajuan();
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('pengajuan/list',$data);
	}
	public function ubah($edit=null)
	{
		
		if($this->session->userdata('level') != '0'){
			redirect('pengajuan');
		}elseif(!isset($id)){
			redirect('pengajuan');
		}else{
			$model = $this->Pengajuan_model;
		}
		
	}
	public function hapus($id=null)
	{
		if($this->session->userdata('level') != '0'){
			redirect('pengajuan');
		}elseif(!isset($id)){
			redirect('pengajuan');
		}else{

			$model = $this->Pengajuan_model;
			$hapus = $model->delete_pengajuan($id);
			
			if($hapus){
				$this->session->set_flashdata('berhasil_hapus_pengajuan','Pengajuan Berhasil Dihapus!');
				redirect('pengajuan');
			}else{
				$this->session->set_flashdata('gagal_hapus_pengajuan','Pengajuan Gagal Dihapus!');
			}
		}
		

	}
	

}