<?php

class M_admin extends CI_Model{

	public function updatepass($data,$where1,$where2){
		$hasil=$this->db->query("UPDATE admin SET ID='$where1', PASSWORD='$data' WHERE ID='$where1' and PASSWORD='$where2'");
        return $hasil;
	}

	public function updatenama($data,$where1,$where2){
		$hasil=$this->db->query("UPDATE admin SET NAMA='$data' WHERE ID='$where1' and PASSWORD='$where2'");
        return $hasil;
	}

	public function countanggota(){
		$row=$this->db->query("SELECT count(*) as jum FROM anggota");
        return $row->num_rows;
	}

	public function countbuku(){
		$hasil=$this->db->query("SELECT count(*) as jum FROM buku");
        return $hasil;
	}

	public function countpeminjaman(){
		$hasil=$this->db->query("SELECT count(*) as jum FROM peminjaman WHERE MONTH(TANGGAL_PINJAM) = MONTH(CURRENT_DATE) AND YEAR(TANGGAL_PINJAM) = YEAR(CURRENT_DATE)");
        return $hasil;
	}

	public function countpengembalian(){
		$hasil=$this->db->query("SELECT count(*) as jum FROM pengembalian WHERE MONTH(TANGGAL_PENGEMBALIAN) = MONTH(CURRENT_DATE) AND YEAR(TANGGAL_PENGEMBALIAN) = YEAR(CURRENT_DATE)");
        return $hasil;
	}	

}

?>