<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar Admin - Pascasarjana Universitas Galuh</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css');?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/toastr/toastr.min.css');?>">

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
        <a id="dropdownPengajuan" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Pengajuan</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="<?php echo base_url('pengajuan');?>" class="dropdown-item">Data Mahasiswa</a></li>
        </ul>
      </li>
      <?php if($this->session->userdata('level') == 1) :?>
        <li class="nav-item dropdown">
        <a id="dropdownPengajuan" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Penentuan Pembimbing</a>
        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
          <li><a href="#" class="dropdown-item">Pembimbing Adm. Pend</a></li>
          <li><a href="#" class="dropdown-item">Pembimbing Manajemen</a></li>
          <li><a href="#" class="dropdown-item">Pembimbing Hukum</a></li>
        </ul>
      </li>
      <?php endif;?>
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
          <?php if($this->session->userdata('level') == 0) :?>
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
          <?php endif;?>
           <?php if($this->session->userdata('level') == 1) :?>
           
            <li class="nav-item">
              <a href="<?php echo base_url('users-dosen');?>" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>Dosen</p>
              </a>
            </li>
           
          <?php endif;?>
           <?php if($this->session->userdata('level') == 2) :?>
            <li class="nav-item">
              <a href="<?php echo base_url('users-mahasiswa');?>" class="nav-link">
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
              <li class="breadcrumb-item"><a href="#">Users</a></li>
              <li class="breadcrumb-item active">Daftar Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Admin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="nama">Nama Lengkap :</label>
                <input type="text" class="form-control" id="nama" placeholder="Silahkan isi dengan nama" required>
              </div>
              <div class="form-group">
                <label for="username">Username :</label>
                <input type="text" class="form-control" id="username" placeholder="Silahkan isi username" required>
              </div>
              <div class="form-group">
                <label for="gender">Jenis Kelamin :</label>
                <select id="gender" class="form-control" data-placeholder="Silahkan Pilih">
                  <option value="Pria">Pria</option>
                  <option value="Wanita">Wanita</option>
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="button" id="tambah-user" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="modal-ubah">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ubah Admin</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden"id="idubah" value="">
              <div class="form-group">
                <label for="nama-ubah">Nama Lengkap :</label>
                <input type="text" class="form-control" id="nama-ubah" placeholder="Silahkan isi dengan nama" required>
              </div>
              <div class="form-group">
                <label for="username-ubah">Username :</label>
                <input type="text" class="form-control" id="username-ubah" placeholder="Silahkan isi username" readonly="">
              </div>
              <div class="form-group">
                <label for="password">Password :</label>
                <input type="password" class="form-control" id="password" placeholder="Silahkan isi password" required>
              </div>
              <div class="form-group">
                <label for="gender-ubah">Jenis Kelamin :</label>
                <select id="gender-ubah" class="form-control" data-placeholder="Silahkan Pilih">
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="button" id="ubah-user" class="btn btn-primary">Simpan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Daftar Admin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if($this->session->userdata('success')) {?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Berhasil menghapus data.
                    </div>
                  <?php }elseif($this->session->userdata('failed')){?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Gagal menghapus data.
                    </div>
                  <?php }?>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                  Tambah Admin
                </button>
                <table id="data-pengajuan" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>USERNAME</th>
                    <th>OPSI</th>
                  </tr>
                  <tbody>
                    <?php $no = 1; foreach ($users as $user) :?>
                      <tr>
                        <td class="text-center"><?php echo $no++;?></td>
                        <td><?php echo $user->nama;?></td>
                        <td><?php echo $user->username;?></td>
                        <td class="text-center">
                          <a class="ubah-user text-info" data-id="<?php echo $user->id;?>">Ubah</a> <?php if($this->session->userdata('id') != $user->id) : ?>
                            <a class="text-danger" href="<?php echo base_url('users/hapus/admin/').$user->id;?>">Hapus</a>
                        <?php endif;?>
                        </td>
                      </tr>
                    <?php endforeach;?>
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
<!-- Toastr -->
<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js');?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<script>
  $(function () {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $("#ubah-user").click(function(){
      var id = $("#username-ubah").val();
      var gender = $("#gender-ubah").val();
      var nama = $("#nama-ubah").val();
      var password = $("#password").val();

      if(nama == '' || password==''){
        Swal.fire(
              'Hei!',
              'Silahkan lengkapi terlebih dahulu',
              'warning'
            )
      }else{
        $.ajax({
          type: 'POST',
          url : '<?php echo base_url('users/update_admin/');?>'+id,
          data : {nama:nama,gender:gender,password:password},
          success: function(data){
              Swal.fire(
                'Berhasil',
                'Mengubah admin berhasil',
                'success'
              )
              $("#username-ubah").val('');
              $("#nama-ubah").val('');
              $("#password").val('');
              $("#modal-ubah").modal('hide');
              location.reload();
            },error: function(data){
              Swal.fire(
                'Gagal',
                'Gagal mengubah admin :(',
                'error'
              );
            }
        });
      }
    });

    $('#data-pengajuan').DataTable({ "paging": true, "lengthChange": false, "searching": false, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });
    $(".ubah-user").click(function(){

      var id = $(this).data('id');
      $("#idubah").val(id);
      getuser(id);

    });
   
      
    
    function getuser(id){
      $.ajax({
        type : 'GET',
        dataType : 'json',
        url: '<?php echo base_url('users/info_user/');?>'+id,
        success : function(data){
          $("#nama-ubah").val(data.nama);
          $("#username-ubah").val(data.username);
          if(data.gender=="Pria"){
            $("#gender-ubah").html('<option value="Pria" selected>Pria</option><option value="Wanita">Wanita</option>');
          }else{
            $("#gender-ubah").html('<option value="Pria">Pria</option><option value="Wanita" selected>Wanita</option>');
          }
          
          $("#modal-ubah").modal();
        },error:function(data){
          Swal.fire(
              'Gagal',
              'Gagal mengambil data :(',
              'error'
            )
        }
      })
    }
    const $btnTambah = $("#tambah-user");

    $btnTambah.click(function(){
      var username = $("#username").val();
      var nama = $("#nama").val();
      var gender = $("#gender").val();
      if(username == '' || nama == ''){
        Swal.fire(
              'Hei!',
              'Silahkan lengkapi terlebih dahulu',
              'warning'
            )
      }else{
        $.ajax({
          type: 'POST',
          url: '<?php echo base_url('users/insert_admin');?>',
          data: {username:username,nama:nama,gender:gender},
          success: function(data){
            Swal.fire(
              'Berhasil',
              'Menambahkan admin berhasil',
              'success'
            )
            $("#username").val('');
            $("#nama").val('');
            location.reload();
          },error: function(data){
            Swal.fire(
              'Gagal',
              'Gagal menambahkan admin :(',
              'error'
            )
          }
        });
      }

    });

  });
</script>
</body>
</html>
