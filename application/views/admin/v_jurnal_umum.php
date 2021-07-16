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
                    <div class="pull-right"><a href="<?= base_url('admin/accounting/form') ?>" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Tambah Akun</a></div>
                </h1>
            </div>
        </div>

 <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Akun</th>
                    <th scope="col">Ref</th>
                    <th scope="col">Debet</th>
                    <th scope="col">Kredit</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($jurnals as $row):
                    if($row->jenis_saldo=='debit'):
                  ?>
                  <tr>
                    <td>
                      <?= ($row->tgl_transaksi) ?>
                    </td>
                    <td>
                    <?= $row->nama_reff ?>
                    </td>
                    <td>
                    <?= $row->no_reff ?>
                    </td>
                    <td>
                    <?= 'Rp. '.number_format($row->saldo,0,',','.') ?>
                    </td>
                    <td>
                      Rp. 0
                    </td>
                    <td>
                    <a class="btn btn-xs btn-warning" href="<?= base_url('admin/accounting/form/'. $row->id_transaksi)?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                    </td>
                  </tr>
                  <?php 
                    endif;
                    if($row->jenis_saldo=='kredit'):
                  ?>
                  <tr>
                    <td>
                      <?= ($row->tgl_transaksi) ?>
                    </td>
                    <td class="text-right"><?= $row->nama_reff ?></td>
                    <td><?= $row->no_reff ?></td>
                    <td>
                      Rp. 0
                    </td>
                    <td>
                    <?= 'Rp. '.number_format($row->saldo,0,',','.') ?>
                    </td>
                    <td>
                    <a class="btn btn-xs btn-warning" href="<?= base_url('admin/accounting/form/'. $row->id_transaksi)?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                    </td>          
                  </tr>  
                  <?php endif;?>
                  <?php endforeach ?>
                  <?php if($totalDebit->saldo != $totalKredit->saldo){ ?>
                  <tr>
                    <td colspan="3" class="text-center"><b>Jumlah Total</b></td>
                    <td class="text-danger"><b><?= 'Rp. '.number_format($totalDebit->saldo,0,',','.') ?></b></td>
                    <td colspan="2" class="text-danger"><b><?= 'Rp. '.number_format($totalKredit->saldo,0,',','.') ?></b></td>
                  </tr>
                  <tr  class="text-center bg-danger ">
                    <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">TIDAK SEIMBANG</td>
                  </tr>
                  <?php }else{  ?>
                    <tr>
                    <td colspan="3" class="text-center"><b>Jumlah Total</b></td>
                    <td class="text-success"><b><?= 'Rp. '.number_format($totalDebit->saldo,0,',','.') ?></b></td>
                    <td colspan="2" class="text-success"><b><?= 'Rp. '.number_format($totalKredit->saldo,0,',','.') ?></b></td>
                  </tr>
                  <tr class="text-center bg-success">
                    <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">SEIMBANG</td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
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

</html>