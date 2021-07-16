<?php
class M_vendor extends CI_Model{

	function hapus_vendor($kode){
		$hsl=$this->db->query("DELETE FROM tbl_vendor where vendor_id='$kode'");
		return $hsl;
	}

	function update_vendor($kode,$nama,$alamat,$notelp){
		$hsl=$this->db->query("UPDATE tbl_vendor set vendor_nama='$nama',vendor_alamat='$alamat',vendor_notelp='$notelp' where vendor_id='$kode'");
		return $hsl;
	}

	function tampil_vendor(){
		$hsl=$this->db->query("select * from tbl_vendor order by vendor_id desc");
		return $hsl;
	}

	function simpan_vendor($nama,$alamat,$notelp){
		$hsl=$this->db->query("INSERT INTO tbl_vendor(vendor_nama,vendor_alamat,vendor_notelp) VALUES ('$nama','$alamat','$notelp')");
		return $hsl;
	}

}