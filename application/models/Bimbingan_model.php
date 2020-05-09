<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function getBimbinganAdmin($pembimbing)
	{
		return $this->db->query("SELECT bimbingan_detail.id AS id_bimbingan_detail, bimbingan_detail.id_bimbingan AS id_bimbingan, bimbingan_detail.file AS file_upload, bimbingan_detail.tanggal AS tanggal_bimbingan, bimbingan.bab as BAB, mahasiswa.nama AS nama_mahasiswa, mahasiswa.username AS nim_mahasiswa, mahasiswa.prodi AS prodi FROM bimbingan_detail RIGHT JOIN bimbingan ON bimbingan.id = bimbingan_detail.id_bimbingan INNER JOIN pengajuan ON pengajuan.id = bimbingan.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE bimbingan.pembimbing='$pembimbing'")->result_array();
	}
	public function getBimbinganDosen($pembimbing,$dosen)
	{
		return $this->db->query("SELECT bimbingan_detail.id AS id_bimbingan_detail, bimbingan_detail.id_bimbingan AS id_bimbingan, bimbingan_detail.file AS file_upload, bimbingan_detail.tanggal AS tanggal_bimbingan, bimbingan.bab as BAB, mahasiswa.nama AS nama_mahasiswa, mahasiswa.username AS nim_mahasiswa, mahasiswa.prodi AS prodi FROM bimbingan_detail RIGHT JOIN bimbingan ON bimbingan.id = bimbingan_detail.id_bimbingan INNER JOIN pengajuan ON pengajuan.id = bimbingan.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE bimbingan.pembimbing='$pembimbing'AND pengajuan.id_pembimbing1=$dosen")->result_array();
	}
	public function getBimbinganMahasiswa($pembimbing,$mahasiswa)
	{
		return $this->db->query("SELECT bimbingan.id as id_bimbingan, bimbingan.pembimbing as pembimbing, bimbingan.bab as bab, bimbingan.status as status FROM bimbingan INNER JOIN pengajuan ON pengajuan.id = bimbingan.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE bimbingan.pembimbing='$pembimbing'AND pengajuan.id_mahasiswa=$mahasiswa")->result_array();
	}
	public function checkBimbingan($bimbingan,$mahasiswa)
	{
		return $this->db->query("SELECT bimbingan.bab AS bab, bimbingan.status AS status FROM bimbingan INNER JOIN pengajuan ON pengajuan.id=bimbingan.id_pengajuan WHERE bimbingan.pembimbing='$bimbingan' AND pengajuan.id_mahasiswa=$mahasiswa")->result_array();
	}
	public function addBimbingan($data)
	{
		return $this->db->insert('bimbingan',$data);
	}
	public function getProposalDone($id)
	{
		return $this->db->query("SELECT proposal.id_pengajuan AS id_pengajuan FROM proposal INNER JOIN pengajuan ON pengajuan.id=proposal.id_pengajuan WHERE pengajuan.id_mahasiswa=$id AND proposal.revisi='tidak' AND nilai_1 IS NOT NULL AND nilai_2 IS NOT NULL AND nilai_3 IS NOT NULL GROUP BY proposal.id_pengajuan  HAVING SUM(nilai_1+nilai_2+nilai_3)/3 >= 75")->row_array();
	}

}
