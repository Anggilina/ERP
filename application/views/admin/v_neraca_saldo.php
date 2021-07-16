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
                </h1>
            </div>
        </div>
        <div class="table-responsive">
            <?php 
                $a=0;
                $debit = 0;
                $kredit = 0;
            ?>
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No. Akun</th>
                    <th scope="col">Nama Akun</th>
                    <th scope="col">Debit</th>
                    <th scope="col">Kredit</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                        $totalDebit=0;
                        $totalKredit=0;
                        for($i=0;$i<$jumlah;$i++) :                          
                            $a++;
                            $s=0;
                            $deb = $data[$i];
                    ?>
                    <tr>
                        <td>
                            <?= $data[$i][$s]->no_reff ?>
                        </td>
                        <td>
                            <?= $data[$i][$s]->nama_reff ?>
                        </td>
                        <?php 
                            for($j=0;$j<count($data[$i]);$j++):
                                if($deb[$j]->jenis_saldo=="debit"){
                                    $debit = $debit + $deb[$j]->saldo;
                                }else{
                                    $kredit = $kredit + $deb[$j]->saldo;
                                }
                                $hasil = $debit-$kredit;
                            endfor 
                        ?>
                        <?php 
                            if($hasil>=0){ ?>
                                <td><?= 'Rp. '.number_format($hasil,0,',','.') ?></td>
                                <td> - </td>
                            <?php $totalDebit += $hasil; ?>
                        <?php }else{ ?>
                                <td> - </td>
                                <td><?= 'Rp. '.number_format(abs($hasil),0,',','.') ?></td>
                                <?php $totalKredit += $hasil; ?>
                        <?php } ?>
                        <?php
                            $debit = 0;
                            $kredit = 0;
                        ?>
                    </tr>
                    <?php endfor ?>
                    <?php if($totalDebit != abs($totalKredit)){ ?>
                    <tr>
                        <td class="text-center" colspan="2"><b>Total</b></td>
                        <td class="text-danger"><?= 'Rp. '.number_format($totalDebit,0,',','.') ?></td>
                        <td class="text-danger"><?= 'Rp. '.number_format(abs($totalKredit),0,',','.') ?></td>
                    </tr>
                    <tr class="bg-danger text-center">
                        <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">TIDAK SEIMBANG</td>
                    </tr>
                    <?php }else{ ?>
                      <tr>
                        <td class="text-center" colspan="2"><b>Total</b></td>
                        <td class="text-success"><?= 'Rp. '.number_format($totalDebit,0,',','.') ?></td>
                        <td class="text-success"><?= 'Rp. '.number_format(abs($totalKredit),0,',','.') ?></td>
                    </tr>
                    <tr class="bg-success text-center">
                        <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">SEIMBANG</td>
                    </tr>
                    <?php } ?>  
                </tbody>
              </table>
            </div>
    </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    
</body>
</html>