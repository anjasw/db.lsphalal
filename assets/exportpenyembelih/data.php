<?php 
	error_reporting(1);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title> Export Data Ke excel</title>
</head>
<body>


<table border="1">	
	<tr>
		<th>No.</th>
		<th>Batch</th>
		<th>Assesor</th>
		<th>Asesi</th>
		<th>Jenis Kelamin</th>
		<th>Email</th>
		<th>No Hp</th>
		<th>Tanggal Asesmen</th>
		<th>Uji Lanjut</th>
		<th>Tanggal rapat Komite Teknis</th>
		<th>Komite Teknis 1</th>
		<th>Komite Teknis 2</th>
		<th>Komite Teknis 3</th>
		<th>Keputusan</th>
		<th>Tanggal Penerbitan</th>
		<th>Keterangan</th>
		<th>No Sertifikat</th>
		<th>No Seri Sertifikat</th>
		<th>No Register Sertifikat</th>
		<th>No Berita Acara Penyerahan</th>
		<th>Provinsi</th>
		<th>Tahun Laporan</th>
		<th>Tanggal</th>

	</tr>
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

	//koneksi ke database
	include "../koneksi/koneksi.php";
	
	//query menampilkan data
	$sql = mysql_query("SELECT * FROM tbl_penyembelih ORDER BY no ASC");
	$no = 1;
	while($data = mysql_fetch_assoc($sql)){
		$tera = tanggal_indo($data['tgl_asesmen']);
		$tera1 = tanggal_indo($data['tgl_rpt_kmt_tkns']);
		$tera2 = tanggal_indo($data['tanggal']);
		$tera3 = tanggal_indo($data['tgl_pen_ser']);
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['batch'].'</td>
			<td>'.$data['assesor'].'</td>
			<td>'.$data['asesi'].'</td>
			<td>'.$data['jk'].'</td>
			<td>'.$data['email'].'</td>
			<td>'.$data['no_hp'].'</td>
			<td>'.$tera.'</td>
			<td>'.$data['uji_lanjut'].'</td>
			<td>'.$tera1.'</td>
			<td>'.$data['kom_tek_1'].'</td>
			<td>'.$data['kom_tek_2'].'</td>
			<td>'.$data['kom_tek_3'].'</td>
			<td>'.$data['keputusan'].'</td>
			<td>'.$tera3.'</td>
			<td>'.$data['keterangan'].'</td>
			<td>'.$data['no_serti'].'</td>
			<td>'.$data['no_ser_ser'].'</td>
			<td>'.$data['no_reg_ser'].'</td>
			<td>'.$data['no_ber_ac'].'</td>
			<td>'.$data['provinsi'].'</td>
			<td>'.$data['thn_lap'].'</td>
			<td>'.$tera2.'</td>
		</tr>
		';
		$no++;
	}
	?>


</table>
</body>
</html>