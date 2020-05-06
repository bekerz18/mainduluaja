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
					'konsentrasi'		=> $mahasiswa["konsentrasi"],
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

	public function forgot(){
		$model = $this->Login_model;
		$validasi = $this->form_validation;
		$validasi->set_rules('username','Username','required|trim');
		$validasi->set_rules('nama','Nama','required|trim');

		if($validasi->run()){
			$username = $this->input->post('username');
			$nama = $this->input->post('nama');

			$admin = $model->forgot_admin($username,$nama);
			$dosen = $model->forgot_dosen($username,$nama);
			$mahasiswa = $model->forgot_mahasiswa($username,$nama);

			if(!empty($admin)){
				$this->session->set_userdata('id_forgot',$admin['id']);
				$this->session->set_userdata('nama_forgot',$admin['nama']);
				$this->session->set_userdata('username_forgot',$admin['username']);
				$this->session->set_userdata('forgot_password','users');

				redirect('pemulihan-akun');
			}elseif (!empty($dosen)) {
				$this->session->set_userdata('id_forgot',$dosen['id']);
				$this->session->set_userdata('nama_forgot',$dosen['nama']);
				$this->session->set_userdata('username_forgot',$dosen['username']);
				$this->session->set_userdata('forgot_password','dosen');
				
				redirect('pemulihan-akun');
			}elseif (!empty($mahasiswa)) {
				$this->session->set_userdata('id_forgot',$mahasiswa['id']);
				$this->session->set_userdata('nama_forgot',$mahasiswa['nama']);
				$this->session->set_userdata('username_forgot',$mahasiswa['username']);
				$this->session->set_userdata('forgot_password','mahasiswa');
				
				redirect('pemulihan-akun');
			}else{

				$this->session->set_flashdata('not_found','Oops data tidak ditemukan :(');
			}
		}

		$this->load->view('login/lupa');
	}

	public function recover()
	{
		if(empty($this->session->userdata('forgot_password'))){
			redirect('login');
		}else{
			$validasi = $this->form_validation;
			$validasi->set_rules('password','Password','required|min_length[8]');
			if($validasi->run()){
				$model = $this->Login_model;
				$table = $this->session->userdata('forgot_password');
				$id = $this->session->userdata('id_forgot');
				$password = md5($this->input->post('password'));
				$data = array(
					'password'	=> $password
				);
				$update = $model->set_password($id,$table,$data);

				if($update){
					$this->session->unset_userdata('id_forgot');
					$this->session->unset_userdata('nama_forgot');
					$this->session->unset_userdata('username_forgot');
					$this->session->unset_userdata('forgot_password');

					$this->session->set_flashdata('berhasil_diubah','Password berhasil diubah');
					redirect('login');
				}else{
					$this->session->set_flashdata('gagal_diubah','Password gagal diubah');
				}
			}
			$data['nama'] = $this->session->userdata('nama_forgot');
			$this->load->view('login/recover',$data);
		}
	}
}
