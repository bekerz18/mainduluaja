<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thesis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('login') != true ) redirect('login');
		$this->load->model("Thesis_model");
		$this->load->library("form_validation");


	}

	public function index($json = null)
	{
		$model = $this->Thesis_model;
		if($this->session->userdata('level') == 0 && $json==null){
			$data['title'] = "Data Thesis";
			$data['nama'] = $this->session->userdata('nama');
			$data['datas'] = $model->getAll();
			$this->load->view('layout/admin/header',$data);
			$this->load->view('thesis/list',$data);
		}
			if($json == 'json'){
				
				$data = $model->getAll();

				echo json_encode($data);
			}
		
	}

	public function register($pengajuanID)
	{
		$model = $this->Thesis_model;
		$mahasiswaID = $this->session->userdata('id');
		$check = $model->checkAcc($mahasiswaID);
		if(!$check){
				$this->session->set_flashdata('id_not_found_thesis','ek nao siah');
			}else{
				$ishave = $model->isHave($pengajuanID);
				if(!$ishave){
					$insert = $model->registerByMhs($pengajuanID);
					if($insert){
						$this->session->set_flashdata('berhasil_thesis','berhasil mendaftar');
					}else{
						$this->session->set_flashdata('gagal_thesis','gagal mendaftar');
					}
				}else{
					$this->session->set_flashdata('having_thesis','sudah ada');
				}
				
			}
		redirect('pengajuan/detail/'.$pengajuanID);
	}

	public function getThesis($thesisID)
	{
		$model = $this->Thesis_model;
		$data = $model->getThesis($thesisID);

		echo json_encode($data);
	}

	public function updateThesis()
	{
		if($this->session->userdata('level') == 0){
			if($this->input->method() == "post"){
				$model = $this->Thesis_model;
				$data = array(
					'status'		=> 'ya',
					'tgl_terima'	=> date("Y-m-d H:i:s"),
					'tgl_sidang'	=> $this->input->post('tanggal'),
					'id_penguji1'	=> $this->input->post('penguji1'),
					'id_penguji2'	=> $this->input->post('penguji2'),
					'id_penguji3'	=> $this->input->post('penguji3')
				);
				$update = $model->updateThesis($data);
				if($update){
					$this->session->set_flashdata('berhasil_kompre','Berhasil menambahkan jadwal sidang kompre');
				}else{
					$this->session->set_flashdata('gagal_kompre','Gagal menambahkan jadwal sidang kompre');
				}
			}
		}
	}

	public function updateNilai(){
		$model = $this->Thesis_model;
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
