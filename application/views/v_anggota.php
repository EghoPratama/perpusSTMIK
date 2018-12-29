<?php

$top = $this->db->query('SELECT NIM FROM `anggota` ORDER BY NIM DESC LIMIT 1;')->result_array();
	
$top2 = $top[0]['NIM']+1;

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Perpustakaan STMIK MARDIRA</title>
		<link rel="shortcut icon" href="<?=base_URL()?>assets/img/mardira.png">
		<link href="<?php echo base_url('assests/bootstrap/css/bootstrap.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('assests/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
		<link href="<?=base_URL();?>assests/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    	<link href="<?php echo base_url('assests/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    	<link href="<?=base_URL();?>assests/bootstrap/css/font-awesome.min.css" rel="stylesheet">
    	<link href="<?=base_URL();?>assests/bootstrap/css/ionicons.min.css" rel="stylesheet">
		<link href="<?=base_URL();?>assests/bootstrap/css/material-design-iconic-font.min.css" rel="stylesheet">
		<link href="<?=base_URL();?>assests/bootstrap/css/style.css" rel="stylesheet">
		<script src="<?php echo base_url('assests/jquery/jquery.js')?>"></script>
		<!--<script src="<?php //echo base_url('assests/bootstrap/js/bootstrap.js')?>"></script>-->
		<script src="<?php echo base_url('assests/bootstrap/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('assests/datatables/js/jquery.dataTables.min.js')?>"></script>
		<script src="<?php echo base_url('assests/datatables/js/dataTables.bootstrap.js')?>"></script>
		<!--<script src="<?=base_URL()?>assets/js/jquery.js"></script>
		<script src="<?=base_URL()?>assets/js/jquery.min.js"></script>
		<script src="<?=base_URL()?>assets/js/bootstrap.min.js"></script>
		<script src="<?=base_URL()?>assets/js/popper.min.js"></script>
		<script src="<?=base_URL()?>assets/js/jquery.dataTables.js"></script>
		<link href="<?=base_URL()?>assets/css/bootstrap.css" rel="stylesheet">
		<link href="<?=base_URL()?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=base_URL()?>assets/css/jquery.dataTables.css" rel="stylesheet">
		<link href="<?=base_URL()?>assets/css/dataTables.bootstrap.css" rel="stylesheet">-->			
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

			.container h1 span{
				margin-right: 5px;
			}
		</style>
	</head>

	<body>
		<div class="wrapper">
			<header>
				<div id="logo">
					<img src="<?=base_URL()?>assets/img/LogoSTMIK.jpg">
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
			

			<div class="container">
				<p><br/></p>
				<h1 class="page-header">
					<span class="glyphicon glyphicon-list-alt"></span>Data Anggota
					<div class="pull-right">
						<button type="button" class="btn btn-warning item_cetak" id="cetak"><span class="glyphicon glyphicon-print"></span>CETAK</button>
						<a href="#" class="btn btn-md btn-primary" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus glyphicon glyphicon-plus"></span>TAMBAH</a>
					</div>
				</h1>
				<table class="table table-striped table-bordered table-hover" id="mydata">
					<thead>
						<tr>
							<th>NO</th>
							<th>NIM</th>
							<th>NAMA</th>
							<th>JURUSAN</th>
							<th>ALAMAT</th>
							<th>NO.TELP</th>
							<th>FOTO</th>
							<th>TANGGAL PENDAFTARAN</th>
							<th>BIAYA PENDAFTARAN</th>
							<th>OPSI</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>NO</th>
							<th>NIM</th>
							<th>NAMA</th>
							<th>JURUSAN</th>
							<th>ALAMAT</th>
							<th>NO.TELP</th>
							<th>FOTO</th>
							<th>TANGGAL PENDAFTARAN</th>
							<th>BIAYA PENDAFTARAN</th>
							<th>OPSI</th>
						</tr>	
					</tfoot>
					<tbody id="show_data">
						
					</tbody>
				</table>

				<!-- MODAL ADD -->
		        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		            <div class="modal-dialog">
		            <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                <h3 class="modal-title" id="myModalLabel">Tambah Anggota</h3>
		            </div>
		            <form class="form-horizontal">
		                <div class="modal-body">
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3">NIM</label>
		                        <div class="col-xs-9">
		                            <input name="NIM" id="NIM" class="form-control" type="text" placeholder="NIM" style="width:335px;" required>
		                        </div>
		                    </div>
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3">NAMA</label>
		                        <div class="col-xs-9">
		                            <input name="NAMA" id="NAMA" class="form-control" type="text" placeholder="NAMA" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >JURUSAN</label>
		                        <div class="col-xs-9">
		                            <input name="JURUSAN" id="JURUSAN" class="form-control" type="text" placeholder="JURUSAN" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >ALAMAT</label>
		                        <div class="col-xs-9">
		                            <input name="ALAMAT" id="ALAMAT" class="form-control" type="text" placeholder="ALAMAT" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >NO. TELEPON</label>
		                        <div class="col-xs-9">
		                            <input name="NO_TELEPON" id="NO_TELEPON" class="form-control" type="text" placeholder="NO_TELEPON" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >TANGGAL PENDAFTARAN</label>
		                        <div class="col-xs-9">
		                            <input name="TANGGAL_PENDAFTARAN" id="TANGGAL_PENDAFTARAN" class="form-control" type="date" placeholder="TANGGAL_PENDAFTARAN" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >BIAYA PENDAFTARAN</label>
		                        <div class="col-xs-9">
		                            <input name="BIAYA_PENDAFTARAN" id="BIAYA_PENDAFTARAN" class="form-control" type="text" placeholder="BIAYA_PENDAFTARAN" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >Admin ID</label>
		                        <div class="col-xs-9">
		                            <input name="Admin_ID" id="Admin_ID" class="form-control" type="text" placeholder="admin" value="<?php echo "$admin";?>" style="width:335px;" disabled>
		                        </div>
		                    </div>
		 
		                </div>
		 
		                <div class="modal-footer">
		                	<button class="btn btn-info" id="btn_simpan">SIMPAN</button>
		                    <button class="btn" data-dismiss="modal" aria-hidden="true">BATAL</button>
		                </div>
		            </form>
		            </div>
		            </div>
		        </div>
		        <!--END MODAL ADD-->
		 
		        <!-- MODAL EDIT -->
		        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		            <div class="modal-dialog">
		            <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                <h3 class="modal-title" id="myModalLabel">Edit Anggota</h3>
		            </div>
		            <form class="form-horizontal">
		                <div class="modal-body">
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >NIM</label>
		                        <div class="col-xs-9">
		                            <input name="NIM_edit" id="NIM2" class="form-control" type="text" placeholder="NIM" style="width:335px;" readonly>
		                        </div>
		                    </div>
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >NAMA</label>
		                        <div class="col-xs-9">
		                            <input name="NAMA_edit" id="NAMA2" class="form-control" type="text" placeholder="NAMA" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >JURUSAN</label>
		                        <div class="col-xs-9">
		                            <input name="JURUSAN_edit" id="JURUSAN2" class="form-control" type="text" placeholder="JURUSAN" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >ALAMAT</label>
		                        <div class="col-xs-9">
		                            <input name="ALAMAT_edit" id="ALAMAT2" class="form-control" type="text" placeholder="ALAMAT" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >NO. TELEPON</label>
		                        <div class="col-xs-9">
		                            <input name="NO_TELEPON_edit" id="NO_TELEPON2" class="form-control" type="text" placeholder="NO_TELEPON" style="width:335px;" required>
		                        </div>
		                    </div>

							<div class="form-group">
		                        <label class="control-label col-xs-3" >TANGGAL PENDAFTARAN</label>
		                        <div class="col-xs-9">
		                            <input name="TANGGAL_PENDAFTARAN_edit" id="TANGGAL_PENDAFTARAN2" class="form-control" type="date" placeholder="TANGGAL_PENDAFTARAN" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >BIAYA PENDAFTARAN</label>
		                        <div class="col-xs-9">
		                            <input name="BIAYA_PENDAFTARAN_edit" id="BIAYA_PENDAFTARAN2" class="form-control" type="text" placeholder="BIAYA_PENDAFTARAN" style="width:335px;" required>
		                        </div>
		                    </div>		                    

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >Admin ID</label>
		                        <div class="col-xs-9">
		                            <input name="Admin_ID_edit" id="Admin_ID2" class="form-control" type="text" value="<?php echo "$admin"; ?>" style="width:335px;" disabled>
		                        </div>
		                    </div>
		 
		                </div>
		 
		                <div class="modal-footer">
		                	<button class="btn btn-info" id="btn_update">SIMPAN</button>
		                    <button class="btn" data-dismiss="modal" aria-hidden="true">BATAL</button>
		                </div>
		            </form>
		            </div>
		            </div>
		        </div>
		        <!--END MODAL EDIT-->
		 
		        <!--MODAL HAPUS-->
		        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		            <div class="modal-dialog" role="document">
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
		                        <h4 class="modal-title" id="myModalLabel">Hapus Anggota</h4>
		                    </div>
		                    <form class="form-horizontal">
		                    <div class="modal-body">
		                                           
		                            <input type="hidden" name="kode" id="textkode" value="">
		                            <div class="alert alert-warning"><p>Apakah Anda yakin menghapus anggota ini?</p></div>
		                                         
		                    </div>
		                    <div class="modal-footer">
		                    	<button class="btn_hapus btn btn-danger" id="btn_hapus">HAPUS</button>
		                        <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
		                    </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		        <!--END MODAL HAPUS-->

		        <!--MODAL CETAK-->
		        <div class="modal fade" id="ModalCetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		            <div class="modal-dialog" role="document">
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
		                        <h4 class="modal-title" id="myModalLabel">Cetak Data Anggota</h4>
		                    </div>
		                    <form action="<?php echo base_url()?>index.php/Login/cetak_anggota" method="GET" class="form-horizontal" target="blank">
		                <div class="modal-body">
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >Bulan</label>
		                        <div class="col-xs-9">
		                        	<select class="form-control" name="BULAN" id="BULAN" placeholder="Pilih Bulan..." style="width:335px;"  tabindex="-1" required>
		                        		<option value="">--Pilih Bulan--</option>
										<option value="01">Januari</option>
										<option value="02">Februari</option>
										<option value="03">Maret</option>
										<option value="04">April</option>
										<option value="05">Mei</option>
										<option value="06">Juni</option>
										<option value="07">Juli</option>
										<option value="08">Agustus</option>
										<option value="09">September</option>
										<option value="10">Oktober</option>
										<option value="11">November</option>
										<option value="12">Desember</option>
									</select>
		                        </div>
		                        <br><br>
		                        <label class="control-label col-xs-3" >Tahun</label>
		                        <div class="col-xs-9">
									<select class="form-control" name="TAHUN" id="TAHUN" placeholder="Pilih Tahun..." style="width:335px;"  tabindex="-1" required>
										<?php
											for ($i=date("Y"); $i>2015; $i--) 
											{ 
											echo '<option value="'.$i.'">'.$i.'</option>\n'; 
											}
										?>
									</select>
								</div>
		                    </div>
		                </div>
		                    <div class="modal-footer">
		                    	<button class="btn_hapus btn btn-info" id="btn_hapus">CETAK</button>
		                        <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
		                    </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		        <!--END MODAL CETAK-->

		        <!--MODAL UPDATE PHOTO-->
		        <div class="modal fade" id="ModalPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		            <div class="modal-dialog" role="document">
		                <div class="modal-content">
		                    <div class="modal-header">
		                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
		                        <h4 class="modal-title" id="myModalLabel">UPLOAD PHOTO</h4>
		                    </div>
		                    <br>
		                    <h4>Photo :</h4>
		                    <div id="uploaded_image">

							</div>
		                    <br>
		               	    <form method="post" id="upload_form" align="center" enctype="multipart/form-data">  
					            <input type="hidden" name="kode" id="textkode" value="">
					            <input class="form-control" type="file" name="image_file" id="image_file" />
					            <br>
					            <br>
		                    <div class="modal-footer">
		                        <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />
		                        <input type="submit" name="hapus_photo" id="hapus_photo" value="HAPUS" class="btn btn-danger" />
		                        <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
		                    </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		        <!--END MODAL UPDATE PHOTO-->
		        </div>
			<footer class="footer text-center" style="position: relative; background-color:#34495e; color:white; padding:10px 20px; bottom: -500px">
				Copyright © Informatika UIN 2018
			</footer>
		</div>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		tampil_data_anggota();	

		$('#mydata').DataTable();
		
		//fungsi tampil anggota
        function tampil_data_anggota(){
        	var no = 1;
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>index.php/Login/data_anggota',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                        		'<td>'+no+'</td>'+
                                '<td>'+data[i].NIM+'</td>'+
                                '<td>'+data[i].NAMA+'</td>'+
                                '<td>'+data[i].JURUSAN+'</td>'+
                                '<td>'+data[i].ALAMAT+'</td>'+
                                '<td>'+data[i].NO_TELEPON+'</td>'+
                                '<td>'+'<a href="javascript:;" class="btn btn-info btn-md ion-eye item_photo" data="'+data[i].NIM+'">'+' '+'FOTO</a>'+' '+
                                '<td>'+data[i].TANGGAL_PENDAFTARAN+
                                '<td>'+data[i].BIAYA_PENDAFTARAN+
                                '</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-success btn-md ion-edit item_edit" data="'+data[i].NIM+'"></a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-md ion-ios7-trash item_hapus" data="'+data[i].NIM+'"></a>'+
                                '</td>'+
                                '</tr>';
                        no++;
                    }
                    $('#show_data').html(html);
                }
 
            });
        }

		//GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/Login/get_anggota')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(NIM,NAMA,JURUSAN,ALAMAT,NO_TELEPON,TANGGAL_PENDAFTARAN,BIAYA_PENDAFTARAN,Admin_ID){
                        $('#ModalaEdit').modal('show');
                        $('[name="NIM_edit"]').val(data.NIM);
                        $('[name="NAMA_edit"]').val(data.NAMA);
                        $('[name="JURUSAN_edit"]').val(data.JURUSAN);
                        $('[name="ALAMAT_edit"]').val(data.ALAMAT);
                        $('[name="NO_TELEPON_edit"]').val(data.NO_TELEPON);
                        $('[name="TANGGAL_PENDAFTARAN_edit"]').val(data.TANGGAL_PENDAFTARAN);
                        $('[name="BIAYA_PENDAFTARAN_edit"]').val(data.BIAYA_PENDAFTARAN);
                        $('[name="Admin_ID_edit"]').val(data.Admin_ID);
                    });
                }
            });
            return false;
        });
 
 
        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
 
        //Simpan anggota
        $('#btn_simpan').on('click',function(){
            var NIM=$('#NIM').val();
            var NAMA=$('#NAMA').val();
            var JURUSAN=$('#JURUSAN').val();
            var ALAMAT=$('#ALAMAT').val();
            var NO_TELEPON=$('#NO_TELEPON').val();
            var TANGGAL_PENDAFTARAN=$('#TANGGAL_PENDAFTARAN').val();
            var BIAYA_PENDAFTARAN=$('#BIAYA_PENDAFTARAN').val();
            var Admin_ID=$('#Admin_ID').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/Login/simpan_anggota')?>",
                dataType : "JSON",
                data : {NIM:NIM, NAMA:NAMA, JURUSAN:JURUSAN, ALAMAT:ALAMAT, NO_TELEPON:NO_TELEPON, TANGGAL_PENDAFTARAN:TANGGAL_PENDAFTARAN, BIAYA_PENDAFTARAN:BIAYA_PENDAFTARAN, Admin_ID:Admin_ID},
                success: function(data){
                    $('[name="NIM"]').val("");
                    $('[name="NAMA"]').val("");
                    $('[name="JURUSAN"]').val("");
                    $('[name="ALAMAT"]').val("");
                    $('[name="NO_TELEPON"]').val("");
                    $('[name="TANGGAL_PENDAFTARAN"]').val("");
                    $('[name="BIAYA_PENDAFTARAN"]').val("");
                    $('[name="Admin_ID"]').val("");
                    $('#ModalaAdd').modal('hide');
                    document.location.href = '<?php echo base_url('index.php/Login/anggota')?>';
                    tampil_data_anggota();
                },
                error: function(data){
                    	alert("Maaf data angggota tidak bisa disimpan karena nim anggota sudah terdaftar !!");
                    	document.location.href = '<?php echo base_url('index.php/Login/anggota')?>';
                    }
            });
            return false;
        });
 
        //Update anggota
        $('#btn_update').on('click',function(){
            var NIM=$('#NIM2').val();
            var NAMA=$('#NAMA2').val();
            var JURUSAN=$('#JURUSAN2').val();
            var ALAMAT=$('#ALAMAT2').val();
            var NO_TELEPON=$('#NO_TELEPON2').val();
            var TANGGAL_PENDAFTARAN=$('#TANGGAL_PENDAFTARAN2').val();
            var BIAYA_PENDAFTARAN=$('#BIAYA_PENDAFTARAN2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/Login/update_anggota')?>",
                dataType : "JSON",
                data : {NIM:NIM , NAMA:NAMA, JURUSAN:JURUSAN, ALAMAT:ALAMAT, ALAMAT:ALAMAT, NO_TELEPON:NO_TELEPON, TANGGAL_PENDAFTARAN:TANGGAL_PENDAFTARAN, BIAYA_PENDAFTARAN:BIAYA_PENDAFTARAN},
                success: function(data){
                    $('[name="NIM_edit"]').val("");
                    $('[name="NAMA_edit"]').val("");
                    $('[name="JURUSAN_edit"]').val("");
                    $('[name="ALAMAT_edit"]').val("");
                    $('[name="NO_TELEPON_edit"]').val("");
                    $('[name="TANGGAL_PENDAFTARAN_edit"]').val("");
                    $('[name="BIAYA_PENDAFTARAN_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    document.location.href = '<?php echo base_url('index.php/Login/anggota')?>';
                    tampil_data_anggota();
                },
                error: function(data){
                    	alert("Maaf data angggota tidak bisa diedit !!");
                    	document.location.href = '<?php echo base_url('index.php/Login/anggota')?>';
                    }
            });
            return false;
        });
 
        //Hapus anggota
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/Login/hapus_anggota')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                    	document.location.href = '<?php echo base_url('index.php/Login/anggota')?>';
                            $('#ModalHapus').modal('hide');
                            tampil_data_anggota();
                    },
                    error: function(data){
                    	alert("Maaf data angggota tidak bisa dihapus karena sudah melakukan transaksi peminjaman buku !!");
                    	document.location.href = '<?php echo base_url('index.php/Login/anggota')?>';
                    }
                });
                return false;
            });

        //GET PHOTO
        $('#show_data').on('click','.item_photo',function(){
            var id2 = $(this).attr('data');
            var id = $(this).attr('data');
            $('[name="kode"]').val(id2);
            //$('#ModalPhoto').modal('show');
            $('#ModalPhoto').modal('show');
            $.ajax({
            type : "GET",
            url  : "<?php echo base_url('index.php/Login/get_photo')?>",
            //dataType : "JSON",
            data : {id: id},
                    success: function(data){
                        $('#uploaded_image').html(data);
                    }
                });
                return false;
        });

        //Hapus photo
        $('#hapus_photo').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/Login/hapus_photo')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                        $('#ModalHapus').modal('hide');
                        document.location.href = '<?php echo base_url('index.php/Login/anggota')?>';
                        tampil_data_anggota();
                    }
                });
                return false;
            });

        //CETAK
        $('#cetak').click(function(){
            $('#ModalCetak').modal('show');
        });

        //Upload Photo
        $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>index.php/Login/tambahphoto", 
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                          $('#uploaded_image').html(data);  
                     }  
                });  
           }  
      	});
	});
</script>