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
		$data["controller"] = $this;
		$data["nama"] = $this->session->userdata('nama');
		$model = $this->Bimbingan_model;
		$data["model"] = $model;
		$data["chatisEnd"] = $model->isChatDone($id);
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
		$data2 = $model->checkBimbingan4($pembimbing);
		if(!$data2){
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

	private function _getDataBimbinganAdmin($bimbingan,$FirstDate=null,$LastDate=null)
	{
		
		$model = $this->Bimbingan_model;
		if($FirstDate == null){
			$datas = $model->getBimbinganAdmin($bimbingan);
		}else{
			$datas = $model->getBimbinganAdminCetak($bimbingan,$FirstDate,$LastDate);
		}
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
					'id_pembimbing1' => $data["id_pembimbing1"],
					'id_pembimbing2' => $data["id_pembimbing2"],
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
	public function cetak($pembimbing=null)
	{
		$model = $this->Bimbingan_model;
		if($this->session->userdata('level') == 0){
			if($this->input->method() == "post"){
				
				$data["model"] = $model;
				$tanggalRange = $this->input->post('tanggal_range');
				$FirstDate = date("Y-m-d",strtotime(explode(" ", $tanggalRange)[0]));
				$LastDate = date("Y-m-d",strtotime(explode(" ", $tanggalRange)[2]));
				$data["range"] = $tanggalRange;
				$data['bimbingans'] = $this->_getDataBimbinganAdmin($pembimbing,$FirstDate,$LastDate);
				$data["title"] = "Data Bimbingan ".$pembimbing;
				$cetak = $this->load->view('bimbingan/admin/cetak_bimbingan_1',$data,TRUE);
				$style = file_get_contents(base_url('assets/dist/css/cetak.css'));
				$cetak_head = $this->load->view('layout/cetak',$data,TRUE);
				$users= new \Mpdf\Mpdf(['format' => 'Legal']);
	        	$users->showImageErrors = true;
	        	$users->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
	        	$users->WriteHtml($cetak_head,\Mpdf\HTMLParserMode::HTML_BODY);
	        	$users->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
	        	$users->Output($data['title'].'.pdf', 'D');
				
	        }
		}else if($this->session->userdata('level') == 2){
			$idMahasiswa = $this->session->userdata('id');
			$data['bimbingans'] = $model->getBimbinganMahasiswa($pembimbing,$idMahasiswa);
			$data["title"] = "Data Bimbingan ".$pembimbing;
			$cetak = $this->load->view('bimbingan/mahasiswa/cetak',$data,TRUE);
			$style = file_get_contents(base_url('assets/dist/css/cetak.css'));
			$cetak_head = $this->load->view('layout/cetak',$data,TRUE);
			$users= new \Mpdf\Mpdf(['format' => 'Legal']);
	        $users->showImageErrors = true;
	        $users->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
	        $users->WriteHtml($cetak_head,\Mpdf\HTMLParserMode::HTML_BODY);
	        $users->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
	        	$users->Output($data['title'].'.pdf', 'D');
		}else{
			redirect('beranda');
		}
	}
	public function cetak_dosen($pembimbing)
	{
		if($this->session->userdata('level') == 1){
			if($this->input->method() == "post"){

				if($pembimbing == "1" || $pembimbing == "2"){
					$model = $this->Bimbingan_model;
					$data["model"] = $model;
					$tanggalRange = $this->input->post('tanggal_range');
					$FirstDate = date("Y-m-d",strtotime(explode(" ", $tanggalRange)[0]));
					$LastDate = date("Y-m-d",strtotime(explode(" ", $tanggalRange)[2]));
					$data["range"] = $tanggalRange;
					$dosen = $this->session->userdata('id');
					$data["title"] = "Daftar Bimbingan Pembimbing".$pembimbing;
					$data["pembimbing"] = $pembimbing;
					if($pembimbing == "1"){
						$data['bimbingans'] = $model->getBimbinganDosen($pembimbing,$dosen);
					}else{
						$data['bimbingans'] = $model->getBimbinganDosen2($pembimbing,$dosen);
					}
					
					$cetak = $this->load->view('bimbingan/dosen/cetak',$data,TRUE);
					$style = file_get_contents(base_url('assets/dist/css/cetak.css'));
					$cetak_head = $this->load->view('layout/cetak',$data,TRUE);
					$users= new \Mpdf\Mpdf(['format' => 'Legal']);
		        	$users->showImageErrors = true;
		        	$users->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
		        	$users->WriteHtml($cetak_head,\Mpdf\HTMLParserMode::HTML_BODY);
		        	$users->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
		        	$users->Output($data['title'].'.pdf', 'D');
		        }
				
			}
		}
	}
	public function riwayat($cetak=null)
	{
		if($this->session->userdata('level') != 2) redirect('beranda');

		if($this->_getPengajuan() != 'nothing'){
			$data['model'] = $this->Bimbingan_model;
			$data['pengajuan'] = $this->_getPengajuan();
			if($this->_getProposal($data['pengajuan']['id']) != 'nothing'){
				$data['proposal'] = $this->_getProposal($data['pengajuan']['id']);
				if($this->_getKompre($data['pengajuan']['id']) != 'nothing'){
					$data['kompre'] = $this->_getKompre($data['pengajuan']['id']);
				}else{
					$data['kompre'] = 'nothing';
				}
				if($this->_getRiwayatBimbinganDetail($data['pengajuan']['id']) != 'nothing'){
					$data['bimDets'] = $this->_getRiwayatBimbinganDetail($data['pengajuan']['id']);
					if($this->_getThesis($data['pengajuan']['id']) != 'nothing'){
						$data['thesis'] = $this->_getThesis($data['pengajuan']['id']);
					}else{
						$data['thesis'] = 'nothing';
					}
				}else{
					$data['bimDets'] = 'nothing';
				}	
			}else{
				$data['proposal'] = 'nothing';
			}
		}else{
			$data['pengajuan'] = 'nothing';
		}
		$data["title"] = "Riwayat Bimbingan";
		$data["nama"] = $this->session->userdata('nama');
		$this->load->view('layout/mahasiswa/header',$data);
		$this->load->view('bimbingan/mahasiswa/riwayat',$data);

		if($cetak == 'cetak'){
			$cetak = $this->load->view('bimbingan/mahasiswa/cetak_riwayat',$data,TRUE);
			$style = file_get_contents(base_url('assets/dist/css/cetak.css'));
			$cetak_head = $this->load->view('layout/cetak',$data,TRUE);
			$users= new \Mpdf\Mpdf(['format' => 'Legal']);
	        $users->showImageErrors = true;
	        $users->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
	        $users->WriteHtml($cetak_head,\Mpdf\HTMLParserMode::HTML_BODY);
	        $users->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
	        $users->Output($data['title'].'.pdf', 'D');
		}


	}

	private function _getPengajuan()
	{
		$model = $this->Bimbingan_model;

		$pengajuan = $model->getPengajuan();

		if(!$pengajuan){
			return 'nothing';
		}

		return $pengajuan;
	}

	private function _getProposal($id)
	{
		$model = $this->Bimbingan_model;

		$proposal = $model->getProposal($id);

		if(!$proposal){
			return 'nothing';
		}

		return $proposal;
	}

	private function _getKompre($id)
	{
		$model = $this->Bimbingan_model;

		$komprehensif = $model->getKompre($id);

		if(!$komprehensif){
			return 'nothing';
		}

		return $komprehensif;
	}

	private function _getRiwayatBimbinganDetail($id)
	{
		$model = $this->Bimbingan_model;

		$bimDet = $model->getRiwayatBimbinganDetail($id);

		if(!$bimDet){
			return 'nothing';
		}

		return $bimDet;
	}
	private function _getThesis($id)
	{
		$model = $this->Bimbingan_model;

		$thesis = $model->getThesis($id);

		if(!$thesis){
			return 'nothing';
		}

		return $thesis;
	}
}
