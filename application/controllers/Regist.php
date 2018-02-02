<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $cek = $this->session->userdata('loginsess');
		if (!$cek) {
			redirect('login');
		}
		$this->load->model('ProsesModel','pm');
  }

  public function index(){
		$data['tampil'] = $this->pm->regist();
		$this->load->view('pen_pes',$data);
	}
  public function input_pen_pes(){
    //$view['view'] = 'input_pen_pes';
    //$view['view'] = 'edit_pen_pes';
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('metode', 'Metode', 'required');
      $this->form_validation->set_rules('pembayaran', 'Pembayaran', 'required');
      $this->form_validation->set_rules('informasi', 'Informasi', 'required');
      $this->form_validation->set_rules('tindak_lanjut', 'Tindak Lanjut', 'required');

      if ($this->form_validation->run() == TRUE){
        $data['nama'] = $this->input->post('nama');
        $data['perusahaan'] = $this->input->post('perusahaan');
        $data['email'] = $this->input->post('email');
        $data['metode'] = $this->input->post('metode');
        $data['pembayaran'] = $this->input->post('pembayaran');
        $data['informasi'] = $this->input->post('informasi');
        $data['tindak_lanjut'] = $this->input->post('tindak_lanjut');

        if ($this->pm->add_pen_pes($data)) {
          $this->session->set_flashdata('insertstatus', 'true');
        }else $this->session->set_flashdata('insertstatus', 'false');
        redirect('regist');
      }
    }
    $this->load->view('input_pen_pes');
  }
  public function edit_pen_pes($id){
    //$view['view'] = '';
    $view['data'] =  $this->pm->regist($id);
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('metode', 'Metode', 'required');
      $this->form_validation->set_rules('pembayaran', 'Pembayaran', 'required');
      $this->form_validation->set_rules('informasi', 'Informasi', 'required');
      $this->form_validation->set_rules('tindak_lanjut', 'Tindak Lanjut', 'required');

      if ($this->form_validation->run() == TRUE){
        $data['nama'] = $this->input->post('nama');
        $data['perusahaan'] = $this->input->post('perusahaan');
        $data['email'] = $this->input->post('email');
        $data['metode'] = $this->input->post('metode');
        $data['pembayaran'] = $this->input->post('pembayaran');
        $data['informasi'] = $this->input->post('informasi');
        $data['tindak_lanjut'] = $this->input->post('tindak_lanjut');

        if ($this->pm->edit_pen_pes($id,$data)) {
          $this->session->set_flashdata('insertstatus', 'true');
        }else $this->session->set_flashdata('insertstatus', 'false');
        redirect('regist');
      }
    }
    $this->load->view('edit_pen_pes',$view);
  }
  function delete($id){
		if ($this->pm->delete($id)) {
      $this->session->set_flashdata('deletestatus', 'true');
    }else $this->session->set_flashdata('deletestatus', 'false');
      redirect('regist');
	}
}
