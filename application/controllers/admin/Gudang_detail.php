<?php
class Gudang_detail extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_gudang');
		$this->load->model('m_gudang_detail');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_gudang_detail->tampil_gudang_detail();
		$data['kat']=$this->m_gudang->tampil_gudang();
		$data['kat2']=$this->m_gudang->tampil_gudang();
		$this->load->view('admin/v_gudang_detail',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_gudang_detail(){
	if($this->session->userdata('akses')=='1'){
		$nagudang=$this->input->post('nagudang');
		$x=$this->input->post('x');
		$y=$this->input->post('y');
		$z=$this->input->post('z');
		$gudang_id=$this->input->post('gudang_id');
		$this->m_gudang_detail->simpan_gudang_detail($nagudang,$x,$y,$z,$gudang_id);

		redirect('admin/gudang_detail');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_gudang_detail(){
	if($this->session->userdata('akses')=='1'){
		$kogudang=$this->input->post('kogudang');
		$nagudang=$this->input->post('nagudang');
		$x=$this->input->post('x');
		$y=$this->input->post('y');
		$z=$this->input->post('z');
		$gudang_id=$this->input->post('gudang_id');
		$this->m_gudang_detail->update_gudang_detail($kogudang,$nagudang,$x,$y,$z,$gudang_id);
		redirect('admin/gudang_detail');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_gudang_detail(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_gudang_detail->hapus_gudang_detail($kode);
		redirect('admin/gudang_detail');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}