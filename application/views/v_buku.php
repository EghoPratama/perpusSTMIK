<?php

$top = $this->db->query('SELECT ID_BUKU FROM buku ORDER BY ID_BUKU DESC LIMIT 1;')->result_array();
	
$top2 = $top[0]['ID_BUKU']+1;

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
					<span class="glyphicon glyphicon-book"></span>Data Buku
					<div class="pull-right">
						<a href="<?php echo base_url()?>index.php/Login/cetak_buku" target="blank" class="btn btn-md btn-warning"><span class="glyphicon glyphicon-print"></span>CETAK</a>
						<a href="#" class="btn btn-md btn-primary" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus glyphicon glyphicon-plus"></span>TAMBAH</a>
					</div>
				</h1>
				
				<table class="table table-striped table-bordered table-hover" id="mydata">
					<thead>
						<tr>
							<th>NO</th>
							<th>ID BUKU</th>
							<th>JUDUL</th>
							<th>KATEGORI</th>
							<th>PENGARANG</th>
							<th>PENERBIT</th>
							<th>THN TERBIT</th>
							<th>JUMLAH</th>
							<th>RAK</th>
							<th>BARIS</th>
							<th>SHELVES</th>
							<th>OPSI</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>NO</th>
							<th>ID BUKU</th>
							<th>JUDUL</th>
							<th>KATEGORI</th>
							<th>PENGARANG</th>
							<th>PENERBIT</th>
							<th>THN TERBIT</th>
							<th>JUMLAH</th>
							<th>RAK</th>
							<th>BARIS</th>
							<th>SHELVES</th>
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
		                <h3 class="modal-title" id="myModalLabel">Tambah Buku</h3>
		            </div>
		            <form class="form-horizontal">
		                <div class="modal-body">
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >ID BUKU</label>
		                        <div class="col-xs-9">
		                            <input name="ID_BUKU" id="ID_BUKU" value="<?php echo $top2; ?>" class="form-control" type="text" placeholder="ID_BUKU" style="width:335px;" readonly>
		                        </div>
		                    </div>
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >JUDUL BUKU</label>
		                        <div class="col-xs-9">
		                            <input name="JUDUL_BUKU" id="JUDUL_BUKU" class="form-control" type="text" placeholder="JUDUL_BUKU" style="width:335px;" required>
		                        </div>
		                    </div>
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >CATEGORY</label>
		                        <div class="col-xs-9">
		                        	<select class="form-control" name="CATEGORY" id="CATEGORY" placeholder="Pilih KATEGORI..." style="width:335px;"  tabindex="-1" required>
		                        		<option value="">--Pilih Kategori--</option>
										<option value="Buku">BUKU</option>
										<option value="Karya Ilmiah">KARYA ILMIAH</option>
									</select>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >PENGARANG</label>
		                        <div class="col-xs-9">
		                            <input name="PENGARANG" id="PENGARANG" class="form-control" type="text" placeholder="PENGARANG" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >PENERBIT</label>
		                        <div class="col-xs-9">
		                            <input name="PENERBIT" id="PENERBIT" class="form-control" type="text" placeholder="PENERBIT" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >TAHUN TERBIT</label>
		                        <div class="col-xs-9">
		                            <input name="TAHUN_TERBIT" id="TAHUN_TERBIT" class="form-control" type="text" placeholder="TAHUN_TERBIT" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >JUMLAH BUKU</label>
		                        <div class="col-xs-9">
		                            <input name="JUMLAH_BUKU" id="JUMLAH_BUKU" class="form-control" type="text" placeholder="JUMLAH_BUKU" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >RAK</label>
		                        <div class="col-xs-9">
		                        	<select class="form-control" name="RAK" id="RAK" placeholder="Pilih RAK..." style="width:335px;"  tabindex="-1" required>
		                        		<option value="">--Pilih Rak--</option>
										<option value="001">001</option>
										<option value="002">002</option>
										<option value="003">003</option>
									</select>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >BARIS</label>
		                        <div class="col-xs-9">
		                        	<select class="form-control" name="BARIS" id="BARIS" placeholder="Pilih Baris..." style="width:335px;"  tabindex="-1" required>
		                        		<option value="">--Pilih Baris--</option>
										<option value="001">001</option>
										<option value="002">002</option>
										<option value="003">003</option>
									</select>
		                        </div>
		                    </div>

		            		<div class="form-group">
		                        <label class="control-label col-xs-3" >SHELVES</label>
		                        <div class="col-xs-9">
		                        	<select class="form-control" name="SHELVES" id="SHELVES" placeholder="Pilih Shelves..." style="width:335px;"  tabindex="-1" required>
		                        		<option value="">--Pilih Shelves--</option>
										<option value="001">001</option>
										<option value="002">002</option>
									</select>
		                        </div>
		                    </div>        

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >Admin ID</label>
		                        <div class="col-xs-9">
		                            <input name="Admin_ID" id="Admin_ID" class="form-control" type="text" placeholder="admin" value="<?php echo "$admin"; ?>" style="width:335px;" disabled>
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
		                <h3 class="modal-title" id="myModalLabel">Edit Buku</h3>
		            </div>
		            <form class="form-horizontal">
		                <div class="modal-body">
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >ID BUKU</label>
		                        <div class="col-xs-9">
		                            <input name="ID_BUKU_edit" id="ID_BUKU2" class="form-control" type="text" placeholder="ID_BUKU" style="width:335px;" readonly>
		                        </div>
		                    </div>
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >JUDUL BUKU</label>
		                        <div class="col-xs-9">
		                            <input name="JUDUL_BUKU_edit" id="JUDUL_BUKU2" class="form-control" type="text" placeholder="JUDUL_BUKU" style="width:335px;" required>
		                        </div>
		                    </div>
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >CATEGORY</label>
		                        <div class="col-xs-9">
		                            <select class="form-control" name="CATEGORY_edit" id="CATEGORY2" placeholder="Pilih KATEGORI..." style="width:335px;"  tabindex="-1" required>
		                        		<option value="">--Pilih Kategori--</option>
										<option value="Buku">BUKU</option>
										<option value="Karya Ilmiah">KARYA ILMIAH</option>
									</select>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >PENGARANG</label>
		                        <div class="col-xs-9">
		                            <input name="PENGARANG_edit" id="PENGARANG2" class="form-control" type="text" placeholder="PENGARANG" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >PENERBIT</label>
		                        <div class="col-xs-9">
		                            <input name="PENERBIT_edit" id="PENERBIT2" class="form-control" type="text" placeholder="PENERBIT" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >TAHUN TERBIT</label>
		                        <div class="col-xs-9">
		                            <input name="TAHUN_TERBIT_edit" id="TAHUN_TERBIT2" class="form-control" type="text" placeholder="TAHUN_TERBIT" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >JUMLAH BUKU</label>
		                        <div class="col-xs-9">
		                            <input name="JUMLAH_BUKU_edit" id="JUMLAH_BUKU2" class="form-control" type="text" placeholder="JUMLAH_BUKU" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >RAK</label>
		                        <div class="col-xs-9">
		                            <input name="RAK_edit" id="RAK2" class="form-control" type="text" placeholder="RAK" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >BARIS</label>
		                        <div class="col-xs-9">
		                            <input name="BARIS_edit" id="BARIS2" class="form-control" type="text" placeholder="BARIS" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >SHELVES</label>
		                        <div class="col-xs-9">
		                            <input name="SHELVES_edit" id="SHELVES2" class="form-control" type="text" placeholder="SHELVES" style="width:335px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >Admin ID</label>
		                        <div class="col-xs-9">
		                            <input name="Admin_ID_edit" id="Admin_ID2" class="form-control" type="text" placeholder="Admin_ID" value="<?php echo "$admin";?>" style="width:335px;" disabled>
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
		                        <h4 class="modal-title" id="myModalLabel">Hapus Buku</h4>
		                    </div>
		                    <form class="form-horizontal">
		                    <div class="modal-body">
		                                           
		                            <input type="hidden" name="kode" id="textkode" value="">
		                            <div class="alert alert-warning"><p>Apakah Anda yakin menghapus buku ini?</p></div>
		                                         
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
		</div>
		
		<footer class="footer text-center" style="position: relative; background-color:#34495e; color:white; padding:10px 20px; bottom: -50px">
				Copyright © Informatika UIN 2018
		</footer>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		tampil_data_buku();	

		$('#mydata').DataTable();

		/*function confirm_delete(delete_url){
			$("#mydelete").modal('show', {backdrop: 'static'});
			document.getElementById('delete_link').setAttribute('href', delete_url);
		}*/

		//fungsi tampil barang
        function tampil_data_buku(){
        	var no = 1;
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>index.php/Login/data_buku',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                        		'<td>'+no+'</td>'+
                                '<td>'+data[i].ID_BUKU+'</td>'+
                                '<td>'+data[i].JUDUL_BUKU+'</td>'+
                                '<td>'+data[i].CATEGORY+'</td>'+
                                '<td>'+data[i].PENGARANG+'</td>'+
                                '<td>'+data[i].PENERBIT+'</td>'+
                                '<td>'+data[i].TAHUN_TERBIT+'</td>'+
                                '<td>'+data[i].JUMLAH_BUKU+'</td>'+
                                '<td>'+data[i].RAK+'</td>'+
                                '<td>'+data[i].BARIS+'</td>'+
                                '<td>'+data[i].SHELVES+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-success btn-md ion-edit item_edit" data="'+data[i].ID_BUKU+'"></a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-md ion-ios7-trash item_hapus" data="'+data[i].ID_BUKU+'"></a>'+
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
                url  : "<?php echo base_url('index.php/Login/get_buku')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(ID_BUKU,JUDUL_BUKU,CATEGORY,PENGARANG,PENERBIT,TAHUN_TERBIT,JUMLAH_BUKU,Admin_ID){
                        $('#ModalaEdit').modal('show');
                        $('[name="ID_BUKU_edit"]').val(data.ID_BUKU);
                        $('[name="JUDUL_BUKU_edit"]').val(data.JUDUL_BUKU);
                        $('[name="CATEGORY_edit"]').val(data.CATEGORY);
                        $('[name="PENGARANG_edit"]').val(data.PENGARANG);
                        $('[name="PENERBIT_edit"]').val(data.PENERBIT);
                        $('[name="TAHUN_TERBIT_edit"]').val(data.TAHUN_TERBIT);
                        $('[name="JUMLAH_BUKU_edit"]').val(data.JUMLAH_BUKU);
                        $('[name="RAK_edit"]').val(data.RAK);
                        $('[name="BARIS_edit"]').val(data.BARIS);
                        $('[name="SHELVES_edit"]').val(data.SHELVES);
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
 
        //Simpan buku
        $('#btn_simpan').on('click',function(){
            var ID_BUKU=$('#ID_BUKU').val();
            var JUDUL_BUKU=$('#JUDUL_BUKU').val();
            var CATEGORY=$('#CATEGORY').val();
            var PENGARANG=$('#PENGARANG').val();
            var PENERBIT=$('#PENERBIT').val();
            var TAHUN_TERBIT=$('#TAHUN_TERBIT').val();
            var JUMLAH_BUKU=$('#JUMLAH_BUKU').val();
            var RAK=$('#RAK').val();
            var BARIS=$('#BARIS').val();
            var SHELVES=$('#SHELVES').val();
            var Admin_ID=$('#Admin_ID').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/Login/simpan_buku')?>",
                dataType : "JSON",
                data : {ID_BUKU:ID_BUKU , JUDUL_BUKU:JUDUL_BUKU, CATEGORY:CATEGORY, PENGARANG:PENGARANG, PENGARANG:PENGARANG, PENERBIT:PENERBIT, TAHUN_TERBIT:TAHUN_TERBIT, JUMLAH_BUKU:JUMLAH_BUKU, RAK:RAK, BARIS:BARIS, SHELVES:SHELVES, Admin_ID:Admin_ID},
                success: function(data){
                    $('[name="ID_BUKU"]').val("");
                    $('[name="JUDUL_BUKU"]').val("");
                    $('[name="CATEGORY"]').val("");
                    $('[name="PENGARANG"]').val("");
                    $('[name="PENERBIT"]').val("");
                    $('[name="TAHUN_TERBIT"]').val("");
                    $('[name="JUMLAH_BUKU"]').val("");
                    $('[name="RAK"]').val("");
                    $('[name="BARIS"]').val("");
                    $('[name="SHELVES"]').val("");
                    $('[name="Admin_ID"]').val("");
                    $('#ModalaAdd').modal('hide');
                    document.location.href = '<?php echo base_url('index.php/Login/buku')?>';
                    tampil_data_buku();
                },
                error: function(data){
                    	alert("Maaf data buku tidak bisa disimpan !!");
                    	document.location.href = '<?php echo base_url('index.php/Login/buku')?>';
                    }
            });
            return false;
        });
 
        //Update buku
        $('#btn_update').on('click',function(){
            var ID_BUKU=$('#ID_BUKU2').val();
            var JUDUL_BUKU=$('#JUDUL_BUKU2').val();
            var CATEGORY=$('#CATEGORY2').val();
            var PENGARANG=$('#PENGARANG2').val();
            var PENERBIT=$('#PENERBIT2').val();
            var TAHUN_TERBIT=$('#TAHUN_TERBIT2').val();
            var JUMLAH_BUKU=$('#JUMLAH_BUKU2').val();
            var RAK=$('#RAK2').val();
            var BARIS=$('#BARIS2').val();
            var SHELVES=$('#SHELVES2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/Login/update_buku')?>",
                dataType : "JSON",
                data : {ID_BUKU:ID_BUKU , JUDUL_BUKU:JUDUL_BUKU, CATEGORY:CATEGORY, PENGARANG:PENGARANG, PENGARANG:PENGARANG, PENERBIT:PENERBIT, TAHUN_TERBIT:TAHUN_TERBIT, JUMLAH_BUKU:JUMLAH_BUKU, RAK:RAK, BARIS:BARIS, SHELVES:SHELVES},
                success: function(data){
                    $('[name="ID_BUKU_edit"]').val("");
                    $('[name="JUDUL_BUKU_edit"]').val("");
                    $('[name="CATEGORY_edit"]').val("");
                    $('[name="PENGARANG_edit"]').val("");
                    $('[name="PENERBIT_edit"]').val("");
                    $('[name="TAHUN_TERBIT_edit"]').val("");
                    $('[name="JUMLAH_BUKU_edit"]').val("");
                    $('[name="RAK_edit"]').val("");
                    $('[name="BARIS_edit"]').val("");
                    $('[name="SHELVES_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    document.location.href = '<?php echo base_url('index.php/Login/buku')?>';
                    tampil_data_buku();
                },
                error: function(data){
                    	alert("Maaf data buku tidak bisa diedit!!");
                    	document.location.href = '<?php echo base_url('index.php/Login/buku')?>';
                    }
            });
            return false;
        });
 
        //Hapus buku
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/Login/hapus_buku')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                    	document.location.href = '<?php echo base_url('index.php/Login/buku')?>';
                            $('#ModalHapus').modal('hide');
                            tampil_data_buku();
                    },
                    error: function(data){
                    	alert("Maaf data buku tidak bisa dihapus karena anggota sudah melakukan transaksi peminjaman !!");
                    	document.location.href = '<?php echo base_url('index.php/Login/buku')?>';
                    }
                });
                return false;
            });
    });
</script>