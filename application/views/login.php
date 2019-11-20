<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sistem Informasi Laporan Tahunan - Masuk</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/login/bootstrap.css');?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('assets/login/font-awesome.css');?>" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/login/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/login/style-responsive.css');?>" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
          $("button").click(function(){
              $("p").slideToggle(1000);
          });
      });
    </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

    <div id="login-page">

      <div class="container">

                <!-- <p>This is a paragraph.</p>
                <button>Toggle slideUp() and slideDown()</button> -->
      
          <form class="form-login" action="<?php echo base_url('Login/cek_Login'); ?>" method="post">

            <h2 class="form-login-heading"><img class="form-login-heading" src="<?php echo base_url('assets/dist/img/logounib.png'); ?>" width="170" height="170"></h2>
            <?=$this->session->flashdata('notif')?>
            <div class="login-wrap">
                <input type="text" required class="form-control" placeholder="Username" name="username">
                <br>
                <input type="password" required class="form-control" placeholder="Password" name="password">
                <label class="checkbox">
                </label>
                <button class="btn btn-theme btn-block" name="login" type="submit"><font color="white">MASUK</font></button>
          </form>     
      
      </div>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/login/jquery.js');?>"></script>
    <script src="<?php echo base_url('assets/login/bootstrap.min.js');?>"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url('assets/login/jquery.backstretch.min.js');?>"></script>
    <script>
        $.backstretch("<?php echo base_url('assets/dist/img/latar.jpg'); ?>", {speed: 500});
    </script>


  </body>
</html>
