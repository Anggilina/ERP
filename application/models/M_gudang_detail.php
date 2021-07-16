<?php
class M_gudang_detail extends CI_Model{

	function hapus_gudang_detail($kode){
		$hsl=$this->db->query("DELETE FROM tbl_gudang_detail where gudang_detail_id='$kode'");
		return $hsl;
	}

	function update_gudang_detail($kogudang,$nagudang,$x,$y,$z,$gudang_id){
		$hsl=$this->db->query("UPDATE tbl_gudang_detail SET gudang_detail_nama='$nagudang',x='$x',y='$y',z='$z',g_gudang_id='$gudang_id' WHERE gudang_detail_id='$kogudang'");
		return $hsl;
	}

	function tampil_gudang_detail(){
		$hsl=$this->db->query("SELECT gudang_detail_id,gudang_detail_nama,x,y,z,gudang_id,gudang_nama FROM tbl_gudang_detail JOIN tbl_gudang ON g_gudang_id=gudang_id");
		return $hsl;
	}

	function simpan_gudang_detail($nagudang,$x,$y,$z,$gudang_id){
		$hsl=$this->db->query("INSERT INTO tbl_gudang_detail (gudang_detail_nama,x,y,z,g_gudang_id) VALUES ('$nagudang','$x','$y','$z','$gudang_id')");
		return $hsl;
	}


	

}