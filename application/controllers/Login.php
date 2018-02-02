<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel','lm');
	}

	public function index(){
		$view['msg']='';
		$ceksess = $this->session->userdata('loginsess');
		if ($ceksess)
			redirect('welcome');

		if($_SERVER['REQUEST_METHOD']==='POST'){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == TRUE)
                {
                	$username = $this->input->post('username');
                	$password = $this->input->post('password');
                	$user = $this->lm->login($username, $password);
                	if ($user) {
                		$session['username'] = $user->username;
						$this->session->set_userdata('loginsess',$session);
						redirect('welcome');
                	}else{
                		$view['msg'] = '<div class="error">Gagal login..<br>Cek kembali username dan passwordnya ..</div><hr>';
                	}
                }
		}
		$this->load->view('index',$view);
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}
