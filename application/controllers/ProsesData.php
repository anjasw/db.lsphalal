<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProsesData extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('ProsesModel','pm');
	}
	public function index(){
		$this->load->view('input_data');
	}
}
