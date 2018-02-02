<?php
include 'config/pengatur.php'; 
include "koneksi/koneksi.php";

  @$perintah = new pengatur();
  @$table = "tbl_auditor";
  @$redirect = "?menu=input_auditor";
  @$where = "no = '$_GET[id]'";

  if (isset($_POST['simpan'])) {
    $field = array(
      'batch' => $_POST['batch'],
      'assesor' => $_POST['assesor'],
      'asesi' => $_POST['asesi'],
      'jk' => $_POST['jk'],
      'email' => $_POST['email'],
      'no_hp' => $_POST['no_hp'],
      'tgl_asesmen' => $_POST['tgl_asesmen'],
      'uji_lanjut' => $_POST['uji_lanjut'],
      'tgl_rpt_kmt_tkns' => $_POST['tgl_rpt_kmt_tkns'],
      'kom_tek_1' => $_POST['kom_tek_1'],
      'kom_tek_2' => $_POST['kom_tek_2'],
      'kom_tek_3' => $_POST['kom_tek_3'],
      'keputusan' => $_POST['keputusan'],
      'tgl_pen_ser' => $_POST['tgl_pen_ser'],
      'keterangan' => $_POST['keterangan'],
      'no_serti' => $_POST['no_serti'],
      'no_ser_ser' => $_POST['no_ser_ser'],
      'no_reg_ser' => $_POST['no_reg_ser'],
      'no_ber_ac' => $_POST['no_ber_ac'],
      'provinsi' => $_POST['provinsi'],
      'thn_lap' => $_POST['thn_lap'],
      'tanggal' => $_POST['tanggal'],
      );
    @$perintah -> simpan($table,$field,$redirect);
  }

  if (isset($_GET['edit'])) {
    $edit = mysql_fetch_assoc(mysql_query("SELECT * FROM tbl_auditor where no = '".$_GET['id']."'"));
  }

  if (isset($_POST['ubah'])) {
    $field = array(
      'batch' => $_POST['batch'],
      'assesor' => $_POST['assesor'],
      'asesi' => $_POST['asesi'],
      'jk' => $_POST['jk'],
      'email' => $_POST['email'],
      'no_hp' => $_POST['no_hp'],
      'tgl_asesmen' => $_POST['tgl_asesmen'],
      'uji_lanjut' => $_POST['uji_lanjut'],
      'tgl_rpt_kmt_tkns' => $_POST['tgl_rpt_kmt_tkns'],
      'kom_tek_1' => $_POST['kom_tek_1'],
      'kom_tek_2' => $_POST['kom_tek_2'],
      'kom_tek_3' => $_POST['kom_tek_3'],
      'keputusan' => $_POST['keputusan'],
      'tgl_pen_ser' => $_POST['tgl_pen_ser'],
      'keterangan' => $_POST['keterangan'],
      'no_serti' => $_POST['no_serti'],
      'no_ser_ser' => $_POST['no_ser_ser'],
      'no_reg_ser' => $_POST['no_reg_ser'],
      'no_ber_ac' => $_POST['no_ber_ac'],
      'provinsi' => $_POST['provinsi'],
      'thn_lap' => $_POST['thn_lap'],
      'tanggal' => $_POST['tanggal'],      
     );
    $perintah -> ubah($table, $field, $where, $redirect);
  }

