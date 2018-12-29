<?php

//if(!defined('BASEPATH')) exit('No direct script access allowed');

class M_anggota extends CI_Model{

	public function GetAnggota($where=""){
		$data = $this->db->query('select * from anggota '.$where);
		return $data->result_array();
	}

	/*public function InsertAnggota($anggota,$data){
		$res = $this->db->insert($anggota,$data);
		return $res;
	}

	public function UpdateAnggota($anggota,$data,$where){
		$res = $this->db->update($anggota,$data,$where);
		return $res;
	}

	public function DeleteAnggota($anggota,$where){
		$res = $this->db->delete($anggota,$where);
		return $res;
	}*/

	function anggota_list(){
        $hasil=$this->db->query("SELECT * FROM anggota");
        return $hasil->result();
    }
 
    function simpan_anggota($NIM,$NAMA,$JURUSAN,$ALAMAT,$NO_TELEPON,$TANGGAL_PENDAFTARAN,$BIAYA_PENDAFTARAN,$Admin_ID){
        $hasil=$this->db->query("INSERT INTO anggota (NIM,NAMA,JURUSAN,ALAMAT,NO_TELEPON,PHOTO,TANGGAL_PENDAFTARAN,BIAYA_PENDAFTARAN,Admin_ID)VALUES('$NIM','$NAMA','$JURUSAN','$ALAMAT','$NO_TELEPON','','$TANGGAL_PENDAFTARAN','$BIAYA_PENDAFTARAN','$Admin_ID')");
        return $hasil;
    }
 
    function get_anggota_by_kode($NIM){
        $hsl=$this->db->query("SELECT * FROM anggota WHERE NIM='$NIM'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'NIM' => $data->NIM,
                    'NAMA' => $data->NAMA,
                    'JURUSAN' => $data->JURUSAN,
                    'ALAMAT' => $data->ALAMAT,
                    'NO_TELEPON' => $data->NO_TELEPON,
                    'TANGGAL_PENDAFTARAN' => $data->TANGGAL_PENDAFTARAN,
                    'BIAYA_PENDAFTARAN' => $data->BIAYA_PENDAFTARAN,
                    'Admin_ID' => $data->Admin_ID
                    );
            }
        }
        return $hasil;
    }
 
    function update_anggota($NIM,$NAMA,$JURUSAN,$ALAMAT,$NO_TELEPON,$TANGGAL_PENDAFTARAN,$BIAYA_PENDAFTARAN){
        $hasil=$this->db->query("UPDATE anggota SET NIM='$NIM',NAMA='$NAMA',JURUSAN='$JURUSAN',ALAMAT='$ALAMAT',NO_TELEPON='$NO_TELEPON', TANGGAL_PENDAFTARAN='$TANGGAL_PENDAFTARAN', BIAYA_PENDAFTARAN='$BIAYA_PENDAFTARAN' WHERE NIM='$NIM'");
        return $hasil;
    }
 
    function hapus_anggota($NIM){
        $hasil=$this->db->query("DELETE FROM anggota WHERE NIM='$NIM'");
        return $hasil;
    }

}

?>