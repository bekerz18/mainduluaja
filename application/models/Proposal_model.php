<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposal_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function getAll()
	{
		return $this->db->query("SELECT proposal.id as id_proposal,proposal.revisi as status_proposal,proposal.last_update as last_update, mahasiswa.nama as nama_mahasiswa, mahasiswa.username as nim_mahasiswa, mahasiswa.prodi as prodi,proposal.tgl_seminar as seminar, pengajuan.judul as judul_proposal,proposal.id_penguji1 as penguji1, proposal.id_penguji2 as penguji2, proposal.id_penguji3 as penguji3, (proposal.nilai_1+proposal.nilai_2+proposal.nilai_3)/3 AS nilai  FROM proposal INNER JOIN pengajuan ON pengajuan.id=proposal.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa ORDER BY proposal.id DESC")->result_array();
	}
	public function getByIdJson($id)
	{
		return $this->db->query("SELECT proposal.id as id_proposal,proposal.revisi as status_proposal,proposal.last_update as last_update, proposal.tgl_seminar as tglseminar, proposal.acc_seminar as acc_seminar, proposal.id_penguji1 as penguji1, proposal.id_penguji2 as penguji2,proposal.id_penguji3 as penguji3, proposal.nilai_1 as nilai1, proposal.nilai_2 as nilai2, proposal.nilai_3 as nilai3, mahasiswa.nama as nama_mahasiswa, mahasiswa.username as nim_mahasiswa, mahasiswa.prodi as prodi, pengajuan.judul as judul_proposal FROM proposal INNER JOIN pengajuan ON pengajuan.id=proposal.id_pengajuan INNER JOIN mahasiswa ON mahasiswa.id=pengajuan.id_mahasiswa WHERE proposal.id='$id'")->result_array();
	}
	public function getDosenBy($prodi)
	{
		return $this->db->query("SELECT prodi_detail.id_dosen, dosen.nama FROM prodi_detail INNER JOIN dosen ON dosen.id=prodi_detail.id_dosen WHERE prodi_detail.id_prodi=$prodi ORDER BY dosen.nama ASC")->result_array();
	}
	public function updateProposal($id,$data)
	{
		$this->db->where('id',$id);
		return $this->db->update('proposal',$data);
	}
	
	public function updateNilaiProposal($id,$kelompok,$nilai)
	{
		$this->db->set($kelompok, (int)$nilai);
		$this->db->where('id', $id);
		return $this->db->update('proposal');
	}
	public function deleteProposalby($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('proposal');
	}
	public function getDosen($id)
	{
		$this->db->where('id',$id);
		$this->db->select('nama');
		return $this->db->get('dosen')->row_array();
	}
	
}
