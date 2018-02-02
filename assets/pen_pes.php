<?php

include "pengatur.php";
include "koneksi/koneksi.php";

@$perintah = new pengatur();
@$table = "tbl_pendaftaran";
@$where = "id_pendaftaran = '$_GET[id]'";
@$redirect = "?menu=pendaftaran_peserta";

if (isset($_GET['hapus'])) {
  @$perintah -> hapus($table,$where,$redirect);
}



 ?>

<!DOCTYPE html>
<html>
<head>
  <title>
    Database LSP LPPOM MUI 
  </title>
  <link rel="stylesheet" type="text/css" href="bs/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bs/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="DataTables/media/js/jquery.js"></script>
  <script type="text/javascript" src="DataTables/media/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css">
   <style type="text/css">

   </style>
</head>
<body>

  <a href="?menu=input_pen_pes">
  <div class="btn btn-danger" name="button" value=""  href ="input_pen_pes.php" style="margin-left: 10px;">
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

            $a = @$perintah->tampil("tbl_pendaftaran");
                          $no = 0;
                          if ($a == "") {
                              echo "<tr><td align='center' colspan='19'>Tidak Ada Inputan</td></tr>";
                           }else{
                            foreach ($a as $r) {
                             
                            $no++

         ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r['nama']; ?></td>
                <td><?php echo $r['perusahaan'];?></td>
                <td><?php echo $r['email'];?></td>
                <td><?php echo $r['metode'];?></td>
                <td><?php echo $r['pembayaran'];?></td>
                <td><?php echo $r['informasi'];?></td>
                <td><?php echo $r['tindak_lanjut'];?></td>
                    <td>
                <a href="?menu=pendaftaran_peserta&hapus&id=<?php echo $r['id_pendaftaran']?>"
                        onClick="return confirm('Hapus Inputan')"/><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>                            
               </td>
                <td>
                     <a href="?menu=input_pen_pes&edit&id=<?php echo $r['id_pendaftaran']; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>

                  </td>
    
            </tr>
       <?php }} ?>    
        </tbody>
    </table>
</form>
</div>



<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
  $('.table-paginate').dataTable();
 } );
</script>


</body>

</html>