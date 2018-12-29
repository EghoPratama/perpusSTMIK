<?php

$top = $this->db->query('SELECT ID_PEMINJAMAN FROM peminjaman ORDER BY ID_PEMINJAMAN DESC LIMIT 1;')->result_array();
	
$top2 = $top[0]['ID_PEMINJAMAN']+1;

date_default_timezone_set('Asia/Jakarta');
	
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
		<link href="<?=base_URL();?>assests/bootstrap/css/bootstrap-select.css" rel="stylesheet">
		<link href="<?=base_URL();?>assests/bootstrap/css/style.css" rel="stylesheet">
		<script src="<?php echo base_url('assests/jquery/jquery.js')?>"></script>
		<script src="<?php echo base_url('assests/bootstrap/js/bootstrap-select.js')?>"></script>
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
			

			<?php $no = 1; ?>
			<div class="container">
				<p><br/></p>
				<h1 class="page-header">
					<span class="glyphicon glyphicon-list"></span>Data Peminjaman
					<div class="pull-right">
						<a href="#" class="btn btn-md btn-primary" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus glyphicon glyphicon-plus"></span>TAMBAH</a>
						<button type="button" class="btn btn-warning item_cetak" id="cetak"><span class="glyphicon glyphicon-print"></span>CETAK</button>
					</div>
				</h1>
				<table class="table table-striped table-bordered table-hover data">
					<thead>
						<tr>
							<th>NO</th>
							<th>ID PINJAM</th>
							<th>TGL PINJAM</th>
							<th>TGL KEMBALI</th>
							<th>PEMINJAM</th>
							<th>BUKU</th>
							<th>OPSI</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>NO</th>
							<th>ID PINJAM</th>
							<th>TGL PINJAM</th>
							<th>TGL KEMBALI</th>
							<th>PEMINJAM</th>
							<th>BUKU</th>
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
		                <h3 class="modal-title" id="myModalLabel">Tambah Data Peminjaman</h3>
		            </div>
		            <form class="form-horizontal">
		                <div class="modal-body">
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3">ID PEMINJAMAN</label>
		                        <div class="col-xs-9">
		                            <input name="ID_PEMINJAMAN" id="ID_PEMINJAMAN" value="<?php echo $top2; ?>" class="form-control" type="text" placeholder="ID_PEMINJAMAN" style="width:405px;" readonly>
		                        </div>
		                    </div>
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3">TANGGAL PINJAM</label>
		                        <div class="col-xs-9">
		                        	<input name="TANGGAL_PINJAM" id="TANGGAL_PINJAM" class="form-control" type="datetime-local" value="<?php echo date('Y-m-d\TH:i'); ?>" placeholder="TANGGAL_PINJAM" style="width:405px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >TANGGAL KEMBALI</label>
		                        <div class="col-xs-9">
		                            <input name="TANGGAL_KEMBALI" id="TANGGAL_KEMBALI" class="form-control" type="datetime-local" value="<?php echo date('Y-m-d\TH:i', strtotime('+ 7 days')); ?>" placeholder="TANGGAL_KEMBALI" style="width:405px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >NIM</label>
		                        <div class="col-xs-9">
		                            <?php 

		                            $DA = $this->db->query("SELECT * FROM anggota;")->result();

		  							$jsArray = "var Anggota_NAMA = new Array();\n";

		                            ?>
		                            <select name="Anggota_NIM" id="Anggota_NIM" class="form-control selectpicker" type="text" data-live-search="true" onchange="changeValue(this.value)" required>
		                            	<option value="" disabled selected>Pilih NIM...</option>
		                            <?php
		                            foreach ($DA as $lihat) {
		                            	echo '<option data-tokens="'.$lihat->NIM.'" value="'.$lihat->NIM.'">'.$lihat->NIM.'</option>';
		                            	$jsArray .= "Anggota_NAMA['" . $lihat->NIM . "'] = {Anggota_NAMA:'" . addslashes($lihat->NAMA) . "'};\n"; 
		                            }
		                            ?>
		                            </select>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >Nama Anggota</label>
		                        <div class="col-xs-9">
		                            <input name="Anggota_NAMA" id="Anggota_NAMA" class="form-control" type="text" placeholder="Anggota_NAMA"  style="width:405px;" required>
		                        </div>
		                    </div>

							<div class="form-group">
		                        <label class="control-label col-xs-3" >JUDUL BUKU</label>
		                        <div class="col-xs-9">
		                            <?php 

		                            $DA = $this->db->query("SELECT * FROM buku;")->result();

		  							$jsArray2 = "var Buku_ID_BUKU = new Array();\n";

		                            ?>
		                            <select name="Buku_JUDUL" id="Buku_JUDUL" class="form-control selectpicker" type="text" data-live-search="true" onchange="changeValue2(this.value)" required>
		                            	<option value="" disabled selected>Pilih BUKU...</option>
		                            <?php
		                            foreach ($DA as $lihat) {
		                            	echo '<option data-tokens="'.$lihat->JUDUL_BUKU.'" value="'.$lihat->JUDUL_BUKU.'">'.$lihat->JUDUL_BUKU.'</option>';
		                            	$jsArray2 .= "Buku_ID_BUKU['" . $lihat->JUDUL_BUKU . "'] = {Buku_ID_BUKU:'" . addslashes($lihat->ID_BUKU) . "'};\n"; 
		                            }
		                            ?>
		                            </select>
		                        </div>
		                    </div>
		                    <script type="text/javascript">
								<?php echo $jsArray; ?>
								function changeValue(Anggota_NIM){
									document.getElementById('Anggota_NAMA').value = Anggota_NAMA[Anggota_NIM].Anggota_NAMA;
								};

								<?php echo $jsArray2; ?>
								function changeValue2(Buku_JUDUL){
									document.getElementById('Buku_ID_BUKU').value = Buku_ID_BUKU[Buku_JUDUL].Buku_ID_BUKU;
								};
							</script>
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >ID BUKU</label>
		                        <div class="col-xs-9">
		                            <input name="Buku_ID_BUKU" id="Buku_ID_BUKU" class="form-control" type="text" placeholder="Buku_ID_BUKU"  style="width:405px;" required>
		                        </div>
		                    </div>		                    

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >Admin ID</label>
		                        <div class="col-xs-9">
		                            <input name="Admin_ID" id="Admin_ID" class="form-control" type="text" placeholder="admin" value="<?php echo "$admin";?>" style="width:405px;" disabled>
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
		                <h3 class="modal-title" id="myModalLabel">Edit Data Peminjaman</h3>
		            </div>
		            <form class="form-horizontal">
		                <div class="modal-body">
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >ID PEMINJAMAN</label>
		                        <div class="col-xs-9">
		                            <input name="ID_PEMINJAMAN_edit" id="ID_PEMINJAMAN2" class="form-control" type="text" placeholder="ID_PEMINJAMAN" style="width:405px;" readonly>
		                        </div>
		                    </div>
		 
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >TANGGAL PINJAM</label>
		                        <div class="col-xs-9">
		                            <input name="TANGGAL_PINJAM_edit" id="TANGGAL_PINJAM2" class="form-control" type="datetime-local" placeholder="TANGGAL_PINJAM" style="width:405px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >TANGGAL KEMBALI</label>
		                        <div class="col-xs-9">
		                            <input name="TANGGAL_KEMBALI_edit" id="TANGGAL_KEMBALI2" class="form-control" type="datetime-local" placeholder="TANGGAL_KEMBALI" style="width:405px;" required>
		                        </div>
		                    </div>
		                    
		                    <div class="form-group">
	                        	<label class="control-label col-xs-3" >Anggota NIM</label>
		                        <div class="col-xs-9">
		                            <?php 
									
		                            $DA = $this->db->query("SELECT * FROM anggota;")->result();

		  							$jsArray4 = "var Anggota_NAMA2 = new Array();\n";

		                            ?>
		                            <select name="Anggota_NIM_edit" id="Anggota_NIM2" class="form-control selectpicker" type="text" data-live-search="true" onchange="changeValue4(this.value)" required>
		                            	<option value="" disabled selected>Pilih NIM untuk mengedit</option>
		                            <?php
		                            foreach ($DA as $lihat) {
		                            	echo '<option data-tokens="'.$lihat->NIM.'" value="'.$lihat->NIM.'">'.$lihat->NIM.'</option>';
		                            	$jsArray4 .= "Anggota_NAMA2['" . $lihat->NIM . "'] = {Anggota_NAMA2:'" . addslashes($lihat->NAMA) . "'};\n"; 
		                            }
		                            ?>
		                            </select>
		                        </div>
		                    </div>

		                    <div class="form-group">
	                        	<label class="control-label col-xs-3" >Anggota NAMA</label>
		                        <div class="col-xs-9">
		                            <input name="Anggota_NAMA2" id="Anggota_NAMA2" class="form-control" type="text" placeholder="Anggota_NAMA2" style="width:405px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >JUDUL BUKU</label>
		                        <div class="col-xs-9">
		                            <?php 

		                            $DA = $this->db->query("SELECT * FROM buku;")->result();

		  							$jsArray3 = "var Buku_ID_BUKU2 = new Array();\n";

		                            ?>
		                            <select name="Buku_JUDUL2" id="Buku_JUDUL2" class="form-control selectpicker" type="text" data-live-search="true" onchange="changeValue3(this.value)" required>
		                            	<option value="" disabled selected>Pilih BUKU untuk mengedit</option>
		                            <?php
		                            foreach ($DA as $lihat) {
		                            	echo '<option data-tokens="'.$lihat->JUDUL_BUKU.'" value="'.$lihat->JUDUL_BUKU.'">'.$lihat->JUDUL_BUKU.'</option>';
		                            	$jsArray3 .= "Buku_ID_BUKU2['" . $lihat->JUDUL_BUKU . "'] = {Buku_ID_BUKU2:'" . addslashes($lihat->ID_BUKU) . "'};\n"; 
		                            }
		                            ?>
		                            </select>
		                        </div>
		                    </div>

		                    <script type="text/javascript">
								<?php echo $jsArray3; ?>
								function changeValue3(Buku_JUDUL2){
									document.getElementById('Buku_ID_BUKU2').value = Buku_ID_BUKU2[Buku_JUDUL2].Buku_ID_BUKU2;
								};

								<?php echo $jsArray4; ?>
								function changeValue4(Anggota_NIM2){
									document.getElementById('Anggota_NAMA2').value = Anggota_NAMA2[Anggota_NIM2].Anggota_NAMA2;
								};
							</script>
							
		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >Buku_ID_BUKU</label>
		                        <div class="col-xs-9">
		                            <input name="Buku_ID_BUKU_edit" id="Buku_ID_BUKU2" class="form-control" type="text" placeholder="Buku_ID_BUKU" value="7050001" style="width:405px;" required>
		                        </div>
		                    </div>

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >Admin ID</label>
		                        <div class="col-xs-9">
		                            <input name="Admin_ID_edit" id="Admin_ID2" class="form-control" type="text" value="<?php echo $admin; ?>" style="width:405px;" disabled>
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
		                        <h4 class="modal-title" id="myModalLabel">Hapus Data Peminjaman</h4>
		                    </div>
		                    <form class="form-horizontal">
		                    <div class="modal-body">
		                                           
		                            <input type="hidden" name="kode" id="textkode" value="">
		                            <div class="alert alert-warning"><p>Apakah Anda yakin menghapus data peminjaman ini?</p></div>
		                                         
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
		                        <h4 class="modal-title" id="myModalLabel">Cetak Data Peminjaman</h4>
		                    </div>
		                    <form action="<?php echo base_url()?>index.php/Login/cetak_pinjam" method="GET" class="form-horizontal" target="blank">
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
		        </div>
			<footer class="footer text-center" style="position: relative; background-color:#34495e; color:white; padding:10px 20px; bottom: -50px">
				Copyright © Informatika UIN 2018
			</footer>
		</div>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		tampil_data_peminjaman();
		$('.data').DataTable();

		//fungsi tampil peminjaman
        function tampil_data_peminjaman(){
        	var no = 1;
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>index.php/Login/data_peminjaman',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                        		'<td>'+no+'</td>'+
                                '<td>'+data[i].ID_PEMINJAMAN+'</td>'+
                                '<td>'+data[i].TANGGAL_PINJAM+'</td>'+
                                '<td>'+data[i].TANGGAL_KEMBALI+'</td>'+
                                '<td>'+data[i].NAMA+'</td>'+
                                '<td>'+data[i].JUDUL_BUKU+'</td>'+
                                '</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-success btn-md ion-edit item_edit" data="'+data[i].ID_PEMINJAMAN+'"></a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-md ion-ios7-trash item_hapus" data="'+data[i].ID_PEMINJAMAN+'"></a>'+
                                '</td>'+
                                '</tr>';
                        no++;
                    }
                    $('#show_data').html(html);
                    $('.data').DataTable();
                }
 
            });
        }

		//GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/Login/get_peminjaman')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(ID_PEMINJAMAN,TANGGAL_PINJAM,TANGGAL_KEMBALI,Anggota_NIM,Anggota_NAMA,Buku_JUDUL,Buku_ID_BUKU,Admin_ID){
                        $('#ModalaEdit').modal('show');
                        $('[name="ID_PEMINJAMAN_edit"]').val(data.ID_PEMINJAMAN);
                        $('[name="TANGGAL_PINJAM_edit"]').val(data.TANGGAL_PINJAM);
                        $('[name="TANGGAL_KEMBALI_edit"]').val(data.TANGGAL_KEMBALI);
                        $('[name="Anggota_NIM_edit"]').val(data.Anggota_NIM);
                        $('[name="Anggota_NAMA2"]').val(data.Anggota_NAMA);
                        $('[name="Buku_JUDUL2"]').val(data.Buku_JUDUL);
                        $('[name="Buku_ID_BUKU_edit"]').val(data.Buku_ID_BUKU);
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
 
        //Simpan peminjaman
        $('#btn_simpan').on('click',function(){
            var ID_PEMINJAMAN=$('#ID_PEMINJAMAN').val();
            var TANGGAL_PINJAM=$('#TANGGAL_PINJAM').val();
            var TANGGAL_KEMBALI=$('#TANGGAL_KEMBALI').val();
            var Anggota_NIM=$('#Anggota_NIM').val();
            var Buku_ID_BUKU=$('#Buku_ID_BUKU').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/Login/simpan_peminjaman')?>",
                dataType : "JSON",
                data : {ID_PEMINJAMAN:ID_PEMINJAMAN, TANGGAL_PINJAM:TANGGAL_PINJAM, TANGGAL_KEMBALI:TANGGAL_KEMBALI, Anggota_NIM:Anggota_NIM, Buku_ID_BUKU:Buku_ID_BUKU},
                success: function(data){
                    $('[name="ID_PEMINJAMAN"]').val("");
                    $('[name="TANGGAL_PINJAM"]').val("");
                    $('[name="TANGGAL_KEMBALI"]').val("");
                    $('[name="Anggota_NIM"]').val("");
                    $('[name="Buku_ID_BUKU"]').val("");
                    $('#ModalaAdd').modal('hide');
                    document.location.href = '<?php echo base_url('index.php/Login/pinjam')?>';
                    tampil_data_peminjaman();
                },
                error: function(data){
                	alert("Maaf Transaksi peminjaman tidak dapat dilakukan karena stok buku habis !!!");
                	document.location.href = '<?php echo base_url('index.php/Login/pinjam')?>';
                }
            });
            return false;
        });
 
        //Update peminjaman
        $('#btn_update').on('click',function(){
            var ID_PEMINJAMAN=$('#ID_PEMINJAMAN2').val();
            var TANGGAL_PINJAM=$('#TANGGAL_PINJAM2').val();
            var TANGGAL_KEMBALI=$('#TANGGAL_KEMBALI2').val();
            var Anggota_NIM=$('#Anggota_NIM2').val();
            var Buku_ID_BUKU=$('#Buku_ID_BUKU2').val();
            $.ajax({
                type : "GET",
                url  : "<?php echo base_url('index.php/Login/update_peminjaman')?>",
                dataType : "JSON",
                data : {ID_PEMINJAMAN:ID_PEMINJAMAN, TANGGAL_PINJAM:TANGGAL_PINJAM, TANGGAL_KEMBALI:TANGGAL_KEMBALI, Anggota_NIM:Anggota_NIM, Buku_ID_BUKU:Buku_ID_BUKU},
                success: function(data){
                    $('[name="ID_PEMINJAMAN_edit"]').val("");
                    $('[name="TANGGAL_PINJAM_edit"]').val("");
                    $('[name="TANGGAL_KEMBALI_edit"]').val("");
                    $('[name="Anggota_NIM_edit"]').val("");
                    $('[name="Buku_ID_BUKU_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    document.location.href = '<?php echo base_url('index.php/Login/pinjam')?>';
                    tampil_data_peminjaman();
                },
                error: function(data){
                    	alert("Maaf data peminjaman tidak bisa diedit !!");
                    	document.location.href = '<?php echo base_url('index.php/Login/pinjam')?>';
                    }
            });
            return false;
        });
 
        //Hapus peminjaman
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url('index.php/Login/hapus_peminjaman')?>",
            dataType : "JSON",
                    data : {kode: kode},
                    success: function(data){
                    	document.location.href = '<?php echo base_url('index.php/Login/pinjam')?>';
                            $('#ModalHapus').modal('hide');
                            tampil_data_peminjaman();
                    },
                    error: function(data){
                    	alert("Maaf data peminjaman tidak bisa dihapus !!");
                    	document.location.href = '<?php echo base_url('index.php/Login/pinjam')?>';
                    }
                });
                return false;
            });

        //CETAK
        $('#cetak').click(function(){
            $('#ModalCetak').modal('show');
        });
	});
</script>
<script type="text/javascript">
	$(function() {
		$('.selectpicker').selectpicker();
	});
</script>