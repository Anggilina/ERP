<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login </title>

    <link href="<?php echo base_url().'assets/css2/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/font-awesome/css/font-awesome.css'?>" rel="stylesheet">

    <link href="<?php echo base_url().'assets/css2/animate.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css2/style.css'?>" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to Alfamat</h2>
                <img width="310px" src="<?php echo base_url().'assets/img/logo_alfa.png'?>"/>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="<?php echo base_url().'administrator/cekuser'?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Lupa Password?</small>
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Kelompok 1 ERP
            </div>
            <div class="col-md-6 text-right">
               <small>© 2020</small>
            </div>
        </div>
    </div>

</body>

</html>