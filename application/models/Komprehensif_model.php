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

}
