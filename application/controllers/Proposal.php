<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != true ) redirect('login');
		$this->load->model('Proposal_model');
		date_default_timezone_set('Asia/Jakarta');

		if($this->session->userdata('level') == 2 ) redirect('beranda');
	}

	public function index()
	{
		if($this->session->userdata('level') == 0){
			$model = $this->Proposal_model;
			$data['title'] = 'Daftar Proposal';
			$data['nama'] =  $this->session->userdata('nama');
			$this->load->view('layout/admin/header',$data);
			$data['proposals'] = $model->getAll();
			$this->load->view('proposal/list',$data);
		}else{
			redirect('beranda');
		}
	}
	public function getproposal($id)
	{
		if($this->session->userdata('level') == 0 || $this->session->userdata('level') == 1){
			$model = $this->Proposal_model;
			$data = $model->getByIdJson($id);
			echo json_encode($data);
		}else{
			redirect('beranda');
		}
	}
	public function jsonpenguji($prodi)
	{
		if($prodi == 'adpend'){
			$prodi = 1;
		}elseif ($prodi == 'manajemen') {
			$prodi = 2;
		}elseif($prodi == 'hukum'){
			$prodi = 3;
		}

		$model = $this->Proposal_model;
		$data = $model->getDosenBy($prodi);

		echo json_encode($data);
	}
	public function updateProposal()
	{
		if($this->session->userdata('level') == 0){
			if($this->input->method() == "post"){
				$model = $this->Proposal_model;
				$id = $this->input->post('id');
				$data = array(
					'tgl_seminar'	=> $this->input->post('tanggal'),
					'id_penguji1'	=> $this->input->post('penguji1'),
					'id_penguji2'	=> $this->input->post('penguji2'),
					'id_penguji3'	=> $this->input->post('penguji3'),
					'revisi'		=> 'tidak',
					'acc_seminar'	=> date("Y-m-d H:i:s")
				);
				$update = $model->updateProposal($id,$data);
			}
		}else{
			redirect('beranda');
		}
	}
	public function getall(){
		$model = $this->Proposal_model;
		$data = $model->getAll();

		echo json_encode($data);
	}
	public function updateProposalNilai(){
		$model = $this->Proposal_model;
		if($this->input->method() == "post"){
			$id = $this->input->post('id');
			$kelompok = 'nilai_'.+$this->input->post('kelompok');
			$nilai = $this->input->post('nilai');

			$update = $model->updateNilaiProposal($id,$kelompok,$nilai);
			
		}else{
			redirect('beranda');
		}
	}

	public function delete($id)
	{
		$model = $this->Proposal_model;
		if($this->session->userdata('level') == 0){
			$delete = $model->deleteProposalby($id);
			if($delete){
				$this->session->set_flashdata('success_delete','berhasil menghapus proposal');
				redirect('proposal');
			}else{
				$this->session->set_flashdata('failed_delete','gagal menghapus proposal');
				redirect('proposal');
			}

		}else{
			redirect('beranda');
		}
	}

	public function cetak()
	{
		if($this->session->userdata('level') == 0){
			$model = $this->Proposal_model;
			$data['model'] = $model;
			$data['title'] = 'Daftar Proposal';
			$data['proposals'] = $model->getAll();
			$cetak = $this->load->view('proposal/cetak',$data,TRUE);
			$style = file_get_contents(base_url('assets/dist/css/cetak.css'));
			$cetak_head = $this->load->view('layout/cetak',$data,TRUE);
			$users= new \Mpdf\Mpdf(['format' => 'Legal']);
        	$users->showImageErrors = true;
        	$users->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
        	$users->WriteHtml($cetak_head,\Mpdf\HTMLParserMode::HTML_BODY);
        	$users->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
        	$users->Output($data['title'].'.pdf ', 'I');
		}else{
			redirect('beranda');
		}
	}

}