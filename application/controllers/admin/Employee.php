<?php
class Employee extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_employee');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_employee->tampil_employee();
		$this->load->view('admin/v_employee',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_employee(){
	if($this->session->userdata('akses')=='1'){
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$jabatan=$this->input->post('jabatan');
		$this->m_employee->simpan_employee($nama,$alamat,$notelp,$jabatan);
		redirect('admin/employee');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_employee(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$jabatan=$this->input->post('jabatan');
		$this->m_employee->update_employee($kode,$nama,$alamat,$notelp,$jabatan);
		redirect('admin/employee');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_employee(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_employee->hapus_employee($kode);
		redirect('admin/employee');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}