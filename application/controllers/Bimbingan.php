<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('login') != true ) redirect('login');
		$this->load->model("Bimbingan_model");


	}

	public function bimbingan($pembimbing)
	{
		$data["title"] = "Data Bimbingan 1";
		$data["nama"] = $this->session->userdata('nama');
		$model = $this->Bimbingan_model;
		if($this->session->userdata('level') == 0){
			$data['bimbingans'] = $model->getBimbinganAdmin($pembimbing);
			$this->load->view('layout/admin/header',$data);
			
		}elseif ($this->session->userdata('level') == 1) {
			$dosen = $this->session->userdata('id');
			$data['bimbingans'] = $model->getBimbinganDosen($pembimbing,$dosen);
			$this->load->view('layout/dosen/header',$data);
			
		}elseif ($this->session->userdata('level') == 2) {
			$id = $this->session->userdata('id');
			$proposal = $model->getProposalDone($id);
			if(!$proposal) redirect('pengajuan');
			$mahasiswa = $this->session->userdata('id');
			$data['bimbingans'] = $model->getBimbinganMahasiswa($pembimbing,$mahasiswa);
			$this->load->view('layout/mahasiswa/header',$data);
			$data['id_pengajuan'] = $proposal["id_pengajuan"];
			if($pembimbing == 1){
				$this->load->view('bimbingan/mahasiswa/bimbingan_1',$data);	
			}elseif($pembimbing == 2){
				$this->load->view('bimbingan/mahasiswa/bimbingan_2',$data);	
			}
					
		}else{
			redirect('login');
		}
	}
	public function checkBimbingan($bimbingan,$mahasiswa)
	{
		$model = $this->Bimbingan_model;
		$datas = $model->checkBimbingan($bimbingan,$mahasiswa);

		echo json_encode($datas);
	}
	public function addBimbingan()
	{
		$model = $this->Bimbingan_model;
		if($this->input->method() == "post"){
			$newIDbimbingan = uniqid();
			$data = array(
				'id'			=> $newIDbimbingan,
				'id_pengajuan'	=> $this->input->post('id'),
				'pembimbing'	=> $this->input->post('pembimbing'),
				'bab'			=> $this->input->post('bab'),
				'status'		=> 'belum'
			);
			$insert = $model->addBimbingan($data);

			if($insert){
				redirect('data-bimbingan-1');
			}	
		}
		
	}

}
