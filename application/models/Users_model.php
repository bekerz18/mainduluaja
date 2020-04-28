<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	private $_tabel = 'users';
	
	public function create_user($data){
		return $this->db->insert($this->_tabel,$data);
	}
	public function create_dosen($data){
		return $this->db->insert('dosen',$data);
	}
	public function create_mahasiswa($data){
		return $this->db->insert('mahasiswa',$data);
	}
	public function get_dosens(){
		$this->db->order_by('username','ASC');
		return $this->db->get('dosen')->result();
	}
	public function get_prodi_dosen($id){
		return $this->db->query("SELECT prodi.nama as nama_prodi FROM prodi_detail INNER JOIN prodi ON prodi.id=prodi_detail.id_prodi WHERE prodi_detail.id_dosen=$id")->result();
	}
	public function get_mahasiswa(){
		$this->db->order_by('username','ASC');
		return $this->db->get('mahasiswa')->result();
	}
	public function get_admin(){
		$this->db->order_by('nama','ASC');
		return $this->db->get($this->_tabel)->result();
	}
	public function get_user($id){
		$this->db->where('id',$id);
		return $this->db->get($this->_tabel)->row_array();
	}
	public function get_dosen($id){
		$this->db->where('id',$id);
		return $this->db->get('dosen')->row_array();
	}
	public function get_mhs($id){
		$this->db->where('id',$id);
		return $this->db->get('mahasiswa')->row_array();
	}
	public function update_user($id,$data=array()){
		$this->db->where('username',$id);
		return $this->db->update($this->_tabel,$data);
	}
	public function update_dosen($id,$data=array()){
		$this->db->where('username',$id);
		return $this->db->update('dosen',$data);
	}
	public function update_mhs($id,$data=array()){
		$this->db->where('username',$id);
		return $this->db->update('mahasiswa',$data);
	}
	
	public function delete_user($id){
		$this->db->where('id',$id);
		return $this->db->delete($this->_tabel);
	}
	public function delete_dosen($id){
		$this->db->where('id',$id);
		return $this->db->delete('dosen');
	}
	public function delete_mhs($id){
		$this->db->where('id',$id);
		return $this->db->delete('mahasiswa');
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
	public function update_by_dosen($password){

		$data = array(
			'email'			=> $this->input->post('email'),
			'handphone'		=> $this->input->post('handphone'),
			'password'		=> $password
		);

		$this->db->where('id',$this->session->userdata('id'));
		return $this->db->update('dosen',$data);
	}
	public function update_by_mhs($password){

		$data = array(
			'email'			=> $this->input->post('email'),
			'handphone'		=> $this->input->post('handphone'),
			'password'		=> $password
		);

		$this->db->where('id',$this->session->userdata('id'));
		return $this->db->update('mahasiswa',$data);
	}

	public function dosen_in_prodi($id)
	{
		return $this->db->query("SELECT dosen.id as id_dosen, dosen.nama as nama_dosen, prodi.nama as nama_prodi, prodi_detail.id as id_prodi_detail FROM dosen INNER JOIN prodi_detail ON prodi_detail.id_dosen=dosen.id INNER JOIN prodi ON prodi.id=prodi_detail.id_prodi WHERE dosen.id=$id")->result_array();
	}

	public function check_prod_detail($dosen,$prodi)
	{
		return $this->db->query("SELECT * FROM prodi_detail WHERE id_prodi=$prodi AND id_dosen=$dosen")->result_array();
	}
	public function insert_prod_detail($data)
	{
		return $this->db->insert('prodi_detail',$data);
	}
	public function delete_prod_detail($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('prodi_detail');
	}


}