$carikode = mysql_query("select max(no_ser_ser) from tbl_auditor") or die (mysql_error());
  // menjadikannya array
  $datakode = mysql_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   // membuat variabel baru untuk mengambil kode barang mulai dari 1
   $nilaikode = substr($datakode[0], 5);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   // hasil untuk menambahkan kode 
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
     // atau angka sebelum $kode
   $hasilkode = "3".str_pad($kode, 6, "289040", STR_PAD_LEFT);
  } else {
   $hasilkode = "";
  }




    $kodecari =  mysql_query("SELECT MAX(no_serti) FROM tbl_auditor") or die(mysql_error());
    $kodedata = mysql_fetch_array($kodecari);

    if($kodedata) {
      $kodenilai = substr($kodedata[0], 16);
      $deco = (int) $kodenilai;

      $deco = $deco + 1;
      //No. 74909 1321 0000001 2017
        $kode_otomatis = "No. ".str_pad($deco, 18, "74909 "."1321 ". "0000001", STR_PAD_LEFT)." 2017";

      
    }else{
      $kode_otomatis = "00000000000000001";
    }

  $ck = mysql_query("select max(no_reg_ser) from tbl_auditor") or die (mysql_error());
  // menjadikannya array
  $dk = mysql_fetch_array($ck);
  // jika $datakode
  if ($dk) {
   // membuat variabel baru untuk mengambil kode barang mulai dari 1
   $nk = substr($dk[0], 18);
   // menjadikan $nilaikode ( int )
   $kd = (int) $nk;

   // setiap $kode di tambah 1
   $kd = $kd + 1;
   // hasil untuk menambahkan kode 
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
   // atau angka sebelum $kode
   // No. Reg. AHI.664.000003 20
   $hk = "No. Reg. AHI.".str_pad($kd, 10, "664."."00000", STR_PAD_LEFT)." 2017";
  } else {
   $hk = "";
  }

  






  ?>




<!DOCTYPE html>
<html>
<head>
	<title> Input Data </title>
	<link rel="stylesheet" type="text/css" href="../bs/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../bs/bootstrap.min.css">

	<style type="text/css">
		#search{
      		font-size: 15px;
     		 margin-left: 15px;
  		}
      .test{
        width: 200px;
        height: 200px;
        border: 10px solid black;
        margin: 300px;
      }
	</style>
