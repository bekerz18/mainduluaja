<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model {

	private $_tabel = 'pengajuan';

	public function insert_pengajuan()
	{
		$data = array(
			'nim'			=> $this->input->post('nim'),
			'nama'			=> $this->input->post('nama'),
			'prodi'			=> $this->input->post('prodi'),
			'pembimbing1'	=> $this->input->post('pembimbing1'),
			'pembimbing2'	=> $this->input->post('pembimbing2'),
			'konsentrasi'	=> $this->input->post('konsentrasi'),
			'judul'			=> $this->input->post('judul'),
			'tglpengajuan'	=> $this->input->post('tglpengajuan'),
			'tglditerima'	=> $this->input->post('tglditerima')
			);

		return $this->db->insert($this->_tabel,$data);

	}

	public function get_pengajuan()
	{
		return $this->db->get($this->_tabel)->result();
	}

}
