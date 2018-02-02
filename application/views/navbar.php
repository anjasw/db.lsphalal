
	<!DOCTYPE html>
	<html>

	<head>

	  <title></title>


	    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bs/bootstrap.css">
	      <!-- <link rel="icon" type="image/png" href="icon LSP.png"> -->
				<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
				<link rel="icon" type="image/png" href="<?php  echo base_url() ?>assets/Icon LSP.png">
        <script type="text/javascript" src="<?php echo base_url() ?>assets/DataTables/media/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/DataTables/media/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/DataTables/media/css/jquery.dataTables.css">
		 <link rel="icon" type="image/png" href="<?php  echo base_url() ?>assets/Icon LSP.png">

				<style type="text/css">

		    body{
		    	overflow: hidden;
		    }
		    	.wrapper{
			width: 90%;
			height: 540px;
			/*border: 1px solid black;*/
			margin: 60px;
			margin-top: 90px;

		}

		.lanjut{
			width: 500px;
			height: 200px;
			/*border: 1px solid red;*/
			margin-left: 580px;
			margin-top: -80px;
		}

		#gambar1{
			margin-left: 410px;
		}

		#gambar{
			margin-left: 380px;
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

	    <section class="content">
      <?php $this->load->view($view) ?>
    </section>
		<script src="<?php echo base_url() ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
      $('.table-paginate').dataTable();
     } );
    </script>

      </body>
      </html>
