
<!DOCTYPE html>
<html>
<head>
  <title>
    Database LSP LPPOM MUI
  </title>
  <link rel="stylesheet" type="text/css"  href="<?php echo base_url() ?>assets/bs/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.min.css">
   <script type="text/javascript" src="<?php echo base_url() ?>assets/DataTables/media/js/jquery.js"></script>
  <script type="text/javascript"  src="<?php echo base_url() ?>assets/DataTables/media/js/jquery.dataTables.min.js"></script>
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

    .d{
     padding-left: 380px;
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
  <div class="a">
  <a href="<?php echo base_url() ?>penyelia/export"><button type="button" class="btn btn-primary pull-left">Export To Excel</button></a>
  </div>

  <div class="b">
   <a href="<?php echo base_url() ?>penyelia/lap_penyeliahalal"><button type="button" class="btn btn-primary pull-left">See Report</button></a>
  </div>

  <div class="c">

   <a href="<?php echo base_url() ?>penyelia/input_data"><button type="button" class="btn btn-primary pull-left">Add Data</button></a>
   </div>

   <div class="d">

   <a href="<?php echo base_url() ?>penyelia/headerLaporan"><button type="button" class="btn btn-primary pull-left"> Set Your Report </button></a>
   </div>



   <br>
   <br>
   <br>
  <br>
  <br>
  <div class="row">
  		<div class="col-lg-6">
  			<form action="" method="get">
  				<div class="row clearfix">
  					<div class="col-lg-2 col-md-4 col-sm-4 col-xs-4">
  							<div class="form-group">
  								<input type="text" name="" value="Tahun" class="form-control" readonly>
  							</div>
  					</div>
  					<div class="col-lg-3">
  							<div class="form-group">
  							         <input type="number" name="tahun_asesmen" class="form-control" value="<?php echo $this->input->get('tahun_asesmen')?>">
  							</div>
  					</div>
  							<button type="submit" class="btn btn-primary btn-sm m-l-15 waves-effect">Filter</button>
  			</div>
  			</form>
  		</div>
  		<div class="col-lg-6">
  			<form action="" method="get" class="pull-right">
  				<div class="row clearfix ">
  					<div class="col-lg-5 ">
  							<div class="form-group">
  										<select class="form-control" name="field">
  											<option value="batch">Batch</option>
  											<option value="no_serti">No Sertifikat</option>
  											<option value="no_reg_ser">No Registrasi Sertifikat</option>
  										</select>
  							</div>
  					</div>
  					<div class="col-lg-4">
  							<div class="form-group">
  								<input type="text" name="q" class="form-control" value="<?php echo $this->input->get('q')?>">
  							</div>
  					</div>
  					<div class="right">
  							<button type="submit" class="btn btn-primary btn-sm m-l-15 waves-effect">Search</button>
  					</div>
  			</div>
  			</form>
  		</div>
  	</div>
  <table class="table table-striped table-bordered" cellspacing="0" width="100%">
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
  				        <th>Keputusan</th>
                  <th>Detail</th>
                  <th>Hapus</th>
                  <th>Edit</th>
                  <th>Print</th>
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
                  <td><?php echo $r->no; ?></td>
                  <td><?php echo $r->asesi ?></td>
                  <td><?php echo $r->tgl_asesmen ?></td>
                  <td><?php echo $r->kom_tek_1 ?></td>
                  <td><?php echo $r->kom_tek_2 ?></td>
                  <td><?php echo $r->no_serti ?></td>
                  <td><?php echo $r->no_reg_ser ?></td>
  				<td><?php echo $r->keputusan ?></td>
                  <td>
                   <a href="<?php echo base_url().'penyelia/detail/'. $r->no; ?>"><button type="button" class="btn btn-success btn-sm">Detail</button></a>
                  </td>
                   <td>
                  <a href="<?php echo base_url().'penyelia/delete/'. $r->no ?>"
                          onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Tersebut??')"/><button type="button" class="btn btn-danger btn-sm">Hapus</button></a>
                 </td>
                  <td>
                       <a href="<?php echo base_url().'penyelia/edit/'. $r->no; ?>"><button type="button" class="btn btn-warning btn-sm">Edit</button></a>

                    </td>
                    <td>
                        <a href="<?php echo base_url().'penyelia/print_out/'. $r->no; ?>"><button type="button" class="btn btn-primary btn-sm" name="print">Print</button></a>
                          </td>
              </tr>
         <?php
         $no++;
        }
        ?>
          </tbody>
      </table>
  <nav class="text-center">
		<ul class="pagination">
			<?php echo $pagging->create_links() ?>
		</ul>
	</nav>
</div>
<script src="<?php echo base_url() ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
  $('.table-paginate').dataTable();
 } );
</script>
</body>
</html>
