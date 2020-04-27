<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != true ) redirect('login');
		
		$this->load->model('Users_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}
	private function _password(){
		if(!empty($this->input->post('password'))){
			return md5($this->input->post('password'));
			
		}else{
			return $this->session->userdata('password');
		}
	}
	public function mahasiswa(){
		if($this->session->userdata('level') == 2){
			if($this->input->method()=="post"){
				$model = $this->Users_model;
				$password = $this->_password();
				$update = $model->update_by_client($password);

				if($update){
					$this->session->set_flashdata('success_upd','Berhasil diubah');
					$session = array(
						'handphone'		=> $this->input->post('handphone'),
						'email'			=> $this->input->post('email'),
						'password'		=> $password
					);
					$this->session->set_userdata($session);
				}else{
					$this->session->set_flashdata('failed_upd','Gagal diubah');
				}
			}

			$data['nama'] = $this->session->userdata('nama');
			$this->load->view('users/setting_mahasiswa',$data);
		}elseif($this->session->userdata('level') == 0){
			$model = $this->Users_model;
			$data['users'] = $model->get_mahasiswa();
			$data['nama'] = $this->session->userdata('nama');
			$this->load->view('users/mahasiswa',$data);
		}else{
			redirect('beranda');
		}
	}
	public function dosen(){
		if($this->session->userdata('level') == 1){
			if($this->input->method()=="post"){
				$model = $this->Users_model;
				$password = $this->_password();
				$update = $model->update_by_client($password);

				if($update){
					$this->session->set_flashdata('success_upd','Berhasil diubah');
					$session = array(
						'handphone'		=> $this->input->post('handphone'),
						'email'			=> $this->input->post('email'),
						'password'		=> $password
					);
					$this->session->set_userdata($session);
				}else{
					$this->session->set_flashdata('failed_upd','Gagal diubah');
				}
			}
			$data['nama'] = $this->session->userdata('nama');
			$this->load->view('users/setting_dosen',$data);
		}elseif($this->session->userdata('level') == 0){
			$model = $this->Users_model;
			$data['users'] = $model->get_dosen();
			$data['nama'] = $this->session->userdata('nama');
			$this->load->view('users/dosen',$data);
		}else{
			redirect('beranda');
		}
	}
	public function admin(){
		if($this->session->userdata('level') != 0){
			redirect('beranda');
		}else{
			$model = $this->Users_model;
			$data['users'] = $model->get_admin();
			$data['nama'] = $this->session->userdata('nama');
			$this->load->view('users/admin',$data);
		}
	}

	public function insert_mahasiswa(){
		if($this->session->userdata('level') != 0){
			redirect('beranda');
		}else{
			$model = $this->Users_model;
			$insert = $model->create_user(array(
				'id'				=> uniqid(),
				'username'			=> $this->input->post('nim'),
				'nama'				=> $this->input->post('nama'),
				'prodi'				=> $this->input->post('prodi'),
				'gender'			=> $this->input->post('gender'),
				'level'				=> '2',
				'password'			=> md5($this->input->post('nim'))	
			));
			if($insert){
				$this->session->set_flashdata('success_add','Berhasil Menambahkan Data!');
			}else{
				$this->session->set_flashdata('failed_add','Gagal Menambahkan Data!');
			}

		}
	}
	public function insert_admin(){
		if($this->session->userdata('level') != 0){
			redirect('beranda');
		}else{
			if($this->input->method()=="post"){
				$model = $this->Users_model;
				$insert = $model->create_user(array(
				'id'				=> uniqid(),
				'username'			=> $this->input->post('username'),
				'nama'				=> $this->input->post('nama'),
				'gender'			=> $this->input->post('gender'),
				'level'				=> '0',
				'password'			=> md5($this->input->post('username'))	
			));
				if($insert){
					$this->session->set_flashdata('success_add','Berhasil Menambahkan Data!');
				}else{
					$this->session->set_flashdata('failed_add','Gagal Menambahkan Data!');
				}

			}
		}
	}

	public function insert_dosen(){
		$model = $this->Users_model;
		if($this->input->method()=="post"){
			$insert = $model->create_user(array(
				'id'				=> uniqid(),
				'username'			=> $this->input->post('nik'),
				'nama'				=> $this->input->post('nama'),
				'prodi'				=> $this->input->post('prodi'),
				'kode_alternatif'	=> $this->input->post('kode'),
				'gender'			=> $this->input->post('gender'),
				'level'				=> '1',
				'password'			=> md5($this->input->post('nik'))	
			));
			if($insert){
				$this->session->set_flashdata('success_add','Berhasil Menambahkan Data!');
			}else{
				$this->session->set_flashdata('failed_add','Gagal Menambahkan Data!');
			}
		}

	}


	public function info_user($id){
		$model = $this->Users_model;
		$get = $model->get_user($id);

		echo json_encode($get);
	}
	public function update_admin($id){
		
		if($this->session->userdata('level') != 0){
			redirect('beranda');
		}else{
			if($this->input->method()=="post"){
				$model = $this->Users_model;
				
				$update = $model->update_user($id,array(
					'nama'				=> $this->input->post('nama'),
					'prodi'				=> $this->input->post('prodi'),
					'kode_alternatif'	=> $this->input->post('kode'),
					'gender'			=> $this->input->post('gender'),
					'password'			=> md5($this->input->post('nik'))	
				));
				if($update){
					$this->session->set_flashdata('success_upd','Berhasil Mengubah Data!');
				}else{
					$this->session->set_flashdata('failed_upd','Gagal Mengubah Data!');
				}


			}
		}
	}
	public function update_dosen($id){
		
		if($this->session->userdata('level') != 0){
			redirect('beranda');
		}else{
			if($this->input->method()=="post"){
				$model = $this->Users_model;
				
				$update = $model->update_user($id,array(
					'nama'				=> $this->input->post('nama'),
					'gender'			=> $this->input->post('gender'),
					'prodi'				=> $this->input->post('prodi'),
					'kode_alternatif'	=> $this->input->post('kode'),
					'password'			=> md5($this->input->post('password'))	
				));
				if($update){
					$this->session->set_flashdata('success_upd','Berhasil Mengubah Data!');
				}else{
					$this->session->set_flashdata('failed_upd','Gagal Mengubah Data!');
				}
				


			}
		}
	}
	public function update_mahasiswa($id){
		
		if($this->session->userdata('level') != 0){
			redirect('beranda');
		}else{
			if($this->input->method()=="post"){
				$model = $this->Users_model;
				
				$update = $model->update_user($id,array(
					'nama'				=> $this->input->post('nama'),
					'gender'			=> $this->input->post('gender'),
					'prodi'				=> $this->input->post('prodi'),
					'password'			=> md5($this->input->post('password'))	
				));
				if($update){
					$this->session->set_flashdata('success_upd','Berhasil Mengubah Data!');
				}else{
					$this->session->set_flashdata('failed_upd','Gagal Mengubah Data!');
				}
				


			}
		}
	}
	public function hapus($from=null,$id=null){
		if(!isset($id)){
			redirec('beranda');
		}elseif(!isset($from)){
			redirect('beranda');
		}else{
			$model = $this->Users_model;
			$hapus = $model->delete_user($id);
			if($hapus){
				$this->session->set_flashdata('success','Berhasil menghapus data');
				redirect('users/'.$from);
			}
			else{
				$this->session->set_flashdata('failed','Gagal menghapus data');
				redirect('users/'.$from);
			}
		}
	}
}