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
	<title> Cetak Laporan PDF LSP</title>
	<style type="text/css">
	.test{
		width:  96%;
		height: 978px;
		border: 1px solid black;
		font-size: 13.7px;
		font-family: "Times New Roman", Times, serif;
	}
	.isiform{
		margin-left: 50px;

	}
	.line{
		line-height: 2px;
	}

	</style>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.min.css">

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
<a href="#" onclick="document.getElementById('print').style.display='none';window.print();"><img src="<?php echo base_url() ?>assets/print_icon.png" id="print" width="75" height="75" border="0" /></a>

<div class="test">
<table border="1" width="100%" height="100">
  <?php foreach ($r->result() as $r): ?>
	<tr>
		<td rowspan="4"><img style="width: 200px;" src="<?php echo base_url() ?>assets/Logo LSP.png.png"></td>
		<td style="text-align: center; font-weight: bold; font-size: 14px;">FORM</td>
		<td>Nomor Dokumen</td>
		<td><?php echo $r->no_dokumen ?></td>
	</tr>

	<tr>
		<td rowspan="3" style="text-align: center; font-weight: bold; font-size: 14px; ">BERITA ACARA PENYERAHAN <br> SERTIFIKAT KOMPETENSI / <br>DUPLIKAT SERTIFIKAT <br> KOMPETENSI</td>
		<td>Edisi/Revisi</td>
		<td><?php echo $r->ed_Revisi ?></td>
	</tr>
	<tr>
		<td>Tanggal Berlaku</td>
		<td><?php echo tanggal_indo($r->tgl_berlaku); ?></td>
	</tr>
	<tr>
		<td>Halaman</td>
		<td><?php echo $r->halaman ?></td>
	</tr>
<?php endforeach; ?>
		<table border="0" width="100%" height="50">
			<tr>
				<td colspan="3"><p style="text-align: center; font-weight: bold; font-size: 13.8px; margin-top: 30px;"><?php echo $data->row()->no_ber_ac ?></p> </td>
			</tr>
			<tr>
				<td colspan="3">
					<P style="text-align: center; margin: 40px; text-align: justify;"> Bersama ini Lembaga Sertifikasi Profesi LPPOM MUI( LSP LPPOM MUI) Menyerahakan Sertifikasi
					Kompetensi / Duplikat Sertifikasi Kompetensi *) kepada pemegang sertifikat. Sebagai Berikut :</P>
				</td>
			</tr>
			<div class="line">
			<table border="0" style="margin-left: 40px; margin-top: 30px;">
				<tr>
					<td>Nomor Sertifikat <br></td>
					<td></td>
					<td><span class="isiform">: <?php echo $data->row()->no_serti ?></span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Nama Pemegang Sertifikat</td>
					<td></td>
					<td><span class="isiform">: <?php echo $data->row()->asesi ?> </span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Nomor Registrasi</td>
					<td></td>
					<td><span class="isiform">: <?php echo $data->row()->no_reg_ser ?></span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Judul Bidang Pekerjaan</td>
					<td></td>
					<td><span class="isiform">: Bidang Penjaminan Produk Halal</span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Judul Kualifikasi / Kompetensi</td>
					<td></td>
					<td><span class="isiform">: Penyelia Halal</span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Tanggal Terbit Sertifikat </td>
					<td></td>
					<td><span class="isiform">: <?php echo tanggal_indo($data->row()->tgl_pen_ser)  ?> </span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Masa Berlaku Sertifikat</td>
					<td></td>
					<td><span class="isiform">: 2 Tahun</span></td>
				</tr>
			</table>

			<table border="0" style="margin: 40px; margin-top: 200px;" height="200px;">
				<tr>
					<td>Diserahkan Tanggal : <div class="dit" style="margin-left: 450px; margin-top: -20px;" > Diterima Tanggal : </div></td>

				</tr>
				<tr>
					<td>Oleh :  <div class="dit" style="margin-left: 450px; margin-top: -20px;" > Oleh : </div></td>

				</tr>
				<tr>
					<td rowspan="5">______________________ <div class="dit" style="margin-left: 450px; margin-top: -20px;" >______________________ </div></td>

				</tr>
				<tr>

				</tr>
				<tr>

				</tr>
				<tr>

				</tr>
				<tr>

				</tr>


			</table>
			<p style="margin-left: 35px;"> *) Coret yang tidak sesuai</p>
			</div>

							</div>
		</table>



</table>
</body>
</html>
