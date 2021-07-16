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
                    <small>Gudang Detail</small>
                    <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Gudang Detail</a></div>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Kode Gudang Detail</th>
                        <th>Nama Gudang Detail</th>
                        <th>x</th>
                        <th>y</th>
                        <th>z</th>
                        <th>Nama Gudang</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['gudang_detail_id'];
                        $nm=$a['gudang_detail_nama'];
                        $x=$a['x'];
                        $y=$a['y'];
                        $z=$a['z'];
                        $gudang_id=$a['gudang_id'];
                        $gudang_nama=$a['gudang_nama'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $id;?></td>
                        <td><?php echo $nm;?></td>
                        <td style="text-align:center;"><?php echo $x;?></td>
                        <td style="text-align:right;"><?php echo ($y);?></td>
                        <td style="text-align:right;"><?php echo ($z);?></td>
                        <td style="text-align:right;"><?php echo ($gudang_nama);?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="#modalEditPelanggan<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                            <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Barang</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/gudang_detail/tambah_gudang_detail'?>">
                <div class="modal-body">

                    <!--<div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kobar" class="form-control" type="text" placeholder="Kode Barang..." style="width:335px;" required>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Gudang</label>
                        <div class="col-xs-9">
                            <input name="nagudang" class="form-control" type="text" placeholder="Nama Gudang..." style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="control-label col-xs-3" >Gudang</label>
                            <div class="col-xs-9">
                                <select name="gudang_id" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Gudang" data-width="80%" placeholder="Pilih Gudang" required>
                                <?php foreach ($kat2->result_array() as $k2) {
                                    $id_gud=$k2['gudang_id'];
                                    $nm_gud=$k2['gudang_nama'];
                                    ?>
                                        <option value="<?php echo $id_gud;?>"><?php echo $nm_gud;?></option>
                                <?php }?>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-xs-3" >X</label>
                        <div class="col-xs-9">
                            <input name="x" class="z form-control" type="text" placeholder="X" style="width:335px;">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-xs-3" >Y</label>
                        <div class="col-xs-9">
                            <input name="y" class="y form-control" type="text" placeholder="Y..." style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Z</label>
                        <div class="col-xs-9">
                            <input name="z" class="z form-control" type="text" placeholder="Z" style="width:335px;">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <!-- ============ MODAL EDIT =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['gudang_detail_id'];
                        $nm=$a['gudang_detail_nama'];
                        $x=$a['x'];
                        $y=$a['y'];
                        $z=$a['z'];
                        $gudang_id=$a['gudang_id'];
                        $gudang_nama=$a['gudang_nama'];
                    ?>
                <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/gudang_detail/edit_gudang_detail'?>">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Barang</label>
                            <div class="col-xs-9">
                                <input name="kogudang" class="form-control" type="text" value="<?php echo $id;?>" placeholder="Kode Barang..." style="width:335px;" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Barang</label>
                            <div class="col-xs-9">
                                <input name="nagudang" class="form-control" type="text" value="<?php echo $nm;?>" placeholder="Nama Barang..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Gudang</label>
                            <div class="col-xs-9">
                                <select name="gudang_id" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Gudang" data-width="80%" placeholder="Pilih Gudang" required>
                                <?php foreach ($kat2->result_array() as $k2) {
                                    $id_gud=$k2['gudang_id'];
                                    $nm_gud=$k2['gudang_nama'];
                                    if($id_gud==$gudang_id)
                                        echo "<option value='$id_gud' selected>$nm_gud</option>";
                                    else
                                        echo "<option value='$id_gud'>$nm_gud</option>";
                                }
                                ?>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >x</label>
                            <div class="col-xs-9">
                                <input name="x" class="z form-control" type="text" value="<?php echo $x;?>" placeholder="x" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >y</label>
                            <div class="col-xs-9">
                                <input name="y" class="y form-control" type="text" value="<?php echo $y;?>" placeholder="y" style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >z</label>
                            <div class="col-xs-9">
                                <input name="z" class="z form-control" type="text" value="<?php echo $z;?>" placeholder="z" style="width:335px;" required>
                            </div>
                        </div>

                    </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        <!-- ============ MODAL HAPUS =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['gudang_detail_id'];
                        $nm=$a['gudang_detail_nama'];
                        $x=$a['x'];
                        $y=$a['y'];
                        $z=$a['z'];
                        $gudang_id=$a['gudang_id'];
                    ?>
                <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/gudang_detail/hapus_gudang_detail'?>">
                        <div class="modal-body">
                            <p>Yakin mau menghapus data gudang ini..?</p>
                                    <input name="kode" type="hidden" value="<?php echo $id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        <!--END MODAL-->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; <?php echo '2020';?> by Kelompok 1 ERP</p>
                </div>
            </div>
            <!-- /.row -->
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
            $('.y').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.z').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
    
</body>

</html>
