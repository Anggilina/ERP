 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url().'welcome'?>">ALFAMART</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <?php $h=$this->session->userdata('akses'); ?>
                    <?php $u=$this->session->userdata('user'); ?>
                    <?php if($h=='1'){ ?> 
                     <!--dropdown-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Transaksi"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Transaksi</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'admin/penjualan'?>"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Penjualan (Eceran)</a></li> 
                            <li><a href="<?php echo base_url().'admin/penjualan_grosir'?>"><span class="fa fa-cubes" aria-hidden="true"></span> Penjualan (Grosir)</a></li> 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Transaksi"><span class="fa fa-user" aria-hidden="true"></span> SDM</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'admin/suplier'?>"><span class="fa fa-user" aria-hidden="true"></span> Supplier</a></li> 
                            <li><a href="<?php echo base_url().'admin/vendor'?>"><span class="fa fa-user" aria-hidden="true"></span> Vendor</a></li>
                            <li><a href="<?php echo base_url().'admin/employee'?>"><span class="fa fa-user" aria-hidden="true"></span> Employee</a></li>
                            <li><a href="<?php echo base_url().'admin/customer'?>"><span class="fa fa-user" aria-hidden="true"></span> Customer</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Gudang"><span class="fa fa-refresh" aria-hidden="true"></span> Gudang</a>
                        <ul class="dropdown-menu">
                        <li>
                        <a href="<?php echo base_url().'admin/gudang'?>"><span class="fa fa-refresh"></span> Gudang</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/gudang_detail'?>"><span class="fa fa-refresh"></span> Gudang Detail</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/retur'?>"><span class="fa fa-refresh"></span> Retur</a>
                    </li>

                        </ul>
                    </li>
                    
                    
                    <li>
                        <a href="<?php echo base_url().'admin/grafik'?>"><span class="fa fa-line-chart"></span> Grafik</a>
                    </li>
                    <li>
                        <a href="http://localhost/sia-master/dashboard"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Acounting</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'admin/laporan'?>"><span class="fa fa-file"></span> Laporan</a>
                    </li>
                    <?php }?>
                    <?php if($h=='2'){ ?> 
                      <!--dropdown-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Transaksi"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Transaksi</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'admin/penjualan'?>"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Penjualan (Eceran)</a></li> 
                            <li><a href="<?php echo base_url().'admin/penjualan_grosir'?>"><span class="fa fa-cubes" aria-hidden="true"></span> Penjualan (Grosir)</a></li> 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Acounting"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Acounting</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'admin/accounting'?>"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Acounting</a></li> 
                            <li><a href="<?php echo base_url().'admin/belance'?>"><span class="fa fa-cubes" aria-hidden="true"></span> Opening Belance</a></li> 
                        </ul>
                    </li>
                    <!--ending dropdown-->
                    <li>
                        <a href="<?php echo base_url().'admin/retur'?>"><span class="fa fa-refresh"></span> Retur</a>
                    </li>
                    <?php }?>
                     <li>
                        <a href="<?php echo base_url().'administrator/logout'?>"><span class="fa fa-sign-out"></span> Logout</a>
                    </li>
                </ul>


            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>