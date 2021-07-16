<?php
class M_customer extends CI_Model{

	function hapus_customer($kode){
		$hsl=$this->db->query("DELETE FROM tbl_customer where customer_id='$kode'");
		return $hsl;
	}

	function update_customer($kode,$nama,$alamat,$notelp){
		$hsl=$this->db->query("UPDATE tbl_customer set customer_nama='$nama',customer_alamat='$alamat',customer_notelp='$notelp' where customer_id='$kode'");
		return $hsl;
	}

	function tampil_customer(){
		$hsl=$this->db->query("select * from tbl_customer order by customer_id desc");
		return $hsl;
	}

	function simpan_customer($nama,$alamat,$notelp){
		$hsl=$this->db->query("INSERT INTO tbl_customer(customer_nama,customer_alamat,customer_notelp) VALUES ('$nama','$alamat','$notelp')");
		return $hsl;
	}

}