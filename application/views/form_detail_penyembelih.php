<?php

function tanggal_indo($tanggal){
  $bulan =  array(
  '0' => "Masukan Tanggal!",
  '1' => 'Januari',
  'Februari',
  'Maret',
  'April',
  'Mei',
  'Juni',
  'Juli',
  'Agustus',
  'September',
  'OKtober',
  'November',
  'Desember' );

$split = explode('-', $tanggal);
  return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Detail</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.css">

</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="<?php echo base_url() ?>assets/Logo LSP.png.png" width='150px' height="40px" alt=""></a>
      </div>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url() ?>regist" id="pendaftaran">Registrasi</a></li>
        <li class=""><a href="<?php echo base_url() ?>penyelia" id="penyelia">Penyelia Halal</span></a></li>
        <li><a href="<?php echo base_url() ?>auditor " id="auditor">Auditor Halal</a></li>
        <li><a href="<?php echo base_url() ?>penyembelih" id="juru">Juru Sembelih Halal</a></li>
        <li><a href="<?php echo base_url() ?>login/logout" id="log">LogOut</a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid --><br>
  </nav>
<div class="panel-primary" style="margin: 100px;">
	<div class="panel-heading" style="text-align: center; font-size: 18px;">
		Detail dari <span style="color: #5cb85c; font-weight: bold;"><?php echo $data->row()->asesi ; ?></span>
	</div>
	<div class="panel-body">

<table border="0px;" width="100%" height = "300px" style="font-size: 15px;">
	<tr>
		<td>Batch</td>
		<td>:</td>
		<td><?php echo $data->row()->batch; ?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?php echo $data->row()->jk ; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $data->row()->email ; ?></td>
	</tr>
	<tr>
		<td>No Hp</td>
		<td>:</td>
		<td><?php echo $data->row()->no_hp ; ?></td>
	</tr>
	<tr>
		<td>Uji Lanjut</td>
		<td>:</td>
		<td><?php echo $data->row()->uji_lanjut ; ?></td>
	</tr>
	<tr>
		<td>Tanggal Rapat Komite Teknis</td>
		<td>:</td>
		<td><?php echo tanggal_indo($data->row()->tgl_rpt_kmt_tkns );?></td>
	</tr>
	<tr>
		<td>Tanggal Penerbitan Sertifikat</td>
		<td>:</td>
		<td><?php echo tanggal_indo($data->row()->tgl_pen_ser );?></td>
	</tr>
	<tr>
		<td>Komite Teknis 3</td>
		<td>:</td>
		<td><?php echo $data->row()->kom_tek_3 ; ?></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>:</td>
		<td><?php echo $data->row()->keterangan ; ?></td>
	</tr>
	<tr>
		<td>Keputusan</td>
		<td>:</td>
		<td><?php echo $data->row()->keputusan ; ?></td>
	</tr>
	<tr>
		<td>Nomor Seri Sertifikat</td>
		<td>:</td>
		<td><?php echo $data->row()->no_ser_ser ; ?></td>
	</tr>
	<tr>
		<td>Nomor Berita AC</td>
		<td>:</td>
		<td><?php echo $data->row()->no_ber_ac ; ?></td>
	</tr>

	<tr>
		<td>Provinsi</td>
		<td>:</td>
		<td><?php echo $data->row()->provinsi ; ?></td>
	</tr>

	<tr>
		<td>Tahun Laporan</td>
		<td>:</td>
		<td><?php echo $data->row()->thn_lap ; ?></td>
	</tr>

	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><?php echo tanggal_indo($data->row()->tanggal );?></td>
	</tr>


</table>
	</div>
	<div class="panel-primary panel-footer">
		<a href="<?php echo base_url() ?>penyembelih"><button class="btn btn-success">Kembali</button></a>
	</div>
</div>

</body>
</html>
