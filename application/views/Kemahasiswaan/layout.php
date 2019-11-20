  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SILATAH</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="<?php echo base_url('Login/logout') ?>">
              <i class="glyphicon glyphicon-log-out"></i>
              <span class="hidden-md">Keluar</span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/dist/img/logounib.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
          <a>Kemahasiswaan</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigasi Utama</li>
        <li>
          <a href="<?php echo base_url('Kemahasiswaan/lihatKegiatan'); ?>">
            <i class="fa fa-calendar"></i>
            <span>Kegiatan Mahasiswa</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('Kemahasiswaan/lihatPrestasi'); ?>">
            <i class="fa  fa-trophy"></i> <span>Prestasi</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('Kemahasiswaan/lihatBeasiswa'); ?>">
            <i class="fa fa-graduation-cap"></i>
            <span>Beasiswa</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>