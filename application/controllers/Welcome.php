<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$cek = $this->session->userdata('loginsess');
		if (!$cek) {
			redirect('login');
		}
		$this->load->model('ProsesModel','pm');
	}

	public function index(){
		$cek = $this->session->userdata('loginsess');
		if (!$cek) {
			redirect('login');
		}
		$view['view'] = 'selamatdatang';
		$this->load->view('navbar',$view);
	}
	
}
