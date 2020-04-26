<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrasi Pendidikan | Pembimbing</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css');?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
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
        <a href="<?php echo base_url('dashboard');?>" class="nav-link">Dashboard</a>
      </li>
      <!-- Pengajuan -->
      <li class="nav-item dropdown">
        <a id="dropdownPengajuan" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Pengajuan</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <?php if($this->session->userdata('level') != 1) :?>
            <li><a href="<?php echo base_url('pengajuan-judul');?>" class="dropdown-item">Pengajuan Judul</a></li>
          <?php endif;?>
          <li><a href="<?php echo base_url('pengajuan');?>" class="dropdown-item">Data Mahasiswa</a></li>
        </ul>
      </li>
      <?php if($this->session->userdata('level') == 0) :?>
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
      <?php endif;?>
          <!-- Bimbingan -->
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Bimbingan</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Pembimbing 1</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">Data Bimbingan</a>
                  </li>
                </ul>
              </li>
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Pembimbing 2</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">Data Bimbingan</a>
                  </li>
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
          <!-- Pengajuan -->
          <li class="nav-item dropdown">
            <a id="dropdownPengajuan" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Users</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <?php if($this->session->userdata('level') == 0) :?>
                <li><a href="#" class="dropdown-item">Admin</a></li>
                <li><a href="#" class="dropdown-item">Dosen</a></li>
                <li><a href="#" class="dropdown-item">Mahasiswa</a></li>
              <?php endif;?>
              <?php if($this->session->userdata('level') == 1) :?>
                <li><a href="#" class="dropdown-item">Dosen</a></li>
              <?php endif;?>
              <?php if($this->session->userdata('level') == 2) :?>
                <li><a href="#" class="dropdown-item">Mahasiswa</a></li>
              <?php endif;?>
              <li><a href="<?php echo base_url('logout');?>" class="dropdown-item">Logout</a></li>
            </ul>
          </li>
        </ul>
    
  </nav>
  <!-- /.navbar -->



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('dashboard');?>" class="brand-link">
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
          <li class="nav-header">Pengajuan</li>
          <?php if($this->session->userdata('level') != 1) :?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Pengajuan Judul</p>
            </a>
          </li>
        <?php endif;?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>Data Mahasiswa</p>
            </a>
          </li>
          <?php if($this->session->userdata('level') == 0) :?>
            <li class="nav-header">Penentuan Pembimbing</li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  Adm Pend
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('AhpTopsisADM');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perhitungan Adm Pend</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pembimbing Adm</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  Manajemen
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('AhpTopsisMM');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perhitungan Manajemen</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pembimbing Manajemen</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  Hukum
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('AhpTopsisHUKUM');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perhitungan Hukum</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pembimbing Hukum</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif;?>
          <!-- Bimbingan -->
          <li class="nav-header">Bimbingan</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Pembimbing 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Bimbingan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Pembimbing 2
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Bimbingan</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- User -->
          <li class="nav-header">Users</li>
          <?php if($this->session->userdata('level') == 0) :?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Admin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Dosen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Mahasiswa</p>
              </a>
            </li>
          <?php endif;?>
           <?php if($this->session->userdata('level') == 1) :?>
           
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Dosen</p>
              </a>
            </li>
           
          <?php endif;?>
           <?php if($this->session->userdata('level') == 2) :?>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Mahasiswa</p>
              </a>
            </li>
          <?php endif;?>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Penentuan Pembimbing</a></li>
              <li class="breadcrumb-item active">Pembimbing Administrasi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Data Pengajuan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="data-pembimbing" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>NO</th>
                    <th>NAMA DOSEN</th>
                    <th>NILAI PREFERENSI</th>
                    <th>PENENTUAN</th>
                  </tr>
                  </thead>
                  <tbody id="pembimbing-administrasi">
                    
                  </tbody>
                </table>

              </div>
              
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
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

<!-- Select2 -->
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js');?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<script>
  $(function () {
    const $PembAdmin = $("#pembimbing-administrasi");
    var $datas = '';
    var $status = '';
    $.ajax({
      type : 'GET',
      url : '<?php echo base_url('/adpend/all');?>',
      dataType : 'json',
      success:function(data){
        for(var i = 0; i < data.length; i++){
          if(i < 5){
            $status = "Dosen Pembimbing";
          }else{
            $status = "Bukan Dosen Pembimbing";
          }
          $datas += '<tr><td class="text-center">'+(i+1)+'</td><td>'+data[i].nama_dosen+'</td><td class="text-center">'+data[i].nilai+'</td><td>'+$status+'</td></tr>';
        }
        
        $("#data-pembimbing").dataTable().fnClearTable();
        $("#data-pembimbing").dataTable().fnDestroy();
        $PembAdmin.html($datas);
        $('#data-pembimbing').DataTable({ "paging": true, "lengthChange": false, "searching": false, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });
      },error : function(data){
        alert('Gagal mengambil data');
      }
    })

    

  });
</script>
</body>
</html>
