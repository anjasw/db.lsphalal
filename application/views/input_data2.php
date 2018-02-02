<!DOCTYPE html>
<html>
<head>
	<title> Input Data </title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.min.css">
	 <link rel="icon" type="image/png" href="<?php  echo base_url() ?>assets/Icon LSP.png">

	<style type="text/css">
		#search {
			font-size: 15px;
			margin-left: 15px;
		}
		.test {
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
							Add Data
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
						<a href="<?php echo base_url() ?>auditor"><button type="button" style="border:1px solid #222d32; background-color: #222d32; width: 150px; height: 40px;" class="btn btn-primary pull-left">See Data</button></a>
						<a href="<?php echo base_url() ?>auditor/asesor"><button type="button" style="border:1px solid #222d32; background-color: #222d32; width: 150px; height: 40px; margin-left: 73%;" class="btn btn-primary pull-left">Add Data Assessor</button></a>
						<br><br><br>
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="form-group">
									<label for="batch" class="col-sm-2 control-label" style="margin-left: -15px;">Batch</label>
									<div class="col-sm-10" style="margin-left: px; width: ">
										<input type="number" name="batch" required="" class="form-control" id="batch">
										<?php echo form_error('batch', '<div style="color:red;font-style:italic;">','</div>'); ?>
									</div>
								</div>
								<br>
								<br>
								<div class="form-group">
									<label for="assesor" class="col-sm-2 control-label" style="margin-left: -15px;">Assessor</label>
									<div class="col-sm-10" style="margin-left: ;">
										<select name="assesor" class="form-control">
										<option value=""></option>
                    <?php
                      foreach ($a->result() as $r) {
                    ?>
                    <option value="<?php echo $r->asesor ?>"><?php echo $r->asesor ?></option>
                    <?php } ?>
                  </select>
									</div>
								</div>
								<br>
								<br <div class="form-group">
								<label for="asesi" class="col-sm-2 control-label" style="margin-left: -15px;">Asesi</label>
								<div class="col-sm-10" style="margin-left: ">
									<input type="text" class="form-control" name="asesi" id="asesi">
									<?php echo form_error('asesi', '<div style="color:red;font-style:italic;">','</div>'); ?>
								</div>
							</div>
							<div class="form-group">
								<label for="jk" class="col-sm-2" control-label "">Gender</label>
								<div class="col-sm-2">
									<select style="" name="jk" class="form-control">
									<option value=""></option>
                  <option value="Laki - Laki">Male</option>
                  <option value="Perempuan">Female</option>
                  </select>
								</div>
								<label for="email" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-2" style="margin-left: -110px; width: 350px">
									<input type="text" id="email" class="form-control" name="email">
									<?php echo form_error('email', '<div style="color:red;font-style:italic;">','</div>'); ?>
								</div>
								<label for="no_hp" class="col-sm-3 control-label" style="margin-left: 10px;">No Hp</label>
								<div class="col-sm-1" style="margin-left: 80px; width: 235px; margin-top: -25px;">
									<input type="text" name="no_hp" class="form-control">
									<?php echo form_error('no_hp', '<div style="color:red;font-style:italic;">','</div>'); ?>
								</div>
							</div>
							<br>
							<br>
							<div class="form-group">
								<label for="tgl_asesmen" class="col-sm-2 control-label">Assesmen Date</label>
								<div class="col-sm-2">

									<input type="date" id="tanggal" class="form-control" name="tgl_asesmen" placeholder="Masukan Tanggal">
									<?php echo form_error('tgl_asesmen', '<div style="color:red;font-style:italic;">','</div>'); ?>
								</div>
								<label for="uji_lanjut" class="col-sm-2 control-label">Next Test <br>requirement</label>
								<div class="col-sm-2">
									<select style="margin-left:-70px;" name="uji_lanjut" class="form-control">
                  <option value="Tidak" selected>Tidak</option>
									<option value="Ya" >Ya</option>
                  </select>
								</div>
								<label for="tgl_rpt_kmt_tkns" class="col-sm-3 control-label" style="margin-left: -80px;">Date of technical <br>committee meeting</label>
								<div class="col-sm-1" style="margin-left: -120px; width: 280px;">
									<input type="date" name="tgl_rpt_kmt_tkns" class="form-control">
									<?php echo form_error('tgl_rpt_kmt_tkns', '<div style="color:red;font-style:italic;">','</div>'); ?>
								</div>
							</div>
							<br>
							<br>
							<div class="form-group">
								<label for="kom_tek_1" class="col-sm-2 control-label">Technical Committee 1</label>
								<div class="col-sm-2" style="width: 250px;">

									<select name="kom_tek_1" class="form-control">
									<option value=""></option>
                  <?php

                      foreach ($a->result() as $r) {
                    ?>
                    <option value="<?php echo $r->asesor ?>"><?php echo $r->asesor ?></option>
                    <?php } ?>
                  </select>

								</div>

								<div class="form-group">
									<label for="kom_tek_2" class="col-sm-2 control-label " style="margin-left: -20px;">Technical <br>Committee 2</label>
									<div class="col-sm-2" style="margin-left: -80px; width: 250px;">

										<select name="kom_tek_2" class="form-control">
										<option value=""></option>
                      <?php

                      foreach ($a->result() as $r) {
                    ?>
                    <option value="<?php echo $r->asesor ?>"><?php echo $r->asesor ?></option>
                    <?php } ?>
                  </select>

									</div>

								</div>

								<div class="form-group">
									<label for="kom_tek_3" class="col-sm-2 control-label" style="margin-left: -20px;">Technical <br>Committee 3</label>
									<div class="col-sm-3" style="margin-left: -90px; width: 265px;">

										<select name="kom_tek_3" class="form-control">
										<option value=""></option>
                    <?php
                      foreach ($a->result() as $r) {
                    ?>
                    <option value="<?php echo $r->asesor ?>"><?php echo $r->asesor?></option>
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
									<select name="keputusan" class="form-control">
                    <option value="Kompeten">Kompeten</option>
                    <option value="Belum Kompeten">Belum Kompeten</option>
                  </select>
								</div>

								<label for="tgl_pen_ser" class="col-sm-3 control-label">Certificate Issuance Date</label>
								<div class="col-sm-4" style="margin-left: -50px; width: 416px; ">
									<input type="date" name="tgl_pen_ser" class="form-control">
									<?php echo form_error('tgl_pen_ser', '<div style="color:red;font-style:italic;">','</div>'); ?>
								</div>
							</div>

							<br>
							<br>

							<div class="form-group">
								<label for="keterangan" class="col-sm-2 control-label">  Information   </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="keterangan" placeholder="Masukan Keterangan">
									<?php echo form_error('keterangan', '<div style="color:red;font-style:italic;">','</div>'); ?>
								</div>
							</div>


							<br>
							<br>

							<div class="form-group">
								<label for="no_serti" class="col-sm-2 control-label">No Certificate</label>
								<div class="col-sm-10">
									<div class="col-sm-10" style="margin-left:  -15px; width: 103%  ">
										<input type="text" id="no_serti" name="no_serti" value="<?php echo $kode_otomatis; ?>" class="form-control">
									</div>
								</div>
								<br>

								<br>
								<br>

								<div class="form-group">
									<label for="no_ser_ser" class="col-sm-2 control-label">Certificate series number</label>
									<div class="col-sm-10">
										<input type="text" id="no_ser_ser" name="no_ser_ser" value="<?php echo $hasilkode; ?>" class="form-control">
									</div>
								</div>

								<br>
								<br>


								<div class="form-group">
									<label for="no_reg_ser" class="col-sm-2 control-label">Certificate Registration number</label>
									<div class="col-sm-10">
										<input type="text" id="no_reg_ser" name="no_reg_ser" value="<?php echo $hk; ?>" class="form-control">
									</div>
								</div>

								<br>
								<br>
								<div class="form-group">
									<label for="no_ber_ac" class="col-sm-2 control-label"> BA Number</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="no_ber_ac">
										<?php echo form_error('no_ber_ac', '<div style="color:red;font-style:italic;">','</div>'); ?>
									</div>
									<?php
                  foreach ($hasil->result() as $hasil) {
                   ?>
										<div class="col-sm-5">
											<input type="text" class="form-control" value="<?php echo $hasil->maxnoberac ?>" readonly>
										</div>
										<?php } ?>
								</div>
								<br><br>
								<div class="form-group">

									<label for="provinsi" class="col-sm-3 control-label">Provinces</label>

									<div class="col-sm-4" style="margin-left: -95px; width: 416px; ">
										<select name="provinsi" class="form-control">
				<option value=""></option>
                    <option> Nanggro Aceh Darussalam </option>
                    	<option value="Sumatera Utara"> Sumatera Utara </option>
											<option value="Sumatera Barat"> Sumatera Barat </option>
											<option value="Riau"> Riau </option>
											<option value="Kepulauan Riau"> Kepulauan Riau </option>
											<option value="Jambi"> Jambi </option>
											<option value="Sumatera Selatan"> Sumatera Selatan </option>
											<option value="Bangka Belitung"> Bangka Belitung </option>
											<option value="Bengkulu"> Bengkulu </option>
											<option value="Lampung"> Lampung </option>
											<option value="DKI Jakarta"> DKI Jakarta </option>
											<option value="Jawa Barat"> Jawa Barat </option>
											<option value="Banten"> Banten </option>
											<option value="Jawa Tengah"> Jawa Tengah </option>
											<option value="Daerah Istimewa Yogyakarta"> Daerah Istimewa Yogyakarta</option>
											<option value="Jawa Timur"> Jawa Timur </option>
											<option value="Bali"> Bali </option>
											<option value="Jawa Tengah"> Jawa Tengah </option>
											<option value="Nusa Tenggara Barat"> Nusa Tenggara Barat </option>
											<option value="Nusa Tenggara Timur"> Nusa Tenggara Timur </option>
											<option value="Kalimantan Barat"> Kalimantan Barat </option>
											<option value="Kalimantan Tengah"> Kalimantan Tengah </option>
											<option value="Kalimantan Selatan"> Kalimantan Selatan </option>
											<option value="Kalimantan Timur"> Kalimantan Timur </option>
											<option value="Kalimantan Utara"> Kalimantan Utara </option>
											<option value="Sulawesi Utara"> Sulawesi Utara </option>
											<option value="Sulawesi Barat"> Sulawesi Barat </option>
											<option value="Sulawesi Tengah"> Sulawesi Tengah </option>
											<option value="Sulawesi Tenggara"> Sulawesi Tenggara </option>
											<option value="Sulawesi Selatan"> Sulawesi Selatan </option>
											<option value="Gorontalo"> Gorontalo </option>
											<option value="Maluku"> Maluku </option>
											<option value="Maluku Utara"> Maluku Utara </option>
											<option value="Papua Barat"> Papua Barat </option>
											<option value="Papua"> Papua </option>
                  	</select>
									</div>
								</div>

								<label for="thn_lap" class="col-sm-3 control-label" style="margin-top: -10px">Year Report</label>
								<div class="col-sm-4" style="margin-left: -135px; width: 380px; margin-top: -15px; ">
									<input type="number" name="thn_lap" class="form-control">
									<?php echo form_error('thn_lap', '<div style="color:red;font-style:italic;">','</div>'); ?>
								</div>
							</div>
							<br>
							<br>
							<div class="form-group">
								<label for="tanggal" class="col-sm-2 control-label"> Certificate Submission Date </label>
								<div class="col-sm-10">
									<input type="date" class="form-control" name="tanggal" placeholder="Masukan Tanggal">
									<?php echo form_error('tanggal', '<div style="color:red;font-style:italic;">','</div>'); ?>
								</div>
							</div>
							<br><br>
							<!-- <div class="form-group">
								<label for="catatan" class="col-sm-2 control-label"> Catatan </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="catatan" placeholder="Masukan Catatan">
									<?php //echo form_error('catatan', '<div style="color:red;font-style:italic;">','</div>'); ?>
								</div>
							</div> -->
							<!-- <div class="col-sm-5">
              <div class="form-group">
                <label for="inputPassword" class="col-sm-4">Tanggal Asesmen</label>F                <div class="col-sm-8">
                  <input type="date" class="form-control" id="">
                </div>
              </div>
            </div> -->

							<!-- <div class="col-sm-5">
              <div class="form-group">
                <label for="uji_lanjut" class="col-sm-2 control-label">Uji Lanjut</label>
                <div class="col-sm-10">
                  <select type="text" class="form-control" >
                      <option> </option>
                      <option> Ya </option>
                      <option> No</option>
                  </select>
                </div>
              </div>
            </div> -->
							<br>
							<br>

							<div class="box-footer">
								<button type="submit" style="" name="simpan" class="btn btn-success btn-lg  btn-block" style="">
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
