<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// if($this->session->userdata('level')) redirect('dashboard');
		$this->load->view('login/default');
	}

	public function login(){
		$validasi = $this->form_validation;
		$model = $this->Home_model;
		$validasi->set_rules('username','Username','required');
		$validasi->set_rules('password','Password','required');

		if($validasi->run()){
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$login = $model->login_check($username,$password);

			if(!empty($login)){
				$session = array(
					'id'		=> $login["id"],
					'nama'		=> $login["nama"],
					'username'	=> $login["username"],
					'gender'	=> $login["gender"],
					'level'		=> $login["level"],
					'login'		=> true
				);

				if($login["level"]==0){
					$this->session->set_userdata('user_role','admin');
				}

				$this->session->set_userdata($session);
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('failed','login');
				redirect('home');
			}
		}else{
			redirect('home');
		}
		
		

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
}
