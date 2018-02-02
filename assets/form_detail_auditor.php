<?php 
include "config/pengatur.php";
include "koneksi/koneksi.php";


$perintah = new pengatur();
    @$edit = mysql_fetch_assoc(mysql_query("SELECT * FROM tbl_auditor where no = '".$_GET['id']."'"));



 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Form Detail</title>

    <link rel="stylesheet" type="text/css" href="bs/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bs/bootstrap.css">
   	
</head>
<body>

<div class="panel-primary" style="margin: 100px;">
	<div class="panel-heading" style="text-align: center; font-size: 18px;">
		Detail dari <span style="color: #5cb85c; font-weight: bold;"><?php echo @$edit['asesi']; ?></span> 
	</div>
	<div class="panel-body">
		
<table border="0px;" width="100%" height = "300px" style="font-size: 15px;">
	<tr>
		<td>Batch</td>
		<td>:</td>
		<td><?php echo @$edit['batch']; ?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?php echo @$edit['jk']; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo @$edit['email']; ?></td>
	</tr>
	<tr>
		<td>No Hp</td>
		<td>:</td>
		<td><?php echo @$edit['no_hp']; ?></td>
	</tr>
	<tr>
		<td>Uji Lanjut</td>
		<td>:</td>
		<td><?php echo @$edit['uji_lanjut']; ?></td>
	</tr>
	<tr>
		<td>Tanggal Rapat Komite Teknis</td>
		<td>:</td>
		<td><?php echo @$perintah -> tanggal_indo(@$edit['tgl_rpt_kmt_tkns']);?></td>
	</tr>
	<tr>
		<td>Tanggal Penerbitan Sertifikat</td>
		<td>:</td>
		<td><?php echo @$perintah -> tanggal_indo(@$edit['tgl_pen_ser']);?></td>
	</tr>
	<tr>
		<td>Komite teknis 3</td>
		<td>:</td>
		<td><?php echo @$edit['kom_tek_3']; ?></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>:</td>
		<td><?php echo @$edit['keterangan']; ?></td>
	</tr>
	<tr>
		<td>Keputusan</td>
		<td>:</td>
		<td><?php echo @$edit['keputusan']; ?></td>
	</tr>
	<tr>
		<td>Nomor Seri Sertifikat</td>
		<td>:</td>
		<td><?php echo @$edit['no_ser_ser']; ?></td>
	</tr>
	<tr>
		<td>Nomor Berita AC</td>
		<td>:</td>
		<td><?php echo @$edit['no_ber_ac']; ?></td>
	</tr>

	<tr>
		<td>Provinsi</td>
		<td>:</td>
		<td><?php echo @$edit['provinsi']; ?></td>
	</tr>

	<tr>
		<td>Tahun Laporan</td>
		<td>:</td>
		<td><?php echo @$edit['thn_lap']; ?></td>
	</tr>

	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><?php echo @$perintah -> tanggal_indo(@$edit['tanggal']);?></td>
	</tr>


</table>	
	</div>
	<div class="panel-primary panel-footer">
		<a href="?menu=auditor_halal"><button class="btn btn-success">Kembali</button></a>
	</div>
</div>

</body>
</html>