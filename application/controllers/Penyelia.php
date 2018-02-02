<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyelia extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('pagination');
    $cek = $this->session->userdata('loginsess');
    if (!$cek) {
      redirect('login');
    }
    $this->load->model('ProsesModel','pm');
  }

  public function index($offset = 0){
    $q = $this->input->get('q');
		$field = $this->input->get('field');
    $tahun = $this->input->get('tahun_asesmen');

		$view['data'] = $this->pm->beranda(false, $offset, $q, $field, $tahun);
    $penyelia = $this->pm->beranda(false, -1, $q, $field);
		$config['base_url'] = base_url().'penyelia/index';
		$config['total_rows'] =$penyelia->num_rows();
		$config['per_page'] = 10;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$config['cur_tag_close'] = '</a></li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['anchor_class'] = 'class="waves-effect"';
		$view['pagging'] =$this->pagination->initialize($config);
		$this->load->view('beranda',$view);
	}

  public function input_data(){
    $this->db->order_by('asesor');
    $view['a'] = $this->db->get('tbl_asesor');
    $this->db->select('no_serti');
    $this->db->order_by('no_serti', 'desc');
    $last_kode = $this->db->get('tbl_mui', 1, 0)->result_array();
    if ($last_kode) {
      $kode = substr($last_kode[0]['no_serti'], -12, 7);
      $deco = $kode + 1;
      $view['kode_otomatis'] = 'No. 74909 1321 '. sprintf('%07d', $deco) . ' 2017';
    }else{
      $view['kode_otomatis'] = "00000000000000001";
    }


    $this->db->select('no_reg_ser');
    $this->db->order_by('no_reg_ser', 'desc');
    $last_kode = $this->db->get('tbl_mui', 1, 0)->result_array();
    if ($last_kode) {
      $kode = substr($last_kode[0]['no_reg_ser'], -12, 7);
      $deco = $kode + 1;
      $view['hk'] = 'No. Reg. AHI.664.74909 1321 '. sprintf('%06d', $deco) . ' 2017';
    }else{
      $view['hk'] = "00000000000000001";
    }

    $this->db->select('no_ser_ser');
    $this->db->order_by('no_ser_ser', 'desc');
    $last_code = $this->db->get('tbl_mui', 1, 0)->result_array();
    if ($last_kode) {
      $deko = substr($last_code[0]['no_ser_ser'], -12, 7);
      $code = $deko + 1;
      $view['hasilkode'] = sprintf('%06d', $code);
    }else{
      $view['hasilkode'] = "3";
    }
    $view['hasil'] = $this->db->query("SELECT max(IF(no_ber_ac != 'Sertifikat Ada', no_ber_ac, null)) as maxnoberac FROM tbl_mui");

    if($_SERVER['REQUEST_METHOD']==='POST'){
      $this->form_validation->set_rules('batch', 'Batch', 'required');
      //$this->form_validation->set_rules('email', 'E-mail', 'required');
      //$this->form_validation->set_rules('no_hp', 'No HP', 'required');
      //$this->form_validation->set_rules('tgl_asesmen', 'Tanggal Assesmen', 'required');
      //$this->form_validation->set_rules('tgl_rpt_kmt_tkns', 'Tanggal Rapat Komite TKNS', 'required');
      //$this->form_validation->set_rules('keterangan', 'Informasi', 'required');
      //$this->form_validation->set_rules('tgl_pen_ser', 'Certificate Issuance Date', 'required');
      //$this->form_validation->set_rules('tanggal', 'Certificate Submission Date', 'required');
      //$this->form_validation->set_rules('catatan', 'Catatan', 'required');
      $this->form_validation->set_rules('asesi', 'Asesi', 'required');
      //$this->form_validation->set_rules('thn_lap', 'Tahun Lap', 'required');
      //$this->form_validation->set_rules('no_ber_ac', 'BA Number', 'required');
      if ($this->form_validation->run() == TRUE){
        $data['batch'] = $this->input->post('batch');
        $data['email'] = $this->input->post('email');
        $data['no_hp'] = $this->input->post('no_hp');
        $data['tgl_asesmen'] = $this->input->post('tgl_asesmen');
        $data['tgl_rpt_kmt_tkns'] = $this->input->post('tgl_rpt_kmt_tkns');
        $data['keterangan'] = $this->input->post('keterangan');
        $data['tanggal'] = $this->input->post('tanggal');
        //$data['catatan'] = $this->input->post('catatan');
        $data['assesor'] = $this->input->post('assesor');
        $data['asesi'] = $this->input->post('asesi');
        $data['jk'] = $this->input->post('jk');
        $data['uji_lanjut'] = $this->input->post('uji_lanjut');
        $data['kom_tek_1'] = $this->input->post('kom_tek_1');
        $data['kom_tek_2'] = $this->input->post('kom_tek_2');
        $data['kom_tek_3'] = $this->input->post('kom_tek_3');
        $data['keputusan'] = $this->input->post('keputusan');
        $data['no_serti'] = $this->input->post('no_serti');
        $data['no_ser_ser'] = $this->input->post('no_ser_ser');
        $data['no_reg_ser'] = $this->input->post('no_reg_ser');
        $data['no_ber_ac'] = $this->input->post('no_ber_ac');
        $data['provinsi'] = $this->input->post('provinsi');
        $data['thn_lap'] = $this->input->post('thn_lap');
        $data['tgl_pen_ser'] = $this->input->post('tgl_pen_ser');

        if ($this->pm->add_penyelia($data)) {
          $this->session->set_flashdata('insertstatus', 'true');
        }else $this->session->set_flashdata('insertstatus', 'false');
        redirect('penyelia');
      }
    }
    $this->load->view('input_data', $view);
  }
  function detail($id){
    $view['view'] = 'form_detail';
    $view['data'] = $this->pm->beranda($id);
    if ($view['data']->num_rows()==0) {
			redirect('penyelia');
		}
    $this->load->view('navbar',$view);
  }
  function edit($id){
    $this->db->order_by('asesor');
    $view['a'] = $this->db->get('tbl_asesor');
    $this->db->select('no_serti');
    $this->db->order_by('no_serti', 'desc');
    $last_kode = $this->db->get('tbl_mui', 1, 0)->result_array();
    if ($last_kode) {
      $kode = substr($last_kode[0]['no_serti'], -12, 7);
      $deco = $kode + 1;
      $view['kode_otomatis'] = 'No. 74909 1321 '. sprintf('%07d', $deco) . ' 2017';
    }else{
      $view['kode_otomatis'] = "00000000000000001";
    }
    $this->db->select('no_reg_ser');
    $this->db->order_by('no_reg_ser', 'desc');
    $last_kode = $this->db->get('tbl_mui', 1, 0)->result_array();
    if ($last_kode) {
      $kode = substr($last_kode[0]['no_reg_ser'], -12, 7);
      $deco = $kode + 1;
      $view['hk'] = 'No. Reg. AHI.664.74909 1321 '. sprintf('%06d', $deco) . ' 2017';
    }else{
      $view['hk'] = "00000000000000001";
    }
    $this->db->select('no_ser_ser');
    $this->db->order_by('no_ser_ser', 'desc');
    $last_code = $this->db->get('tbl_mui', 1, 0)->result_array();
    if ($last_kode) {
      $deko = substr($last_code[0]['no_ser_ser'], -12, 7);
      $code = $deko + 1;
      $view['hasilkode'] = sprintf('%06d', $code);
    }else{
      $view['hasilkode'] = "3";
    }
    $view['hasil'] = $this->db->query("SELECT max(IF(no_ber_ac != 'Sertifikat Ada', no_ber_ac, null)) as maxnoberac FROM tbl_mui");
    $view['data'] = $this->pm->beranda($id);

    if($_SERVER['REQUEST_METHOD']==='POST'){
      $this->form_validation->set_rules('batch', 'Batch', 'required');
      //$this->form_validation->set_rules('email', 'E-mail', 'required');
      //$this->form_validation->set_rules('no_hp', 'No HP', 'required');
      //$this->form_validation->set_rules('tgl_asesmen', 'Tanggal Assesmen', 'required');
      //$this->form_validation->set_rules('tgl_rpt_kmt_tkns', 'Tanggal Rapat Komite TKNS', 'required');
      //$this->form_validation->set_rules('keterangan', 'Informasi', 'required');
      //$this->form_validation->set_rules('tgl_pen_ser', 'Certificate Issuance Date', 'required');
      //$this->form_validation->set_rules('tanggal', 'Certificate Submission Date', 'required');
      //$this->form_validation->set_rules('catatan', 'Catatan', 'required');
      $this->form_validation->set_rules('asesi', 'Asesi', 'required');
      //$this->form_validation->set_rules('thn_lap', 'Tahun Lap', 'required');
      //$this->form_validation->set_rules('no_ber_ac', 'BA Number', 'required');
      if ($this->form_validation->run() == TRUE){
        $data['batch'] = $this->input->post('batch');
        $data['email'] = $this->input->post('email');
        $data['no_hp'] = $this->input->post('no_hp');
        $data['tgl_asesmen'] = $this->input->post('tgl_asesmen');
        $data['tgl_rpt_kmt_tkns'] = $this->input->post('tgl_rpt_kmt_tkns');
        $data['keterangan'] = $this->input->post('keterangan');
        $data['tanggal'] = $this->input->post('tanggal');
        //$data['catatan'] = $this->input->post('catatan');
        $data['assesor'] = $this->input->post('assesor');
        $data['asesi'] = $this->input->post('asesi');
        $data['jk'] = $this->input->post('jk');
        $data['uji_lanjut'] = $this->input->post('uji_lanjut');
        $data['kom_tek_1'] = $this->input->post('kom_tek_1');
        $data['kom_tek_2'] = $this->input->post('kom_tek_2');
        $data['kom_tek_3'] = $this->input->post('kom_tek_3');
        $data['keputusan'] = $this->input->post('keputusan');
        $data['no_serti'] = $this->input->post('no_serti');
        $data['no_ser_ser'] = $this->input->post('no_ser_ser');
        $data['no_reg_ser'] = $this->input->post('no_reg_ser');
        $data['no_ber_ac'] = $this->input->post('no_ber_ac');
        $data['provinsi'] = $this->input->post('provinsi');
        $data['thn_lap'] = $this->input->post('thn_lap');
        $data['tgl_pen_ser'] = $this->input->post('tgl_pen_ser');

        if ($this->pm->edit_penyelia($id,$data)) {
          $this->session->set_flashdata('insertstatus', 'true');
        }else $this->session->set_flashdata('insertstatus', 'false');
        redirect('penyelia');
      }
    }
    $this->load->view('edit_data',$view);
  }
  function delete($id){
		if ($this->pm->delete2($id)) {
      $this->session->set_flashdata('deletestatus', 'true');
    }else $this->session->set_flashdata('deletestatus', 'false');
      redirect('penyelia');
	}

  public function print_out($id){
    $view['r'] = $this->db->get('tbl_laporan');
    $view['data'] = $this->pm->beranda($id);
    $this->load->view('pdflsp',$view);
  }
  public function lap_penyeliahalal(){
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $tahun = $this->input->post('tahun');
      $view['sql']  = $this->db->query("SELECT  COUNT(IF( YEAR(tgl_asesmen) = '$tahun', tgl_asesmen, NULL) ) AS belumkompeten FROM tbl_mui WHERE keputusan = 'Belum Kompeten'")->result();
      $view['sql1'] = $this->db->query("SELECT  COUNT(IF( YEAR(tgl_asesmen) = '$tahun', tgl_asesmen, NULL) ) AS kompeten FROM tbl_mui WHERE keputusan = 'Kompeten'")->result();
      $view['sql2'] = $this->db->query("SELECT  COUNT(IF( YEAR(tgl_asesmen) = '$tahun', tgl_asesmen, NULL) ) AS sertifikat FROM tbl_mui WHERE no_ber_ac != ''")->result();
      $view['sql3'] = $this->db->query("SELECT  COUNT(asesi) AS asesitahun2017 FROM tbl_mui  WHERE  date_format(tgl_asesmen,'%Y')='$tahun'")->result();

    }
    $view['totpesa'] = $this->db->query("SELECT count(asesi) as totalpesertaa from tbl_mui")->result();
    $view['kombe'] = $this->db->query("SELECT count(IF(keputusan != 'Belum Kompeten', keputusan, null)) as kompeten, count(IF(keputusan != 'Kompeten', keputusan, null)) as belumkompeten FROM tbl_mui")->result();
    $view['belum'] = $this->db->query("SELECT  COUNT(IF( YEAR(tgl_asesmen) = '2017', tgl_asesmen, NULL) ) AS sertifikat FROM tbl_mui WHERE no_ber_ac != ''")->result();
    $view['hasil'] = $this->db->query("SELECT count(IF(keputusan != 'Belum Kompeten', keputusan, null)) as kompeten, count(IF(keputusan != 'Kompeten', keputusan, null)) as belumkompeten FROM tbl_mui")->result();
    $view['r'] = $this->db->query("SELECT count(asesi) as totalpeserta from tbl_mui")->result();
    $view['jumser'] = $this->db->query("SELECT count(IF(no_ber_ac != '', keputusan, null)) as jumlahsertifikat FROM tbl_mui")->result();
    $this->load->view('lap_penyeliahalal', $view);
  }
  public function headerLaporan(){
    $view['data'] = $this->pm->dapet();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $this->form_validation->set_rules('no_dokumen', 'No Dokumen', 'max_length[10]');
        $this->form_validation->set_rules('ed_Revisi', 'Edisi Rvisi', 'max_length[5]');
        //$this->form_validation->set_rules('tgl_berlaku', '', 'required');
        $this->form_validation->set_rules('halaman', 'Halaman', 'max_length[10]');
      if ($this->form_validation->run() == TRUE){
        $data['no_dokumen'] = $this->input->post('no_dokumen');
        $data['ed_Revisi'] = $this->input->post('ed_Revisi');
        $data['tgl_berlaku'] = $this->input->post('tgl_berlaku');
        $data['halaman'] = $this->input->post('halaman');
        if ($this->pm->tambahdata($data)) {
          $this->session->set_flashdata('insertstatus', 'true');
        }else $this->session->set_flashdata('insertstatus', 'false');
        redirect('penyelia/headerLaporan');
      }
    }
    $this->load->view('headerLaporan',$view);
  }
  public function eddit($id){
    $view['data'] = $this->pm->dapet($id);
    $view['for'] = $this->pm->dapet();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $this->form_validation->set_rules('no_dokumen', 'No Dokumen', 'max_length[10]');
        $this->form_validation->set_rules('ed_Revisi', 'Edisi Rvisi', 'max_length[5]');
        //$this->form_validation->set_rules('tgl_berlaku', '', 'required');
        $this->form_validation->set_rules('halaman', 'Halaman', 'max_length[10]');
      if ($this->form_validation->run() == TRUE){
        $data['no_dokumen'] = $this->input->post('no_dokumen');
        $data['ed_Revisi'] = $this->input->post('ed_Revisi');
        $data['tgl_berlaku'] = $this->input->post('tgl_berlaku');
        $data['halaman'] = $this->input->post('halaman');
        if ($this->pm->editdata($id,$data)) {
          $this->session->set_flashdata('insertstatus', 'true');
        }else $this->session->set_flashdata('insertstatus', 'false');
        redirect('penyelia/headerLaporan');
      }
    }
    $this->load->view('editLaporan',$view);
  }
  public function hapus($id){
    if ($this->pm->hapus($id)) {
      $this->session->set_flashdata('deletestatus', 'true');
    }else $this->session->set_flashdata('deletestatus', 'false');
      redirect('penyelia/headerLaporan');
  }
  public function export(){
    $view['data'] = $this->pm->beranda();

    $this->load->view('export.php',$view);
  }
  function excel(){
		$this->load->library('PHPExcel/PHPExcel');
		$excel = new PHPExcel();
		$excel->getProperties()
			->setCreator('MUI')
			->setLastModifiedBy('MUI')
			->setTitle("Data Penyelia Halal")
			->setSubject("Penyelia Halal")
			->setDescription("Data Penyelia Halal ")
			->setKeywords("Data Penyelia Halal");
		$style_col = array(
			'font' => array('bold' => true),
			'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);
		$excel->getActiveSheet()->mergeCells('A1:K2');
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA Penyelia Halal");
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('L')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('M')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('N')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('O')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('P')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('Q')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('R')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('S')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('T')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('U')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('V')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->getActiveSheet()->getStyle('W')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "Batch");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Asesor");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "No");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Asesi");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Jenis Kelamin");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Email");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "No HP");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Tanggal Asesmen");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Uji Lanjut");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "Tanggal Rapat Komite Teknis");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Komite Teknis 1");
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Komite Teknis 2");
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Komite Teknis 3");
		$excel->setActiveSheetIndex(0)->setCellValue('N3', "Keputusan");
		$excel->setActiveSheetIndex(0)->setCellValue('O3', "Tanggal Penerbitan Sertifikat");
		$excel->setActiveSheetIndex(0)->setCellValue('P3', "Keterangan");
		$excel->setActiveSheetIndex(0)->setCellValue('Q3', "No Sertifikat");
		$excel->setActiveSheetIndex(0)->setCellValue('R3', "No Seri Sertifikat");
		$excel->setActiveSheetIndex(0)->setCellValue('S3', "No Reg Sertifikat");
		$excel->setActiveSheetIndex(0)->setCellValue('T3', "No Berita Acara");
		$excel->setActiveSheetIndex(0)->setCellValue('U3', "Provinsi");
		$excel->setActiveSheetIndex(0)->setCellValue('V3', "Tahun Laporan");
		$excel->setActiveSheetIndex(0)->setCellValue('W3', "Tanggal");
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('W3')->applyFromArray($style_col);
		$no = 1;
		$numrow = 4;
		$merge = 6;
    $export = $this->pm->beranda();
		foreach($export->result() as $data){
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $data->batch);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->assesor);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->no);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->asesi);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->email);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->no_hp);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->tgl_asesmen);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->uji_lanjut);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->tgl_rpt_kmt_tkns);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->kom_tek_1);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->kom_tek_2);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->kom_tek_3);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->keputusan);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->tgl_pen_ser);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->keterangan);
			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->no_serti);
			$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->no_ser_ser);
			$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->no_reg_ser);
			$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->no_ber_ac);
			$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->provinsi);
			$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->thn_lap);
			$excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->tanggal);

    	$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
			$no++;
			$numrow++;
			$merge+=2;
		}
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(35);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(35);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('O')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('P')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(35);
		$excel->getActiveSheet()->getColumnDimension('R')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('S')->setWidth(35);
		$excel->getActiveSheet()->getColumnDimension('T')->setWidth(35);
		$excel->getActiveSheet()->getColumnDimension('U')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('V')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('W')->setWidth(25);
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excel->getActiveSheet(0)->setTitle("Laporan Data Penyelia Halal");
		$excel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Penyelia.xlsx"');
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}
}
