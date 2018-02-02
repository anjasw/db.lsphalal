<?php
include "koneksi/koneksi.php";
 ?>

<!DOCTYPE html>
<html>

<head>
  <title></title>


    <link rel="stylesheet" type="text/css" href="bs/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bs/bootstrap.css">
      <!-- <link rel="icon" type="image/png" href="icon LSP.png"> -->
    </head>
    <link rel="stylesheet" type="text/css" href="css/style.css">

<body>
<nav class="navbar navbar-default" id="nav" style="  ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"> Test </span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?menu=selamatdatang"><img width="150px;" height="40px;" src="Logo LSP.png.png"> </a>
    </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" style="margin-left: 490px;">
        <li><a href="?menu=pendaftaran_peserta" id="pendaftaran">Registrasi</a></li>
        <li class=""><a href="?menu=beranda" id="penyelia">Penyelia Halal</span></a></li>
        <li><a href="?menu=auditor_halal " id="auditor">Auditor Halal</a></li>
        <li><a href="?menu=juru_sembelih_halal" id="juru">Juru Sembelih Halal</a></li>
        <li><a href="index.php" id="log">LogOut</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="content-wrapper">
    <section class="content">


      <!-- Small boxes (Stat box) -->
      <?php
          switch (@$_GET['menu']) {
          case "input_data";

                        include "input_data.php";
                        break;

          case "beranda";

                        include "beranda.php";
                        break;

          case "input_assessor";

                        include "input_assessor.php";
                        break;

          case "laporan";

                        include "pdflsp.php";
                        break;

          case 'indexN':
                        include "ExportkeExcel/indexN.php";
                        break;

          case 'input_no_ba':
                        include "input_no_ba.php";
                        break;

          case 'form_detail':
                        include "form_detail.php";
                        break;

          case 'pendaftaran_peserta':
                        include "pen_pes.php";
                        break;

          case 'input_pen_pes':
                        include "input_pen_pes.php";
                        break;

          case 'auditor_halal':
                        include "auditor_halal.php";
                        break;

          case 'input_auditor':
                        include "input_auditor.php";
                        break;

          case 'print_auditor':
                        include "print_auditor.php";
                        break;

          case 'form_detail_auditor':
                        include "form_detail_auditor.php";
                        break;

          case 'export_data_auditor':
                        include "exportauditor/export_data_auditor.php";
                        break;

          case 'juru_sembelih_halal':
                        include "jum_se_hal.php";
                        break;

          case 'input_penyembelih':
                        include "input_penyembelih.php";
                        break;

          case 'form_detail_penyembelih':
                        include "form_detail_penyembelih.php";
                        break;

          case 'export_data_penyembelih':
                        include "exportpenyembelih/export_data_penyembelih.php";
                        break;

          case 'print_penyembelih':
                        include "print_penyembelih.php";
                        break;

          case 'lap_penyeliahalal':
                        include 'lap_penyeliahalal.php';
                        break;

          case 'lap_audithalal':
                        include 'lap_audithalal.php';
                        break;

          case 'lap_penyembelih':
                        include 'lap_penyembelih.php';
                        break;

          case 'selamatdatang':
                        include 'selamatdatang.php';
                        break;

          case 'headerLaporan':
                        include 'headerLaporan.php';
                        break;





          }


          ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



</script>
</body>
<br>
<br>
</html>
