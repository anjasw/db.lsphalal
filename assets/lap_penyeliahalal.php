<?php
include "koneksi/koneksi.php";
include "pengatur.php";

@$perintah = new pengatur();




$kombe = mysql_fetch_array(mysql_query("SELECT count(IF(keputusan != 'Belum Kompeten', keputusan, null)) as kompeten,
                 count(IF(keputusan != 'Kompeten', keputusan, null)) as belumkompeten
                  FROM tbl_mui"));
@$totpesa = mysql_fetch_array(mysql_query("SELECT count(asesi) as totalpesertaa from tbl_mui"));

$belum = mysql_fetch_array(mysql_query("SELECT  COUNT(IF( YEAR(tgl_asesmen) = '2017', tgl_asesmen, NULL) ) AS
              sertifikat FROM tbl_mui WHERE no_ber_ac != ''"));

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="../bs/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bs/bootstrap.min.css">

</head>
<body>

<div class="container">


		<div class="panel panel-default">
			<div class="panel-heading">
				<b>Laporan Penyelia Halal</b>
			</div>
			<!--  
			 <?php

                 $noberac = mysql_query("SELECT count(IF(keputusan != 'Belum Kompeten', keputusan, null)) as kompeten,
                 count(IF(keputusan != 'Kompeten', keputusan, null)) as belumkompeten
                  FROM tbl_mui");

                    while ($hasil = mysql_fetch_array($noberac)) {
                   ?>
			<div class="panel-body">

			<label> Kompeten :</label>
			<br>
			<br>
                <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $hasil['kompeten']; ?>" placeholder="Masukan Nomor Berita Acara" readonly>
                </div>
              <br>
              <br>
             <label> Belum Kompeten :</label>
			<br>
			<br>
                <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $hasil['belumkompeten']; ?>" placeholder="Masukan Nomor Berita Acara" readonly>
                </div>
                <?php } ?>
                <br>
                <br>
                <?php

               		$totpes = mysql_query("SELECT count(asesi) as totalpeserta from tbl_mui");
               		while ($r = mysql_fetch_array($totpes)) {


                 ?>
               <label> Total Peserta :</label>
			<br>
			<br>
                <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $r['totalpeserta']; ?>" placeholder="Masukan Nomor Berita Acara" readonly>
                </div>
                <?php } ?>
                	<?php

                		$jumser = mysql_query("SELECT count(IF(no_ber_ac != '', keputusan, null)) as jumlahsertifikat FROM tbl_mui");
                		while ($r = mysql_fetch_array($jumser)) {
                			# code...

                	 ?>
<br>
<br>
                <label> Jumlah Sertifkat Yang Telah Diambil :</label>
			<br>
			<br>
                <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $r['jumlahsertifikat']; ?>" placeholder="Masukan Nomor Berita Acara" readonly>
                </div>

                <?php } ?>
			</div> -->
        <br>




        <form method="post">

      <label for="tahun" class="col-sm-2 control-label">Pilih Tahun</label>
                  <div class="col-sm-2">

                  <select name="tahun" value="" required=""
                    class="form-control" onchange="submit()">
                      <option> Pilih Tahun </option>
                      <option value="2017"> 2017</option>
                      <option value="2018"> 2018</option>
                      <option value="2019"> 2019</option>
                      <option value="2020"> 2020</option>
                      <option value="2021"> 2021</option>
                      <option value="2022"> 2022</option>
                      <option value="2023"> 2023</option>
                      <option value="2024"> 2024</option>
                  </select>
                  </div>


                  <button class="btn btn-primary" name="submit" value="submit"> Submit</button>
                  <br>
                  <br>
</form>

      <?php
          if (isset($_POST['submit'])) {
            $tahun = $_POST['tahun'];

            $sql = mysql_fetch_array(mysql_query("SELECT  COUNT(IF( YEAR(tgl_asesmen) = '$tahun', tgl_asesmen, NULL) ) AS belumkompeten
            FROM tbl_mui WHERE keputusan = 'Belum Kompeten'"));
            $sql1 = mysql_fetch_array(mysql_query("SELECT  COUNT(IF( YEAR(tgl_asesmen) = '$tahun', tgl_asesmen, NULL) ) AS
              kompeten
            FROM tbl_mui WHERE keputusan = 'Kompeten'"));
            $sql2 = mysql_fetch_array(mysql_query("SELECT  COUNT(IF( YEAR(tgl_asesmen) = '$tahun', tgl_asesmen, NULL) ) AS
              sertifikat
            FROM tbl_mui WHERE no_ber_ac != ''"));
            $sql3 = mysql_fetch_array(mysql_query("SELECT  COUNT(asesi) AS asesitahun2017
                FROM tbl_mui  WHERE  date_format(tgl_asesmen,'%Y')='$tahun'"));

        ?>

       <label class="col-sm-2 control-label"> Total Asesi</label>

            <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $sql3['asesitahun2017']; ?>" readonly>
                </div>
  <br>
  <br>
        <label class="col-sm-2 control-label"> Kompeten</label>

            <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $sql1['kompeten']; ?>" readonly>
                </div>

<br>
<br>


      <label class="col-sm-2 control-label"> Belum Kompeten</label>

            <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $sql['belumkompeten']; ?>" readonly>
                </div>


<br>
<br>
          <label class="col-sm-2 control-label"> Sertifikat yang diambil</label>

            <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $sql2['sertifikat']; ?>" readonly>
                </div>

<br>
<br>

<br>
<br>
<br>



          <!-- <label class="col-sm-2 control-label"> Total Peserta</label>
          <br>
            <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $sql3['totalpesertal']; ?>" readonly>
                </div> -->
            <?php


             }

             ?>





      <br>
      <br>

<label class="col-sm-4 control-label" style="font-size: 30px;"> Data Keseluruhan </label>
<hr>
<br>
<br>
      <label class="col-sm-2 control-label"> Total Asesi</label>
            <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $totpesa['totalpesertaa']; ?>" readonly>
                </div>
                <br>
                <br>
                <label class="col-sm-2 control-label"> Kompeten</label>

            <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $kombe['kompeten']; ?>" readonly>
                </div>

<br>
<br>

<label class="col-sm-2 control-label"> Belum Kompeten</label>

            <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $kombe['belumkompeten'] ?>" readonly>
                </div>

<br>
<br>
          <label class="col-sm-2 control-label"> Sertifikat yang diambil</label>

            <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $belum['sertifikat']; ?>" readonly>
                </div>

<br>
<br>

			<div class="panel-footer">
			<a href="?menu=beranda"><button class="btn btn-primary"> Kembali </button></a>

			</div>
		</div>

	</div>
</div>

</body>
</html>
