<?php

//if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_pengembalian extends CI_Model{

	public function GetPengembalian($where=""){
		$data = $this->db->query('select * from pengembalian '.$where);
		return $data->result_array();
	}

	/*public function UpdatePengembalian($pengembalian,$data,$where){
		$res = $this->db->update($pengembalian,$data,$where);
		return $res;
	}

	public function DeletePengembalian($pengembalian,$where){
		$res = $this->db->delete($pengembalian,$where);
		return $res;
	}*/

	function pengembalian_list(){
        $hasil=$this->db->query("SELECT p.ID_PENGEMBALIAN, p.TANGGAL_KEMBALI, p.TANGGAL_PENGEMBALIAN, p.DENDA, p.STATUS, a.NAMA, b.JUDUL_BUKU FROM pengembalian AS p, anggota AS a, buku AS b WHERE p.Anggota_NIM=a.NIM AND p.Buku_ID_BUKU=b.ID_BUKU ORDER BY p.ID_PENGEMBALIAN DESC");
        return $hasil->result();
    }
 
    function simpan_pengembalian($ID_PENGEMBALIAN,$TANGGAL_KEMBALI,$TANGGAL_PENGEMBALIAN,$DENDA,$STATUS,$Anggota_NIM,$Buku_ID_BUKU,$Admin_ID){
        $hasil=$this->db->query("INSERT INTO pengembalian (ID_PENGEMBALIAN,TANGGAL_KEMBALI,TANGGAL_PENGEMBALIAN,DENDA,STATUS,Anggota_NIM,Buku_ID_BUKU,Admin_ID)VALUES('$ID_PENGEMBALIAN','$TANGGAL_KEMBALI','$TANGGAL_PENGEMBALIAN','$DENDA','$STATUS','$Anggota_NIM','$Buku_ID_BUKU','$Admin_ID')");
        return $hasil;
    }
 
    function get_pengembalian_by_kode($ID_PENGEMBALIAN){
        $hsl=$this->db->query("SELECT * FROM pengembalian WHERE ID_PENGEMBALIAN='$ID_PENGEMBALIAN'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'ID_PENGEMBALIAN' => $data->ID_PENGEMBALIAN,
                    'TANGGAL_KEMBALI' => $data->TANGGAL_KEMBALI,
                    'TANGGAL_PENGEMBALIAN' => $data->TANGGAL_PENGEMBALIAN,
                    'DENDA' => $data->DENDA,
                    'STATUS' => $data->STATUS,
                    'Anggota_NIM' => $data->Anggota_NIM,
                    'Buku_ID_BUKU' => $data->Buku_ID_BUKU,
                    'Admin_ID' => $data->Admin_ID
                    );
            }
        }
        return $hasil;
    }
 
    function update_pengembalian($ID_PENGEMBALIAN,$TANGGAL_KEMBALI,$TANGGAL_PENGEMBALIAN,$DENDA,$STATUS,$Anggota_NIM,$Buku_ID_BUKU){
        $hasil=$this->db->query("UPDATE pengembalian SET ID_PENGEMBALIAN='$ID_PENGEMBALIAN',TANGGAL_KEMBALI='$TANGGAL_KEMBALI',TANGGAL_PENGEMBALIAN='$TANGGAL_PENGEMBALIAN',DENDA='$DENDA',STATUS='$STATUS',Anggota_NIM='$Anggota_NIM',Buku_ID_BUKU='$Buku_ID_BUKU' WHERE ID_PENGEMBALIAN='$ID_PENGEMBALIAN'");
        return $hasil;
    }
 
    function hapus_pengembalian($ID_PENGEMBALIAN){
        $hasil=$this->db->query("DELETE FROM pengembalian WHERE ID_PENGEMBALIAN='$ID_PENGEMBALIAN'");
        return $hasil;
    }

}

?>