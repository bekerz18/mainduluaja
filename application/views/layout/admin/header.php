<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;?> | Pascasarjana Universitas Galuh</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css');?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/toastr/toastr.min.css');?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css');?>">
  <style type="text/css">
    a:hover{
      cursor: pointer;
    }
  </style>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
  <!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-lg navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url('beranda');?>" class="nav-link">Beranda</a>
      </li>
      <!-- Pengajuan -->
      <li class="nav-item dropdown">
        <a id="dropdownPengajuan" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Data Mahasiswa</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li>
            <a href="<?php echo base_url('pengajuan');?>" class="dropdown-item">Data Pengajuan</a>
          </li>
          <li>
            <a href="<?php echo base_url('proposal');?>" class="dropdown-item">Data Proposal</a>
          </li>
          <li>
            <a href="<?php echo base_url('penentuan-pembimbing');?>" class="dropdown-item">Data Penentuan Pembimbing</a>
          </li>
          <li>
            <a href="<?php echo base_url('komprehensif');?>" class="dropdown-item">Data Komprehensif</a>
          </li>
          <li>
            <a href="<?php echo base_url('thesis');?>" class="dropdown-item">Data Thesis</a>
          </li>
        </ul>
      </li>
       
        <!-- Penentuan Pembimbing -->
        <li class="nav-item dropdown">
          <a id="dropdownPenentuan" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Penentuan Pembimbing</a>
          <ul aria-labelledby="dropdownSubMenuPenentuan1" class="dropdown-menu border-0 shadow">
            <!-- Level two dropdown-->
            <li class="dropdown-submenu dropdown-hover">
              <a id="dropdownSubMenuPenentuan2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Adm Pend</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="<?php echo base_url('adpend');?>" class="dropdown-item">Perhitungan Adm Pend</a>
                </li>
                <li>
                  <a tabindex="-1" href="<?php echo base_url('pembimbing-administrasi');?>" class="dropdown-item">Pembimbing Adm Pend</a>
                </li>
              </ul>
            </li>
            <li class="dropdown-submenu dropdown-hover">
              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Manajemen</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="<?php echo base_url('manajemen');?>" class="dropdown-item">Perhitungan Manajemen</a>
                </li>
                <li>
                  <a tabindex="-1" href="<?php echo base_url('pembimbing-manajemen');?>" class="dropdown-item">Pembimbing Manajemen</a>
                </li>
              </ul>
            </li>
            <li class="dropdown-submenu dropdown-hover">
              <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hukum</a>
              <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                <li>
                  <a tabindex="-1" href="<?php echo base_url('hukum');?>" class="dropdown-item">Perhitungan Hukum</a>
                </li>
                <li>
                  <a tabindex="-1" href="<?php echo base_url('pembimbing-hukum');?>" class="dropdown-item">Pembimbing Hukum</a>
                </li>
              </ul>
            </li>
            <!-- End Level two -->
          </ul>
        </li>
          <!-- Bimbingan -->
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Bimbingan</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Pembimbing 1</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="<?php echo base_url('data-bimbingan-1');?>" class="dropdown-item">Data Bimbingan</a>
                  </li>
                </ul>
              </li>
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Pembimbing 2</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="<?php echo base_url('data-bimbingan-2');?>" class="dropdown-item">Data Bimbingan</a>
                  </li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
          <!-- Pengajuan -->
         
        </ul>
    
  </nav>
  <!-- /.navbar -->



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('beranda');?>" class="brand-link">
      <span class="brand-text font-weight-light">Program Pascasarjana</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Halo, <?php echo $nama;?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- User -->
          <li class="nav-header">Users</li>
            <li class="nav-item">
              <a href="<?php echo base_url('users-admin');?>" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Admin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('users-dosen');?>" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Dosen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('users-mahasiswa');?>" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Mahasiswa</p>
              </a>
            </li>           
          <li class="nav-item">
            <a href="<?php echo base_url('logout');?>" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>