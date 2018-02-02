<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asesor extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $cek = $this->session->userdata('loginsess');
    if (!$cek) {
      redirect('login');
    }
    $this->load->model('ProsesModel','pm');
    //Codeigniter : Write Less Do More
  }

  public function index(){
    $view['a'] = $this->pm->getasesor();
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $this->form_validation->set_rules('asesor', 'Nama Assesor', 'required');
      //$this->form_validation->set_rules('no_sk', 'No SK', 'required');
      //$this->form_validation->set_rules('no_met', 'No MET', 'required');
      //$this->form_validation->set_rules('kompetensi', 'Keahlian', 'required');

      if ($this->form_validation->run() == TRUE){
        $data['asesor'] = $this->input->post('asesor');
        $data['no_sk'] = $this->input->post('no_sk');
        $data['no_met'] = $this->input->post('no_met');
        $data['kompetensi'] = $this->input->post('kompetensi');
        if ($this->pm->add_asesor($data)) {
          $this->session->set_flashdata('insertstatus', 'true');
        }else $this->session->set_flashdata('insertstatus', 'false');
        redirect('asesor');
      }
    }
    $this->load->view('input_assessor', $view);
  }
  public function delete($id){
    if ($this->pm->deleteasesor($id)) {
      $this->session->set_flashdata('deletestatus', 'true');
    }else $this->session->set_flashdata('deletestatus', 'false');
      redirect('asesor');
  }
  public function edit($id){
    $view['a'] = $this->pm->getasesor($id);
    //$view['view'] = '';
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $this->form_validation->set_rules('asesor', 'Nama Assesor', 'required');
      //$this->form_validation->set_rules('no_sk', 'No SK', 'required');
      //$this->form_validation->set_rules('no_met', 'No MET', 'required');
      //$this->form_validation->set_rules('kompetensi', 'Keahlian', 'required');

      if ($this->form_validation->run() == TRUE){
        $data['asesor'] = $this->input->post('asesor');
        $data['no_sk'] = $this->input->post('no_sk');
        $data['no_met'] = $this->input->post('no_met');
        $data['kompetensi'] = $this->input->post('kompetensi');
        if ($this->pm->edit_asesor($id,$data)) {
          $this->session->set_flashdata('insertstatus', 'true');
        }else $this->session->set_flashdata('insertstatus', 'false');
        redirect('asesor');
      }
    }

    $this->load->view('edit_assessor', $view);
  }

}