</head>
<body>


 <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">

            <div class="panel-body">
              <div class="" style="font-size: 20px; text-align: center  ">
                  Add Data
              </div>  
            </div>
          </div>
        </div>
      </div>
      <div id="show-product">
        <!-- data akan di tampilkan di sini -->
        <form method="post" role="form" onsubmit="validasi()">
              <div class="box-body">
                <div class="">
                <a href="?menu=auditor_halal"><button type="button" style="border:1px solid #222d32; background-color: #222d32; width: 150px; height: 40px;" class="btn btn-primary pull-left">See Data</button></a>
                
                <br><br><br>
                <div class="panel panel-default">
                  <div class="panel-body">
                   <div class="form-group">

                <label class="col-sm-2 control-label" style="margin-left: -15px;">Batch</label>
                <div class="col-sm-10" style="">
                  <input type="number" name="batch" required="" class="form-control" id="batch" value="<?php echo @$edit['batch'] ?>">
                </div>
              </div>
              <br>
              <br>

              <div class="form-group">
                <label for="assesor" class="col-sm-2 control-label" style="margin-left: -15px;">Assessor</label>
                <div class="col-sm-10" style="" >
                  <select name="assesor" class="form-control">
                    <option value="<?php echo @$edit['assesor']?>"><?php echo @$edit['assesor']?></option>
                    <?php
                        @$a = $perintah->tampil("tbl_asesor ORDER BY asesor");
                      foreach ($a as $r) {
                    ?>
                    <option value="<?php echo @$r['1']?>"><?php echo @$r['1']?></option>
                    <?php } ?>
                  </select>
                  
                </div>
              </div>

              <br>
              <br
              <div class="form-group">
                <label for="nama_asesi" class="col-sm-2 control-label" style="margin-left: -15px;" >Asesi</label>
                <div class="col-sm-10" style="">
                  <input type="text" class="form-control" name="asesi" id="asesi" required="" value="<?php echo @$edit['asesi']?>">
                </div>
              </div>

              <div class="form-group">

             <label for="jk" class="col-sm-2 control-label"">Gender</label>
                  <div class="col-sm-2">
                  <select style="" name="jk" value="<?php echo @$edit['jk']?>" required="" 
                  class="form-control">
                  <option><?php echo @$edit['jk']; ?></option>
                  <option>Male</option>
                  <option>Female</option>
                  </select>
                  </div>


                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-2" style="margin-left: -110px; width: 350px">
                 <input type="text" id="email" class="form-control" name="email"   value="<?php echo @$edit['email']?>" >
                  </div>              


                   <label for="no_hp" class="col-sm-3 control-label" style="margin-left: 10px;">No Hp</label>
                  <div class="col-sm-1" style="margin-left: 80px; width: 235px; margin-top: -25px;">
                  <input type="text" name="no_hp" value="<?php echo @$edit['no_hp']?>"  class="form-control">
                  </div>
                </div>

              <br>
              <br>
                <div class="form-group">
                  <label for="tgl_asesmen" class="col-sm-2 control-label">Assesmen Date</label>
                  <div class="col-sm-2">

                 <input type="date" id="tanggal" class="form-control" name="tgl_asesmen"   value="<?php echo @$edit['tgl_asesmen']?>" placeholder="Masukan Tanggal">
                  </div>

              
                  <label for="uji_lanjut" class="col-sm-2 control-label"">Next Test <br>requirement</label>
                  <div class="col-sm-2">
                  
                  <select style="margin-left:-70px;" name="uji_lanjut" value="<?php echo @$edit['uji_lanjut']?>" required="" 
                  class="form-control">
                  <option><?php echo @$edit['uji_lanjut']; ?></option>
                  <option>Ya</option>
                  <option>Tidak</option>
                  </select>
                  </div>

                   <label for="tgl_rpt_kmt_tkns" class="col-sm-3 control-label" style="margin-left: -80px;">Date of technical <br>committee meeting</label>
                  <div class="col-sm-1" style="margin-left: -120px; width: 280px;">
                  <input type="date" name="tgl_rpt_kmt_tkns" value="<?php echo @$edit['tgl_rpt_kmt_tkns']?>"  class="form-control">
                  </div>
                </div>

                <br>
                <br>

                <div class="form-group">
                <label for="asesor" class="col-sm-2 control-label">Technical Committee 1</label>
                <div class="col-sm-2" style="width: 250px;">
                  
                  <select name="kom_tek_1" class="form-control">
                    <option value="<?php echo @$edit['kom_tek_1']?>"><?php echo @$edit['kom_tek_1']?></option>
                    <?php
                      @$a = $perintah->tampil("tbl_asesor ORDER BY asesor");
                      foreach ($a as $r) {
                    ?>
                    <option value="<?php echo @$r['1']?>"><?php echo @$r['1']?></option>
                    <?php } ?>
                  </select>
                  
                </div>

                <div class="form-group">
                <label for="kom_tek_2" class="col-sm-2 control-label " style="margin-left: -20px;">Technical <br>Committee 2</label>
                <div class="col-sm-2" style="margin-left: -80px; width: 250px;">
                
                  <select name="kom_tek_2" class="form-control">
                    <option value="<?php echo @$edit['kom_tek_2']?>"><?php echo @$edit['kom_tek_2']?></option>
                    <?php
                      @$a = $perintah->tampil("tbl_asesor ORDER BY asesor");
                      foreach ($a as $r) {
                    ?>
                    <option value="<?php echo @$r['1']?>"><?php echo @$r['1']?></option>
                    <?php } ?>
                  </select>
                  
                </div>

              </div>

              <div class="form-group">
                <label for="kom_tek_3" class="col-sm-2 control-label" style="margin-left: -20px;">Technical <br>Committee 3</label>
                <div class="col-sm-3" style="margin-left: -90px; width: 265px;">
                
                  <select name="kom_tek_3" class="form-control">
                    <option value="<?php echo @$edit['kom_tek_3']?>"><?php echo @$edit['kom_tek_3']?></option>
                    <?php
                      @$a = $perintah->tampil("tbl_asesor ORDER BY asesor");
                      foreach ($a as $r) {
                    ?>
                    <option value="<?php echo @$r['1']?>"><?php echo @$r['1']?></option>
                    <?php } ?>
                  </select>
                  
                </div>

              </div>
       </div>
                <br>
                <br>
                <br> 

                <div class="form-group">
                  <label for="keputusan" class="col-sm-2 control-label">Decision</label>
                  <div class="col-sm-3">
                  <select name="keputusan"  required="" value="<?php echo @$edit['keputusan']?>" class="form-control" >
                  <option><?php echo @$edit['keputusan']; ?></option>
                    <option>Kompeten</option>
                    <option>Belum Kompeten</option>
                  </select>
                  </div>
                  
                  <label for="tgl_per_sers" class="col-sm-3 control-label">Certificate Issuance Date</label>
                  <div class="col-sm-4" style="margin-left: -50px; width: 416px; ">
                  <input type="date" name="tgl_pen_ser"  value="<?php echo @$edit['tgl_pen_ser']?>"" class="form-control" >
                  </div>
                </div>

                  <br>
                  <br>

                <div class="form-group">
                <label for="keterangan" class="col-sm-2 control-label">  Information   </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="keterangan" value="<?php echo @$edit['keterangan']?>
                  " placeholder="Masukan Keterangan">
                </div>
              </div>


                <br>
                <br>
               
                 <div class="form-group">
                <label for="no_serti" class="col-sm-2 control-label">No Certificate</label>
                <div class="col-sm-10">
                  <div class="col-sm-10" style="margin-left:  -15px; width: 103%  ">
                  <input type="text" id="no_serti"  name="no_serti"
                    <?php if (!isset($_GET['no_serti'])) {
                    ?> value="<?php echo $kode_otomatis; ?>" 
                  <?php }else{ ?> 
                  value="<?php echo $_GET['no_serti'] ?>"
                  <?php } ?>
                   class="form-control"  >
                </div>
                  </div>
                  <br>

              <br>
              <br>

              <div class="form-group">
                <label for="no_ser_ser" class="col-sm-2 control-label">Certificate series number</label>
                <div class="col-sm-10">
                  <input type="text" id="no_ser_ser" name="no_ser_ser"
                    <?php if (!isset($_GET['no_ser_ser'])) {
                    ?> value="<?php echo $hasilkode; ?>" 
                  <?php }else{ ?> 
                  value="<?php echo $_GET['no_ser_ser'] ?>"
                  <?php } ?>
                   class="form-control" >
                </div>
              </div>

              <br>
              <br>


              <div class="form-group">
                <label for="no_reg_ser" class="col-sm-2 control-label">Certificate Registration number</label>
                <div class="col-sm-10">
                  <input type="text" id="no_reg_ser" name="no_reg_ser"
                    <?php if (!isset($_GET['no_reg_ser'])) {
                    ?> value="<?php echo $hk; ?>" 
                  <?php }else{ ?> 
                  value="<?php echo $_GET['no_reg_ser'] ?>"
                  <?php } ?>
                   class="form-control" >
                </div>
              </div>

