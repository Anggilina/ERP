<?php
class customer extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_customer');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_customer->tampil_customer();
		$this->load->view('admin/v_customer',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_customer(){
	if($this->session->userdata('akses')=='1'){
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_customer->simpan_customer($nama,$alamat,$notelp);
		redirect('admin/customer');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_customer(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$notelp=$this->input->post('notelp');
		$this->m_customer->update_customer($kode,$nama,$alamat,$notelp);
		redirect('admin/customer');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_customer(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_customer->hapus_customer($kode);
		redirect('admin/customer');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}