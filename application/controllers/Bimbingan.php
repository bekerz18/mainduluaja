<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('login') != true ) redirect('login');
		$this->load->model("Bimbingan_model");
		$this->load->library("form_validation");


	}

	public function bimbingan($pembimbing=null,$id=null,$id_bimbingan=null,$id_pengajuan=null)
	{
		$data["nama"] = $this->session->userdata('nama');
		$model = $this->Bimbingan_model;
		// $data['bimbinganisdone'] = $this->_cekisAcc($id);
		if($this->session->userdata('level') == 0){
			$data['bimbingans'] = $this->_getDataBimbinganAdmin($pembimbing);
			$data['completes'] = $model->completeBimbingans();

			if($pembimbing == 1 && !isset($id)){
				$data["title"] = "Data Bimbingan 1";
				$this->load->view('layout/admin/header',$data);
				$this->load->view('bimbingan/admin/bimbingan_1',$data);	
			}elseif($pembimbing == 2 && !isset($id)){
				$data["title"] = "Data Bimbingan 2";
				$this->load->view('layout/admin/header',$data);
				$this->load->view('bimbingan/admin/bimbingan_2',$data);	
			}elseif($pembimbing != 1 && $pembimbing !=2){
				redirect('beranda');
			}
			if(($pembimbing== 1 || $pembimbing == 2) && isset($id)){
				$data["histories"] = $this->_getDetailsBimb($id);
				$data["detail"] = $model->getDetailsPengajuan($id);
				$data["title"] = "Data Bimbingan ".$pembimbing;
				$this->load->view('layout/admin/header',$data);
				$this->load->view('bimbingan/admin/bimbingan_detail',$data);
			}
			
		}elseif ($this->session->userdata('level') == 1) {
			$dosen = $this->session->userdata('id');
			
			if($pembimbing == 1 && !isset($id)){
				$data["title"] = "Data Bimbingan 1";
				$this->load->view('layout/dosen/header',$data);
				$data['bimbingans'] = $model->getBimbinganDosen($pembimbing,$dosen);
				$this->load->view('bimbingan/dosen/bimbingan_1',$data);	
			}elseif($pembimbing == 2 && !isset($id)){
				$data["title"] = "Data Bimbingan 2";
				$this->load->view('layout/dosen/header',$data);
				$data['bimbingans'] = $model->getBimbinganDosen2($pembimbing,$dosen);
				$this->load->view('bimbingan/dosen/bimbingan_2',$data);	
			}elseif($pembimbing != 1 && $pembimbing !=2){
				redirect('beranda');
			}

			if(($pembimbing== 1 || $pembimbing == 2) && isset($id)){
				$data["title"] = "Data Bimbingan ".$pembimbing;
				$this->load->view('layout/dosen/header',$data);
				$validasi = $this->form_validation;
				$validasi->set_rules('deskripsi','Deskripsi','required|trim');
				$data["histories"] = $this->_getDetailsBimb($id);
				$data["detail"] = $model->getDetailsPengajuan($id);
				if($validasi->run()){
					$insert = $model->insertBimDetail();
					if($insert){
						redirect('bimbingan/bimbingan/'.$pembimbing.'/'.$id.'/'.$id_bimbingan.'/'.$id_pengajuan);
					}
				}
				$this->load->view('bimbingan/dosen/bimbingan_detail',$data);
			}
			
			
		}elseif ($this->session->userdata('level') == 2) {
			$data['isdone'] = $this->isDoneByMahasiswa($pembimbing);
			$idMahasiswa = $this->session->userdata('id');
			$proposal = $model->getProposalDone($idMahasiswa);
			if(!$proposal) redirect('pengajuan');
			
			$data['bimbingans'] = $model->getBimbinganMahasiswa($pembimbing,$idMahasiswa);
			$data['id_pengajuan'] = $proposal["id_pengajuan"];
			
			if($pembimbing == 1 && !isset($id)){
				$data["title"] = "Data Bimbingan 1";
				$this->load->view('layout/mahasiswa/header',$data);
				$this->load->view('bimbingan/mahasiswa/bimbingan_1',$data);	
			}elseif($pembimbing == 2 && !isset($id)){
				$data["title"] = "Data Bimbingan 2";
				$this->load->view('layout/mahasiswa/header',$data);
				$this->load->view('bimbingan/mahasiswa/bimbingan_2',$data);	
			}elseif($pembimbing != 1 && $pembimbing !=2){
				redirect('beranda');
			}

			if(($pembimbing== 1 || $pembimbing == 2) && isset($id)){
				$data["title"] = "Data Bimbingan ".$pembimbing;
				$this->load->view('layout/mahasiswa/header',$data);
				$validasi = $this->form_validation;
				$validasi->set_rules('deskripsi','Deskripsi','required|trim');
				$data["histories"] = $this->_getDetailsBimb($id);
				if($validasi->run()){
					$insert = $model->insertBimDetail();
					if($insert){
						redirect('bimbingan/bimbingan/'.$pembimbing.'/'.$id);
					}
				}
				$this->load->view('bimbingan/mahasiswa/bimbingan_detail',$data);
			}
					
		}else{
			redirect('login');
		}
	}
	private function isDoneByMahasiswa($pembimbing){
		$model = $this->Bimbingan_model;
		$data = $model->CheckIsByMahasiswa($pembimbing);
		if(!$data){
			return 'belum';
		}

		return 'sudah';
	}
	private function isDoneByGeneral($id){
		$model = $this->Bimbingan_model;
		$data = $model->CheckIsByGeneral($id);
		if(!$data){
			return 'belum';
		}

		return 'sudah';
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

	private function _getDataBimbinganAdmin($bimbingan)
	{
		
		$model = $this->Bimbingan_model;
		$datas = $model->getBimbinganAdmin($bimbingan);
		$newDatas = array();
		$no=0;
		foreach($datas as $data){
			$dosen = $model->getDosen($bimbingan,$data["id_pengajuan"]);

			$newDatas += array(
				$no => array(
					'id_bimbingan' => $data["id_bimbingan"],
					'bab' => $data["bab"],
					'status' => $data["status"],
					'tgl_acc' => $data["tgl_acc"],
					'id_pengajuan' => $data["id_pengajuan"],
					'nama_mahasiswa' => $data["nama_mahasiswa"],
					'nim_mahasiswa' => $data["nim_mahasiswa"],
					'prodi' => $data["prodi"],
					'judul' => $data["judul"],
					'pembimbing' => $dosen["nama"]
				));

			$no++;
		}

		return $newDatas;
	}

	private function _getDetailsBimb($id)
	{
		$model = $this->Bimbingan_model;
		$datas = $model->getBimbinganDetail($id);
		$newDatas=array();
		$no=0;
		foreach ($datas as $data) {
			

			$user = $model->findUsersInConvers($data["level"],$data["id_pengguna"]);
			
			$newDatas += array(
				$no => array(
				'tanggal'	=> date("l, d F Y H:i:s",strtotime($data["tanggal"])),
				'id_bimbingan_detail'	=> $data["id_bimbingan_detail"],
				'file'	=> $data["file"],
				'level'	=> $data["level"],
				'deskripsi'	=> $data["deskripsi"],
				'pengguna'	=> $user["nama"]

			));
			$no++;
		}

		return $newDatas;
		
	}

	public function acc($pembimbing=null,$id=null,$bab=null,$pengajuan=null)
	{
		if($this->session->userdata('level') != 1){
			redirect('beranda');
		}else if(!isset($bab) || !isset($pengajuan)){
			redirect('data-bimbingan-'.$pembimbing);
		}else{
			$model = $this->Bimbingan_model;
			$update = $model->accBimbingan($id);
			if($update){
				if($bab == '4'){
					$model->accPengajuan($pembimbing,$pengajuan);
				}
				$this->session->set_flashdata('success_acc','Berhasil diacc!');
			}else{
				$this->session->set_flashdata('failed_acc','Gagal diacc!');
			}
			redirect('bimbingan/bimbingan/'.$pembimbing.'/'.$id.'/'.$bab.'/'.$pengajuan);
		}
	}
	public function delete($type,$id){
		if($this->session->userdata('level') == 0){
			$model = $this->Bimbingan_model;
			$delete = $model->delete($id);

			if($delete){
				$this->session->set_flashdata('success_delete','berhasil');
			}else{
				$this->session->set_flashdata('failed_delete','gagal');
			}
			redirect('data-bimbingan-'.$type);
		}
	}
}
