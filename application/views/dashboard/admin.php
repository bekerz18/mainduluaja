<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Beranda - Pascasarjana Universitas Galuh</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css');?>">
  
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
        <a id="dropdownPengajuan" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Pengajuan</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="<?php echo base_url('pengajuan-judul');?>" class="dropdown-item">Pengajuan Judul</a></li>
          <li><a href="<?php echo base_url('pengajuan');?>" class="dropdown-item">Data Mahasiswa</a></li>
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
              <p class="text-lg text-justify">Admin</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('users-dosen');?>" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p class="text-lg text-justify">Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('users-mahasiswa');?>" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p class="text-lg text-justify">Mahasiswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('logout');?>" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p class="text-lg text-justify">Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item active">Beranda</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid card card-default">
        <div class="card-body">
          <div class="row"> 
            <div class="col-md-3 text-center">
              <img class="rounded" src="<?php echo base_url('assets/images/logo_unigal.png');?>" height="220px">
            </div>
            <div class="col-md-6 text-center">
              <h1>UNIVERSITAS GALUH</h1>
              <h2>PROGRAM PASCASARJANA</h2>
            </div>
            <div class="col-md-3 text-center">
              <img class="rounded" src="https://pasca.unigal.ac.id/asset/images/ico.ico">
            </div>
          </div>
          <div class="row">
            <div class="content px-2">
              <p class="text-lg text-justify">
                Universitas Galuh Ciamis (UNIGAL) merupakan Universitas yang berada di tatar Galuh Ciamis, tepatnya di Jalan R. E. Martadinata nomor 150 Ciamis 46274, Jawa Barat. Universitas ini berada di bawah naungan Yayasan Pendidikan Galuh Ciamis.
              </p>
              <p class="text-lg text-justify">
                Perguruan tinggi ini didirikan pada hari Selasa tanggal 8 April 1998. Cikal bakal berdirinya universitas ini adalah mergernya beberapa sekolah tinggi yang ada di Ciamis pada waktu itu, yaitu Sekolah Tinggi Keguruan dan Ilmu Pendidikan Galuh, Sekolah Tinggi Hukum Galuh, Sekolah Tinggi Ilmu Ekonomi Galuh, dan Sekolah Tinggi Ilmu Politik Galuh. Pada awal pembentukannya hanya terdapat 3 (Tiga) fakultas, yakni: Fakultas Keguruan dan Ilmu Pendidikan, Fakultas Hukum, dan Fakultas Ekonomi. Seiring dengan perkembangannya kemudian ada penambahan untuk Fakultas Pertanian, Fakultas Ilmu Sosial dan Ilmu Politik, Fakultas Teknik, dan yang terbaru adalah Fakultas Kesehatan. Sehingga kini universitas ini terdiri dari tujuh fakultas dengan duapuluh program studi.
              </p>
              <p class="text-lg text-justify">
                Universitas Galuh kini juga menyelenggarakan program pascasarjana (S2), program studi Magister Manajemen, Magister Manajemen Pendidikan serta Magister Hukum. Pengajar program tersebut merupakan pengajar-pengajar dari beberapa Universitas Negeri di Jawa Barat, diantaranya dari ITB, UNPAD, dan UPI.
              </p>
              <strong class="text-lg text-justify">VISI</strong>
              <p class="text-lg text-justify">
                Menjadi Universitas Unggul dan Berdaya Saing Global pada Tahun 2030.
              </p>
              <strong class="text-lg text-justify">MISI</strong>
              <p class="text-lg text-justify">Misi Universitas adalah:</p>
              <ol class="text-lg text-justify">
                <li>
                  Meningkatkan mutu manajemen internal Perguruan Tinggi yang diharapkan akan meningkatkan efisiensi internal dan pada gilirannya akan meningkatkan citra institusi dimata stakeholders.
                </li>
                <li>
                  Mengembangkan institusi yang ditujukan untuk meningkatkan mutu dan relevansi Perguruan Tinggi agar dapat berkontribusi dalam meningkatkan daya saing bangsa serta perluasan akses pada pendidikan tinggi bagi masyarakat.
                </li>
                <li>
                  Mendorong dan mengembangkan unggulan dan inovasi Perguruan Tinggi di bidang penelitian dan/atau pelayanan masyarakat yang secara langsung dapat membantu peningkatan daya saing daerah dan pembangunan nasional.
                </li>
                <li>
                  Mengembangkan program unggulan Perguruan Tinggi seperti peningkatan jumlah publikasi ilmiah, pertukaran dosen/mahasiswa, kerja sama serta perolehan status akreditasi yang kesemuanya bertaraf internasional untuk meningkatkan daya saing global.
                </li>
                <li>
                  Menghasilkan lulusan yang unggul dan berdaya saing global.
                </li>
                <li>
                  Menjalin kerja sama akademik dan/atau non akademik dengan Perguruan Tinggi lain, atau Institusi lain, baik di dalam negeri maupun luar negeri.
                </li>
              </ol>
              <strong class="text-lg text-justify">TUJUAN</strong>
              <p class="text-lg text-justify">
                Tujuan Universitas adalah: 
              </p>
              <ol class="text-lg text-justify">
                <li>
                  Meningkatnya kualitas tatakelola dan penjaminan mutu untuk meningkatkan posisi sebagai Perguruan Tinggi yang berstandar internasional yang didasari manajemen berbasis perencanaan dan penjaminan mutu dengan sasaran mempertahankan dan meningkatkan mutu, daya saing lulusan dan perluasan akses.
                </li>
                <li>
                  Terwujudnya infrastruktur, dengan menyediakan fasilitas dan peralatan utama, pengembangan sarana dan prasarana, serta laboratorium untuk meningkatkan pelayanan terhadap stakeholders internal.
                </li>
                <li>
                  Terjaminnya sistem pengelolaan keuangan yang sehat dan terencana dengan transparansi dan akuntabel.
                </li>
                <li>
                  Terwujudnya kondisi sumberdaya manusia yang berkualitas dan berdaya saing global.
                </li>
                <li>
                  Terwujudnya suasana akdemik yang kondusif, sehingga mendorong semangat belajar dan berkarya yang berkesinambungan bagi civitas akademika.
                </li>
                <li>
                  Meningkatnya mutu pelayanan pendidikan yang memuaskan stakeholders sesuai dengan standar nasional.
                </li>
                <li>
                  Terbentuknya organisasi yang mantap dan sinergi.
                </li>
                <li>
                  Melahirkan cendekiawan yang berakhlaqul karimah yang memiliki dan menguasai salah satu bidang ilmu pengetahuan, teknologi atau seni tertentu dan mampu menerapkannya dalam masyarakat global.
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong class="text-lg text-justify">Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.3
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>

</body>
</html>
