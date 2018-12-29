

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->library('pdf');
	}
//index view	
	public function index(){
		$this->load->view('v_awal');
	}
//end index view
//login	
	public function aksi_login(){
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');

		$username = $this->input->post("username");
		$password = $this->input->post("password");
		
		$where = array(
			'id' => $username,
			'password' => md5($password)
		);
		
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		
		if($cek > 0){
			
			$data_session = array(
				'nama' => $username,
				'status' => "login"
			);
			
			$this->session->set_userdata($data_session);
			/*$data = $this->db->query("SELECT * FROM users where username='".$this->session->username."'")->row_array();
			$buku = array(
				'ID' => $data[0]['ID_BUKU'],
				'JUDUL_BUKU' => $data[0]['JUDUL_BUKU'],
				'CATEGORY' => $data[0]['CATEGORY'],
				'PENGARANG' => $data[0]['PENGARANG'],
				'PENERBIT' => $data[0]['PENERBIT'],
				'TAHUN_TERBIT' => $data[0]['TAHUN_TERBIT'],
				'JUMLAH_BUKU' => $data[0]['JUMLAH_BUKU'],
				'Admin_ID' => $data[0]['Admin_ID']
			);*/
			$this->load->view('v_admin');
		}
		
		else{
			$this->session->set_flashdata("failed","Username dan Password Salah !");
			redirect("Login");
			//echo "Username atau password salah!!";
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('Login');
	}
//end login
//register	
	public function register(){
		if(isset($_POST['register'])){
			$this->form_validation->set_rules('username','username','required');
			$this->form_validation->set_rules('nama','nama','required');
			$this->form_validation->set_rules('password','password','required|min_length[8]');
			$this->form_validation->set_rules('password','password','required|min_length[8]|matches[password]');

			$username = $this->input->post("username");
			$password = $this->input->post("password");
			$nama = $this->input->post("nama");

			//if validation true
			if($this->form_validation->run() == TRUE){
				echo 'form validated';

				$data = array(
						'id' => $username,
						'password' => md5($password),
						'nama' => $nama
				);

				$this->db->insert('admin',$data);

				$this->session->set_flashdata("success","Akun telah terdaftar. Login Sekarang");
				redirect("Login","refresh");
			}
		}
		//load view
		$this->load->view('v_register');
	}
//register
//VIEW
	public function home(){
		$this->load->view('v_admin');
	}

	public function gantinama(){
		$this->load->view('v_nama');
	}

	public function gantipass(){
		$this->load->view('v_pass');
	}

	public function anggota(){
		$this->load->view('v_anggota');
	}

	public function buku(){
		$this->load->view('v_buku');
	}

	public function pinjam(){
		$this->load->view('v_pinjam');
	}

	public function kembali(){
		$this->load->view('v_kembali');
	}

	public function masuk(){
		$this->load->view('v_login');
	}

	public function coba(){
		/*
		//$top = $this->db->query('SELECT NIM FROM anggota ORDER BY NIM DESC LIMIT 1;')->result_array();
	
		//$top2 = $top[0]['NIM']+1;
		
		$ID_PEMINJAMAN = '1';
		$Buku_ID_BUKU = '7050001';
		$buku_lama = '7050007';

		$bl = $this->db->query("SELECT Buku_ID_BUKU FROM peminjaman WHERE ID_PEMINJAMAN='$ID_PEMINJAMAN'")->result_array();

		echo $buku_lama = $bl[0]['Buku_ID_BUKU']."<br>";

		$jb = $this->db->query("SELECT JUMLAH_BUKU FROM buku WHERE ID_BUKU='$buku_lama'")->result_array();

		$jbb = $this->db->query("SELECT JUMLAH_BUKU FROM buku WHERE ID_BUKU='$Buku_ID_BUKU'")->result_array();

		if($Buku_ID_BUKU!=$buku_lama){
			echo $sbl = $jb[0]['JUMLAH_BUKU']."<br>";

			//$this->db->query("UPDATE buku SET JUMLAH_BUKU='$sisa' WHERE ID_BUKU='$buku_lama'");			

			echo $sbk = $jbb[0]['JUMLAH_BUKU']."<br>";

			//$this->db->query("UPDATE buku SET JUMLAH_BUKU='$sisa2' WHERE ID_BUKU='$Buku_ID_BUKU'");
		}

		//cho $top2;
		//$this->load->view('v_coba');*/
		$this->load->view('v_awal');
	}
//END VIEW
//BUKU
	function data_buku(){
		$data=$this->m_buku->buku_list();
		echo json_encode($data);
	}

	function get_buku(){
		$ID_BUKU=$this->input->get('id');
		$data=$this->m_buku->get_buku_by_kode($ID_BUKU);
		echo json_encode($data);
	}

	function simpan_buku(){
		$ID_BUKU=$this->input->post('ID_BUKU');
		$JUDUL_BUKU=$this->input->post('JUDUL_BUKU');
		$CATEGORY=$this->input->post('CATEGORY');
		$PENGARANG=$this->input->post('PENGARANG');
		$PENERBIT=$this->input->post('PENERBIT');
		$TAHUN_TERBIT=$this->input->post('TAHUN_TERBIT');
		$JUMLAH_BUKU=$this->input->post('JUMLAH_BUKU');
		$RAK=$this->input->post('RAK');
		$BARIS=$this->input->post('BARIS');
		$SHELVES=$this->input->post('SHELVES');
		$Admin_ID=$this->session->userdata("nama");
		$data=$this->m_buku->simpan_buku($ID_BUKU,$JUDUL_BUKU,$CATEGORY,$PENGARANG,$PENERBIT,$TAHUN_TERBIT,$JUMLAH_BUKU,$RAK,$BARIS,$SHELVES,$Admin_ID);
		echo json_encode($data);
	}

	function update_buku(){
		$ID_BUKU=$this->input->post('ID_BUKU');
		$JUDUL_BUKU=$this->input->post('JUDUL_BUKU');
		$CATEGORY=$this->input->post('CATEGORY');
		$PENGARANG=$this->input->post('PENGARANG');
		$PENERBIT=$this->input->post('PENERBIT');
		$TAHUN_TERBIT=$this->input->post('TAHUN_TERBIT');
		$JUMLAH_BUKU=$this->input->post('JUMLAH_BUKU');
		$RAK=$this->input->post('RAK');
		$BARIS=$this->input->post('BARIS');
		$SHELVES=$this->input->post('SHELVES');
		$data=$this->m_buku->update_buku($ID_BUKU,$JUDUL_BUKU,$CATEGORY,$PENGARANG,$PENERBIT,$TAHUN_TERBIT,$JUMLAH_BUKU,$RAK,$BARIS,$SHELVES);
		echo json_encode($data);
	}

	function hapus_buku(){
		$ID_BUKU=$this->input->post('kode');
		$data=$this->m_buku->hapus_buku($ID_BUKU);
		echo json_encode($data);
	}
//END BUKU
//ANGGOTA
	function data_anggota(){
		$data=$this->m_anggota->anggota_list();
		echo json_encode($data);
	}

	function get_anggota(){
		$NIM=$this->input->get('id');
		$data=$this->m_anggota->get_anggota_by_kode($NIM);
		echo json_encode($data);
	}

	function simpan_anggota(){
		$NIM=$this->input->post('NIM');
		$NAMA=$this->input->post('NAMA');
		$JURUSAN=$this->input->post('JURUSAN');
		$ALAMAT=$this->input->post('ALAMAT');
		$NO_TELEPON=$this->input->post('NO_TELEPON');
		$TANGGAL_PENDAFTARAN=$this->input->post('TANGGAL_PENDAFTARAN');
		$BIAYA_PENDAFTARAN=$this->input->post('BIAYA_PENDAFTARAN');
		$Admin_ID=$this->session->userdata("nama");
		$data=$this->m_anggota->simpan_anggota($NIM,$NAMA,$JURUSAN,$ALAMAT,$NO_TELEPON,$TANGGAL_PENDAFTARAN,$BIAYA_PENDAFTARAN,$Admin_ID);
		echo json_encode($data);
	}

	function update_anggota(){
		$NIM=$this->input->post('NIM');
		$NAMA=$this->input->post('NAMA');
		$JURUSAN=$this->input->post('JURUSAN');
		$ALAMAT=$this->input->post('ALAMAT');
		$NO_TELEPON=$this->input->post('NO_TELEPON');
		$TANGGAL_PENDAFTARAN=$this->input->post('TANGGAL_PENDAFTARAN');
		$BIAYA_PENDAFTARAN=$this->input->post('BIAYA_PENDAFTARAN');
		$data=$this->m_anggota->update_anggota($NIM,$NAMA,$JURUSAN,$ALAMAT,$NO_TELEPON,$TANGGAL_PENDAFTARAN,$BIAYA_PENDAFTARAN);
		echo json_encode($data);
	}

	function hapus_anggota(){
		$NIM=$this->input->post('kode');
		$data=$this->m_anggota->hapus_anggota($NIM);
		echo json_encode($data);
	}
//END ANGGOTA
//PEMINAJAMAN
	function data_peminjaman(){
		$data=$this->m_peminjaman->peminjaman_list();
		echo json_encode($data);
	}

	function get_peminjaman(){
		$ID_PEMINJAMAN=$this->input->get('id');
		//$data=$this->m_peminjaman->get_peminjaman_by_kode($ID_PEMINJAMAN);
		
		$pinjam = $this->db->query("SELECT ID_PEMINJAMAN, DATE_FORMAT(TANGGAL_PINJAM,'%Y-%m-%dT%H:%i') AS tanggal1, DATE_FORMAT(TANGGAL_KEMBALI,'%Y-%m-%dT%H:%i') AS tanggal2, Anggota_NIM, Buku_ID_BUKU, Admin_ID FROM peminjaman WHERE ID_PEMINJAMAN = '$ID_PEMINJAMAN'")->result_array();

		$ID_PEMINJAMAN2 = $pinjam[0]['ID_PEMINJAMAN'];
		$TANGGAL_PINJAM2 = $pinjam[0]['tanggal1'];
		$TANGGAL_KEMBALI2 = $pinjam[0]['tanggal2'];
		$Admin_ID = $pinjam[0]['Admin_ID'];
		$idb = $pinjam[0]['Buku_ID_BUKU'];
		$ida = $pinjam[0]['Anggota_NIM'];

		$buku = $this->db->query("SELECT JUDUL_BUKU FROM buku WHERE ID_BUKU='$idb'")->result_array();

		$namab = $buku[0]['JUDUL_BUKU'];

		$anggota = $this->db->query("SELECT NAMA FROM anggota WHERE NIM='$ida'")->result_array();

		$namaa = $anggota[0]['NAMA'];

		$data = array(
			'ID_PEMINJAMAN' => $ID_PEMINJAMAN2,
			'TANGGAL_PINJAM' => $TANGGAL_PINJAM2,
			'TANGGAL_KEMBALI' => $TANGGAL_KEMBALI2,
			'Anggota_NIM' => $ida,
			'Anggota_NAMA' => $namaa,
			'Buku_JUDUL' => $namab,
			'Buku_ID_BUKU' => $idb,
			'Admin_ID' => $Admin_ID
			);		

		echo json_encode($data);
	}

	function simpan_peminjaman(){
		$ID_PEMINJAMAN=$this->input->post('ID_PEMINJAMAN');
		$TANGGAL_PINJAM=$this->input->post('TANGGAL_PINJAM');
		$TANGGAL_KEMBALI=$this->input->post('TANGGAL_KEMBALI');
		$Anggota_NIM=$this->input->post('Anggota_NIM');
		$Buku_ID_BUKU=$this->input->post('Buku_ID_BUKU');
		$Admin_ID=$this->session->userdata("nama");
		
		$sisabuku = $this->db->query("SELECT JUMLAH_BUKU FROM buku WHERE ID_BUKU='$Buku_ID_BUKU'")->result_array();
		$sisabuku2 = $sisabuku[0]['JUMLAH_BUKU']."<br>";
		$intsisabuku = intval($sisabuku2);
		if($intsisabuku > 0){
			$data=$this->m_peminjaman->simpan_peminjaman($ID_PEMINJAMAN,$TANGGAL_PINJAM,$TANGGAL_KEMBALI,$Anggota_NIM,$Buku_ID_BUKU,$Admin_ID);	

			$this->db->query("INSERT INTO pengembalian(ID_PENGEMBALIAN,TANGGAL_KEMBALI,TANGGAL_PENGEMBALIAN,DENDA,STATUS,Anggota_NIM,Buku_ID_BUKU,Admin_ID)VALUES('$ID_PEMINJAMAN','$TANGGAL_KEMBALI','','','Belum Dikembalikan','$Anggota_NIM','$Buku_ID_BUKU','$Admin_ID')");

			$que = $this->db->query("SELECT JUMLAH_BUKU FROM buku WHERE ID_BUKU='$Buku_ID_BUKU'");

			$sisa = $que->result_array();

			$angka = $sisa[0]['JUMLAH_BUKU']-1;

			$this->db->query("UPDATE buku SET JUMLAH_BUKU = '$angka' WHERE ID_BUKU = '$Buku_ID_BUKU'");

			echo json_encode($data);
		}
	}

	function update_peminjaman(){
		$ID_PEMINJAMAN = $this->input->get('ID_PEMINJAMAN');
		$TANGGAL_PINJAM = $this->input->get('TANGGAL_PINJAM');
		$TANGGAL_KEMBALI = $this->input->get('TANGGAL_KEMBALI');
		$Anggota_NIM = $this->input->get('Anggota_NIM');
		$Buku_ID_BUKU = $this->input->get('Buku_ID_BUKU');

		$odd = $this->db->query("SELECT Buku_ID_BUKU FROM peminjaman WHERE ID_PEMINJAMAN='$ID_PEMINJAMAN'")->result_array();

		$blm = $odd[0]['Buku_ID_BUKU'];

		$jb = $this->db->query("SELECT JUMLAH_BUKU FROM buku WHERE ID_BUKU='$blm'")->result_array();

		$jbb = $this->db->query("SELECT JUMLAH_BUKU FROM buku WHERE ID_BUKU='$Buku_ID_BUKU'")->result_array();

		if($Buku_ID_BUKU!=$blm){
			$sbl = $jb[0]['JUMLAH_BUKU']+1;

			$this->db->query("UPDATE buku SET JUMLAH_BUKU='$sbl' WHERE ID_BUKU='$blm'");			

			$sbk = $jbb[0]['JUMLAH_BUKU']-1;

			$this->db->query("UPDATE buku SET JUMLAH_BUKU='$sbk' WHERE ID_BUKU='$Buku_ID_BUKU'");
		}

		$this->db->query("UPDATE pengembalian SET 
			ID_PENGEMBALIAN='$ID_PEMINJAMAN',
			TANGGAL_KEMBALI='$TANGGAL_KEMBALI',
			TANGGAL_PENGEMBALIAN='',
			DENDA='',
			STATUS='Belum Dikembalikan',
			Anggota_NIM='$Anggota_NIM',
			Buku_ID_BUKU='$Buku_ID_BUKU' 
			WHERE ID_PENGEMBALIAN='$ID_PEMINJAMAN'");

		$data=$this->m_peminjaman->update_peminjaman($ID_PEMINJAMAN,$TANGGAL_PINJAM,$TANGGAL_KEMBALI,$Anggota_NIM,$Buku_ID_BUKU);

		echo json_encode($data);
	}

	function hapus_peminjaman(){
		$ID_PEMINJAMAN=$this->input->post('kode');

		$que2 = $this->db->query("SELECT STATUS FROM pengembalian WHERE ID_PENGEMBALIAN = '$ID_PEMINJAMAN'");

		$stat = $que2->result_array();
		$status1 = $stat[0]['STATUS'];

		if($status1=='Belum Dikembalikan'){
			$odd = $this->db->query("SELECT Buku_ID_BUKU FROM peminjaman WHERE ID_PEMINJAMAN='$ID_PEMINJAMAN'")->result_array();

			$blm = $odd[0]['Buku_ID_BUKU'];

			$jb = $this->db->query("SELECT JUMLAH_BUKU FROM buku WHERE ID_BUKU='$blm'")->result_array();

			$sbl = $jb[0]['JUMLAH_BUKU']+1;

			$this->db->query("UPDATE buku SET JUMLAH_BUKU='$sbl' WHERE ID_BUKU='$blm'");

			$data=$this->m_peminjaman->hapus_peminjaman($ID_PEMINJAMAN);
			$data2=$this->m_pengembalian->hapus_pengembalian($ID_PEMINJAMAN);			
		}else{
			$data=$this->m_peminjaman->hapus_peminjaman($ID_PEMINJAMAN);
			$data2=$this->m_pengembalian->hapus_pengembalian($ID_PEMINJAMAN);
		}

		echo json_encode($data);
	}
//END PEMINJAMAN
//PENGEMBALIAN
	function data_pengembalian(){
		$data=$this->m_pengembalian->pengembalian_list();
		echo json_encode($data);
	}

	function get_pengembalian(){
		$ID_PENGEMBALIAN=$this->input->get('id');
		//$data=$this->m_pengembalian->get_pengembalian_by_kode($ID_PENGEMBALIAN);

		$kembali = $this->db->query("SELECT ID_PENGEMBALIAN, DATE_FORMAT(TANGGAL_KEMBALI,'%Y-%m-%dT%H:%i') AS tanggal1, DATE_FORMAT(TANGGAL_PENGEMBALIAN,'%Y-%m-%dT%H:%i') AS tanggal2,DENDA,STATUS,Anggota_NIM,Buku_ID_BUKU,Admin_ID FROM pengembalian WHERE ID_PENGEMBALIAN = '$ID_PENGEMBALIAN'")->result_array();

		$ID_PENGEMBALIAN2 = $kembali[0]['ID_PENGEMBALIAN'];
		$TANGGAL_KEMBALI2 = $kembali[0]['tanggal1'];
		$TANGGAL_PENGEMBALIAN2 = $kembali[0]['tanggal2'];
		$DENDA = $kembali[0]['DENDA'];
		$STATUS = $kembali[0]['STATUS'];
		$Admin_ID = $kembali[0]['Admin_ID'];
		$idb = $kembali[0]['Buku_ID_BUKU'];
		$ida = $kembali[0]['Anggota_NIM'];

		$buku = $this->db->query("SELECT JUDUL_BUKU FROM buku WHERE ID_BUKU='$idb'")->result_array();

		$namab = $buku[0]['JUDUL_BUKU'];

		$anggota = $this->db->query("SELECT NAMA FROM anggota WHERE NIM='$ida'")->result_array();

		$namaa = $anggota[0]['NAMA'];

		$data = array(
			'ID_PENGEMBALIAN' => $ID_PENGEMBALIAN2,
			'TANGGAL_KEMBALI' => $TANGGAL_KEMBALI2,
			'TANGGAL_PENGEMBALIAN' => $TANGGAL_PENGEMBALIAN2,
			'DENDA' => $DENDA,
			'STATUS' => $STATUS,
			'Anggota_NIM' => $ida,
			'Anggota_NAMA' => $namaa,
			'Buku_JUDUL' => $namab,
			'Buku_ID_BUKU' => $idb,
			'Admin_ID' => $Admin_ID
			);

		echo json_encode($data);
	}
	
	/*function simpan_pengembalian(){
		$ID_PENGEMBALIAN=$this->input->post('ID_PENGEMBALIAN');
		$TANGGAL_KEMBALI=$this->input->post('TANGGAL_KEMBALI');
		$TANGGAL_PENGEMBALIAN=$this->input->post('TANGGAL_PENGEMBALIAN');
		$DENDA=$this->input->post('DENDA');
		$STATUS=$this->input->post('STATUS');
		$Anggota_NIM=$this->input->post('Anggota_NIM');
		$Buku_ID_BUKU=$this->input->post('Buku_ID_BUKU');
		$Admin_ID=$this->session->userdata("nama");
		$data=$this->m_pengembalian->simpan_pengembalian($ID_PENGEMBALIAN,$TANGGAL_KEMBALI,$TANGGAL_PENGEMBALIAN,$DENDA,$STATUS,$Anggota_NIM,$Buku_ID_BUKU,$Admin_ID);
		echo json_encode($data);
	}*/

	function update_pengembalian(){
		$ID_PENGEMBALIAN=$this->input->post('ID_PENGEMBALIAN');
		$TANGGAL_KEMBALI=$this->input->post('TANGGAL_KEMBALI');
		$TANGGAL_PENGEMBALIAN=$this->input->post('TANGGAL_PENGEMBALIAN');
		$DENDA=$this->input->post('DENDA');
		$STATUS=$this->input->post('STATUS');
		$Anggota_NIM=$this->input->post('Anggota_NIM');
		$Buku_ID_BUKU=$this->input->post('Buku_ID_BUKU');

		$que = $this->db->query("SELECT JUMLAH_BUKU FROM buku WHERE ID_BUKU='$Buku_ID_BUKU'");

		$sisa = $que->result_array();

		$que2 = $this->db->query("SELECT STATUS FROM pengembalian WHERE ID_PENGEMBALIAN = '$ID_PENGEMBALIAN'");

		$stat = $que2->result_array();
		$status1 = $stat[0]['STATUS'];

		if($status1!=$STATUS){
			$angka = $sisa[0]['JUMLAH_BUKU']+1;
			$data=$this->m_pengembalian->update_pengembalian($ID_PENGEMBALIAN,$TANGGAL_KEMBALI,$TANGGAL_PENGEMBALIAN,$DENDA,$STATUS,$Anggota_NIM,$Buku_ID_BUKU);
			$this->db->query("UPDATE buku SET JUMLAH_BUKU='$angka' WHERE ID_BUKU='$Buku_ID_BUKU'");
		}
		else{
			$data=$this->m_pengembalian->update_pengembalian($ID_PENGEMBALIAN,$TANGGAL_KEMBALI,$TANGGAL_PENGEMBALIAN,$DENDA,$STATUS,$Anggota_NIM,$Buku_ID_BUKU);
		}

		echo json_encode($data);
	}

	function hapus_pengembalian(){
		$ID_PENGEMBALIAN=$this->input->post('kode');
		
		$que2 = $this->db->query("SELECT STATUS FROM pengembalian WHERE ID_PENGEMBALIAN = '$ID_PENGEMBALIAN'");

		$stat = $que2->result_array();
		$status1 = $stat[0]['STATUS'];

		if($status1=='Belum Dikembalikan'){
			$odd = $this->db->query("SELECT Buku_ID_BUKU FROM peminjaman WHERE ID_PEMINJAMAN='$ID_PENGEMBALIAN'")->result_array();

			$blm = $odd[0]['Buku_ID_BUKU'];

			$jb = $this->db->query("SELECT JUMLAH_BUKU FROM buku WHERE ID_BUKU='$blm'")->result_array();

			$sbl = $jb[0]['JUMLAH_BUKU']+1;

			$this->db->query("UPDATE buku SET JUMLAH_BUKU='$sbl' WHERE ID_BUKU='$blm'");

			$data=$this->m_pengembalian->hapus_pengembalian($ID_PENGEMBALIAN);
			$data2=$this->m_peminjaman->hapus_peminjaman($ID_PENGEMBALIAN);			
		}else{
			$data=$this->m_pengembalian->hapus_pengembalian($ID_PENGEMBALIAN);
			$data2=$this->m_peminjaman->hapus_peminjaman($ID_PENGEMBALIAN);
		}
		echo json_encode($data);
	}
//END PENGEMBALIAN
//GANTI PASSWORD
	function edit_password(){
	    if($_POST){
	        //if($this->input->post('old_password')!=''){
	            $this->form_validation->set_rules('old_password','old_password',  'trim|required');            
	            $this->form_validation->set_rules('new_password','new_password', 'trim|required|min_length[8]');
	            $this->form_validation->set_rules('conf_password', 'conf_password', 'trim|required|min_length[8]|matches[new_password]');

	            $user_id = $this->session->userdata("nama");
	            $password = $this->input->post('conf_password');
	            $passlama = $this->input->post('old_password');
	            $err = $this->form_validation->error_string();

	            if($this->form_validation->run() == TRUE){        
	                $data = md5($password);
					$where1 = $user_id;
					$where2 = md5($passlama);

	                $this->m_admin->updatepass($data,$where1,$where2);
	                $this->session->set_flashdata('msg', 
                		'<div class="alert alert-success">
                    	<h4>Success !!</h4>
                    	<p>password berhasil diganti</p>
                		</div>');
	                redirect("Login/gantipass","refresh");
	            }else{
	            	$this->session->set_flashdata('msg', 
		                '<div class="alert alert-danger">
		                    <h4>Terjadi Kesalahan</h4>
		                    <p>password anda tidak sesuai atau password lama salah</p>
		                    <p>password minimal terdiri dari 8 karakter</p>
		                </div>');
	            	redirect("Login/gantipass","refresh");
	            }
		    //}       
		}
		$this->load->view('v_pass');
	}
//END GANTI PASSWORD
//GANTI NAMA
	function edit_nama(){
	    if($_POST){
	        //if($this->input->post('old_password')!=''){
	            $this->form_validation->set_rules('new_nama','new_nama','trim|required');            
	            $this->form_validation->set_rules('new_password','new_password', 'trim|required');
	            $this->form_validation->set_rules('conf_password', 'conf_password', 'trim|required|matches[new_password]');

	            $nama = $this->input->post('new_nama');
	            $user_id = $this->session->userdata("nama");
	            $password = $this->input->post('conf_password');

	            if($this->form_validation->run() == TRUE){
	                $data = $nama;
					$where1 = $user_id;
					$where2 = md5($password);

	                $this->m_admin->updatenama($data,$where1,$where2);
	                $this->session->set_flashdata('msg', 
                		'<div class="alert alert-success">
                    	<h4>Success !!</h4>
                    	<p>nama pengguna berhasil diganti</p>
                		</div>');
	                redirect("Login/gantinama","refresh");
	            }else{
	            	$this->session->set_flashdata('msg', 
		                '<div class="alert alert-danger">
		                    <h4>Terjadi Kesalahan</h4>
		                    <p>password anda tidak sesuai atau password salah</p>
		                </div>');
		            /*<?=$this->form_validation->error_string();?>*/
	            	redirect("Login/gantinama","refresh");
	            }
		    //}       
		}
		$this->load->view('v_nama');
	}
//END GANTI NAMA
//CETAK PEMINJAMAN
	function cetak_pinjam(){
		date_default_timezone_set('Asia/Jakarta');
		$bln = $_GET['BULAN'];
		$thn = $_GET['TAHUN'];

		if($bln=='01'){
			$bulan = 'Januari';
		}else if($bln=='02'){
			$bulan = 'Februari';
		}else if($bln=='03'){
			$bulan = 'Maret';
		}else if($bln=='04'){
			$bulan = 'April';
		}else if($bln=='05'){
			$bulan = 'Mei';
		}else if($bln=='06'){
			$bulan = 'Juni';
		}else if($bln=='07'){
			$bulan = 'Juli';
		}else if($bln=='08'){
			$bulan = 'Agustus';
		}else if($bln=='09'){
			$bulan = 'September';
		}else if($bln=='10'){
			$bulan = 'Oktober';
		}else if($bln=='11'){
			$bulan = 'November';
		}else if($bln=='12'){
			$bulan = 'Desember';
		}

		$query = $this->db->query("SELECT p.ID_PEMINJAMAN, p.TANGGAL_PINJAM, p.TANGGAL_KEMBALI, a.NAMA, b.JUDUL_BUKU FROM peminjaman AS p, anggota AS a, buku AS b WHERE p.Anggota_NIM=a.NIM AND p.Buku_ID_BUKU=b.ID_BUKU AND MONTH(TANGGAL_PINJAM) = $bln AND YEAR(TANGGAL_PINJAM) = $thn ORDER BY ID_PEMINJAMAN")->result();
		$pdf = new FPDF("L","cm","A4");

		$pdf->SetMargins(2,1,1);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','B',16);
		$pdf->SetX(4);
		$pdf->MultiCell(20.5,0.7,'PERPUSTAKAAN STMIK MARDIRA INDONESIA',0,'C');
		$pdf->SetX(4);
		$pdf->MultiCell(20.5,0.7,'JL. Soekarno-Hatta No. 211 Leuwi Panjang Telp. (022)5230382 Bandung',0,'C');
		$pdf->SetX(4);
		$pdf->Line(1,3.1,28.5,3.1);
		$pdf->SetLineWidth(0.1);      
		$pdf->Line(1,3.2,28.5,3.2);   
		$pdf->SetLineWidth(0);
		$pdf->ln(1);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(25.5,0.7,"Laporan Data Peminjaman Buku",0,10,'C');
		$pdf->ln(1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(5,0.7,"Periode : ".$bulan.'  '.$thn,0,0,'L');
		$pdf->ln(1);
		$pdf->Cell(5,0.7,"Di cetak pada : ".date("D - d/m/Y"),0,0,'C');
		$pdf->ln(1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
		$pdf->Cell(2, 0.8, 'ID', 1, 0, 'C');
		$pdf->Cell(4, 0.8, 'Tanggal Pinjam', 1, 0, 'C');
		$pdf->Cell(4, 0.8, 'Tanggal Kembali', 1, 0, 'C');
		$pdf->Cell(5.5, 0.8, 'Nama Peminjam', 1, 0, 'C');
		$pdf->Cell(8, 0.8, 'Judul Buku', 1, 1, 'C');
		$pdf->SetFont('Arial','',10);
		$no=1;
		foreach ($query as $lihat) {
			$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
			$pdf->Cell(2, 0.8, $lihat->ID_PEMINJAMAN,1, 0, 'C');
			$pdf->Cell(4, 0.8, $lihat->TANGGAL_PINJAM,1, 0, 'C');
			$pdf->Cell(4, 0.8, $lihat->TANGGAL_KEMBALI,1, 0, 'C');
			$pdf->Cell(5.5, 0.8, $lihat->NAMA,1, 0, 'C');
			$pdf->Cell(8, 0.8, $lihat->JUDUL_BUKU,1, 1, 'C');
			$no++;
		}
		$pdf->ln(3);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(37.4,0,"Bandung, ".date("d-m-Y"),0,10,'C');
		$pdf->Cell(40.5,0.9,"Kepala Perpustakaan STMIK MARDIRA ",0,10,'C');
		$pdf->ln(1);
		$pdf->ln(1);
		$pdf->Cell(35.5,0.9,"Pak Ibnu",0,10,'C');
		$pdf->Cell(34.8,0.1,"NIP.",0,10,'C');
		$pdf->Output("laporan_peminjaman.pdf","I");
	}
//END CETAK PEMINJAMAN
//CETAK PENGEMBALIAN
	function cetak_kembali(){
		date_default_timezone_set('Asia/Jakarta');
		$bln = $_GET['BULAN'];
		$thn = $_GET['TAHUN'];

		if($bln=='01'){
			$bulan = 'Januari';
		}else if($bln=='02'){
			$bulan = 'Februari';
		}else if($bln=='03'){
			$bulan = 'Maret';
		}else if($bln=='04'){
			$bulan = 'April';
		}else if($bln=='05'){
			$bulan = 'Mei';
		}else if($bln=='06'){
			$bulan = 'Juni';
		}else if($bln=='07'){
			$bulan = 'Juli';
		}else if($bln=='08'){
			$bulan = 'Agustus';
		}else if($bln=='09'){
			$bulan = 'September';
		}else if($bln=='10'){
			$bulan = 'Oktober';
		}else if($bln=='11'){
			$bulan = 'November';
		}else if($bln=='12'){
			$bulan = 'Desember';
		}

		$query = $this->db->query("SELECT p.ID_PENGEMBALIAN, p.TANGGAL_KEMBALI, p.TANGGAL_PENGEMBALIAN, p.DENDA, p.STATUS, a.NAMA, b.JUDUL_BUKU FROM pengembalian AS p, anggota AS a, buku AS b WHERE p.Anggota_NIM=a.NIM AND p.Buku_ID_BUKU=b.ID_BUKU AND MONTH(TANGGAL_PENGEMBALIAN) = $bln AND YEAR(TANGGAL_PENGEMBALIAN) = $thn ORDER BY ID_PENGEMBALIAN")->result();
		$pdf = new FPDF("L","cm","A4");

		$pdf->SetMargins(2,1,1);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','B',16);
		$pdf->SetX(4);
		$pdf->MultiCell(20.5,0.7,'PERPUSTAKAAN STMIK MARDIRA INDONESIA',0,'C');
		$pdf->SetX(4);
		$pdf->MultiCell(20.5,0.7,'JL. Soekarno-Hatta No. 211 Leuwi Panjang Telp. (022)5230382 Bandung',0,'C');
		$pdf->SetX(4);
		$pdf->Line(1,3.1,28.5,3.1);
		$pdf->SetLineWidth(0.1);      
		$pdf->Line(1,3.2,28.5,3.2);   
		$pdf->SetLineWidth(0);
		$pdf->ln(1);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(25.5,0.7,"Laporan Data Pengembalian Buku",0,10,'C');
		$pdf->ln(1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(5,0.7,"Periode : ".$bulan.'  '.$thn,0,0,'L');
		$pdf->ln(1);
		$pdf->Cell(5,0.7,"Di cetak pada : ".date("D - d/m/Y"),0,0,'C');
		$pdf->ln(1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
		$pdf->Cell(1, 0.8, 'ID', 1, 0, 'C');
		$pdf->Cell(4, 0.8, 'Tanggal Kembali', 1, 0, 'C');
		$pdf->Cell(4, 0.8, 'Tanggal Pengembalian', 1, 0, 'C');
		$pdf->Cell(3, 0.8, 'Denda', 1, 0, 'C');
		$pdf->Cell(4, 0.8, 'Status', 1, 0, 'C');
		$pdf->Cell(4.5, 0.8, 'Nama Peminjam', 1, 0, 'C');
		$pdf->Cell(5.5, 0.8, 'Buku', 1, 1, 'C');
		$pdf->SetFont('Arial','',10);
		$no=1;
		foreach ($query as $lihat) {
			$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
			$pdf->Cell(1, 0.8, $lihat->ID_PENGEMBALIAN,1, 0, 'C');
			$pdf->Cell(4, 0.8, $lihat->TANGGAL_KEMBALI,1, 0, 'C');
			$pdf->Cell(4, 0.8, $lihat->TANGGAL_PENGEMBALIAN,1, 0, 'C');
			$pdf->Cell(3, 0.8, "Rp. ".number_format($lihat->DENDA)." ,-",1, 0, 'C');
			$pdf->Cell(4, 0.8, $lihat->STATUS,1, 0, 'C');
			$pdf->Cell(4.5, 0.8, $lihat->NAMA,1, 0, 'C');
			$pdf->Cell(5.5, 0.8, $lihat->JUDUL_BUKU,1, 1, 'C');
			$no++;
		}
		$total = $this->db->query("SELECT SUM(DENDA) AS denda FROM PENGEMBALIAN WHERE MONTH(TANGGAL_PENGEMBALIAN) = $bln AND YEAR(TANGGAL_PENGEMBALIAN) = $thn")->result();
		foreach ($total as $tot) {
			$pdf->Cell(21.5, 0.8, "Total Denda", 1, 0,'C');	
			$pdf->Cell(5.5, 0.8, "Rp. ".number_format($tot->denda)." ,-", 1, 1,'C');
		}
		$total2 = $this->db->query("SELECT SUM(DENDA) AS denda2 FROM PENGEMBALIAN WHERE MONTH(TANGGAL_PENGEMBALIAN) = $bln AND YEAR(TANGGAL_PENGEMBALIAN) = $thn AND STATUS='Sudah Dikembalikan'")->result();
		foreach ($total2 as $tot2) {
			$pdf->Cell(21.5, 0.8, "Total Denda yang Sudah Diterima", 1, 0,'C');	
			$pdf->Cell(5.5, 0.8, "Rp. ".number_format($tot2->denda2)." ,-", 1, 1,'C');
		}
		$total3 = $this->db->query("SELECT SUM(DENDA) AS denda3 FROM PENGEMBALIAN WHERE MONTH(TANGGAL_PENGEMBALIAN) = $bln AND YEAR(TANGGAL_PENGEMBALIAN) = $thn AND STATUS='Belum Bayar Denda'")->result();
		foreach ($total3 as $tot3) {
			$pdf->Cell(21.5, 0.8, "Total Denda yang Belum Terbayarkan", 1, 0,'C');	
			$pdf->Cell(5.5, 0.8, "Rp. ".number_format($tot3->denda3)." ,-", 1, 1,'C');
		}
		$pdf->ln(3);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(37.4,0,"Bandung, ".date("d-m-Y"),0,10,'C');
		$pdf->Cell(40.5,0.9,"Kepala Perpustakaan STMIK MARDIRA ",0,10,'C');
		$pdf->ln(1);
		$pdf->ln(1);
		$pdf->Cell(35.5,0.9,"Pak Ibnu",0,10,'C');
		$pdf->Cell(34.8,0.1,"NIP.",0,10,'C');
		$pdf->Output("laporan_pengembalian.pdf","I");
	}
//END CETAK PENGEMBALIAN

//CETAK BUKU
	function cetak_buku(){
		date_default_timezone_set('Asia/Jakarta');

		$query = $this->db->query("SELECT * FROM buku")->result();
		$pdf = new FPDF("L","cm","A4");

		$pdf->SetMargins(2,1,1);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','B',16);
		$pdf->SetX(4);
		$pdf->MultiCell(20.5,0.7,'PERPUSTAKAAN STMIK MARDIRA INDONESIA',0,'C');
		$pdf->SetX(4);
		$pdf->MultiCell(20.5,0.7,'JL. Soekarno-Hatta No. 211 Leuwi Panjang Telp. (022)5230382 Bandung',0,'C');
		$pdf->SetX(4);
		$pdf->Line(1,3.1,28.5,3.1);
		$pdf->SetLineWidth(0.1);      
		$pdf->Line(1,3.2,28.5,3.2);   
		$pdf->SetLineWidth(0);
		$pdf->ln(1);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(25.5,0.7,"Laporan Data Buku",0,10,'C');
		$pdf->ln(1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(5,0.7,"Di cetak pada : ".date("D - d/m/Y"),0,0,'C');
		$pdf->ln(1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
		$pdf->Cell(3, 0.8, 'ID', 1, 0, 'C');
		$pdf->Cell(4, 0.8, 'Judul', 1, 0, 'C');
		$pdf->Cell(2.5, 0.8, 'Kategori', 1, 0, 'C');
		$pdf->Cell(3.5, 0.8, 'Pengarang', 1, 0, 'C');
		$pdf->Cell(3, 0.8, 'Penerbit', 1, 0, 'C');
		$pdf->Cell(2, 0.8, 'Tahun', 1, 0, 'C');
		$pdf->Cell(2, 0.8, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(2, 0.8, 'Rak', 1, 0, 'C');
		$pdf->Cell(2, 0.8, 'Baris', 1, 0, 'C');
		$pdf->Cell(2, 0.8, 'Shelves', 1, 1, 'C');
		$pdf->SetFont('Arial','',10);
		$no=1;
		foreach ($query as $lihat) {
			$pdf->Cell(1, 1, $no , 1, 0, 'C');
			$pdf->Cell(3, 1, $lihat->ID_BUKU,1, 0, 'C');
			$pdf->Cell(4, 1, $lihat->JUDUL_BUKU,1, 0, 'C');
			$pdf->Cell(2.5, 1, $lihat->CATEGORY,1, 0, 'C');
			$pdf->Cell(3.5, 1, $lihat->PENGARANG,1, 0, 'C');
			$pdf->Cell(3, 1, $lihat->PENERBIT,1, 0, 'C');
			$pdf->Cell(2, 1, $lihat->TAHUN_TERBIT,1, 0, 'C');
			$pdf->Cell(2, 1, $lihat->JUMLAH_BUKU,1, 0, 'C');
			$pdf->Cell(2, 1, $lihat->RAK,1, 0, 'C');
			$pdf->Cell(2, 1, $lihat->BARIS,1, 0, 'C');
			$pdf->Cell(2, 1, $lihat->SHELVES,1, 1, 'C');
			$no++;
		}
		$pdf->ln(3);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(37.4,0,"Bandung, ".date("d-m-Y"),0,10,'C');
		$pdf->Cell(40.5,0.9,"Kepala Perpustakaan STMIK MARDIRA ",0,10,'C');
		$pdf->ln(1);
		$pdf->ln(1);
		$pdf->Cell(35.5,0.9,"Pak Ibnu",0,10,'C');
		$pdf->Cell(34.8,0.1,"NIP.",0,10,'C');
		$pdf->Output("laporan_data_buku.pdf","I");
	}
//END CETAK BUKU

//CETAK ANGGOTA
	function cetak_anggota(){
		date_default_timezone_set('Asia/Jakarta');
		$bln = $_GET['BULAN'];
		$thn = $_GET['TAHUN'];

		if($bln=='01'){
			$bulan = 'Januari';
		}else if($bln=='02'){
			$bulan = 'Februari';
		}else if($bln=='03'){
			$bulan = 'Maret';
		}else if($bln=='04'){
			$bulan = 'April';
		}else if($bln=='05'){
			$bulan = 'Mei';
		}else if($bln=='06'){
			$bulan = 'Juni';
		}else if($bln=='07'){
			$bulan = 'Juli';
		}else if($bln=='08'){
			$bulan = 'Agustus';
		}else if($bln=='09'){
			$bulan = 'September';
		}else if($bln=='10'){
			$bulan = 'Oktober';
		}else if($bln=='11'){
			$bulan = 'November';
		}else if($bln=='12'){
			$bulan = 'Desember';
		}

		$query = $this->db->query("SELECT NIM, NAMA, JURUSAN, ALAMAT, NO_TELEPON, TANGGAL_PENDAFTARAN, BIAYA_PENDAFTARAN FROM anggota WHERE MONTH(TANGGAL_PENDAFTARAN) = $bln AND YEAR(TANGGAL_PENDAFTARAN) = $thn ORDER BY NIM")->result();
		$pdf = new FPDF("L","cm","A4");

		$pdf->SetMargins(2,1,1);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','B',16);
		$pdf->SetX(4);
		$pdf->MultiCell(20.5,0.7,'PERPUSTAKAAN STMIK MARDIRA INDONESIA',0,'C');
		$pdf->SetX(4);
		$pdf->MultiCell(20.5,0.7,'JL. Soekarno-Hatta No. 211 Leuwi Panjang Telp. (022)5230382 Bandung',0,'C');
		$pdf->SetX(4);
		$pdf->Line(1,3.1,28.5,3.1);
		$pdf->SetLineWidth(0.1);      
		$pdf->Line(1,3.2,28.5,3.2);   
		$pdf->SetLineWidth(0);
		$pdf->ln(1);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(25.5,0.7,"Laporan Data Anggota",0,10,'C');
		$pdf->ln(1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(5,0.7,"Periode : ".$bulan.'  '.$thn,0,0,'L');
		$pdf->ln(1);
		$pdf->Cell(5,0.7,"Di cetak pada : ".date("D - d/m/Y"),0,0,'C');
		$pdf->ln(1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(1, 0.8, 'No', 1, 0, 'C');
		$pdf->Cell(3, 0.8, 'NIM', 1, 0, 'C');
		$pdf->Cell(4, 0.8, 'Nama', 1, 0, 'C');
		$pdf->Cell(4, 0.8, 'Jurusan', 1, 0, 'C');
		$pdf->Cell(4.5, 0.8, 'Alamat', 1, 0, 'C');
		$pdf->Cell(3, 0.8, 'Tanggal Daftar', 1, 0, 'C');
		$pdf->Cell(3, 0.8, 'Biaya Daftar', 1, 1, 'C');
		$pdf->SetFont('Arial','',10);
		$no=1;
		foreach ($query as $lihat) {
			$pdf->Cell(1, 1, $no , 1, 0, 'C');
			$pdf->Cell(3, 1, $lihat->NIM,1, 0, 'C');
			$pdf->Cell(4, 1, $lihat->NAMA,1, 0, 'C');
			$pdf->Cell(4, 1, $lihat->JURUSAN,1, 0, 'C');
			$pdf->Cell(4.5, 1, $lihat->ALAMAT,1, 0, 'C');
			$pdf->Cell(3, 1, $lihat->TANGGAL_PENDAFTARAN,1, 0, 'C');
			$pdf->Cell(3, 1, "Rp. ".number_format($lihat->BIAYA_PENDAFTARAN)." ,-",1, 1, 'C');
			$no++;
		}
		$total = $this->db->query("SELECT SUM(BIAYA_PENDAFTARAN) AS biaya FROM ANGGOTA WHERE MONTH(TANGGAL_PENDAFTARAN) = $bln AND YEAR(TANGGAL_PENDAFTARAN) = $thn")->result();
		foreach ($total as $tot) {
			$pdf->Cell(19.5, 1, "Total Biaya Pendaftaran", 1, 0,'C');	
			$pdf->Cell(3, 1, "Rp. ".number_format($tot->biaya)." ,-", 1, 1,'C');
		}
		$pdf->ln(3);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(37.4,0,"Bandung, ".date("d-m-Y"),0,10,'C');
		$pdf->Cell(40.5,0.9,"Kepala Perpustakaan STMIK MARDIRA ",0,10,'C');
		$pdf->ln(1);
		$pdf->ln(1);
		$pdf->Cell(35.5,0.9,"Pak Ibnu",0,10,'C');
		$pdf->Cell(34.8,0.1,"NIP.",0,10,'C');
		$pdf->Output("laporan_data_anggota.pdf","I");
	}
//END CETAK ANGGOTA
//GET PHOTO
	public function get_photo(){
		$ID = $this->input->get('id');

		$foto = $this->db->query("SELECT PHOTO FROM ANGGOTA WHERE NIM='$ID'")->result_array();

		$photo = $foto[0]['PHOTO'];

		if($photo!=null){
			echo '<img src="'.base_url().'../perpusSTMIK/images/'.$photo.'" width="150" height="280" class="img-thumbnail" />';
		}
	}
//GET PHOTO
//PHOTO
	public function tambahphoto(){
		 $ID = $this->input->post('kode');		 
		 
		 if(isset($_FILES["image_file"]["name"]))  
           {  
                $config['upload_path'] = './images/';  
                $config['allowed_types'] = 'jpg|jpeg';
                $config['max_size']	= '2048';
				$config['remove_space'] = TRUE;

                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('image_file'))  
                {  
                     echo $this->upload->display_errors();  
                }  
                else  
                { 
                    $data = $this->upload->data();
                    $photo = $data["file_name"];
                    $this->db->query("UPDATE anggota SET PHOTO = '$photo' WHERE NIM='$ID'");  
                    echo '<img src="'.base_url().'../perpusSTMIK/images/'.$photo.'" width="150" height="280" class="img-thumbnail" />';  
                }  
           }
	}
//END PHOTO
//HAPUS PHOTO
	function hapus_photo(){
		$ID = $this->input->post('kode');
		
		$data = $this->db->query("UPDATE anggota SET PHOTO='' WHERE NIM='$ID'");
		
		echo json_encode($data);
	}
//END HAPUS PHOTO	
}