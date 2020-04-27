<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model {

	private $_tabel = 'pengajuan';

	public function insert_pengajuan()
	{
		$data = array(
			'id_mahasiswa'			=> $this->session->userdata('id'),
			'prodi'			=> $this->input->post('prodi'),
			'id_pembimbing1'	=> $this->input->post('pembimbing1'),
			'id_pembimbing2'	=> $this->input->post('pembimbing2'),
			'konsentrasi'	=> $this->input->post('konsentrasi'),
			'judul'			=> $this->input->post('judul'),
			'tglpengajuan'	=> $this->input->post('tglpengajuan'),
			'tglditerima'	=> $this->input->post('tglditerima')
			);

		return $this->db->insert($this->_tabel,$data);

	}

	public function get_pengajuan()
	{
		return $this->db->query("SELECT pengajuan.tglpengajuan as tglpengajuan, pengajuan.tglditerima as tglditerima, pengajuan.id as id_pengajuan, mahasiswa.nama as nama, mahasiswa.username as username,pengajuan.id_mahasiswa as id_mahasiswa,pengajuan.id_pembimbing1 as id_pembimbing1, pengajuan.id_pembimbing2 as id_pembimbing2, pengajuan.prodi as prodi,pengajuan.konsentrasi as konsentrasi, pengajuan.judul as judul FROM pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa ORDER BY id_pengajuan DESC")->result();
	}

	public function delete_pengajuan($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete($this->_tabel);
	}
	public function get_select_pengajuan($id)
	{
		return $this->db->query("SELECT prodi.nama as nama_prodi, pengajuan.tglpengajuan as tglpengajuan, pengajuan.tglditerima as tglditerima, pengajuan.id as id_pengajuan, mahasiswa.nama as nama, mahasiswa.username as username,pengajuan.id_mahasiswa as id_mahasiswa,pengajuan.id_pembimbing1 as id_pembimbing1, pengajuan.id_pembimbing2 as id_pembimbing2, pengajuan.prodi as prodi,pengajuan.konsentrasi as konsentrasi, pengajuan.judul as judul FROM pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa INNER JOIN prodi ON prodi.sebutan=pengajuan.prodi WHERE pengajuan.id=$id")->result_array();
	}
	public function update($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update($this->_tabel,$data);
	}
	public function get_dosen($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('dosen')->row_array();
	}

}
