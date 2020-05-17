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
		if($this->input->method() == "post"){
			$model = $this->Thesis_model;
			
			$insert = $model->registerByMhs($pengajuanID);
			if($insert){
				$this->session->set_flashdata('berhasil_thesis','berhasil mendaftar');
				redirect('pengajuan/detail/'.$pengajuanID);
			}else{
				$this->session->set_flashdata('gagal_thesis','gagal mendaftar');
				redirect('pengajuan/detail/'.$pengajuanID);
			}
					
			}else{
				redirect('pengajuan/detail/'.$pengajuanID);
			}
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
					'id_penguji3'	=> $this->input->post('penguji3'),
					'nilai_tampil'	=> $this->input->post('nilai_tampil')
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

	public function delete($id)
	{
		if($this->session->userdata('level') == 0){
			$model = $this->Thesis_model;
			$delete = $model->delete($id);
			if($delete){
				$this->session->set_flashdata('success_delete','berhasil');
			}else{
				$this->session->set_flashdata('failed_delete','gagal');
			}
			redirect('thesis');
			
		}else{
			redirect('thesis');
		}

		
	}

	public function cetak(){
		if($this->session->userdata('level') == 0){
			if($this->input->method() == "post"){
				$model = $this->Thesis_model;
				$data['model'] = $model;
				$tanggalRange = $this->input->post('tanggal_range');
				$FirstDate = date("Y-m-d",strtotime(explode(" ", $tanggalRange)[0]));
				$LastDate = date("Y-m-d",strtotime(explode(" ", $tanggalRange)[2]));
				$data["range"] = $tanggalRange;

				$data['thesis'] = $model->getAllCetak($FirstDate,$LastDate);
				
				$data['title'] = 'Daftar Thesis';
				$cetak = $this->load->view('thesis/cetak_admin',$data,TRUE);
				$style = file_get_contents(base_url('assets/dist/css/cetak.css'));
				$cetak_head = $this->load->view('layout/cetak',$data,TRUE);
				$users= new \Mpdf\Mpdf(['format' => 'Legal']);
	        	$users->showImageErrors = true;
	        	$users->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
	        	$users->WriteHtml($cetak_head,\Mpdf\HTMLParserMode::HTML_BODY);
	        	$users->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
	        	$users->Output($data['title'].'.pdf', 'D');
	        }
		}else{
			redirect('beranda');
		}
	}

}
