  <?php
include "pengatur.php";
include "koneksi/koneksi.php";

@$perintah = new pengatur();
@$table = "tbl_penyembelih";
@$where = "no = '$_GET[id]'";
@$redirect = "?menu=juru_sembelih_halal";

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
   <script type="text/javascript" src="DataTables/media/js/jquery.js"></script>
  <script type="text/javascript" src="DataTables/media/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  

   <style type="text/css">
     .a{
      font-size: 10px;
     }
     #s{
      width: 300px;
      margin-left: 1px;

     }
     #search{
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

<div class="a">
 <a href="?menu=export_data_penyembelih"><button type="button" class="btn btn-warning pull-left">Export To Excel</button></a>
 </div>

 <div class="b">
 <a href="?menu=lap_penyembelih"><button type="button" class="btn btn-warning pull-left">See Report</button></a>
 </div>

 <div class="c">
 <a href="?menu=input_penyembelih"><button type="button" class="btn btn-warning pull-left">Add Data</button></a>
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

            $a = @$perintah->tampil($table);
                          $no = 0;
                          if ($a == "") {
                              echo "<tr><td align='center' colspan='19'>Tidak Ada Inputan</td></tr>";
                           }else{
                            foreach ($a as $r) {
                             
                            $no++

         ?>
            <tr>
                <td><?php echo $r['batch']; ?></td>
                <td><?php echo $r['assesor'];?></td>
                <td><?php echo $no; ?></td>
                <td><?php echo $r['asesi'];?></td>
               <td><?php echo @$perintah -> tanggal_indo($r['tgl_asesmen']);?></td>
               <td><?php echo  $r['kom_tek_1']?></td>
                <td><?php echo $r['kom_tek_2'];?></td>
                <td><?php echo $r['no_serti'];?></td>
                <td><?php echo $r['no_reg_ser'];?></td>
                <td>
                 <a href="?menu=form_detail_penyembelih&id=<?php echo $r['no']; ?>"><button type="button" class="btn btn-success btn-sm">Detail</button></a>                 
                </td>
                 <td>
                <a href="?menu=juru_sembelih_halal&hapus&id=<?php echo $r['no']?>"
                        onClick="return confirm('Hapus Inputan')"/><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>                            
               </td>
                <td>
                     <a href="?menu=input_penyembelih&edit&id=<?php echo $r['no']; ?>&no_ser_ser=<?php echo $r['no_ser_ser']; ?>&no_serti=<?php echo $r['no_serti']; ?>&no_reg_ser=<?php echo $r['no_reg_ser']; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>

                  </td>
                  <td>
                      <a href="?menu=print_penyembelih&CetakLaporan&id=<?php echo $r['no']; ?>&no_ser_ser=<?php echo $r['no_ser_ser']; ?>&no_serti=<?php echo $r['no_serti']; ?>&no_reg_ser=<?php echo $r['no_reg_ser']; ?>"><button type="button" class="btn btn-primary btn-sm" name="print">Print</button></a> 
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