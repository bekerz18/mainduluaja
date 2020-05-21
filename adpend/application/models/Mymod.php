<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymod extends CI_Model{

    public function cekadminlogin($user_username,$user_password){
        $res=$this->db->query("SELECT * FROM user WHERE user_username='$user_username' AND user_password=md5('$user_password')");
        return $res;
    }

    public function CekDataRows($table,$where){
        $res=$this->db->get_where($table,$where);
        return $res;
    }
    public function get_rank(){
		return $this->db->query("SELECT alternatif.users_id as id, hasil_rank.alternatif_kode as kode_dosen, alternatif.alternatif_nama as nama_dosen, hasil_rank.hr_value as nilai FROM hasil_rank INNER JOIN alternatif ON alternatif.alternatif_kode=hasil_rank.alternatif_kode ORDER by nilai DESC LIMIT 5")->result_array();
	}
    public function get_rank_last(){
        return $this->db->query("SELECT alternatif.users_id as id, hasil_rank.alternatif_kode as kode_dosen, alternatif.alternatif_nama as nama_dosen, hasil_rank.hr_value as nilai FROM hasil_rank INNER JOIN alternatif ON alternatif.alternatif_kode=hasil_rank.alternatif_kode ORDER by nilai DESC LIMIT 5,5")->result_array();
    }
    public function get_rank_all(){
        return $this->db->query("SELECT hasil_rank.alternatif_kode as kode_dosen, alternatif.alternatif_nama as nama_dosen, hasil_rank.hr_value as nilai FROM hasil_rank INNER JOIN alternatif ON alternatif.alternatif_kode=hasil_rank.alternatif_kode ORDER by nilai DESC")->result_array();
    }
    public function get_all(){
        return $this->db->get('alternatif')->result();
    }
    public function update_id($id){
        $this->db->where('alternatif_kode',$id);
        
        $data = array('users_id' => uniqid());

        return $this->db->update('alternatif',$data);
    }
    public function get_rank_10(){
        return $this->db->query("SELECT alternatif.users_id as id, hasil_rank.alternatif_kode as kode_dosen, alternatif.alternatif_nama as nama_dosen, hasil_rank.hr_value as nilai FROM hasil_rank INNER JOIN alternatif ON alternatif.alternatif_kode=hasil_rank.alternatif_kode ORDER by nilai DESC LIMIT 10")->result_array();
    }

}
