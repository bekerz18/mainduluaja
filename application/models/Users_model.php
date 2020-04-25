<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	private $_tabel = 'users';
	
	public function create_dosen($data){
		return $this->db->insert($this->_tabel,$data);
	}

}
