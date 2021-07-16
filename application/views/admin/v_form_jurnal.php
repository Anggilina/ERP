<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="M Fikri Setiadi">

    <title>Management data barang</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data
                    <small><?=$titleTag?></small>

<form action="<?= base_url($action) ?>" method="post">
                  <?php 
                    if(!empty($id)):
                  ?>
                  <input type="hidden" name="id" value="<?= $id ?>">
                  <?php endif; ?>
                  <div class="row mb-4">
                    <div class="col-4">
                        <label for="datepicker">Tanggal</label>
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control" id="datepicker" name="tgl_transaksi" type="text" value="<?= $data->tgl_transaksi ?>">
                        </div>
                        <?= form_error('tgl_transaksi') ?>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col">
                        <label for="no_reff">Nama Akun</label>
                        <?=form_dropdown('no_reff',getDropdownList('akun',['no_reff','nama_reff']),$data->no_reff,['class'=>'form-control','id'=>'no_reff']);?>
                        <?= form_error('no_reff') ?>
                    </div>
                    <div class="col">
                        <label for="reff">No. Reff</label>
                        <input type="text" name="reff" class="form-control" id="reff" readonly>
                    </div>
                    <div class="col">
                        <label for="jenis_saldo">Jenis Saldo</label>
                        <?=form_dropdown('jenis_saldo',['debit'=>'Debit','kredit'=>'Kredit'],$data->jenis_saldo,['class'=>'form-control jenis_saldo','id'=>'jenis_saldo']);?>
                        <?= form_error('jenis_saldo') ?>
                    </div>
                    <div class="col">
                        <label for="saldo">Saldo</label>
                        <input type="text" name="saldo" class="form-control saldo" id="saldo" value="<?= $data->saldo ?>">
                        <?= form_error('saldo') ?>
                    </div>
                  </div>
                  <div class="col-12" id="form_jurnal_prepend">
                    <button class="btn btn-primary" type="submit" id="button_jurnal"><?= $title ?></button>
                  </div> 
                  </form>
                  <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#mydata').DataTable();
    } );
</script>
<script type="text/javascript">
    $(function(){
        $('.harpok').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
        });
        $('.harjul').priceFormat({
                prefix: '',
                //centsSeparator: '',
                centsLimit: 0,
                thousandsSeparator: ','
        });
    });
</script>

</body>