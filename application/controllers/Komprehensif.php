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

	public function index($json = null)
	{
		$model = $this->Komprehensif_model;
		if($this->session->userdata('level') == 0 && $json==null){
			$data['title'] = "Data Komprehensif";
			$data['nama'] = $this->session->userdata('nama');
			$data['datas'] = $model->getAllKompre();
			$this->load->view('layout/admin/header',$data);
			$this->load->view('komprehensif/list',$data);
		}
		if($json == 'json'){
			$data = $model->getAllKompre();

			echo json_encode($data);
		}
	}

	public function register($pengajuanID)
	{
		$model = $this->Komprehensif_model;
		// Check is have pengajuan_id
		$check = $model->isHave($pengajuanID);
		if(!$check){
			$isProposalApproved = $model->isProposalAcc($pengajuanID);
			if($isProposalApproved["nilai"] == NULL){
				$this->session->set_flashdata('id_not_found','ek nao siah');
			}else{
				$insert = $model->registerByMhs($pengajuanID);
				if($insert){
					$this->session->set_flashdata('berhasil_kompre','berhasil mendaftar');
				}else{
					$this->session->set_flashdata('gagal_kompre','gagal mendaftar');
				}
			}
		}else{
			$this->session->set_flashdata('having','sudah punya');
			
		}
		redirect('pengajuan/detail/'.$pengajuanID);
	}

	public function getKompre($kompreID)
	{
		$model = $this->Komprehensif_model;
		$data = $model->getKompre($kompreID);

		echo json_encode($data);
	}

	public function updateKompre()
	{
		if($this->session->userdata('level') == 0){
			if($this->input->method() == "post"){
				$model = $this->Komprehensif_model;
				$data = array(
					'status'		=> 'ya',
					'tgl_terima'	=> date("Y-m-d H:i:s"),
					'tgl_sidang'	=> $this->input->post('tanggal'),
					'id_penguji1'	=> $this->input->post('penguji1'),
					'id_penguji2'	=> $this->input->post('penguji2'),
					'id_penguji3'	=> $this->input->post('penguji3')
				);
				$update = $model->updateKompre($data);
				if($update){
					$this->session->set_flashdata('berhasil_kompre','Berhasil menambahkan jadwal sidang kompre');
				}else{
					$this->session->set_flashdata('gagal_kompre','Gagal menambahkan jadwal sidang kompre');
				}
			}
		}
	}

	public function updateNilai(){
		$model = $this->Komprehensif_model;
		if($this->input->method() == "post"){
			$id = $this->input->post('id');
			$kelompok = 'nilai_'.+$this->input->post('kelompok');
			$nilai = $this->input->post('nilai');

			$update = $model->updateNilai($id,$kelompok,$nilai);
			
		}else{
			redirect('beranda');
		}
	}

	

}
