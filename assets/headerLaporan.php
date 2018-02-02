<?php 
include "pengatur.php";
include "koneksi/koneksi.php";

$perintah = new pengatur();

$table = "tbl_laporan";
$redirect = "?menu=headerLaporan";
@$where = "id_laporan = '$_GET[id]'";


if (isset($_POST['simpan'])) {
	$field = array(
		'no_dokumen' => $_POST['No_dokumen'],

		'ed_Revisi' => $_POST['edisi_revisi'],

		'tgl_berlaku' => $_POST['tgl_berlaku'],

		'halaman' => $_POST['halaman'] );

	$perintah->simpan($table,$field,$redirect);
}


if (isset($_GET['hapus'])) {
	$perintah -> hapus($table,$where,$redirect);
}

if (isset($_GET['edit'])) {
    $edit =  $perintah->edit($table,$where);
  }

  if (isset($_POST['ubah'])) {
    $field = array(
		'no_dokumen' => $_POST['No_dokumen'],

		'ed_Revisi' => $_POST['edisi_revisi'],

		'tgl_berlaku' => $_POST['tgl_berlaku'],

		'halaman' => $_POST['halaman'] );

	$perintah->ubah($table,$field,$where,$redirect);
  }
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Header Laporan</title>
  <meta http-equiv="refresh" content="30">
</head>
<body>
 <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div class="panel panel-default">

            <div class="panel-body">
              <div class="" style="font-size: 20px; text-align: center  ">
                  Set your report
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

                <a href="?menu=beranda"><button type="button"  class="btn btn-primary pull-left">See Data</button></a>

                </div>
                <br><br><br>
                <div class="panel panel-default">
                  <div class="panel-body">
                   <div class="form-group">
              <br>
              <br>

              <div class="form-group">
                <label for="No_dokumen" class="col-sm-2 control-label">Number Document</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="No_dokumen" id="assesor" required="" placeholder="" value="<?php echo @$edit['no_dokumen']?>">
                </div>

                <br>
                <br>


              </div>
              <div class="form-group">
                <label for="edisi_revisi" class="col-sm-2 control-label">
Revised Edition</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="edisi_revisi" id="edisi_revisi" required="" placeholder="" value="<?php echo @$edit['ed_Revisi']?>">
                </div>

                <br><br>

              </div>
              <div class="form-group">
                <label for="tgl_berlaku" class="col-sm-2 control-label">Tanggal Berlaku </label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tgl_berlaku" id="no_met" required="" placeholder="" value="<?php echo @$edit['tgl_berlaku']?>">
                </div>
              </div>
<br><br>
<br>

              <div class="form-group">
              <label for="halaman" class="col-sm-2 control-label"> Page </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="halaman" id="no_met" required="" placeholder="" value="<?php echo @$edit['halaman']?>">
                </div>
              </div>
              <br>
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

<div class="container">
      <div class="row">

      		<table class="table table-striped table-bordered table-paginate">
      			<thead>
      			<tr>
      				<th>No</th>
      				<th>Number Document</th>
      				<th>Revised Edition</th>
      				<th>Tanggal Berlaku</th>
      				<th>Page</th>
      				<th colspan="2" style="text-align: center;">
      					Aksi
      				</th>
   				</tr>
      			</thead>
      			<?php

      					$sql = mysql_query("SELECT * from tbl_laporan");

      					while ($r = mysql_fetch_array($sql)) {

      					@$no++;

      					 ?>
      			<tbody>
      				<tr>
      					<td><?php echo $no;?></td>
      					<td><?php echo $r['no_dokumen']; ?></td>
      					<td><?php echo $r['ed_Revisi']; ?></td>
      					<td><?php echo $r['tgl_berlaku']; ?></td>
      					<td><?php echo $r['halaman']; ?></td>
      					<td>
      						<a href="?menu=headerLaporan&hapus&id=<?php echo $r['id_laporan']?>"
                                      onClick="return confirm('Hapus Inputan')"/><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
      					</td>
      					<td>
      						<a href="?menu=headerLaporan&edit&id=<?php echo $r['id_laporan']?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
      					</td>
      				</tr>
      			</tbody>

      			<?php
      				}
      			 ?>
      		</table>
      </div>

</div>


</body>
</html>
