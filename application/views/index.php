<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LSP Halal MUI</title>
    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url() ?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url() ?>assets/bs/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php  echo base_url() ?>assets/bs/bootstrap.min.css">
    <link rel="icon" type="image/png" href="<?php  echo base_url() ?>assets/Icon LSP.png">

</head>
<body style="background: url(<?php echo base_url() ?>assets/bg.png) no-repeat center center fixed; background-size: cover;">
	<div class="login-box" style="margin:120px auto;">
      <div class="login-logo">
		<img src="<?php echo base_url() ?>assets/Logo LSP.png.png" id="logogambar" height="80" width="250">
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

				<?php echo $msg; ?>

		<form method="post" action="">
			<div class="form-group has-feedback">
				<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>">
        <?php echo form_error('username', '<div style="color:red;font-style:italic;">','</div>'); ?>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
        <?php echo form_error('password', '<div style="color:red;font-style:italic;">','</div>'); ?>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
				</div>
			</div>
        </form>


		<br>
        Go to site <a href="https://www.lsphalalmui.com" class="text-center">lsphalalmui.com</a> if you are not an admin & to see our website.

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

        <div class="quote" style="position:absolute; bottom:40px; width:100%; text-align: center; font-size: 22px; font-style: italic; font-family: 'Console', Monospace ">
			<font color="white">Reliable & Trustworthy <br>to assure human resources competency
			in the field of 'Halal' supply chain</font>
		</div>
		<footer><div style="padding: 10px 15px; position:absolute; bottom:0; width:100%; text-align: center; background-color: #3A539B;">
		<span style="color: white">Copyright &copy 2017 LSP LPPOM MUI</span>
		</div></footer>


  </div>
</div>

</body>
</html>
