

<!DOCTYPE html>
<html>
<head>
	<title>Header Laporan</title>
  <meta http-equiv="refresh" content="30">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.css">
		<!-- <link rel="icon" type="image/png" href="icon LSP.png"> -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
		<link rel="icon" type="image/png" href="<?php  echo base_url() ?>assets/Icon LSP.png">
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

        <form method="post" action="">
              <div class="box-body">
                <div class="">

                <a href="<?php echo base_url() ?>penyelia"><button type="button"  class="btn btn-primary pull-left">See Data</button></a>

                </div>
                <br><br><br>
                <div class="panel panel-default">
                  <div class="panel-body">
                   <div class="form-group">
              <br>
              <br>

              <div class="form-group">
                <label for="no_dokumen" class="col-sm-2 control-label">Number Document</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="no_dokumen" id="assesor" required="" placeholder="" value="<?php echo set_value('no_dokumen') ?>">
                </div>

                <br>
                <br>


              </div>
              <div class="form-group">
                <label for="ed_Revisi" class="col-sm-2 control-label">
Revised Edition</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="ed_Revisi" id="edisi_revisi" required="" placeholder="" value="<?php echo set_value('ed_Revisi') ?>">
                </div>

                <br><br>

              </div>
              <div class="form-group">
                <label for="tgl_berlaku" class="col-sm-2 control-label">Tanggal Berlaku </label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="tgl_berlaku" id="no_met" required="" placeholder="" value="<?php echo set_value('tgl_berlaku') ?>">
                </div>
              </div>
<br><br>
<br>

              <div class="form-group">
              <label for="halaman" class="col-sm-2 control-label"> Page </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="halaman" id="no_met" required="" placeholder="" value="<?php echo set_value('halaman') ?>">
                </div>
              </div>
              <br>
              <br>
              <br>

        <div class="box-footer">
                  <button type="submit" style="" name="simpan" class="btn btn-primary btn-lg  btn-block"  style="">
                  Save</button>

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
$no=1;
foreach ($data->result() as $r) {

      					 ?>
      			<tbody>
      				<tr>
      					<td><?php echo $no;?></td>
      					<td><?php echo $r->no_dokumen ?></td>
      					<td><?php echo $r->ed_Revisi ?></td>
      					<td><?php echo $r->tgl_berlaku ?></td>
      					<td><?php echo $r->halaman ?></td>
      					<td>
      						<a href="<?php echo base_url().'penyelia/hapus/'.$r->id_laporan ?>"
                                      onClick="return confirm('Apakah Anda Ingin Menghapus Data Tersebut??')"/><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
      					</td>
      					<td>
      						<a href="<?php echo base_url().'penyelia/eddit/'.$r->id_laporan ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>
      					</td>
      				</tr>
      			</tbody>

      			<?php
      $no++;				}
      			 ?>
      		</table>
      </div>

</div>
<script src="<?php echo base_url() ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
