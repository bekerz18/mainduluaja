<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rank_model extends CI_model {
	public function get_rank(){
		return $this->db->query("SELECT hasil_rank.alternatif_kode as kode_dosen, alternatif.alternatif_nama as nama_dosen, hasil_rank.hr_value as nilai FROM hasil_rank INNER JOIN alternatif ON alternatif.alternatif_kode=hasil_rank.alternatif_kode ORDER by nilai DESC")->result_array();
	}
}