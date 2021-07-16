<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library(['session']);
        $this->load->model('M_akun','m_akun',true);
        $this->load->model('Jurnal_model','jurnal',true);
    }

    public function index(){
        $titleTag = 'Dashboard';
        $content = 'user/dashboard';
        $dataAkun = $this->akun->getAkun();
        $dataAkunTransaksi = $this->jurnal->getAkunInJurnal();
        
        foreach($dataAkunTransaksi as $row){
            $data[] = (array) $this->jurnal->getJurnalByNoReff($row->no_reff);
            $saldo[] = (array) $this->jurnal->getJurnalByNoReffSaldo($row->no_reff);
        }

        // if($data == null || $saldo == null){
        //     $data = 0;
        //     $saldo = 0;
        // }
        
        $jumlah = count($data);

        $jurnals = $this->jurnal->getJurnalJoinAkun();
        $totalDebit = $this->jurnal->getTotalSaldo('debit');
        $totalKredit = $this->jurnal->getTotalSaldo('kredit');
        $this->load->view(compact('content','dataAkun','titleTag','jurnals','totalDebit','totalKredit','jumlah','data','saldo','dataAkunTransaksi'));
    }

    public function dataAkun(){
        $content = 'admin/v_data_akun';
        $data['titleTag'] = 'Akun';
        $data['dataAkun'] = $this->m_akun->getAkun();
        $this->load->view('admin/v_data_akun',$data,);
    }

    public function isNamaAkunThere($str){
        $namaAkun = $this->m_akun->countAkunByNama($str);
        if($namaAkun >= 1){
            $this->form_validation->set_message('isNamaAkunThere', 'Nama Akun Sudah Ada');
            return false;
        }
        return true;
    }

    public function isNoAkunThere($str){
        $noAkun = $this->akun_model->countAkunByNoReff($str);
        if($noAkun >= 1){
            $this->form_validation->set_message('isNoAkunThere', 'No.Reff Sudah Ada');
            return false;
        }
        return true;
    }

    public function form($no_reff=""){
        if($no_reff==""){
            $data['action']=site_url('admin/accounting/tambah');
            $data['title']='tambah';
            $data['titleTag']='Tambah Akun';
            $data['no_reff']='';
            $data['nama_reff']='';
            $data['keterangan']='';
            $this->load->view('admin/v_form_akun',$data);
        }else{
            $akun=$this->m_akun->getAkunByNo($no_reff);
            $data['action']=site_url('admin/accounting/edit');
            $data['title']='edit';
            $data['titleTag']='Edit Akun';
            $data['no_reff']=$akun->no_reff;
            $data['nama_reff']=$akun->nama_reff;
            $data['keterangan']=$akun->keterangan;
            $this->load->view('admin/v_form_akun',$data);

        }
    }

    public function tambah(){
        $data['no_reff']=$this->input->post('no_reff');
        $data['id_user'] = 1;
        $data['nama_reff']=$this->input->post('nama_reff');
        $data['keterangan']=$this->input->post('keterangan');
        $this->m_akun->insertAkun($data);
        //$this->session->set_flashdata('berhasil','Data Akun Berhasil Di Tambahkan');
        redirect('admin/accounting');
    }

    public function editAkun(){
        $no_reff=$this->input->post('no_reff');
        $data['id_user'] = $this->input->post('id');
        $data['nama_reff']=$this->input->post('nama_reff');
        $data['keterangan']=$this->input->post('keterangan');
        $this->m_akun->updateAkun($no_reff,$data);
        $this->session->set_flashdata('berhasil','Data Akun Berhasil Di Ubah');
        redirect('admin/v_data_akun');
    }

    public function deleteAkun(){
        $id = $this->input->post('id',true);
        $noReffTransaksi = $this->jurnal->countJurnalNoReff($id);
        if($noReffTransaksi >= 0 ){
            $this->session->set_flashdata('dataNull','No.Reff '.$id.' Tidak Bisa Di Hapus Karena Data Akun Ada Di Jurnal Umum');
            redirect('admin/v_data_akun');
        }
        $this->akun->deleteAkun($id);
        $this->session->set_flashdata('berhasilHapus','Data akun dengan No.Reff '.$id.' berhasil di hapus');
        redirect('admin/v_data_akun');
    }

    public function jurnalUmum(){
        $data['titleTag'] = 'Jurnal';
        $data['jurnals'] = $this->jurnal->getJurnalJoinAkun();
        $data['totalDebit'] = $this->jurnal->getTotalSaldo('debit');
        $data['totalKredit'] = $this->jurnal->getTotalSaldo('kredit');
        $this->load->view('admin/v_jurnal_umum',$data);
    }

    /*public function jurnalUmumDetail(){
        $content = 'user/jurnal_umum';
        $titleTag = 'Jurnal Umum';

        $bulan = $this->input->post('bulan',true);
        $tahun = $this->input->post('tahun',true);
        $jurnals = null;

        if(empty($bulan) || empty($tahun)){
            redirect('jurnal_umum');
        }

        $jurnals = $this->jurnal->getJurnalJoinAkunDetail($bulan,$tahun);
        $totalDebit = $this->jurnal->getTotalSaldoDetail('debit',$bulan,$tahun);
        $totalKredit = $this->jurnal->getTotalSaldoDetail('kredit',$bulan,$tahun);

        if($jurnals==null){
            $this->session->set_flashdata('dataNull','Data Jurnal Dengan Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
            redirect('jurnal_umum');
        }

        $this->load->view('template',compact('content','jurnals','totalDebit','totalKredit','titleTag'));
    }*/

    public function createJurnal(){
        $title = 'Tambah'; 
        $content = 'user/form_jurnal'; 
        $action = 'jurnal_umum/tambah'; 
        $tgl_input = date('Y-m-d H:i:s'); 
        $id_user = $this->session->userdata('id'); 
        $titleTag = 'Tambah Jurnal Umum';

        if(!$_POST){
            $data = (object) $this->jurnal->getDefaultValues();
        }else{
            $data = (object) [
                'id_user'=>$id_user,
                'no_reff'=>$this->input->post('no_reff',true),
                'tgl_input'=>$tgl_input,
                'tgl_transaksi'=>$this->input->post('tgl_transaksi',true),
                'jenis_saldo'=>$this->input->post('jenis_saldo',true),
                'saldo'=>$this->input->post('saldo',true)
            ];
        }

        if(!$this->jurnal->validate()){
            $this->load->view('template',compact('content','title','action','data','titleTag'));
            return;
        }
        
        $this->jurnal->insertJurnal($data);
        $this->session->set_flashdata('berhasil','Data Jurnal Berhasil Di Tambahkan');
        redirect('jurnal_umum');    
    }

    public function editForm(){
        if($_POST){
            $id = $this->input->post('id',true);
            $title = 'Edit'; $content = 'user/form_jurnal'; $action = 'jurnal_umum/edit'; $titleTag = 'Edit Jurnal Umum';

            $data = (object) $this->jurnal->getJurnalById($id);

            $this->load->view('template',compact('content','title','action','data','id','titleTag'));
        }else{
            redirect('jurnal_umum');
        }
    }

    public function editJurnal(){
        $title = 'Edit'; $content = 'user/form_jurnal'; $action = 'jurnal_umum/edit'; $tgl_input = date('Y-m-d H:i:s'); $id_user = $this->session->userdata('id'); $titleTag = 'Edit Jurnal Umum';

        if($_POST){
            $data = (object) [
                'id_user'=>$id_user,
                'no_reff'=>$this->input->post('no_reff',true),
                'tgl_input'=>$tgl_input,
                'tgl_transaksi'=>$this->input->post('tgl_transaksi',true),
                'jenis_saldo'=>$this->input->post('jenis_saldo',true),
                'saldo'=>$this->input->post('saldo',true)
            ];
            $id = $this->input->post('id',true);
        }

        if(!$this->jurnal->validate()){
            $this->load->view('template',compact('content','title','action','data','id','titleTag'));
            return;
        }
        
        $this->jurnal->updateJurnal($id,$data);
        $this->session->set_flashdata('berhasil','Data Jurnal Berhasil Di Ubah');
        redirect('jurnal_umum');    
    }

    public function deleteJurnal(){
        $id = $this->input->post('id',true);
        $this->jurnal->deleteJurnal($id);
        $this->session->set_flashdata('berhasilHapus','Data Jurnal berhasil di hapus');
        redirect('jurnal_umum');
    }

    public function bukuBesar(){
        $data['titleTag'] = 'Buku Besar';
        $data['dataAkunTransaksi']=$this->jurnal->getAkunInJurnal();
        $data['data'] = $this->jurnal->getJurnalByNoReff($row->no_reff);

        
        foreach($data['dataAkunTransaksi'] as $row){
           
            $data['saldo'] = (array) $this->jurnal->getJurnalByNoReffSaldo($row->no_reff);
        }

        // if($data == null || $saldo == null){
        //     $data = 0;
        //     $saldo = 0;
        // }
        
        $data['jumlah'] = count($data['data']);
        $this->load->view('admin/v_buku_besar',$data,$data);
       
    }

    public function bukuBesarDetail(){
        $data['titleTag'] = 'BukuBesar';
        $data['dataAkunTransaksi'] = $this->jurnal->getAkunInJurnal();
        $data['data'] = $this->jurnal->getJurnalByNoReff($dataAkunTransaksi->no_reff);
        $data['saldo'] = $this->jurnal->getJurnalByNoReffSaldo($dataAkunTransaksi->no_reff);
        $data['jumlah'] = count($data);
        $this->load->view('admin/v_buku_besar',$data);

        $content = 'user/buku_besar';
        $titleTag = 'Buku Besar';
        
        $bulan = $this->input->post('bulan',true);
        $tahun = $this->input->post('tahun',true);

        if(empty($bulan) ||empty($tahun)){
            redirect('buku_besar');
        }
        
        $dataAkun = $this->akun->getAkunByMonthYear($bulan,$tahun);
        $data = null;
        $saldo = null;

        foreach($dataAkun as $row){
           // $data[] = (array) $this->jurnal->getJurnalByNoReffMonthYear($row->no_reff,$bulan,$tahun);
            //$saldo[] = (array) $this->jurnal->getJurnalByNoReffSaldoMonthYear($row->no_reff,$bulan,$tahun);
        }

        if($data == null || $saldo == null){
            $this->session->set_flashdata('dataNull','Data Buku Besar Dengan Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
            redirect('buku_besar');
        }

        $jumlah = count($data);

        $this->load->view('template',compact('content','titleTag','dataAkun','data','jumlah','saldo'));
    }

    public function neracaSaldo(){
        $data['titleTag'] = 'Buku Besar';
        $data['data']=$this->jurnal->getAkunInJurnal();


        // if($data == null || $saldo == null){
        //     $data = 0;
        //     $saldo = 0;
        // }
        
        $data['jumlah'] = count($data['data']);
        $this->load->view('admin/v_neraca_saldo',$data,$data);
    }

    public function neracaSaldoDetail(){
        $content = 'user/neraca_saldo';
        $titleTag = 'Neraca Saldo';

        $bulan = $this->input->post('bulan',true);
        $tahun = $this->input->post('tahun',true);

        if(empty($bulan) || empty($tahun)){
            redirect('neraca_saldo');
        }

        $dataAkun = $this->akun->getAkunByMonthYear($bulan,$tahun);
        $data = null;
        $saldo = null;
        
        foreach($dataAkun as $row){
           // $data[] = (array) $this->jurnal->getJurnalByNoReffMonthYear($row->no_reff,$bulan,$tahun);
            //$saldo[] = (array) $this->jurnal->getJurnalByNoReffSaldoMonthYear($row->no_reff,$bulan,$tahun);
        }

        if($data == null || $saldo == null){
            $this->session->set_flashdata('dataNull','Neraca Saldo Dengan Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
            redirect('neraca_saldo');
        }

        $jumlah = count($data);

        $this->load->view('template',compact('content','titleTag','dataAkun','data','jumlah','saldo'));
    }

    public function laporan(){
        $titleTag = 'Laporan';
        $content = 'user/laporan_main';
        $listJurnal = $this->jurnal->getJurnalByYearAndMonth();
        $tahun = $this->jurnal->getJurnalByYear();
        $this->load->view('template',compact('content','listJurnal','titleTag','tahun'));
    }

    public function laporanCetak(){
        $bulan = $this->input->post('bulan',true);
        $tahun = $this->input->post('tahun',true);
        $titleTag = 'Laporan '.bulan($bulan).' '.$tahun;

        $dataAkun = $this->akun->getAkunByMonthYear($bulan,$tahun);

        $jurnals = $this->jurnal->getJurnalJoinAkunDetail($bulan,$tahun);
        $totalDebit = $this->jurnal->getTotalSaldoDetail('debit',$bulan,$tahun);
        $totalKredit = $this->jurnal->getTotalSaldoDetail('kredit',$bulan,$tahun);

        $data = null;
        $saldo = null;
        foreach($dataAkun as $row){
            //$data[] = (array) $this->jurnal->getJurnalByNoReffMonthYear($row->no_reff,$bulan,$tahun);
            //$saldo[] = (array) $this->jurnal->getJurnalByNoReffSaldoMonthYear($row->no_reff,$bulan,$tahun);
        }

        if($data == null || $saldo == null){
            $this->session->set_flashdata('dataNull','Laporan Dengan Bulan '.bulan($bulan).' Pada Tahun '.date('Y',strtotime($tahun)).' Tidak Di Temukan');
            redirect('laporan');
        }

        $jumlah = count($data);

        $data = $this->load->view('user/laporan',compact('titleTag','dataAkun','bulan','tahun','jurnals','totalDebit','totalKredit','data','saldo','jumlah'),true);
        // echo $data;
        // die();
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "laporan_".bulan($bulan).'_'.$tahun;
        $this->pdf->load_view('user/laporan', $data);
    }


}