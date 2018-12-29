<?php

//if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_peminjaman extends CI_Model{

	public function GetPeminjaman($where=""){
		$data = $this->db->query('select * from peminjaman '.$where);
		return $data->result_array();
	}

	/*public function InsertPeminjaman($peminjaman,$data){
		$res = $this->db->insert($peminjaman,$data);
		return $res;
	}

	public function UpdatePeminjaman($peminjaman,$data,$where){
		$res = $this->db->update($peminjaman,$data,$where);
		return $res;
	}

	public function DeletePeminjaman($peminjaman,$where){
		$res = $this->db->delete($peminjaman,$where);
		return $res;
	}*/

	function peminjaman_list(){
        $hasil=$this->db->query("SELECT p.ID_PEMINJAMAN, p.TANGGAL_PINJAM, p.TANGGAL_KEMBALI, a.NAMA, b.JUDUL_BUKU FROM peminjaman AS p, anggota AS a, buku AS b WHERE p.Anggota_NIM=a.NIM AND p.Buku_ID_BUKU=b.ID_BUKU ORDER BY p.ID_PEMINJAMAN DESC");
        return $hasil->result();
    }
 
    function simpan_peminjaman($ID_PEMINJAMAN,$TANGGAL_PINJAM,$TANGGAL_KEMBALI,$Anggota_NIM,$Buku_ID_BUKU,$Admin_ID){
        $hasil=$this->db->query("INSERT INTO peminjaman (ID_PEMINJAMAN,TANGGAL_PINJAM,TANGGAL_KEMBALI,Anggota_NIM,Buku_ID_BUKU,Admin_ID)VALUES('$ID_PEMINJAMAN','$TANGGAL_PINJAM','$TANGGAL_KEMBALI','$Anggota_NIM','$Buku_ID_BUKU','$Admin_ID')");
        return $hasil;
    }
 
    function get_peminjaman_by_kode($ID_PEMINJAMAN){
        $hsl=$this->db->query("SELECT * FROM peminjaman WHERE ID_PEMINJAMAN='$ID_PEMINJAMAN'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'ID_PEMINJAMAN' => $data->ID_PEMINJAMAN,
                    'TANGGAL_PINJAM' => $data->TANGGAL_PINJAM,
                    'TANGGAL_KEMBALI' => $data->TANGGAL_KEMBALI,
                    'Anggota_NIM' => $data->Anggota_NIM,
                    'Buku_ID_BUKU' => $data->Buku_ID_BUKU,
                    'Admin_ID' => $data->Admin_ID
                    );
            }
        }
        return $hasil;
    }
 
    function update_peminjaman($ID_PEMINJAMAN,$TANGGAL_PINJAM,$TANGGAL_KEMBALI,$Anggota_NIM,$Buku_ID_BUKU){
        $id = $ID_PEMINJAMAN;
        $hasil=$this->db->query("UPDATE peminjaman SET ID_PEMINJAMAN='$id',TANGGAL_PINJAM='$TANGGAL_PINJAM',TANGGAL_KEMBALI='$TANGGAL_KEMBALI',Anggota_NIM='$Anggota_NIM',Buku_ID_BUKU='$Buku_ID_BUKU' WHERE ID_PEMINJAMAN='$id'");
        return $hasil;
    }
 
    function hapus_peminjaman($ID_PEMINJAMAN){
        $hasil=$this->db->query("DELETE FROM peminjaman WHERE ID_PEMINJAMAN='$ID_PEMINJAMAN'");
        return $hasil;
    }

}

?>