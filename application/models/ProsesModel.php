<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ProsesModel extends CI_Model {

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











	public function beranda($id = false, $offset = -1 , $q = '', $field = '', $tahun =''){
		if ($tahun == 2017) {
			$this->db->where("batch >= 1 AND batch <= 34");
		}elseif($tahun > 2017){
			$this->db->where("batch > 34");
		}else{
			if ($id)  {
				$this->db->where("no=$id");
			}
		if ($q != '') {
			if ($field == 'batch') {
				$this->db->where("$field = $q");
			}else{

				$this->db->where("$field LIKE '%$q%'");
			}
			$offset = 0;
		}else{
			$this->db->order_by('no','asc	');
		}
		if ($offset != -1) {
			$this->db->limit(10, $offset);
		}else{
			$this->db->order_by('no','asc');
		}
	}
		//$this->db->order_by('asesor');

		return $this->db->get('tbl_mui');
	}
























	public function getasesor(){
		$this->db->order_by('no_met');
		return $this->db->get('tbl_asesor');
	}
	public function auditor(){
		return $this->db->get('tbl_auditor');
	}
	public function juru_sembelih_halal(){
		return $this->db->get('tbl_penyembelih');
	}
	public function add_pen_pes($data){
		return $this->db->insert('tbl_pendaftaran', $data);
	}
	public function add_penyelia($data){
		return $this->db->insert('tbl_mui', $data);
	}
	public function add_asesor($data){
		return $this->db->insert('tbl_asesor', $data);
	}
	public function edit_penyelia($id,$data){
		return $this->db->update('tbl_mui', $data, ['no' => $id]);
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
		return $this->db->delete('tbl_laporan', ['id_laporan' => $id]);
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
