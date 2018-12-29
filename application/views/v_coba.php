<!DOCTYPE html>
<html>
	<head>
		<title>Perpustakaan STMIK MARDIRA</title>
		<link rel="shortcut icon" href="<?=base_URL()?>assets/img/mardira.png">
		<link href="<?php echo base_url('assests/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    	<link href="<?php echo base_url('assests/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
		<script src="<?php echo base_url('assests/jquery/jquery-3.1.0.min.js')?>"></script>
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
				width: 650px;
			}

			.menu{
				background-color: #34495e;
				width: 100%;
			}

			.menu .dropdown{
				float: right;
				margin-right: 30px;
			}

			.menu ul{
				padding: 10px;
			}

			.menu ul li{
				display: inline-block;
				margin-left: 50px;
				background-color: #34495e;
			}

			.menu ul ul{
				opacity: 0;
				position: absolute;
				visibility: hidden;
				top: 25%;
				right: -2%;
			}

			.menu ul li:hover > ul{
				opacity: 1;
				visibility: visible;
			}

			.menu ul li a{
				margin: 0px 2px;
				color: #ffffff;
				text-decoration: none;
			}

			.menu ul li a span{
				margin-right: 5px;
			}

			.menu li a:hover{
				color: salmon;
			}

			.container h1 span{
				margin-right: 5px;
				background-image: <?php base_url().'assets/img/mardira.png' ?>;
			}

			footer{
				clear: both;
				height: 20px;
				background-color: #34495e;
				padding: 5px;
				margin-top: 90px;
			}

			footer p{
				color: #ffffff;
				text-align: center;
				margin-bottom: 5px;
				font-family: Arial;
				font-size: 15px;
				font-style: bold;
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

			<div class="menu">
				<ul>
					<li><a href="<?=base_URL()?>index.php/Login/home"><span class="glyphicon glyphicon-home"></span>Home</a></li>
					<li><a href="<?=base_URL()?>index.php/Login/anggota"><span class="glyphicon glyphicon-list-alt"></span>Anggota</a></li>
					<li><a href="<?=base_URL()?>index.php/Login/buku"><span class="glyphicon glyphicon-book"></span>Buku</a></li>
					<li><a href="<?=base_URL()?>index.php/Login/pinjam"><span class="glyphicon glyphicon-list"></span>Peminjaman</a></li>
					<li><a href="<?=base_URL()?>index.php/Login/kembali"><span class="glyphicon glyphicon-tasks"></span>Pengembalian</a></li>	
					<div class="dropdown">	
						<li><span class="glyphicon glyphicon-user"></span><a href="">Hai, <?php $admin = $this->session->userdata("nama"); echo $admin ?>
							<ul>
								<li><a href="<?php echo base_url()."index.php/Login/logout"?>">Logout</a></li>
								<li><a href="<?php echo base_url()."index.php/Login/gantinama"?>">Ganti Nama</a></li>
								<li><a href="<?php echo base_url()."index.php/Login/gantipass"?>">Ganti Password</a></li>
							</ul>
						</li>
					</div>
				</ul>
			</div>
			
			<div class="container">
				<p><br/></p>
				<h1 class="page-header">
					<span class="glyphicon glyphicon-list-alt"></span>Data Anggota
					<div class="pull-right"><a href="#" class="btn btn-md btn-primary" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus glyphicon glyphicon-plus"></span>TAMBAH</a></div>
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
		            <form class="form-horizontal" enctype="multipart/form-data">
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

		                    <!--<div class="form-group">
		                        <label class="control-label col-xs-3" >PHOTO</label>
		                        <div class="col-xs-9">
		                            <input name="PHOTO" id="PHOTO" class="form-control" type="text" placeholder="PHOTO" value="PHOTO" style="width:335px;" required>
		                        </div>
		                    </div>-->

		                    <div class="form-group">
		                        <label class="control-label col-xs-3" >PHOTO</label>
		                        <div class="col-xs-9">
			                        <div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-picture"></i>
										</div>
										<input name="PHOTO" id="PHOTO" placeholder="PHOTO" type="file" style="width:335px;">
									</div>
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
		                        <label class="control-label col-xs-3" >PHOTO</label>
		                        <div class="col-xs-9">
		                            <input name="PHOTO_edit" id="PHOTO2" class="form-control" type="text" placeholder="photo" value="photo" style="width:335px;" disabled>
		                        </div>
		                    </div>

		                    <!--<div class="form-group">
		                        <label class="control-label col-xs-3" >PHOTO</label>
		                        <div class="col-xs-9">
		                            <div class="input-group">
									<div class="input-group-addon">
											<i class="fa fa-camera"></i>
									</div>
									<input name="PHOTO_edit" id="PHOTO2" placeholder="PHOTO" type="file" accept=".jpg , .png"/>
								</div>
		                    </div>-->

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

			<footer>
		        <p>Copyright &copy; INFORMATIKA UIN BDG 2018</p>
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
                                '<td>'+data[i].PHOTO+
                                '</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:;" class="btn btn-success btn-md glyphicon glyphicon-pencil item_edit" data="'+data[i].NIM+'"></a>'+' '+
                                    '<a href="javascript:;" class="btn btn-danger btn-md glyphicon glyphicon-remove item_hapus" data="'+data[i].NIM+'"></a>'+
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
                    $.each(data,function(NIM,NAMA,JURUSAN,ALAMAT,NO_TELEPON,PHOTO,Admin_ID){
                        $('#ModalaEdit').modal('show');
                        $('[name="NIM_edit"]').val(data.NIM);
                        $('[name="NAMA_edit"]').val(data.NAMA);
                        $('[name="JURUSAN_edit"]').val(data.JURUSAN);
                        $('[name="ALAMAT_edit"]').val(data.ALAMAT);
                        $('[name="NO_TELEPON_edit"]').val(data.NO_TELEPON);
                        $('[name="PHOTO_edit"]').val(data.PHOTO);
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
            var PHOTO=$('#PHOTO').val();
            var Admin_ID=$('#Admin_ID').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/Login/simpan_anggota')?>",
                dataType : "JSON",
                data : {NIM:NIM, NAMA:NAMA, JURUSAN:JURUSAN, ALAMAT:ALAMAT, NO_TELEPON:NO_TELEPON, PHOTO:PHOTO, Admin_ID:Admin_ID},
                success: function(data){
                    $('[name="NIM"]').val("");
                    $('[name="NAMA"]').val("");
                    $('[name="JURUSAN"]').val("");
                    $('[name="ALAMAT"]').val("");
                    $('[name="NO_TELEPON"]').val("");
                    $('[name="PHOTO"]').val("");
                    $('[name="Admin_ID"]').val("");
                    $('#ModalaAdd').modal('hide');
                    tampil_data_anggota();
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
            var PHOTO=$('#PHOTO2').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/Login/update_anggota')?>",
                dataType : "JSON",
                data : {NIM:NIM , NAMA:NAMA, JURUSAN:JURUSAN, ALAMAT:ALAMAT, NO_TELEPON:NO_TELEPON, ALAMAT:ALAMAT, PHOTO:PHOTO},
                success: function(data){
                    $('[name="NIM_edit"]').val("");
                    $('[name="NAMA_edit"]').val("");
                    $('[name="JURUSAN_edit"]').val("");
                    $('[name="ALAMAT_edit"]').val("");
                    $('[name="NO_TELEPON_edit"]').val("");
                    $('[name="PHOTO_edit"]').val("");
                    $('#ModalaEdit').modal('hide');
                    tampil_data_anggota();
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
                            $('#ModalHapus').modal('hide');
                            tampil_data_anggota();
                    }
                });
                return false;
            });

	});
</script>