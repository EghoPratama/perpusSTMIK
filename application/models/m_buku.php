<?php

//if(!defined('BASEPATH')) exit('No direct script access allowed');

/*class M_buku extends CI_Model{

	var $table = 'buku';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function GetBuku($where=""){
		$data = $this->db->query('select * from buku '.$where);
		return $data->result_array();
	}

	public function InsertBuku($data){
		$this->db->insert($this->$table,$data);
		return $res->db->insert_id();
	}

	public function UpdateBuku($buku,$data,$where){
		$res = $this->db->update($buku,$data,$where);
		return $res;
	}

	public function DeleteBuku($buku,$where){
		$res = $this->db->delete($buku,$where);
		return $res;
	}

	public function get_by_id($id)
	{
		$this->db->from($this->$table);
		$this->db->where('ID_BUKU',$id);
		$query = $this->db->get();

		return $query->row();
	}

}*/

class M_buku extends CI_Model{

    public function GetBuku($where=""){
        $data = $this->db->query('select * from buku '.$where);
        return $data->result_array();
    }
 
    function buku_list(){
        $hasil=$this->db->query("SELECT * FROM buku");
        return $hasil->result();
    }
 
    function simpan_buku($ID_BUKU,$JUDUL_BUKU,$CATEGORY,$PENGARANG,$PENERBIT,$TAHUN_TERBIT,$JUMLAH_BUKU,$RAK,$BARIS,$SHELVES,$Admin_ID){
        $hasil=$this->db->query("INSERT INTO buku (ID_BUKU,JUDUL_BUKU,CATEGORY,PENGARANG,PENERBIT,TAHUN_TERBIT,JUMLAH_BUKU,RAK,BARIS,SHELVES,Admin_ID)VALUES('$ID_BUKU','$JUDUL_BUKU','$CATEGORY','$PENGARANG','$PENERBIT','$TAHUN_TERBIT','$JUMLAH_BUKU','$RAK','$BARIS','$SHELVES','$Admin_ID')");
        return $hasil;
    }
 
    function get_buku_by_kode($ID_BUKU){
        $hsl=$this->db->query("SELECT * FROM buku WHERE ID_BUKU='$ID_BUKU'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'ID_BUKU' => $data->ID_BUKU,
                    'JUDUL_BUKU' => $data->JUDUL_BUKU,
                    'CATEGORY' => $data->CATEGORY,
                    'PENGARANG' => $data->PENGARANG,
                    'PENERBIT' => $data->PENERBIT,
                    'TAHUN_TERBIT' => $data->TAHUN_TERBIT,
                    'JUMLAH_BUKU' => $data->JUMLAH_BUKU,
                    'RAK' => $data->RAK,
                    'BARIS' => $data->BARIS,
                    'SHELVES' => $data->SHELVES,
                    'Admin_ID' => $data->Admin_ID
                    );
            }
        }
        return $hasil;
    }
 
    function update_buku($ID_BUKU,$JUDUL_BUKU,$CATEGORY,$PENGARANG,$PENERBIT,$TAHUN_TERBIT,$JUMLAH_BUKU,$RAK,$BARIS,$SHELVES){
        $hasil=$this->db->query("UPDATE buku SET ID_BUKU='$ID_BUKU',JUDUL_BUKU='$JUDUL_BUKU',CATEGORY='$CATEGORY',PENGARANG='$PENGARANG',PENERBIT='$PENERBIT',TAHUN_TERBIT='$TAHUN_TERBIT',JUMLAH_BUKU='$JUMLAH_BUKU',RAK='$RAK',BARIS='$BARIS',SHELVES='$SHELVES' WHERE ID_BUKU='$ID_BUKU'");
        return $hasil;
    }
 
    function hapus_buku($ID_BUKU){
        $hasil=$this->db->query("DELETE FROM buku WHERE ID_BUKU='$ID_BUKU'");
        return $hasil;
    }
     
}

?>