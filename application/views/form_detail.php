<!DOCTYPE html>
<html>
<head>
	<title>Form Detail</title>

    <link rel="stylesheet" type="text/css" href="bs/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bs/bootstrap.css">
	 <link rel="icon" type="image/png" href="<?php  echo base_url() ?>assets/Icon LSP.png">

</head>
<body>

<div class="panel-primary" style="margin: 100px;">
	<div class="panel-heading" style="text-align: center; font-size: 18px;">
		Detail dari <span style="color: #5cb85c; font-weight: bold;"><?php echo $data->row()->asesi ?></span>
	</div>
	<div class="panel-body">

<table border="0px;" width="100%" height = "300px" style="font-size: 15px;">
	<tr>
		<td>Batch</td>
		<td>:</td>
		<td><?php echo $data->row()->batch ?></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td><?php echo $data->row()->jk ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $data->row()->email ?></td>
	</tr>
	<tr>
		<td>No Hp</td>
		<td>:</td>
		<td><?php echo $data->row()->no_hp ?></td>
	</tr>
	<tr>
		<td>Uji Lanjut</td>
		<td>:</td>
		<td><?php echo $data->row()->uji_lanjut ?></td>
	</tr>
	<tr>
		<td>Tanggal Rapat Komite Teknis</td>
		<td>:</td>
		<td><?php echo $data->row()->tgl_rpt_kmt_tkns ?></td>
	</tr>
	<tr>
		<td>Tanggal Penerbitan Sertifikat</td>
		<td>:</td>
		<td><?php echo $data->row()->tgl_pen_ser ?></td>
	</tr>
	<tr>
		<td>Komite Teknis 3</td>
		<td>:</td>
		<td><?php echo $data->row()->kom_tek_3 ?></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td>:</td>
		<td><?php echo $data->row()->keterangan ?></td>
	</tr>
	<tr>
		<td>Keputusan</td>
		<td>:</td>
		<td><?php echo $data->row()->keputusan ?></td>
	</tr>
	<tr>
		<td>Nomor Seri Sertifikat</td>
		<td>:</td>
		<td><?php echo $data->row()->no_ser_ser ?></td>
	</tr>
	<tr>
		<td>Nomor Berita Acara</td>
		<td>:</td>
		<td><?php echo $data->row()->no_ber_ac ?></td>
	</tr>

	<tr>
		<td>Provinsi</td>
		<td>:</td>
		<td><?php echo $data->row()->provinsi  ?></td>
	</tr>

	<tr>
		<td>Tahun Laporan</td>
		<td>:</td>
		<td><?php echo $data->row()->thn_lap ?></td>
	</tr>

	<tr>
		<td>Tanggal</td>
		<td>:</td>
		<td><?php echo $data->row()->tanggal ?></td>
	</tr>


</table>
	</div>
	<div class="panel-primary panel-footer">
		<a href="<?php echo base_url()?>penyelia"><button class="btn btn-success">Kembali</button></a>
	</div>
</div>
<script src="<?php echo base_url() ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
