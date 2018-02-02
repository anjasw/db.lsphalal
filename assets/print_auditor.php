<?php 
include "pengatur.php"; 
include "koneksi/koneksi.php";

$perintah = new pengatur();

    $edit = mysql_fetch_assoc(mysql_query("SELECT * FROM tbl_auditor where no = '".$_GET['id']."'"));


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
</head>
<body>

<a href="#" onclick="document.getElementById('print').style.display='none';window.print();"><img src="print_icon.png" id="print" width="75" height="75" border="0" /></a>

<div class="test">
<?php 
		
		$r = mysql_fetch_array(mysql_query("SELECT * from tbl_laporan"));

 ?>
<table border="1" width="100%" height="100">
	<tr>
		<td rowspan="4"><img style="width: 200px;" src="Logo LSP.png.png"></td>
		<td style="text-align: center; font-weight: bold; font-size: 14px;">FORM</td>
		<td>Nomor Dokumen</td>
		<td><?php echo $r['no_dokumen']; ?></td>
	</tr>
	
	<tr>
		<td rowspan="3" style="text-align: center; font-weight: bold; font-size: 14px; ">BERITA ACARA PENYERAHAN <br> SERTIFIKAT KOMPETENSI / <br>DUPLIKAT SERTIFIKAT <br> KOMPETENSI</td>
		<td>Edisi/Revisi</td>
		<td><?php echo $r['ed_Revisi']; ?></td>
	</tr>
	<tr>
		<td>Tanggal Berlaku</td>
		<td><?php echo tanggal_indo($r['tgl_berlaku']); ?></td>
	</tr>
	<tr>
		<td>Halaman</td>
		<td><?php echo $r['halaman']; ?></td>
	</tr>	
		<table border="0" width="100%" height="50">
			<tr>
				<td colspan="3"><p style="text-align: center; font-weight: bold; font-size: 13.8px; margin-top: 30px;"><?php echo @$edit['no_ber_ac']; ?></p> </td>
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
					<td><span class="isiform">: <?php echo @$edit['no_serti']; ?></span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Nama Pemegang Sertifikat</td>
					<td></td>
					<td><span class="isiform">: <?php echo @$edit['asesi'] ?> </span></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Nomor Registrasi</td>
					<td></td>
					<td><span class="isiform">: <?php echo @$edit['no_reg_ser'] ?></span></td>
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
					<td><span class="isiform">: <?php echo tanggal_indo(@$edit['tgl_pen_ser'])  ?> </span></td>
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
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Catatan</td>
					<td></td>
					<td><span class="isiform">: <?php echo @$edit['catatan'] ?> </span></td>
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


 ?>