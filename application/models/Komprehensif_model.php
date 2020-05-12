<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komprehensif_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function getBabDone()
	{
		return $this->db->query("SELECT mahasiswa.nama AS nama, mahasiswa.username AS nim, mahasiswa.prodi AS prodi, pengajuan.id AS id_pengajuan, pengajuan.judul AS judul FROM pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa WHERE pengajuan.acc_bab_pembimbing1='ya' AND pengajuan.acc_bab_pembimbing2='ya'")->result_array();
	}

	public function registerByMhs($pengajuanID)
	{
		$data = array(
			'id_pengajuan' => $pengajuanID,
			'status'=> 'tidak',
			'tgl_daftar' => date("Y-m-d H:i:s"));

		return $this->db->insert('komprehensif',$data);
	}
	public function remedialByMhs($pengajuanID)
	{
		$this->db->where('id_pengajuan',$pengajuanID);
		$data = array(
			'id_pengajuan' => $pengajuanID,
			'status'=> 'tidak',
			'tgl_daftar' => date("Y-m-d H:i:s"),
			'tgl_terima'	=> NULL,
			'tgl_sidang'	=> NULL,
			'id_penguji1'	=> NULL,
			'id_penguji2'	=> NULL,
			'id_penguji3'	=> NULL,
			'nilai_1'	=> NULL,
			'nilai_2'	=> NULL,
			'nilai_3'	=> NULL);

		return $this->db->update('komprehensif',$data);
	}
	public function isHave($pengajuanID)
	{
		$this->db->where('id_pengajuan',$pengajuanID);
		$this->db->select('status');
		return $this->db->get('komprehensif')->row_array();
	}

	public function isProposalAcc($pengajuanID)
	{
		return $this->db->query("SELECT SUM(nilai_1+nilai_2+nilai_3)/3 AS nilai FROM proposal WHERE id_pengajuan=$pengajuanID")->row_array();
	
	}
	public function getAllKompre()
	{
		return $this->db->query("SELECT mahasiswa.nama AS nama_mahasiswa, mahasiswa.username AS nim_mahasiswa, mahasiswa.prodi AS prodi, komprehensif.id AS id_komprehensif, komprehensif.status AS status_komprehensif, komprehensif.tgl_daftar AS tgl_daftar, komprehensif.tgl_terima AS tgl_terima, komprehensif.tgl_sidang AS tgl_sidang, komprehensif.id_penguji1 AS id_penguji1, komprehensif.id_penguji2 AS id_penguji2, komprehensif.id_penguji3 AS id_penguji3, (komprehensif.nilai_1+komprehensif.nilai_2+komprehensif.nilai_3)/3 AS nilai, pengajuan.judul as judul FROM komprehensif INNER JOIN pengajuan ON pengajuan.id = komprehensif.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa ORDER BY tgl_daftar DESC")->result_array();
	}
	public function getKompre($kompreID)
	{
		return $this->db->query("SELECT mahasiswa.nama AS nama_mahasiswa, mahasiswa.username AS nim_mahasiswa, mahasiswa.prodi AS prodi, komprehensif.id AS id_komprehensif, komprehensif.status AS status_komprehensif, komprehensif.tgl_daftar AS tgl_daftar, komprehensif.tgl_terima AS tgl_terima, komprehensif.tgl_sidang AS tgl_sidang, komprehensif.id_penguji1 AS id_penguji1, komprehensif.id_penguji2 AS id_penguji2, komprehensif.id_penguji3 AS id_penguji3, komprehensif.nilai_1 as nilai1, komprehensif.nilai_2 as nilai2, komprehensif.nilai_3 as nilai3,pengajuan.judul as judul FROM komprehensif INNER JOIN pengajuan ON pengajuan.id = komprehensif.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE komprehensif.id = $kompreID")->result_array();
	}
	public function updateKompre($data)
	{
		return $this->db->update('komprehensif',$data);
	}
	public function updateNilai($id,$kelompok,$nilai)
	{
		$this->db->set($kelompok, (int)$nilai);
		$this->db->where('id', $id);
		return $this->db->update('komprehensif');
	}
	public function delete($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('komprehensif');
	}
	public function cariDosen($id)
	{
		return $this->db->query("SELECT nama FROM dosen where id=$id")->row_array();
	}
	public function nilaiKompre($kompreID)
	{
		return $this->db->query("SELECT SUM(nilai_1+nilai_2+nilai_3)/3 as nilai FROM komprehensif WHERE id=$kompreID")->row_array();
	}

}
