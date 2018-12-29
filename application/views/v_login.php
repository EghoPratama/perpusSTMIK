<!DOCTYPE html>
<html>
	<head>
		<title>Perpustakaan STMIK MARDIRA</title>
		<link rel="shortcut icon" href="<?=base_URL()?>assets/img/mardira.png">
		<link href="<?=base_URL()?>assets/css/bootstrap.css" rel="stylesheet">
		<style type="text/css">
			body{
				background-color: #f8f6f5;
			}

			body img{
				width: 920px;
				height: 710px;
			}

			.form-signin {
				float: right;
				margin-right: -50px;
				margin-top: -800px;
				max-width: 350px;
				padding: 19px 50px 199px;
				background-color: #f8f6f5;
				-webkit-border-radius: 5px;
					-moz-border-radius: 5px;
						border-radius: 5px;
				-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
					-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
						box-shadow: 0 1px 2px rgba(0,0,0,.05);
			}

			.form-signin img{
				width: 130px;
				height: 130px;
				position: relative;
				margin-left: 55px;
				margin-top: 105px;
				margin-bottom: 50px;
			}
      
			.form-signin .form-signin-heading,
			.form-signin .checkbox {
				margin-bottom: 10px;
			}
			
			.form-signin input[type="text"],
			.form-signin input[type="password"] {
				font-size: 16px;
				height: auto;
				margin-bottom: 20px;
				padding: 7px 25px;
			}
		</style>
		<link href="<?=base_URL()?>assets/css/bootstrap-responsive.css" rel="stylesheet">
		<script src="<?=base_URL()?>assets/js/jquery.js"></script>
	</head>
	
	<body>
		<img src="<?=base_URL()?>assets/img/LoginSTMIK.png" class="img-responsive">
		<div class="container">
    		<form class="form-signin" action="<?php echo base_url()."index.php/Login/aksi_login" ?>" method="post">
				<img src="<?=base_URL()?>assets/img/mardira.png">
				<legend>HALAMAN LOGIN</legend>
				<?php if(isset($_SESSION['failed'])) { ?>
      				<div class="alert alert-danger">Username dan Password Salah</div>
      			<?php } ?>
				<input type="text" class="input-block-level" placeholder="Username" name="username" autofocus required>
				<input type="password" class="input-block-level" placeholder="Password" name="password" autofocus required>
				<button class="btn btn-large btn-primary" type="submit">LOGIN</button>
				<a class="btn btn-large btn-primary" href="<?php echo base_url()."index.php/Login/register" ?>">REGISTER</a>
			</form>
		</div>			
	</body>
</html>