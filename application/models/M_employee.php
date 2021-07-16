<?php
class M_employee extends CI_Model{

	function hapus_employee($kode){
		$hsl=$this->db->query("DELETE FROM tbl_employee where employee_id='$kode'");
		return $hsl;
	}

	function update_employee($kode,$nama,$alamat,$notelp,$jabatan){
		$hsl=$this->db->query("UPDATE tbl_employee set employee_nama='$nama',employee_alamat='$alamat',employee_notelp='$notelp',employee_jabatan='$jabatan' where employee_id='$kode'");
		return $hsl;
	}

	function tampil_employee(){
		$hsl=$this->db->query("select * from tbl_employee order by employee_id desc");
		return $hsl;
	}

	function simpan_employee($nama,$alamat,$notelp,$jabatan){
		$hsl=$this->db->query("INSERT INTO tbl_employee(employee_nama,employee_alamat,employee_notelp,employee_jabatan) VALUES ('$nama','$alamat','$notelp','$jabatan')");
		return $hsl;
	}

}