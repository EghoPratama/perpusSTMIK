<?php
class Buku extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_buku');
	}

	function index(){
		$this->load->view('v_buku2');
	}

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
		$Admin_ID=$this->input->post('Admin_ID');
		$data=$this->m_buku->simpan_buku($ID_BUKU,$JUDUL_BUKU,$CATEGORY,$PENGARANG,$PENERBIT,$TAHUN_TERBIT,$JUMLAH_BUKU,$Admin_ID);
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
		$data=$this->m_buku->update_buku($ID_BUKU,$JUDUL_BUKU,$CATEGORY,$PENGARANG,$PENERBIT,$TAHUN_TERBIT,$JUMLAH_BUKU);
		echo json_encode($data);
	}

	function hapus_buku(){
		$ID_BUKU=$this->input->post('kode');
		$data=$this->m_buku->hapus_buku($ID_BUKU);
		echo json_encode($data);
	}
}

?>