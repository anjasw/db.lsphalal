<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AuditorModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
  function login(){
		return $this->db->insert('tbl_mui');
	}
	public function regist($id = false){
		//$this->db->limit(9);
		if ($id)  {
			$this->db->where("id_pendaftaran=$id");
		}
		return $this->db->get('tbl_pendaftaran');
	}
	public function beranda($id = false){
		if ($id)  {
			$this->db->where("no=$id");
		}
		//$this->db->order_by('asesor');

		return $this->db->get('tbl_auditor');
	}
	public function getasesor(){
		$this->db->order_by('no_met');
		return $this->db->get('tbl_asesor');
	}
	public function auditor(){
		return $this->db->get('tbl_auditor');
	}
	public function add_pen_pes($data){
		return $this->db->insert('tbl_pendaftaran', $data);
	}
	public function add_auditor($data){
		return $this->db->insert('tbl_auditor', $data);
	}
	public function add_asesor($data){
		return $this->db->insert('tbl_asesor', $data);
	}
	public function edit_auditor($id,$data){
		return $this->db->update('tbl_auditor', $data, ['no' => $id]);
	}
	public function edit_asesor($id,$data){
		return $this->db->update('tbl_asesor', $data, ['id_asesor' => $id]);
	}
	function edit_pen_pes($id,$data){
		return $this->db->update('tbl_pendaftaran',$data, ['id_pendaftaran' => $id]);
	}
	function delete($id=false){
		if (!$id) return false;
		return $this->db->delete('tbl_pendaftaran', ['id_pendaftaran' => $id]);
	}
	function delete2($id=false){
		if (!$id) return false;
		return $this->db->delete('tbl_mui', ['no' => $id]);
	}
	function hapus($id=false){
		if (!$id) return false;
		return $this->db->delete('tbl_auditor', ['no' => $id]);
	}
	function deleteasesor($id=false){
		if (!$id) return false;
		return $this->db->delete('tbl_asesor', ['id_asesor' => $id]);
	}
	public function dapet($id = false){
		if ($id)  {
			$this->db->where("id_laporan=$id");
		}
		return $this->db->get('tbl_laporan');
	}
	public function tambahdata($data){
		return $this->db->insert('tbl_laporan',$data);
	}
	public function editdata($id,$data){
		return $this->db->update('tbl_laporan',$data, ['id_laporan' => $id]);
	}
}
