
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Agenda Rapat | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/multiple-select-develop/dist/multiple-select.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.js"></script>
<!--<script src="jquery.min.js"></script>-->
<script src="<?php echo base_url()?>/assets/multiple-select-develop/dist/multiple-select.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
 <div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="sekul" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistem</b>Agenda<b>Rapat</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
            
              
                  <a href="<?php echo site_url()?>/login" class="fa fa-sign-out">Sign out</a>
            
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
          <p><?php echo $this->session->userdata('username'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <b><?php echo $this->session->userdata('username'); ?></b> Online </a>
        </div>
        <div class="pull-left info">
          
        </div>
      </div>
      <!-- search form -->
      
      <li class="<?php echo "active"?>"><a href="<?php echo site_url()?>/admin/sekul">
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU ADMIN</li>
        <li class="treeview">
          <a href="#">
            <span>Data User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url() ?>/admin/user"> Lihat Data</a></li>
            <li><a href="<?php echo site_url() ?>/admin/user/add"> Tambah Data</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <span>Data Divisi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url() ?>/admin/divisi"> Lihat Data</a></li>
            <li><a href="<?php echo site_url() ?>/admin/divisi/add"> Tambah Data</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
             <span>Data Unit</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url() ?>/admin/unit"> Lihat Data</a></li>
            <li><a href="<?php echo site_url() ?>/admin/unit/add">Tambah Data</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
             <span>Data Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url() ?>/admin/pegawai">Lihat Data</a></li>
            <li><a href="<?php echo site_url() ?>/admin/pegawai/add">Tambah Data</a></li>
          </ul>
          </li>
          <li class="treeview">
          <a href="#">
             <span>Data Ruangan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url() ?>/admin/ruangan">Lihat Data</a></li>
            <li><a href="<?php echo site_url() ?>/admin/ruangan/add">Tambah Data</a></li>
          </ul>
          </li>
          
          <li class="treeview">
          <a href="#">
             <span> Data Undangan Rapat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url() ?>/admin/undangan">Lihat Data</a></li>
            <li><a href="<?php echo site_url() ?>/admin/undangan/add">Tambah Data</a></li>
            
          </ul>
          </li>
          
            <li><a href="<?php echo site_url() ?>/admin/agenda_rapat">Data Agenda</a></li>
            
            <li><a href="<?php echo site_url() ?>/admin/hasil">Hasil Rapat</a></li>

          
        

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
