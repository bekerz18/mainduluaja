<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// if($this->session->userdata('level')) redirect('beranda');
		$this->load->view('login/default');
	}

	public function login(){
		$validasi = $this->form_validation;
		$model = $this->Login_model;
		$validasi->set_rules('username','Username','required');
		$validasi->set_rules('password','Password','required');

		if($validasi->run()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$admin = $model->login_admin($username,$password);
			$dosen = $model->login_dosen($username,$password);
			$mahasiswa = $model->login_mahasiswa($username,$password);

			if(!empty($admin)){
				$session = array(
					'id'				=> $admin["id"],
					'nama'				=> $admin["nama"],
					'username'			=> $admin["username"],
					'gender'			=> $admin["gender"],
					'password'			=> $admin["password"],
					'handphone'			=> $admin["handphone"],
					'email'				=> $admin["email"],
					'level'				=> 0,
					'login'				=> true,
					'user_role'			=> 'admin'
				);

				$this->session->set_userdata($session);
				redirect('beranda');

			}elseif(!empty($dosen)){
				$session = array(
					'id'				=> $dosen["id"],
					'nama'				=> $dosen["nama"],
					'username'			=> $dosen["username"],
					'gender'			=> $dosen["gender"],
					'password'			=> $dosen["password"],
					'kode_alternatif'	=> $dosen["kode_alternatif"],
					'handphone'			=> $dosen["handphone"],
					'email'				=> $dosen["email"],
					'level'				=> 1,
					'login'				=> true
				);
				
				$this->session->set_userdata($session);
				redirect('beranda');
			}elseif(!empty($mahasiswa)){
				$session = array(
					'id'				=> $mahasiswa["id"],
					'nama'				=> $mahasiswa["nama"],
					'username'			=> $mahasiswa["username"],
					'gender'			=> $mahasiswa["gender"],
					'password'			=> $mahasiswa["password"],
					'prodi'				=> $mahasiswa["prodi"],
					'handphone'			=> $mahasiswa["handphone"],
					'email'				=> $mahasiswa["email"],
					'level'				=> 2,
					'login'				=> true
				);
				
				$this->session->set_userdata($session);
				redirect('beranda');

			}else{
				$this->session->set_flashdata('failed','login');
				redirect('login');
			}
		}else{
			redirect('login');
		}
		
		

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
