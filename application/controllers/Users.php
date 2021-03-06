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
	public function mahasiswa($cetak=null){
		if($this->session->userdata('level') == 2){
			if($this->input->method()=="post"){
				$model = $this->Users_model;
				$password = $this->_password();
				$update = $model->update_by_mhs($password);

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
			$data['title'] = 'Pengaturan Akun';
			$this->load->view('layout/mahasiswa/header',$data);
			$this->load->view('users/setting_mahasiswa',$data);
		}elseif($this->session->userdata('level') == 0){
			$model = $this->Users_model;
			$data['title'] = 'Daftar Mahasiswa';
			$data['users'] = $model->get_mahasiswa();
			$data['nama'] = $this->session->userdata('nama');
			if($cetak == 'cetak' ){
				$style = file_get_contents(base_url('assets/dist/css/cetak.css'));
				$cetak_head = $this->load->view('layout/cetak',$data,TRUE);
				$cetak = $this->load->view('users/cetak_mahasiswa',$data,TRUE);
                $users= new \Mpdf\Mpdf(['format' => 'Legal']);
                $users->showImageErrors = true;
                $users->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $users->WriteHtml($cetak_head,\Mpdf\HTMLParserMode::HTML_BODY);
                $users->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $users->Output('Daftar Mahasiswa.pdf', 'D');
			}else{
				$this->load->view('layout/admin/header',$data);
				$this->load->view('users/mahasiswa',$data);
			}
			
		}else{
			redirect('beranda');
		}
	}
	public function dosen($cetak=null){
		$model = $this->Users_model;
		$data['model'] = $model;
		if($this->session->userdata('level') == 1){
			if($this->input->method()=="post"){

				$password = $this->_password();
				$update = $model->update_by_dosen($password);

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
			$data['title'] = 'Pengaturan Akun';
			$data['nama'] = $this->session->userdata('nama');
			$this->load->view('layout/dosen/header',$data);
			$this->load->view('users/setting_dosen',$data);
		}elseif($this->session->userdata('level') == 0){
			$data['users'] = $model->get_dosens();
			$data['nama'] = $this->session->userdata('nama');
			$data['title'] = 'Daftar Dosen';
			if($cetak == 'cetak' ){
				$style = file_get_contents(base_url('assets/dist/css/cetak.css'));
				$cetak_head = $this->load->view('layout/cetak',$data,TRUE);
				$cetak = $this->load->view('users/cetak_dosen',$data,TRUE);
                $users= new \Mpdf\Mpdf(['format' => 'Legal']);
                $users->showImageErrors = true;
                $users->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $users->WriteHtml($cetak_head,\Mpdf\HTMLParserMode::HTML_BODY);
                $users->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $users->Output('Daftar Dosen.pdf', 'D');
			}else{
				$this->load->view('layout/admin/header',$data);
				$this->load->view('users/dosen',$data);
			}
			
			
		}else{
			redirect('beranda');
		}
	}
	public function admin($cetak=null){
		if($this->session->userdata('level') != 0){
			redirect('beranda');
		}else{
			$model = $this->Users_model;
			$data['users'] = $model->get_admin();
			$data['title'] = 'Daftar Admin';
			if($cetak == 'cetak'){
				$style = file_get_contents(base_url('assets/dist/css/cetak.css'));
				$cetak_head = $this->load->view('layout/cetak',$data,TRUE);
				$cetak = $this->load->view('users/cetak_admin',$data,TRUE);
                $users= new \Mpdf\Mpdf(['format' => 'Legal']);
                $users->showImageErrors = true;
                $users->WriteHTML($style,\Mpdf\HTMLParserMode::HEADER_CSS);
                $users->WriteHtml($cetak_head,\Mpdf\HTMLParserMode::HTML_BODY);
                $users->WriteHtml($cetak,\Mpdf\HTMLParserMode::HTML_BODY);
                $users->Output('Daftar Admin.pdf', 'D');
				

			}else{
				$data['nama'] = $this->session->userdata('nama');
				$this->load->view('layout/admin/header',$data);
				$this->load->view('users/admin',$data);
			}
		}
	}

	public function insert_mahasiswa(){
		if($this->session->userdata('level') != 0){
			redirect('beranda');
		}else{
			$model = $this->Users_model;
			$insert = $model->create_mahasiswa(array(
				'username'			=> $this->input->post('nim'),
				'nama'				=> $this->input->post('nama'),
				'konsentrasi'		=> $this->input->post('konsentrasi'),
				'prodi'				=> $this->input->post('prodi'),
				'gender'			=> $this->input->post('gender'),
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
				'username'			=> $this->input->post('username'),
				'nama'				=> $this->input->post('nama'),
				'gender'			=> $this->input->post('gender'),
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
			$insert = $model->create_dosen(array(
				'username'			=> $this->input->post('nik'),
				'nama'				=> $this->input->post('nama'),
				'gender'			=> $this->input->post('gender'),
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
	public function info_dosen($id){
		$model = $this->Users_model;
		$get = $model->get_dosen($id);

		echo json_encode($get);
	}
	public function info_mhs($id){
		$model = $this->Users_model;
		$get = $model->get_mhs($id);

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
					'gender'			=> $this->input->post('gender'),
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
	public function update_dosen($id){
		
		if($this->session->userdata('level') != 0){
			redirect('beranda');
		}else{
			if($this->input->method()=="post"){
				$model = $this->Users_model;
				
				$update = $model->update_dosen($id,array(
					'nama'				=> $this->input->post('nama'),
					'gender'			=> $this->input->post('gender'),
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
				
				$update = $model->update_mhs($id,array(
					'nama'				=> $this->input->post('nama'),
					'gender'			=> $this->input->post('gender'),
					'prodi'				=> $this->input->post('prodi'),
					'konsentrasi'		=> $this->input->post('konsentrasi'),
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
			redirect('beranda');
		}elseif(!isset($from)){
			redirect('beranda');
		}else{
			$model = $this->Users_model;
			if($from == 'admin'){
				$hapus = $model->delete_user($id);
			}elseif($from == 'dosen'){
				$hapus = $model->delete_dosen($id);
			}elseif($from == 'mahasiswa'){
				$hapus = $model->delete_mhs($id);
			}
			
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

	public function dosenAtprodi($id){
		$model = $this->Users_model;
		$datas = $model->dosen_in_prodi($id);
		if(!empty($datas)){
			echo json_encode($datas);
		}

		
	}
	public function check_dosprod($dosen,$prodi){
		$model = $this->Users_model;
		$datas = $model->check_prod_detail($dosen,$prodi);

			echo json_encode($datas);
	
	}
	public function insert_prod_detail()
	{
		if($this->input->method()=="post"){
			$model = $this->Users_model;
			$insert = $model->insert_prod_detail(array(
				'id_dosen'		=> $this->input->post('dosen'),
				'id_prodi'		=> $this->input->post('prodi')

			));
		}
	}
	public function delete_prod_detail(){
		if($this->input->method()=="post"){
			$id = $this->input->post('id');
			$this->Users_model->delete_prod_detail($id);
		}
	}
}