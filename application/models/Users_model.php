<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	private $_tabel = 'users';
	
	public function create_user($data){
		return $this->db->insert($this->_tabel,$data);
	}
	public function get_dosen(){
		$this->db->where('level','1');
		return $this->db->get($this->_tabel)->result();
	}
	public function get_mahasiswa(){
		$this->db->where('level','2');
		$this->db->order_by('username','ASC');
		return $this->db->get($this->_tabel)->result();
	}
	public function get_admin(){
		$this->db->where('level','0');
		$this->db->order_by('nama','ASC');
		return $this->db->get($this->_tabel)->result();
	}
	public function get_user($id){
		$this->db->where('id',$id);
		return $this->db->get($this->_tabel)->row_array();
	}
	public function update_user($id,$data=array()){
		$this->db->where('username',$id);
		return $this->db->update($this->_tabel,$data);
	}
	
	public function delete_user($id){
		$this->db->where('id',$id);
		return $this->db->delete($this->_tabel);
	}
	public function update_by_client($password){

		$data = array(
			'email'			=> $this->input->post('email'),
			'handphone'		=> $this->input->post('handphone'),
			'password'		=> $password
		);

		$this->db->where('id',$this->session->userdata('id'));
		return $this->db->update($this->_tabel,$data);
	}


}
