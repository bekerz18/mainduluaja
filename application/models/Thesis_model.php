<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thesis_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function getBabDone()
	{
		return $this->db->query("SELECT mahasiswa.nama AS nama, mahasiswa.username AS nim, mahasiswa.prodi AS prodi, pengajuan.id AS id_pengajuan, pengajuan.judul AS judul FROM pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa WHERE pengajuan.acc_bab_pembimbing1='ya' AND pengajuan.acc_bab_pembimbing2='ya'")->result_array();
	}

	public function getAll()
	{
		return $this->db->query("SELECT mahasiswa.nama AS nama_mahasiswa, mahasiswa.username AS nim_mahasiswa, mahasiswa.prodi AS prodi, thesis.id AS id_thesis, thesis.status AS status_thesis, thesis.tgl_daftar AS tgl_daftar, thesis.tgl_terima AS tgl_terima, thesis.tgl_sidang AS tgl_sidang, thesis.id_penguji1 AS id_penguji1, thesis.id_penguji2 AS id_penguji2, thesis.id_penguji3 AS id_penguji3, pengajuan.judul as judul, (thesis.nilai_1+thesis.nilai_2+thesis.nilai_3)/ 3 AS nilai FROM thesis INNER JOIN pengajuan ON pengajuan.id = thesis.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa ORDER BY tgl_daftar DESC")->result_array();
	}
	public function getAllCetak($FirstDate,$LastDate)
	{
		return $this->db->query("SELECT mahasiswa.nama AS nama_mahasiswa, mahasiswa.username AS nim_mahasiswa, mahasiswa.prodi AS prodi, thesis.id AS id_thesis, thesis.status AS status_thesis, thesis.tgl_daftar AS tgl_daftar, thesis.tgl_terima AS tgl_terima, thesis.tgl_sidang AS tgl_sidang, thesis.id_penguji1 AS id_penguji1, thesis.id_penguji2 AS id_penguji2, thesis.id_penguji3 AS id_penguji3, pengajuan.judul as judul, (thesis.nilai_1+thesis.nilai_2+thesis.nilai_3)/ 3 AS nilai FROM thesis INNER JOIN pengajuan ON pengajuan.id = thesis.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE thesis.tgl_daftar BETWEEN '$FirstDate' AND '$LastDate' ORDER BY tgl_daftar DESC")->result_array();
	}

	public function registerByMhs($pengajuanID)
	{
		$id = uniqid();
		$data = array(
			'id'	=> $id,
			'file'	=> $this->_upload($id),
			'id_pengajuan' => $pengajuanID,
			'status'=> 'tidak',
			'tgl_daftar' => date("Y-m-d H:i:s"));
		if($data['file'] == 'no'){
			$this->session->set_flashdata('gagal_kompre_thesis','Gagal Mengirim Thesis!');
		}else{
			return $this->db->insert('thesis',$data);
		}
		
	}
	public function checkAcc($mahasiswaID)
	{
		return $this->db->query("SELECT mahasiswa.nama AS nama, mahasiswa.username AS nim, mahasiswa.prodi AS prodi, pengajuan.id AS id_pengajuan, pengajuan.judul AS judul FROM pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa WHERE pengajuan.acc_bab_pembimbing1='ya' AND pengajuan.acc_bab_pembimbing2='ya' AND pengajuan.id_mahasiswa = $mahasiswaID")->row_array();
	}
	public function isHave($pengajuanID)
	{
		$this->db->where('id_pengajuan',$pengajuanID);
		return $this->db->get('thesis')->row_array();
	}

	public function isProposalAcc($pengajuanID)
	{
		return $this->db->query("SELECT SUM(nilai_1+nilai_2+nilai_3)/3 AS nilai FROM proposal WHERE id_pengajuan=$pengajuanID")->row_array();
	
	}
	public function getThesis($thesisID)
	{
		return $this->db->query("SELECT mahasiswa.nama AS nama_mahasiswa, mahasiswa.username AS nim_mahasiswa, mahasiswa.prodi AS prodi, thesis.id AS id_thesis, thesis.status AS status_thesis, thesis.tgl_daftar AS tgl_daftar, thesis.tgl_terima AS tgl_terima, thesis.tgl_sidang AS tgl_sidang, thesis.id_penguji1 AS id_penguji1, thesis.id_penguji2 AS id_penguji2, thesis.id_penguji3 AS id_penguji3, thesis.nilai_1 as nilai1, thesis.nilai_2 as nilai2, thesis.nilai_3 as nilai3,pengajuan.judul as judul, thesis.nilai_tampil FROM thesis INNER JOIN pengajuan ON pengajuan.id = thesis.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE thesis.id = '$thesisID'")->result_array();
	}
	public function updateThesis($data)
	{
		return $this->db->update('thesis',$data);
	}
	public function updateNilai($id,$kelompok,$nilai)
	{
		$this->db->set($kelompok, (int)$nilai);
		$this->db->where('id', $id);
		return $this->db->update('thesis');
	}
	public function delete($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('thesis');
	}
	private function _upload($id)
	{
		$config['upload_path']          = './uploads/thesis/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $id;
        $config['overwrite']			= true;
        
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('thesis')) {
        	return $this->upload->data("file_name");
        }
        return 'no';
	}
	public function cariDosen($id)
	{
		return $this->db->query("SELECT nama FROM dosen where id=$id")->row_array();
	}

}
