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

	public function login_check($username,$password){
		$this->username = $username;
		$this->password = md5($password);

		$this->db->where('username',$this->username);
		$this->db->where('password',$this->password);

		return $this->db->get('users')->row_array();
	}

}
