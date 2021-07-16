<?php
class Vendor extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_vendor');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_vendor->tampil_vendor();
		$this->load->view('admin/v_vendor',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_vendor(){
	if($this->session->userdata('akses')=='1'){
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_vendor->simpan_vendor($nama,$alamat,$notelp);
		redirect('admin/vendor');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_vendor(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_vendor->update_vendor($kode,$nama,$alamat,$notelp);
		redirect('admin/vendor');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_vendor(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_vendor->hapus_vendor($kode);
		redirect('admin/vendor');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}