<br>
<br>
           <div class="form-group">
                <label for="no_ber_ac" class="col-sm-2 control-label"> BA Number</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo @$edit['no_ber_ac']?>" name="no_ber_ac" >
                </div>
                  <?php 

                 $noberac = mysql_query("SELECT max(IF(no_ber_ac != 'Sertifikat Ada', no_ber_ac, null)) as maxnoberac FROM tbl_auditor");

                    while ($hasil = mysql_fetch_array($noberac)) {    
                      
                    
                   ?>
                <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $hasil['maxnoberac']; ?>"  readonly>
                </div>
                <?php } ?>
              </div>
<br><br>
              <div class="form-group">

                  <label for="provinsi" class="col-sm-3 control-label">provinces</label>
                  <div class="col-sm-4" style="margin-left: -95px; width: 416px; ">
                  <input type="text" name="provinsi"  value="<?php echo @$edit['provinsi']?>"  class="form-control" >
                  </div>
                </div>
                  
                  <label for="thn_lap" class="col-sm-3 control-label" style="margin-top: -10px">Year Report</label>
                  <div class="col-sm-4" style="margin-left: -135px; width: 380px; margin-top: -15px; ">
                  <input type="number" name="thn_lap"  value="<?php echo @$edit['thn_lap']?> " class="form-control" >
                  </div>
                </div>
<br>
<br>
           <div class="form-group">
                <label for="tanggal" class="col-sm-2 control-label"> Date </label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tanggal"   value="<?php echo @$edit['tanggal']?>" placeholder="Masukan Tanggal">
                </div>
              </div>
            <br>
            <br>  

        <div class="box-footer">
                  <?php if(@$_GET['id']==""){?>
                  <button type="submit" style="" name="simpan" class="btn btn-primary btn-lg  btn-block"  style="">
                  Save</button>
                  <?php }else{?>
                   <button type="submit" style="" name="ubah" class="btn btn-success btn-lg btn-block ">Update</button>
                   <?php }?>

       </div>
      </div>
     </div>        
          </form>               
       </div>
</div>  
</body>
</html>