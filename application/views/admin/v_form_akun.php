
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
                    <form action="<?php echo base_url().($action)?>" method="post">
                      <div class="form-group">
                      <input type="hidden" name="id_user" value="<?= ucwords($this->session->userdata('id'))?>">
                        <h2>No. Reff</h2>
                        <p><?= form_error('no_reff') ?></p>
                        <input type="text" name="no_reff" class="form-control mb-3" id="no_reff" value="<?=$no_reff?>">
                      </div>
                      <div class="form-group">
                        <h2>Nama Reff</h2>
                        <p><?= form_error('nama_reff') ?></p>
                        <input type="text" name="nama_reff" class="form-control mb-3" id="nama" value="<?= $nama_reff ?>">
                      </div>
                      <div class="form-group">
                      <h2>Keterangan</h2>
                        <p><?= form_error('keterangan') ?></p>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control mb-3"><?= $keterangan?></textarea>
                      </div>
                      <div class="col-12 mt-4">
                        <button type="submit" class="btn-primary btn" id="button_akun"><?= $title ?></button>
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
