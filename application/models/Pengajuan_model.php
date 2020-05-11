<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	private $_tabel = 'pengajuan';
	private $_idPengajuan;

	public function insert_pengajuan()
	{
		$data = array(
			'id_mahasiswa'			=> $this->session->userdata('id'),
			'judul'			=> $this->input->post('judul'),
			'latarbelakang'			=> $this->input->post('latarbelakang'),
			'tujuan'			=> $this->input->post('tujuan'),
			'status'		=> 'belum',
			'tglpengajuan'	=> date("Y-m-d H:i:s")
			);

		return $this->db->insert($this->_tabel,$data);

	}
	public function get_pengajuanmhs()
	{
		$id = $this->session->userdata('id');
		return $this->db->query("SELECT pengajuan.status as status,pengajuan.tglpengajuan as tglpengajuan, pengajuan.tglditerima as tglditerima, pengajuan.id as id_pengajuan, mahasiswa.nama as nama, mahasiswa.username as username,pengajuan.id_mahasiswa as id_mahasiswa, pengajuan.latarbelakang as latarbelakang,pengajuan.tujuan as tujuan ,pengajuan.judul as judul FROM pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa WHERE pengajuan.id_mahasiswa=$id ORDER BY id_pengajuan DESC")->result();
	}
	public function get_pengajuan()
	{
		return $this->db->query("SELECT pengajuan.status as status,pengajuan.tglpengajuan as tglpengajuan, pengajuan.tglditerima as tglditerima, pengajuan.id as id_pengajuan, mahasiswa.nama as nama, mahasiswa.username as username,pengajuan.id_mahasiswa as id_mahasiswa, mahasiswa.prodi as prodi,mahasiswa.konsentrasi as konsentrasi, pengajuan.judul as judul FROM pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa ORDER BY id_pengajuan DESC")->result();
	}

	public function delete_pengajuan($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete($this->_tabel);
	}
	public function get_select_penentuan($id)
	{
		return $this->db->query("SELECT pengajuan.id as id_pengajuan,pengajuan.judul as judul,pengajuan.latarbelakang as latarbelakang, pengajuan.tujuan as tujuan, pengajuan.status as status_pengajuan, pengajuan.tglpengajuan as tglpengajuan, pengajuan.tglditerima as tglditerima, pengajuan.keterangan as alasan,pengajuan.id_pembimbing1 as pembimbing1, pengajuan.id_pembimbing2 as pembimbing2, mahasiswa.nama as nama, mahasiswa.username as nim,pengajuan.id_mahasiswa as id_mahasiswa, mahasiswa.konsentrasi as konsentrasi, prodi.nama as nama_prodi, prodi.sebutan as sebutan_prodi, proposal.acc_seminar as acc_seminar FROM pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa INNER JOIN prodi ON prodi.sebutan=mahasiswa.prodi INNER JOIN proposal ON proposal.id_pengajuan=pengajuan.id WHERE pengajuan.id=$id")->result_array();
	}
	public function get_select_pengajuan($id)
	{
		return $this->db->query("SELECT pengajuan.id as id_pengajuan,pengajuan.judul as judul,pengajuan.latarbelakang as latarbelakang, pengajuan.tujuan as tujuan, pengajuan.status as status_pengajuan, pengajuan.tglpengajuan as tglpengajuan, pengajuan.tglditerima as tglditerima, pengajuan.keterangan as alasan,pengajuan.id_pembimbing1 as pembimbing1, pengajuan.id_pembimbing2 as pembimbing2, mahasiswa.nama as nama, mahasiswa.username as nim,pengajuan.id_mahasiswa as id_mahasiswa, mahasiswa.konsentrasi as konsentrasi, prodi.nama as nama_prodi, prodi.sebutan as sebutan_prodi FROM pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa INNER JOIN prodi ON prodi.sebutan=mahasiswa.prodi WHERE pengajuan.id=$id")->result_array();
	}
	public function get_select_pengajuan2($id)
	{
		return $this->db->query("SELECT pengajuan.id as id_pengajuan,pengajuan.judul as judul,pengajuan.latarbelakang as latarbelakang, pengajuan.tujuan as tujuan, pengajuan.status as status_pengajuan, pengajuan.tglpengajuan as tglpengajuan, pengajuan.tglditerima as tglditerima, pengajuan.keterangan as alasan,pengajuan.status as status,pengajuan.id_pembimbing1 as pembimbing1, pengajuan.id_pembimbing2 as pembimbing2, mahasiswa.nama as nama, mahasiswa.username as nim,pengajuan.id_mahasiswa as id_mahasiswa, mahasiswa.konsentrasi as konsentrasi, prodi.nama as nama_prodi FROM pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa INNER JOIN prodi ON prodi.sebutan=mahasiswa.prodi WHERE pengajuan.id=$id")->row_array();
	}
	public function get_pengajuan_by($dosen)
	{
		return $this->db->query("SELECT pengajuan.id as id_pengajuan,pengajuan.judul as judul,pengajuan.latarbelakang as latarbelakang, pengajuan.tujuan as tujuan, pengajuan.status as status_pengajuan, pengajuan.tglpengajuan as tglpengajuan, pengajuan.tglditerima as tglditerima, pengajuan.keterangan as alasan,pengajuan.status as status,pengajuan.id_pembimbing1 as pembimbing1, pengajuan.id_pembimbing2 as pembimbing2, mahasiswa.nama as nama, mahasiswa.username as nim,pengajuan.id_mahasiswa as id_mahasiswa, mahasiswa.konsentrasi as konsentrasi, prodi.nama as nama_prodi FROM pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa INNER JOIN prodi ON prodi.sebutan=mahasiswa.prodi WHERE pengajuan.id_pembimbing1=$dosen OR pengajuan.id_pembimbing2=$dosen")->result_array();
	}
	public function update($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update($this->_tabel,$data);
	}
	public function get_dosen($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('dosen')->row_array();
	}
	public function tolak_pengajuan($id)
	{
		$this->db->set('status','tolak');
		$this->db->where('id',$id);
		return $this->db->update('pengajuan');

	}
	public function insert_proposal($id)
	{
		$IDProposal = uniqid();
		$data = array(
			'id'			=> $IDProposal,
			'id_pengajuan'	=> $id,
			'last_update'	=> date("Y-m-d H:i:s"),
			'file'			=> $this->_uploadProposal($IDProposal)
		);

		return $this->db->insert('proposal',$data);
	}

	private function _uploadProposal($id)
	{
		$config['upload_path']          = './uploads/proposal/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $id;
        $config['overwrite']			= true;
        $config['max_size']             = 50000;
        
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('proposal')) {
        	$this->session->set_flashdata('proposal_uploaded','Berhasil Mengirim Proposal!');
        	return $this->upload->data("file_name");
        }else{
        	$this->session->set_flashdata('proposal_failed','Gagal Mengirim Proposal!');
        }
        return $id.'.pdf';
	}
	public function is_there_proposal($id){
		$this->db->where('id_pengajuan',$id);
		return $this->db->get('proposal')->row_array();
	}
	public function update_proposal($propID)
	{
		
		$data = array(
			'id_penguji1'	=> NULL,
			'id_penguji2'	=> NULL,
			'id_penguji3'	=> NULL,
			'tgl_seminar'	=> NULL,
			'acc_seminar'	=> NULL,
			'nilai_1'		=> NULL,
			'nilai_2'		=> NULL,
			'nilai_3'		=> NULL,
			'last_update'	=> date("Y-m-d H:i:s"),
			'revisi'		=> NULL,
			'file'			=> $this->_uploadProposal($propID)
		);
		$this->db->where('id',$propID);
		return $this->db->update('proposal',$data);
	}
	public function searchDosenBy($id)
	{
		return $this->db->query("SELECT nama, username FROM dosen WHERE id=$id")->row_array();
	}
	public function getProposalBy($dosen)
	{
		return $this->db->query("SELECT proposal.id as id_proposal, proposal.id_pengajuan as id_pengajuan, proposal.tgl_seminar as tgl_seminar, proposal.id_penguji1 as id_penguji1, proposal.id_penguji2 AS id_penguji2, proposal.id_penguji3 as id_penguji3, proposal.nilai_1 as nilai_1, proposal.nilai_2 as nilai_2, proposal.nilai_3 as nilai_3, mahasiswa.id as id_mahasiswa, mahasiswa.nama as nama_mahasiswa, mahasiswa.username as nim_mahasiswa, prodi.nama as prodi, pengajuan.judul as judul FROM proposal INNER JOIN pengajuan ON pengajuan.id = proposal.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa INNER JOIN prodi ON prodi.sebutan=mahasiswa.prodi WHERE proposal.id_penguji1=$dosen OR proposal.id_penguji2=$dosen OR proposal.id_penguji3=$dosen ORDER BY proposal.last_update DESC")->result_array();
	}
	public function getNilaiProposal($id)
	{
		return $this->db->query("SELECT SUM(nilai_1+nilai_2+nilai_3)/3 AS nilai FROM proposal WHERE id_pengajuan='$id'")->row_array();
	}
	public function getProposalDone()
	{
		return $this->db->query("SELECT id_pengajuan FROM proposal WHERE revisi='tidak' AND nilai_1 IS NOT NULL AND nilai_2 IS NOT NULL AND nilai_3 IS NOT NULL GROUP BY id_pengajuan HAVING SUM(nilai_1+nilai_2+nilai_3)/3 >= 75")->result_array();
	}
	public function checkIsHave()
	{
		$id = $this->session->userdata('id');
		return $this->db->query("SELECT id FROM pengajuan WHERE id_mahasiswa=$id AND status='terima' OR status='belum'")->result_array();
	}	

	public function isHaveKompre($pengajuanID)
	{
		return $this->db->query("SELECT komprehensif.id_pengajuan AS id_pengajuan, komprehensif.status AS status FROM komprehensif WHERE komprehensif.id_pengajuan=$pengajuanID")->row_array();
	}
	public function getKompreMahasiswa()
	{
		$id = $this->session->userdata('id');
		return $this->db->query("SELECT komprehensif.id, komprehensif.id_pengajuan, komprehensif.status, komprehensif.tgl_daftar,komprehensif.tgl_terima,komprehensif.tgl_sidang,komprehensif.id_penguji1,komprehensif.id_penguji2, komprehensif.id_penguji3 FROM komprehensif INNER JOIN pengajuan ON pengajuan.id = komprehensif.id_pengajuan WHERE pengajuan.id_mahasiswa=$id")->row_array();

	}
	public function getthesisMahasiswa()
	{
		$id = $this->session->userdata('id');
		return $this->db->query("SELECT thesis.id, thesis.id_pengajuan, thesis.status, thesis.tgl_daftar,thesis.tgl_terima,thesis.tgl_sidang,thesis.id_penguji1,thesis.id_penguji2, thesis.id_penguji3 FROM thesis INNER JOIN pengajuan ON pengajuan.id = thesis.id_pengajuan WHERE pengajuan.id_mahasiswa=$id")->row_array();

	}
	public function getKompreByDosen()
	{
		$id = $this->session->userdata('id');
		return $this->db->query("SELECT mahasiswa.nama AS nama_mahasiswa, mahasiswa.username AS nim_mahasiswa, mahasiswa.prodi AS prodi, komprehensif.id AS id_komprehensif, komprehensif.status AS status_komprehensif, komprehensif.tgl_daftar AS tgl_daftar, komprehensif.tgl_terima AS tgl_terima, komprehensif.tgl_sidang AS tgl_sidang, komprehensif.id_penguji1 AS id_penguji1, komprehensif.id_penguji2 AS id_penguji2, komprehensif.id_penguji3 AS id_penguji3, pengajuan.judul as judul,komprehensif.nilai_1 as nilai_1, komprehensif.nilai_2 as nilai_2, komprehensif.nilai_3 as nilai_3 FROM komprehensif INNER JOIN pengajuan ON pengajuan.id = komprehensif.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE komprehensif.id_penguji1=$id OR komprehensif.id_penguji2=$id OR komprehensif.id_penguji3=$id  ORDER BY tgl_daftar DESC")->result_array();
	}
	public function nilaiKompre($pengajuanID){
		return $this->db->query("SELECT sum(nilai_1+nilai_2+nilai_3)/3 as nilai FROM komprehensif WHERE id_pengajuan=$pengajuanID")->row_array();
	}
	public function nilaiThesis($pengajuanID){
		return $this->db->query("SELECT sum(nilai_1+nilai_2+nilai_3)/3 as nilai FROM thesis WHERE id_pengajuan=$pengajuanID")->row_array();
	}
	public function isBimbinganDone()
	{
		$mahasiswaID = $this->session->userdata('id');
		return $this->db->query("SELECT mahasiswa.nama AS nama, mahasiswa.username AS nim, mahasiswa.prodi AS prodi, pengajuan.id AS id_pengajuan, pengajuan.judul AS judul FROM pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa WHERE pengajuan.acc_bab_pembimbing1='ya' AND pengajuan.acc_bab_pembimbing2='ya' AND pengajuan.id_mahasiswa = $mahasiswaID")->row_array();
	}
	public function cektesis($pengajuanID)
	{
		$this->db->where('id_pengajuan',$pengajuanID);
		return $this->db->get('thesis')->row_array();
	}
	public function getThesisByDosen()
	{
		$id = $this->session->userdata('id');
		return $this->db->query("SELECT mahasiswa.nama AS nama_mahasiswa, mahasiswa.username AS nim_mahasiswa, mahasiswa.prodi AS prodi, thesis.id AS id_thesis, thesis.status AS status_thesis, thesis.tgl_daftar AS tgl_daftar, thesis.tgl_terima AS tgl_terima, thesis.tgl_sidang AS tgl_sidang, thesis.id_penguji1 AS id_penguji1, thesis.id_penguji2 AS id_penguji2, thesis.id_penguji3 AS id_penguji3, pengajuan.judul as judul,thesis.nilai_1 as nilai_1, thesis.nilai_2 as nilai_2, thesis.nilai_3 as nilai_3 FROM thesis INNER JOIN pengajuan ON pengajuan.id = thesis.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE thesis.id_penguji1=$id OR thesis.id_penguji2=$id OR thesis.id_penguji3=$id  ORDER BY tgl_daftar DESC")->result_array();
	}

}
