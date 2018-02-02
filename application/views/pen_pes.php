<!DOCTYPE html>
<html>
<head>
  <title>
    Database LSP LPPOM MUI
  </title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
  <script type="text/javascript" src="<?php echo base_url() ?>assets/DataTables/media/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/DataTables/media/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/DataTables/media/css/jquery.dataTables.css">
   <link rel="icon" type="image/png" href="<?php  echo base_url() ?>assets/Icon LSP.png">
   <style type="text/css">

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
  <a href ="<?php echo base_url() ?>regist/input_pen_pes">
  <div class="btn btn-danger" name="button" value="" style="margin-left: 10px;">
    Add Data
  </div></a>
  <br>
  <br>
  <br>
<div class="bodytable">
<form method="post">
 <table class="table table-striped table-bordered table-paginate" cellspacing="0" width="100%">
        <thead>
             <tr style="font-size: 15px; text-align: center;" >
                <th>No</th>
                <th>Nama </th>
                <th>Perusahaan</th>
                <th>Email</th>
                <th>Metode Pendaftaran</th>
                <th>Pembayaran</th>
                <th>Informasi Terakhir</th>
                <th>Tindak Lanjuti</th>
                <th>Hapus</th>
                <th>Edit</th>
            </tr>
        </thead>


        <tbody style="font-size: 15px">
        <?php
        $no = 1;
        foreach ($tampil->result() as $r) {

         ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r->nama ?></td>
                <td><?php echo $r->perusahaan ?></td>
                <td><?php echo $r->email ?></td>
                <td><?php echo $r->metode ?></td>
                <td><?php echo $r->pembayaran ?></td>
                <td><?php echo $r->informasi ?></td>
                <td><?php echo $r->tindak_lanjut ?></td>
                <td>
                <a href="<?php echo base_url().'regist/delete/'.$r->id_pendaftaran ?>"
                        onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Tersebut??')"/><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
               </td>
                <td>
                     <a href="<?php echo base_url().'regist/edit_pen_pes/'.$r->id_pendaftaran ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>

                  </td>

            </tr>
       <?php $no++; } ?>
        </tbody>
    </table>
</form>
</div>

<script src="<?php echo base_url() ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
  $('.table-paginate').dataTable();
 } );
</script>


</body>

</html>
