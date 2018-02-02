<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PenyembelihModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
  function login(){
		return $this->db->insert('tbl_mui');
		$this->db->select_max('age');
$query = $this->db->get('members');  // Produces: SELECT MAX(age) as age FROM members

$this->db->select_max('age', 'member_age');
$query = $this->db->get('members'); // Produces: SELECT MAX(age) as member_age FROM members
	}
	public function getasesor(){
		$this->db->order_by('no_met');
		return $this->db->get('tbl_asesor');
	}
	public function index($id = false){
		if ($id)  {
			$this->db->where("no=$id");
		}
		return $this->db->get('tbl_penyembelih');
	}
	public function tambah($data){
		return $this->db->insert('tbl_penyembelih', $data);
	}
	public function edit($id, $data){
		return $this->db->update('tbl_penyembelih' , $data , ['no' => $id]);
	}
	public function add_asesor($data){
		return $this->db->insert('tbl_asesor', $data);
	}
	public function edit_asesor($id,$data){
		return $this->db->update('tbl_asesor', $data, ['id_asesor' => $id]);
	}
	function hapus($id=false){
		if (!$id) return false;
		return $this->db->delete('tbl_penyembelih', ['no' => $id]);
	}
	function deleteasesor($id=false){
		if (!$id) return false;
		return $this->db->delete('tbl_asesor', ['id_asesor' => $id]);
	}
}
