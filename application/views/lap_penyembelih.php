<!DOCTYPE html>
<html>
<head>
  <title></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.min.css">
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


    <div class="panel panel-default">
      <div class="panel-heading">
        <b>Laporan Penyelia Halal</b>
      </div>
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


                  <button class="btn btn-warning" name="submit" value="submit"> Submit</button>
                  <br>
                  <br>
</form>

      <?php
          if (isset($_POST['submit'])) {
        ?>

       <label class="col-sm-2 control-label"> Total Asesi</label>

            <div class="col-sm-5">
              <?php foreach ($sql3 as $sql3): ?>

                  <input type="text" class="form-control"  value="<?php echo $sql3->asesitahun2017 ?>" readonly>
                <?php endforeach; ?>

                </div>
  <br>
  <br>
        <label class="col-sm-2 control-label"> Kompeten</label>

            <div class="col-sm-5">
              <?php foreach ($sql1 as $sql1): ?>

                  <input type="text" class="form-control"  value="<?php echo $sql1->kompeten ?>" readonly>
                <?php endforeach; ?>
                </div>

<br>
<br>


      <label class="col-sm-2 control-label"> Belum Kompeten</label>

            <div class="col-sm-5">
              <?php foreach ($sql as $sql): ?>
                  <input type="text" class="form-control"  value="<?php echo $sql->belumkompeten ?>" readonly>
                <?php endforeach; ?>
                </div>


<br>
<br>
          <label class="col-sm-2 control-label"> Sertifikat yang diambil</label>

            <div class="col-sm-5">
              <?php foreach ($sql2 as $sql2): ?>

                  <input type="text" class="form-control"  value="<?php echo $sql2->sertifikat ?>" readonly>
                <?php endforeach; ?>
                </div>
<br>                <a href="<?php echo base_url() ?>penyembelih"><button class="btn btn-warning"> Kembali </button></a>

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
              <?php foreach ($totpesa as $totpesa): ?>

                  <input type="text" class="form-control"  value="<?php echo $totpesa->totalpesertaa ?>" readonly>
                <?php endforeach; ?>
                </div>
                <br>
                <br>
                <label class="col-sm-2 control-label"> Kompeten</label>

            <div class="col-sm-5">
              <?php foreach ($kombe as $kombe): ?>

                  <input type="text" class="form-control"  value="<?php echo $kombe->kompeten ?>" readonly>
                </div>

<br>
<br>

<label class="col-sm-2 control-label"> Belum Kompeten</label>

            <div class="col-sm-5">
                  <input type="text" class="form-control"  value="<?php echo $kombe->belumkompeten ?>" readonly>
                <?php endforeach; ?>
                </div>

<br>
<br>
          <label class="col-sm-2 control-label"> Sertifikat yang diambil</label>

            <div class="col-sm-5">
              <?php foreach ($belum as $belum): ?>

              <?php endforeach; ?>
                  <input type="text" class="form-control"  value="<?php echo $belum->sertifikat ?>" readonly>
                </div>

<br>
<br>

      <div class="panel-footer">
      <a href="<?php echo base_url() ?>penyembelih"><button class="btn btn-warning"> Kembali </button></a>

      </div>
    </div>

  </div>
</div>

</body>
</html>
