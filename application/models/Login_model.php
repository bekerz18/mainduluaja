<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	private $_tabel = 'users';
	public $id;
	public $username;
	public $level;
	public $login_last;
	public $login_ip;
	public $login_os_browser;

	public function login_admin($username,$password){
		$this->username = $username;
		$this->password = md5($password);

		$this->db->where('username',$this->username);
		$this->db->where('password',$this->password);

		return $this->db->get('users')->row_array();
	}
	public function login_dosen($username,$password){
		$this->username = $username;
		$this->password = md5($password);

		$this->db->where('username',$this->username);
		$this->db->where('password',$this->password);

		return $this->db->get('dosen')->row_array();
	}
	public function login_mahasiswa($username,$password){
		$this->username = $username;
		$this->password = md5($password);

		$this->db->where('username',$this->username);
		$this->db->where('password',$this->password);

		return $this->db->get('mahasiswa')->row_array();
	}
	public function forgot_dosen($username,$nama){
		$this->db->where('username',$username);
		$this->db->where('nama',$nama);
		return $this->db->get('dosen')->row_array();
	}
	public function forgot_mahasiswa($username,$nama){
		$this->db->where('username',$username);
		$this->db->where('nama',$nama);
		return $this->db->get('mahasiswa')->row_array();
	}
	public function forgot_admin($username,$nama){
		$this->db->where('username',$username);
		$this->db->where('nama',$nama);
		return $this->db->get('users')->row_array();
	}
	public function set_password($id,$table,$data){
		$this->db->where('id',$id);
		return $this->db->update($table,$data);
	}

}
