<?php
class M_gudang extends CI_Model{

	function hapus_gudang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_gudang where gudang_id='$kode'");
		return $hsl;
	}

	function update_gudang($kode,$nama,$alamat,$deskripsi){
		$hsl=$this->db->query("UPDATE tbl_gudang set gudang_nama='$nama',gudang_alamat='$alamat',deskripsi='$deskripsi' where gudang_id='$kode'");
		return $hsl;
	}

	function tampil_gudang(){
		$hsl=$this->db->query("select * from tbl_gudang order by gudang_id desc");
		return $hsl;
	}

	function simpan_gudang($nama,$alamat,$deskripsi){
		$hsl=$this->db->query("INSERT INTO tbl_gudang(gudang_nama,gudang_alamat,deskripsi) VALUES ('$nama','$alamat','$deskripsi')");
		return $hsl;
	}

}