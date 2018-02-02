<!DOCTYPE html>
<html>
<head>
	<title> Input Data </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.min.css">
	 <link rel="icon" type="image/png" href="<?php  echo base_url() ?>assets/Icon LSP.png">

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
                  Tambah Pendaftaran
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
                <a href="<?php echo base_url() ?>regist"><button type="button" style="border:1px solid #222d32; background-color: #222d32; width: 150px; height: 40px;" class="btn btn-primary pull-left">See Data</button></a>

                <br><br><br>
                <div class="panel panel-default">
                  <div class="panel-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10" style="margin-left: -10px; width: ">
                  <input type="text" name="nama" required="" class="form-control" placeholder="Masukan Nama" value="<?php echo set_value('nama') ?>">
                  <?php echo form_error('nama', '<div style="color:red;font-style:italic;">','</div>'); ?>
                </div>
              </div>

              <br>
              <br>

              <div class="form-group">
                <label class="col-sm-2 control-label">Perusahaan</label>
                <div class="col-sm-10" style="margin-left: -10px; width: ">
                  <input type="text" name="perusahaan"  class="form-control" placeholder="Masukan perusahaan" value="<?php echo set_value('perusahaan') ?>">
                  <?php echo form_error('perusahaan', '<div style="color:red;font-style:italic;">','</div>'); ?>
                </div>
              </div>

              <br>
              <br>


              <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10" style="margin-left: -10px; width: ">
                  <input type="text" name="email" class="form-control" placeholder="Masukan email" value="<?php echo set_value('email') ?>">
                  <?php echo form_error('email', '<div style="color:red;font-style:italic;">','</div>'); ?>
                </div>
              </div>

              <br>
              <br>

              <div class="form-group">
                <label class="col-sm-2 control-label">Metode</label>
                <div class="col-sm-10" style="margin-left: -10px; width: ">
                  <input type="text" name="metode" class="form-control" placeholder="Masukan metode" value="<?php echo set_value('metode') ?>">
                  <?php echo form_error('metode', '<div style="color:red;font-style:italic;">','</div>'); ?>
                </div>
              </div>

              <br>
              <br>
              <div class="form-group">
                <label class="col-sm-2 control-label">Pembayaran</label>
                <div class="col-sm-10" style="margin-left: -10px; width: ">
                  <input type="text" name="pembayaran" class="form-control" placeholder="Masukan pembayaran" value="<?php echo set_value('pembayaran') ?>">
                  <?php echo form_error('pembayaran', '<div style="color:red;font-style:italic;">','</div>'); ?>
                </div>
              </div>

              <br>
              <br>
              <div class="form-group">
                <label class="col-sm-2 control-label">Informasi</label>
                <div class="col-sm-10" style="margin-left: -10px; width: ">
                  <input type="text" name="informasi" class="form-control" placeholder="Masukan informasi" value="<?php echo set_value('informasi') ?>">
                  <?php echo form_error('informasi', '<div style="color:red;font-style:italic;">','</div>'); ?>
                </div>
              </div>

              <br>
              <br>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tindak Lanjut</label>
                <div class="col-sm-10" style="margin-left: -10px; width: ">
                  <input type="text" name="tindak_lanjut"  class="form-control" placeholder="Masukan tindak lanjut" value="<?php echo set_value('tindak_lanjut') ?>">
                  <?php echo form_error('tindak_lanjut', '<div style="color:red;font-style:italic;">','</div>'); ?>
                </div>
              </div>

              <br>
              <br>


              <div class="form-group">


        <div class="box-footer">
                  <button type="submit" style="" name="simpan" class="btn btn-danger btn-lg  btn-block"  style="">
                  Save</button>

       </div>
      </div>
     </div>
          </form>
       </div>
</div>
<script src="<?php echo base_url() ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
