<!DOCTYPE html>
<html>
<head>
  <title>
    Database LSP LPPOM MUI
  </title>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.min.css">
   <script type="text/javascript" src="<?php echo base_url() ?>assets/DataTables/media/js/jquery.js"></script>
   <script type="text/javascript" src="<?php echo base_url() ?>assets/DataTables/media/js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/DataTables/media/css/jquery.dataTables.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <link rel="icon" type="image/png" href="<?php  echo base_url() ?>assets/Icon LSP.png">


   <style type="text/css">
     .a{
      font-size: 10px;
     }
     #s{
      width: 300px;
      margin-left: 1px;

     }
     #search{penyembelih
      font-size: 20px;
      margin-left: 15px;
     }
     .detail{
      text-align: center;

     }

     .a{
      padding-left: 10px;
     }
     .b{
      padding-left: 150px;
     }
     .c{
      padding-left: 270px;
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
<div class="a">
 <a href="<?php echo base_url() ?>penyembelih/export2"><button type="button" class="btn btn-warning pull-left">Export To Excel</button></a>
 </div>

 <div class="b">
 <a href="<?php echo base_url() ?>penyembelih/report"><button type="button" class="btn btn-warning pull-left">See Report</button></a>
 </div>

 <div class="c">
 <a href="<?php echo base_url()?>penyembelih/input"><button type="button" class="btn btn-warning pull-left">Add Data</button></a>
 </div>
 <br>
 <br>
 <br>
<br>
<br>


<div class="bodytable">
<form method="post">
 <table class="table table-striped table-bordered table-paginate" cellspacing="0" width="100%">
        <thead>
            <tr style="font-size: 12px;" >
              <th>Batch</th>
               <th>Asesor</th>
               <th>No</th>
                <th>Asesi</th>
                <th>Tanggal asesmen</th>
                <th>Komite Teknis 1</th>
                <th>Komite Teknis 2</th>
                <th>No Sertifikat</th>
                <th>No Reg Sertifikat</th>
                <th>Detail</th>
                <th>Hapus</th>
                <th>Edit</th>
                <th>Print</th>
            </tr>
        </thead>

        <tbody style="font-size: 11px">
        <?php
        $no = 1;
        foreach ($juru->result() as $r) {


?>
            <tr>
                <td><?php echo $r->batch ?></td>
                <td><?php echo $r->assesor?></td>
                <td><?php echo $no; ?></td>
                <td><?php echo $r->asesi ?></td>
               <td><?php echo  $r->tgl_asesmen ?></td>
               <td><?php echo  $r->kom_tek_1 ?></td>
                <td><?php echo $r->kom_tek_2 ?></td>
                <td><?php echo $r->no_serti ?></td>
                <td><?php echo $r->no_reg_ser ?></td>
                <td>
                 <a href="<?php echo base_url().'penyembelih/detail/'.$r->no ?>"><button type="button" class="btn btn-success btn-sm">Detail</button></a>
                </td>
                 <td>
                <a href="<?php echo base_url().'penyembelih/hapus/'.$r->no ?>"
                        onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Tersebut??')"/><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
               </td>
                <td>
                     <a href="<?php echo base_url().'penyembelih/edit/'.$r->no ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>

                  </td>
                  <td>
                      <a href="<?php echo base_url() ?>penyembelih/export/<?php echo $r->no ?>"><button type="button" class="btn btn-primary btn-sm" name="print">Print</button></a>
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
