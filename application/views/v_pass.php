<!DOCTYPE html>
<html>
	<head>
		<title>Perpustakaan STMIK MARDIRA</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="<?=base_URL()?>assets/js/jquery.js"></script>
		<script src="<?=base_URL()?>assets/js/bootstrap.js"></script>
		<link rel="shortcut icon" href="<?=base_URL()?>assets/img/mardira.png">
		<link href="<?=base_URL();?>assets/css/bootstrap.css" rel="stylesheet">
		<link href="<?=base_URL();?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=base_URL();?>assets/css/bootstrap-responsive.css" rel="stylesheet">
		<link href="<?=base_URL();?>assets/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?=base_URL();?>assets/css/ionicons.min.css" rel="stylesheet">
		<link href="<?=base_URL();?>assets/css/material-design-iconic-font.min.css" rel="stylesheet">
		<link href="<?=base_URL();?>assets/css/style.css" rel="stylesheet">
		<!-- asal link pinjam-->
		<link rel="shortcut icon" href="<?=base_URL()?>assets/img/mardira.png">
		<link href="<?php echo base_url('assests/bootstrap/css/bootstrap.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('assests/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
		<link href="<?=base_URL();?>assests/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    	<link href="<?php echo base_url('assests/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    	<link href="<?=base_URL();?>assests/bootstrap/css/font-awesome.min.css" rel="stylesheet">
    	<link href="<?=base_URL();?>assests/bootstrap/css/ionicons.min.css" rel="stylesheet">
		<link href="<?=base_URL();?>assests/bootstrap/css/material-design-iconic-font.min.css" rel="stylesheet">
		<link href="<?=base_URL();?>assests/bootstrap/css/bootstrap-select.css" rel="stylesheet">
		<link href="<?=base_URL();?>assests/bootstrap/css/style.css" rel="stylesheet">
		<script src="<?php echo base_url('assests/jquery/jquery.js')?>"></script>
		<script src="<?php echo base_url('assests/bootstrap/js/bootstrap-select.js')?>"></script>
		<!--<script src="<?php //echo base_url('assests/bootstrap/js/bootstrap.js')?>"></script>-->
		<script src="<?php echo base_url('assests/bootstrap/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('assests/datatables/js/jquery.dataTables.min.js')?>"></script>
		<script src="<?php echo base_url('assests/datatables/js/dataTables.bootstrap.js')?>"></script>
		<style type="text/css">
			.wrapper{
				max-width: 100%;
				width: 100%;
				margin: 0px auto;
				height: 100%;
			}
			
			header{
				background-color: #ffec01;
				width: 100%;
				height: 150px;
			}
			
			header #logo{
				float: left;
				margin-left: 370px;
			}

			header #logo img{
				height: 145px;
				width: 600px;
			}
			
			.navbar-default .navbar-nav >li >a:hover{
				background-color: #18bc9c;
			}

			.form-name{
				margin-top: 25px;
			}

			.form-signin {
				max-width: 300px;
				padding: 19px 29px 29px;
				margin: 0 auto 20px;
				background-color: #f8f6f5;
				border: 1px solid #e5e5e5;
				-webkit-border-radius: 5px;
					-moz-border-radius: 5px;
						border-radius: 5px;
				-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
					-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
						box-shadow: 0 1px 2px rgba(0,0,0,.05);
			}
      
			.form-signin .form-signin-heading,
			.form-signin .checkbox {
				margin-bottom: 10px;
			}
			
			.form-signin input[type="text"],
			.form-signin input[type="password"] {
				font-size: 16px;
				height: auto;
				margin-bottom: 15px;
				padding: 7px 9px;
			}
		</style>
	</head>

	<body>
		<div class="wrapper">
			<header>
				<div id="logo">
					<img src="<?=base_URL()?>assets/img/LogoSTMIK.jpg" class="img-responsive">
				</div>
			</header>	
			
			<nav class="navbar navbar-default" style="overlay:hidden; background-color:#34495e">
				<div class="container-fluid">
					<div>
						<ul class="nav navbar-nav">
							<li><a style="color:#ffffff" href="<?=base_URL()?>index.php/Login/home"><span class="glyphicon glyphicon-home" style="margin-right:5px"></span>Home</a></li>
							<li><a style="color:#ffffff" href="<?=base_URL()?>index.php/Login/anggota"><span class="glyphicon glyphicon-list-alt" style="margin-right:5px"></span>Anggota</a></li>
							<li><a style="color:#ffffff" href="<?=base_URL()?>index.php/Login/buku"><span class="glyphicon glyphicon-book" style="margin-right:5px"></span>Buku</a></li>
							<li><a style="color:#ffffff" href="<?=base_URL()?>index.php/Login/pinjam"><span class="glyphicon glyphicon-list" style="margin-right:5px"></span>Peminjaman</a></li>
							<li><a style="color:#ffffff" href="<?=base_URL()?>index.php/Login/kembali"><span class="glyphicon glyphicon-tasks" style="margin-right:5px"></span>Pengembalian</a></li>
							<li class="dropdown">
								<a style="color:#ffffff" class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-info-sign" style="margin-right:5px"></span>Tentang</a>
								<ul class="dropdown-menu">
									<li><a data-toggle="modal" data-target="#my" href="#"><span class="glyphicon glyphicon-asterisk" style="margin-right:5px"></span>Aplikasi</a></li>
									<li><a data-toggle="modal" data-target="#m" href="#"><span class="glyphicon glyphicon-question-sign" style="margin-right:5px"></span>Panduan</a></li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a style="color:#ffffff" class="dropdown-toggle" data-toggle="dropdown" href="#">Hai, 
								<?php 
									$admin = $this->session->userdata("nama");
									$nama = $this->db->query("SELECT NAMA FROM admin WHERE ID = '$admin'")->result();
									foreach ($nama as $id) {
										echo $id->NAMA;
									}
								?>
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url()."index.php/Login/logout"?>"><span class="glyphicon glyphicon-log-out" style="margin-right:5px"></span>Logout</a></li>
									<li><a href="<?php echo base_url()."index.php/Login/gantinama"?>"><span class="glyphicon glyphicon-font" style="margin-right:5px"></span>Ganti Nama</a></li>
									<li><a href="<?php echo base_url()."index.php/Login/gantipass"?>"><span class="glyphicon glyphicon-barcode" style="margin-right:5px"></span>Ganti Password</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<div class="modal fade" id="my">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">TENTANG APLIKASI</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>

								<div class="modal-body">
									<div class="container">
										<h3>Aplikasi ini dibuat untuk Program Kerja Praktik</h3>
										<h4>Jurusan Teknik Informatika UIN Sunan Gunung Djati Bandung</h4>
										<div class="row">
											<div class="col-md-6 col-sm-6 col-lg-6">
												<div class="mini-stat clearfix bx-shadow">
													<img src="<?=base_URL()?>assets/img/lord.jpg" alt="" class="thumb-md img-circle" style="width:70px; height:80px">
													<div class="mini-stat-info text-right text-muted">
														<div class="coba" style="margin-top: -50px">
															<h5>1157050084</h5>
															<h5>Luthfi Muhammad</h5>
														</div>	
													</div>
												</div>
											</div>

											<div class="col-md-6 col-sm-6 col-lg-6">
												<div class="mini-stat clearfix bx-shadow">
													<img src="<?=base_URL()?>assets/img/septya.jpg" alt="" class="thumb-md img-circle" style="width:70px; height:80px">
													<div class="mini-stat-info text-right text-muted">
														<div class="coba" style="margin-top: -50px">
															<h5>1157050155</h5>
															<h5>Septya Egho P<h5>
														</div>		
													</div>
												</div>
											</div>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade" id="m">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">PANDUAN APLIKASI</h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>								

								<div class="modal-body">
									<div class="container">
										<div class="row">
											<div class="col-sm-12">
												<div class="mini-stat clearfix bx-shadow">
													<span class="mini-stat-icon bg-info" style="width:30px; height:30px"><p style="margin-top: -15px">1</p></span>
													<div class="mini-stat-info text-left text-muted">
														<h5>Login dengan Username dan Password yang telah didaftarkan.</h5>
													</div>
												</div>
											</div>

											<div class="col-sm-12" style="margin-top: -45px">
												<div class="mini-stat clearfix bx-shadow">
													<span class="mini-stat-icon bg-purple" style="width:30px; height:30px"><p style="margin-top: -15px">2</p></span>
													<div class="mini-stat-info text-left text-muted">
														<h5>Masuk ke Halaman Utama, terdapat data jumlah buku, anggota, peminjaman dan pengembalian.</h5>
													</div>
												</div>
											</div>

											<div class="col-sm-12" style="margin-top: -45px">
												<div class="mini-stat clearfix bx-shadow">
													<span class="mini-stat-icon bg-primary" style="width:30px; height:30px"><p style="margin-top: -15px">3</p></span>
													<div class="mini-stat-info text-left text-muted">
														<h5>Pada menu Anggota, kita dapat menambahkan, mengubah dan menghapus data anggota.</h5>
														<h5 style="margin-left: 40px">- Tambah : Klik tombol tambah kemudian isikan data lalu klik tombol simpan.</h5>
														<h5 style="margin-left: 40px">- Edit   : Klik tombol bergambar pensil lalu ubah data yang diinginkan lalu klik tombol simpan.</h5>
														<h5 style="margin-left: 40px">- Hapus  : Klik tombol bergambar tempat sampah jika ingin menghapus data.</h5>
													</div>
												</div>
											</div>

											<div class="col-sm-12" style="margin-top: -45px">
												<div class="mini-stat clearfix bx-shadow">
													<span class="mini-stat-icon bg-success" style="width:30px; height:30px"><p style="margin-top: -15px">4</p></span>
													<div class="mini-stat-info text-left text-muted">
														<h5>Pada menu Buku, kita dapat menambahkan, mengubah dan menghapus data buku.</h5>
														<h5 style="margin-left: 40px">- Tambah : Klik tombol tambah kemudian isikan data lalu klik tombol simpan.</h5>
														<h5 style="margin-left: 40px">- Edit   : Klik tombol bergambar pensil lalu ubah data yang diinginkan lalu klik tombol simpan.</h5>
														<h5 style="margin-left: 40px">- Hapus  : Klik tombol bergambar tempat sampah jika ingin menghapus data.</h5>
													</div>
												</div>
											</div>

											<div class="col-sm-12" style="margin-top: -45px">
												<div class="mini-stat clearfix bx-shadow">
													<span class="mini-stat-icon bg-inverse" style="width:30px; height:30px"><p style="margin-top: -15px">5</p></span>
													<div class="mini-stat-info text-left text-muted">
														<h5>Pada menu Peminjaman, kita dapat menambahkan, mengubah, menghapus dan mencetak data peminjaman.</h5>
														<h5 style="margin-left: 40px">- Tambah : Klik tombol tambah kemudian isikan data lalu klik tombol simpan, sebagian data akan masuk ke menu Pengembalian.</h5>
														<h5 style="margin-left: 40px">- Edit   : Klik tombol bergambar pensil lalu ubah data yang diinginkan lalu klik tombol simpan.</h5>
														<h5 style="margin-left: 40px">- Hapus  : Klik tombol bergambar tempat sampah jika ingin menghapus data.</h5>
														<h5 style="margin-left: 40px">- Cetak  : Klik tombol cetak untuk mencetak data per bulan.</h5>
													</div>
												</div>
											</div>

											<div class="col-sm-12" style="margin-top: -45px">
												<div class="mini-stat clearfix bx-shadow">
													<span class="mini-stat-icon bg-muted" style="width:30px; height:30px"><p style="margin-top: -15px">6</p></span>
													<div class="mini-stat-info text-left text-muted">
														<h5>Pada menu Pengembalian, kita dapat mengubah, menghapus dan mencetak data pengembalian.</h5>
														<h5 style="margin-left: 40px">- Edit   : Klik tombol bergambar pensil lalu ubah data yang diinginkan lalu klik tombol simpan.</h5>
														<h5 style="margin-left: 40px">- Hapus  : Klik tombol bergambar tempat sampah jika ingin menghapus data.</h5>
														<h5 style="margin-left: 40px">- Cetak  : Klik tombol cetak untuk mencetak data per bulan.</h5>
													</div>
												</div>
											</div>

											<div class="col-sm-12" style="margin-top: -45px">
												<div class="mini-stat clearfix bx-shadow">
													<span class="mini-stat-icon bg-danger" style="width:30px; height:30px"><p style="margin-top: -15px">7</p></span>
													<div class="mini-stat-info text-left text-muted">
														<h5>Pada bagian kanan terdapat nama user dan bila di klik akan muncul tiga menu :</h5>
														<h5 style="margin-left: 40px">- Logout         : Jika ingin keluar dari program.</h5>
														<h5 style="margin-left: 40px">- Ganti Nama     : Jika ingin mengganti nama User.</h5>
														<h5 style="margin-left: 40px">- Ganti Password : Jika ingin mengganti Password.</h5>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</nav>

			<div class="form-name">
				<form class="form-signin" action="<?php echo base_url()."index.php/Login/edit_password" ?>" method="post">
					<legend>GANTI PASSWORD</legend>
					<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
					<input type="password" class="input-block-level" placeholder="Password Lama" name="old_password" id="old_password" autofocus required>
					<input type="password" class="input-block-level" placeholder="Password Baru" name="new_password" id="new_password" autofocus required>
					<input type="password" class="input-block-level" placeholder="Ulangi Password" name="conf_password" id="conf_password" autofocus required>
					<input type="text" class="input-block-level" value="<?php echo "$admin"; ?>" Password" name="admin" id="admin" disabled>
					<button class="btn btn-large btn-primary" type="submit">SIMPAN</button>
				</form>
			</div>

			</div>
			<footer class="footer text-center" style="position: relative; background-color:#34495e; color:white; padding:10px 20px; bottom: -125px;">
				Copyright © Informatika UIN 2018
			</footer>
		</div>
	</body>
</html>