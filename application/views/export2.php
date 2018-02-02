<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.css">
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
  <a href="<?php echo base_url() ?>auditor/excel"><button class="btn btn-success" name="button">Export To Excel</button></a><br>
  <br><table class="table table-striped table-bordered table-paginate" cellspacing="0" width="100%">
         <thead>
             <tr style="font-size: 12px;" >
               <th>Batch</th>
                <th>Asesor</th>
                <th>No</th>
                 <th>Asesi</th>
                 <th>Tanggal Asesmen</th>
                 <th>Komite Teknis 1</th>
                 <th>Komite Teknis 2</th>
                 <th>No Sertifikat</th>
                 <th>No Reg Sertifikat</th>
            </tr>
         </thead>

         <tbody style="font-size: 11px">
         <?php
         $no = 1;
         foreach ($data->result() as $r) {

         ?>
             <tr>
                 <td><?php echo $r->batch ?></td>
                 <td><?php echo $r->assesor?></td>
                 <td><?php echo $no; ?></td>
                 <td><?php echo $r->asesi ?></td>
                 <td><?php echo $r->tgl_asesmen ?></td>
                 <td><?php echo $r->kom_tek_1 ?></td>
                 <td><?php echo $r->kom_tek_2 ?></td>
                 <td><?php echo $r->no_serti ?></td>
                 <td><?php echo $r->no_reg_ser ?></td>

             </tr>
        <?php
        $no++;
       }
       ?>
         </tbody>
     </table>
  </body>
</html>
