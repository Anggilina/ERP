<?php
class Gudang extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_gudang');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_gudang->tampil_gudang();
		$this->load->view('admin/v_gudang',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_gudang(){
	if($this->session->userdata('akses')=='1'){
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$deskripsi=$this->input->post('deskripsi');
		$this->m_gudang->simpan_gudang($nama,$alamat,$deskripsi);
		redirect('admin/gudang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_gudang(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$deskripsi=$this->input->post('deskripsi');
		$this->m_gudang->update_gudang($kode,$nama,$alamat,$deskripsi);
		redirect('admin/gudang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_gudang(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_gudang->hapus_gudang($kode);
		redirect('admin/gudang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}