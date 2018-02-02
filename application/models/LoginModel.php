<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginModel extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
  function login($username,$password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('tbl_user')->row();
	}
}
