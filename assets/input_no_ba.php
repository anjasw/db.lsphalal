<?php 

include "pengatur.php";
mysql_connect("localhost","root","");
mysql_select_db("db_mui");

$perintah =  new pengatur();
$table = "tbl_mui";
@$where = "no = '$_GET[id]'";
$redirect = "?menu=input_no_ba";

if (isset($_POST['ubah'])) {
  $field = array('no_ber_ac' => $_POST['no_ber_ac'], 
  );

  $perintah -> ubah($table, $field, $where, $redirect);

}

@$edit = mysql_fetch_assoc(mysql_query("SELECT * FROM tbl_mui where no = '".$_GET['id']."'"));



  $carikode = mysql_query("SELECT max(no_ber_ac) from tbl_mui") or die (mysql_error());
  // menjadikannya array
  $datakode = mysql_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   // membuat variabel baru untuk mengambil kode barang mulai dari 1
   $nilaikode = substr($datakode[0], 4);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   // hasil untuk menambahkan kode 
   // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
   // atau angka sebelum $kode
   //BA/20/LSP LPPOM MUI/VII/17
   //BA/01/LSP LPPOM MUI/VII/17
   $hasilkode = "BA/".str_pad($kode, 2, "0", STR_PAD_LEFT)."/LSP LPPOM MUI/VII/17";
  } else {
   $hasilkode = "";
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="bs/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bs/bootstrap.css">
</head>
<body>
            
<form method="post">     

<div class="col-sm-3" style="margin-left: 460px; margin-top: 260px;">

      <label for="no_ber_ac" class="col-sm-8  control-label">Masukan No Berita Acara </label>
       <input type="text" id="no_ber_ac" name="no_ber_ac"
                    <?php if (!isset($_GET['no_ber_ac'])) {
                    ?> value="<?php echo $hasilkode; ?>" 
                  <?php }else{ ?> 
                  value="<?php echo $_GET['no_ber_ac'] ?>"
                  <?php } ?>
                   class="form-control" >
       <br>
       <button type="submit" style="" name="ubah" class="btn btn-success">Update</button>
       
         <a href="?menu=laporan&masukanBa&id=<?php echo $r['no']; ?>&no_ser_ser=<?php echo $r['no_ser_ser']; ?>&no_serti=<?php echo $r['no_serti']; ?>&no_reg_ser=<?php echo $r['no_reg_ser']; ?>"><button type="button" class="btn btn-primary btn-sm" name="print">Print</button></a> 
                        </td>
      </div>
</form>


</script>
</body>
</html>