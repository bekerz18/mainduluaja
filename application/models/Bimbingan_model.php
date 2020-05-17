<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bimbingan_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function getBimbinganAdmin($pembimbing)
	{
		return $this->db->query("SELECT bimbingan.id as id_bimbingan, bimbingan.bab as bab, bimbingan.status as status,bimbingan.tgl_acc as tgl_acc, bimbingan.id_pengajuan as id_pengajuan, mahasiswa.nama as nama_mahasiswa, mahasiswa.username as nim_mahasiswa,pengajuan.id_pembimbing1,pengajuan.id_pembimbing2, mahasiswa.prodi as prodi,pengajuan.judul as judul FROM bimbingan INNER JOIN pengajuan ON pengajuan.id = bimbingan.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE bimbingan.pembimbing='$pembimbing' order by bimbingan.status desc")->result_array();
	}
	public function getBimbinganAdminCetak($pembimbing,$FirstDate,$LastDate)
	{
		return $this->db->query("SELECT bimbingan.id as id_bimbingan, bimbingan.bab as bab, bimbingan.status as status,bimbingan.tgl_acc as tgl_acc, bimbingan.id_pengajuan as id_pengajuan, mahasiswa.nama as nama_mahasiswa, mahasiswa.username as nim_mahasiswa,pengajuan.id_pembimbing1,pengajuan.id_pembimbing2, mahasiswa.prodi as prodi,pengajuan.judul as judul FROM bimbingan INNER JOIN pengajuan ON pengajuan.id = bimbingan.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE bimbingan.pembimbing='$pembimbing' AND bimbingan.tgl_acc BETWEEN '$FirstDate' AND '$LastDate' order by bimbingan.status desc")->result_array();
	}
	public function getDosen($bimbingan,$idpengajuan)
	{
		if($bimbingan == 1){
			$pembimbing = 'id_pembimbing1';
		}else{
			$pembimbing = 'id_pembimbing2';
		}

		return $this->db->query("SELECT dosen.nama FROM pengajuan INNER JOIN dosen ON dosen.id=pengajuan.$pembimbing WHERE pengajuan.id=$idpengajuan")->row_array();
	}
	public function getBimbinganDosen($pembimbing,$dosen)
	{
		return $this->db->query("SELECT bimbingan.id as id_bimbingan, bimbingan.bab as bab, bimbingan.status as status,bimbingan.tgl_acc as tgl_acc, bimbingan.id_pengajuan as id_pengajuan, mahasiswa.nama as nama_mahasiswa, mahasiswa.username as nim_mahasiswa, mahasiswa.prodi as prodi,pengajuan.judul as judul FROM bimbingan INNER JOIN pengajuan ON pengajuan.id = bimbingan.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE bimbingan.pembimbing='$pembimbing' AND pengajuan.id_pembimbing1=$dosen order by bimbingan.status asc")->result_array();
	}
	public function getBimbinganDosen2($pembimbing,$dosen)
	{
		return $this->db->query("SELECT bimbingan.id as id_bimbingan, bimbingan.bab as bab, bimbingan.status as status,bimbingan.tgl_acc as tgl_acc,  bimbingan.id_pengajuan as id_pengajuan, mahasiswa.nama as nama_mahasiswa, mahasiswa.username as nim_mahasiswa, mahasiswa.prodi as prodi,pengajuan.judul as judul FROM bimbingan INNER JOIN pengajuan ON pengajuan.id = bimbingan.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE bimbingan.pembimbing='$pembimbing' AND pengajuan.id_pembimbing2=$dosen order by bimbingan.status asc")->result_array();
	}
	public function getBimbinganMahasiswa($pembimbing,$mahasiswa)
	{
		return $this->db->query("SELECT bimbingan.id as id_bimbingan, bimbingan.pembimbing as pembimbing, bimbingan.bab as bab, bimbingan.status as status,bimbingan.tgl_acc as tgl_acc FROM bimbingan INNER JOIN pengajuan ON pengajuan.id = bimbingan.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE bimbingan.pembimbing='$pembimbing'AND pengajuan.id_mahasiswa=$mahasiswa order by bimbingan.bab desc")->result_array();
	}
	public function checkBimbingan($bimbingan,$mahasiswa)
	{
		return $this->db->query("SELECT bimbingan.bab AS bab, bimbingan.status AS status FROM bimbingan INNER JOIN pengajuan ON pengajuan.id=bimbingan.id_pengajuan WHERE bimbingan.pembimbing='$bimbingan' AND pengajuan.id_mahasiswa=$mahasiswa")->result_array();
	}
	public function addBimbingan($data)
	{
		return $this->db->insert('bimbingan',$data);
	}
	public function getProposalDone($id)
	{
		return $this->db->query("SELECT proposal.id_pengajuan AS id_pengajuan FROM proposal INNER JOIN pengajuan ON pengajuan.id=proposal.id_pengajuan WHERE pengajuan.id_mahasiswa=$id AND proposal.revisi='tidak' AND nilai_1 IS NOT NULL AND nilai_2 IS NOT NULL AND nilai_3 IS NOT NULL GROUP BY proposal.id_pengajuan  HAVING SUM(nilai_1+nilai_2+nilai_3)/3 >= 75")->row_array();
	}
	public function insertBimDetail()
	{
		$NewID = uniqid();
		$data = array(
			'id'	=> $NewID,
			'id_bimbingan' => $this->uri->segment(4),
			'file'	=> $this->_uploadFile($NewID),
			'tanggal' => date("Y-m-d H:i:s"),
			'deskripsi' => $this->input->post('deskripsi'),
			'id_pengguna' => $this->session->userdata('id'),
			'level' => $this->session->userdata('level')
		);

		return $this->db->insert('bimbingan_detail',$data);
	}

	private function _uploadFile($id)
	{
		$config['upload_path']          = './uploads/bimbingan/';
        $config['allowed_types']        = 'pdf';
        $config['encrypt_name']			= true;
        $config['file_name']            = $id;
        $config['overwrite']			= true;
        
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
        	$this->session->set_flashdata('file_uploaded','Berhasil Mengirim Proposal!');
        	return $this->upload->data("file_name");
        }
        return NULL;
	}

	public function getBimbinganDetail($id)
	{
		return $this->db->query("SELECT bimbingan_detail.tanggal AS tanggal, bimbingan_detail.id AS id_bimbingan_detail,bimbingan_detail.file AS file, bimbingan_detail.deskripsi AS deskripsi,bimbingan_detail.id_pengguna AS id_pengguna, bimbingan_detail.level AS level FROM bimbingan_detail WHERE bimbingan_detail.id_bimbingan='$id' ORDER BY bimbingan_detail.tanggal DESC")->result_array();
	}
	public function findUsersInConvers($level,$id)
	{
		if($level == 2){
			$table = 'mahasiswa';
		}elseif ($level == 1) {
			$table = 'dosen';
		}

		$this->db->where('id',$id);
		$this->db->select('nama');
		return $this->db->get($table)->row_array();
	}

	public function getDetailsPengajuan($bimbingan)
	{
		return $this->db->query("SELECT mahasiswa.username AS nim_mahasiswa, mahasiswa.nama AS nama_mahasiswa, mahasiswa.prodi AS prodi,pengajuan.id as id_pengajuan, pengajuan.judul AS judul, pengajuan.latarbelakang AS latarbelakang, pengajuan.tujuan AS tujuan, proposal.file AS proposal FROM bimbingan INNER JOIN pengajuan ON pengajuan.id = bimbingan.id_pengajuan INNER JOIN proposal ON proposal.id_pengajuan=pengajuan.id INNER JOIN mahasiswa ON mahasiswa.id = pengajuan.id_mahasiswa WHERE bimbingan.id='$bimbingan'")->row_array();
	}
	public function accBimbingan($id)
	{
		$this->db->where('id',$id);
		$this->db->set('status','sudah');
		$this->db->set('tgl_acc',date("Y-m-d H:i:s"));
		return $this->db->update('bimbingan');
	}
	public function completeBimbingans()
	{
		return $this->db->query("SELECT id_pengajuan FROM bimbingan WHERE bab='4' AND status='sudah' AND pembimbing='1' OR pembimbing='2' GROUP BY id_pengajuan")->result_array();
	}
	
	public function delete($id)
	{
		
		if($this->_deleteDetail($id) == 'berhasil'){
			$this->db->where('id',$id);
			return $this->db->delete('bimbingan');
		}

		return $this->db->delete('bimbingan');
		
		
	}

	private function _deleteDetail($id)
	{
		$this->db->where('id_bimbingan',$id);
		if($this->db->delete('bimbingan_detail')){
			return 'berhasil';
		}
		return 'gagal';
	}

	public function CheckIsByMahasiswa($pembimbing){
		$mahasiswa = $this->session->userdata('id');
		if($pembimbing == '1'){
			$this->db->where('acc_bab_pembimbing1','ya');
		}elseif($pembimbing == '2'){
			$this->db->where('acc_bab_pembimbing2','ya');
		}
		$this->db->where('id_mahasiswa',$mahasiswa);
		return $this->db->get('pengajuan')->row_array();
		
	}
	public function checkBimbingan4($pembimbing){
		$mahasiswa = $this->session->userdata('id');
		return $this->db->query("SELECT bimbingan.bab, bimbingan.status FROM bimbingan INNER JOIN pengajuan ON pengajuan.id=bimbingan.id_pengajuan WHERE pengajuan.id_mahasiswa=$mahasiswa AND pengajuan.status='terima' AND bimbingan.bab='4' AND bimbingan.pembimbing='$pembimbing'")->row_array();
	}
	public function isChatDone($id){
		$this->db->where('id',$id);
		return $this->db->get('bimbingan')->row_array();
	}
	public function CheckIsByGeneral($id){
		
		$this->db->where('id',$id);
		$this->db->where('acc_bab_pembimbing1','ya');
		$this->db->where('acc_bab_pembimbing2','ya');
		return $this->db->get('pengajuan')->row_array();
	}
	public function get_info_bimbingan2($PengajuanID,$bab)
	{
		return $this->db->query("SELECT bimbingan.status, bimbingan.tgl_acc FROM bimbingan WHERE bimbingan.id_pengajuan=$PengajuanID AND bimbingan.pembimbing='2' AND bimbingan.bab='$bab'")->row_array();
	}
	public function get_info_bimbingan1($PengajuanID,$bab)
	{
		return $this->db->query("SELECT bimbingan.status, bimbingan.tgl_acc FROM bimbingan WHERE bimbingan.id_pengajuan=$PengajuanID AND bimbingan.pembimbing='1' AND bimbingan.bab='$bab'")->row_array();
	}
	public function getNameDosen($DosenID)
	{
		return $this->db->query("SELECT nama FROM dosen WHERE id=$DosenID")->row_array();
	}
	public function getBabBimbinganOther($IDBimbingan,$pembimbing){
		return $this->db->query("SELECT bimbingan.bab FROM bimbingan WHERE bimbingan.id='$IDBimbingan' AND bimbingan.pembimbing='$pembimbing'")->row_array();
	}
	public function getIDBimbinganOther($bab,$pembimbing)
	{
		return $this->db->query("SELECT bimbingan.id, bimbingan.status FROM bimbingan WHERE bimbingan.bab='$bab' AND bimbingan.pembimbing <> '$pembimbing'")->row_array();
	}
	public function getPengajuan()
	{
		$id = $this->session->userdata('id');

		return $this->db->query("SELECT pengajuan.id,pengajuan.tglpengajuan,pengajuan.tglditerima FROM pengajuan WHERE id_mahasiswa=$id AND pengajuan.status='terima'")->row_array();
	}
	public function getProposal($id)
	{
		$this->db->where('id_pengajuan',$id);
		return $this->db->get('proposal')->row_array();
	}
	public function getKompre($id)
	{
		$this->db->where('id_pengajuan',$id);
		return $this->db->get('komprehensif')->row_array();
	}
	public function getRiwayatBimbinganDetail($id)
	{
		return $this->db->query("SELECT bimbingan_detail.id_bimbingan, bimbingan.pembimbing,bimbingan.bab,bimbingan_detail.tanggal FROM bimbingan INNER JOIN bimbingan_detail ON bimbingan_detail.id_bimbingan=bimbingan.id WHERE bimbingan.id_pengajuan=$id ORDER BY bimbingan_detail.tanggal ASC")->result_array();
	}
	public function getBimAcc($id)
	{
		return $this->db->query("SELECT bimbingan.tgl_acc,bimbingan.bab,bimbingan.pembimbing FROM bimbingan WHERE bimbingan.status='sudah' AND bimbingan.id='$id'")->row_array();
	}
	public function getThesis($id)
	{
		$this->db->where('id_pengajuan',$id);
		return $this->db->get('thesis')->row_array();
	}
}
