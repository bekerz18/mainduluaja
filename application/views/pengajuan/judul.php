<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengajuan Judul - Pascasarjana Universitas Galuh</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css');?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');?>">
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
      <?php if($this->session->userdata('level') == 0) : ?>
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
          <?php endif;?>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
              <li class="breadcrumb-item active">Pengajuan Judul</li>
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
                <h3 class="card-title">Pengajuan Judul</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php echo form_open();?>
                <div class="card-body">
                  <?php if($this->session->userdata('Success')) {?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Berhasil menyimpan data.
                    </div>
                  <?php }?>

                  <div class="form-group">
                    <label for="nim">NIM<?php echo form_error('nim',' <span class="text-danger">');?></label>
                    <input type="text" class="form-control" id="nim"  name="nim" placeholder="Silahkan masukan NIM" value="<?php if($this->session->userdata('level') == 2) echo $this->session->userdata('username');?>"required autofocus>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Lengkap<?php echo form_error('nama',' <span class="text-danger">');?></label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Silahkan Masukan Nama" value="<?php if($this->session->userdata('level') == 2) echo $this->session->userdata('nama');?>" required>
                  </div>
                  <div class="form-group">
                    <label for="prodi">Program Studi<?php echo form_error('prodi',' <span class="text-danger">');?></label>
                    <select class="form-control select2" data-placeholder="Silahkan pilih Program Studi" id="prodi" name="prodi" style="width: 100%;" required>
                      <option></option>
                      <option value="adpend">Administrasi Pendidikan</option>
                      <option value="manajemen">Manajemen</option>
                      <option value="hukum">Hukum</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="konsentrasi">Konsentrasi<?php echo form_error('konsentrasi',' <span class="text-danger">');?></label>
                    <input type="text" class="form-control" id="konsentrasi" name="konsentrasi" placeholder="Silahkan Masukan Konsentrasi" required>
                  </div>
                  <div class="form-group">
                    <label for="judul">Judul Tugas Akhir<?php echo form_error('judul',' <span class="text-danger">');?></label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Silahkan Masukan Judul Tugas Akhir" required>
                  </div>
                  <div class="form-group">
                    <label for="tglpengajuan">Tanggal Pengajuan<?php echo form_error('tglpengajuan',' <span class="text-danger">');?></label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" class="form-control" id="tglpengajuan" name="tglpengajuan" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask placeholder="Silahkan masukan tanggal pengajuan (tanggal/bulan/tahun)" min="<?=date('Y-m-d');?>"required>
                    </div>
                  </div>
                  <?php if($this->session->userdata('level') == 0) {?>
                    <div class="form-group">
                      <label for="tglditerima">Tanggal Diterima<?php echo form_error('tglditerima',' <span class="text-danger">');?></label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" id="tglditerima" name="tglditerima" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask placeholder="Silahkan masukan tanggal diterima (tanggal/bulan/tahun)">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="pembimbing1">Pembimbing 1<?php echo form_error('pembimbing1',' <span class="text-danger">');?></label>
                      <select class="form-control select2" data-placeholder="Silahkan pilih Pembimbing 1" id="pembimbing1" name="pembimbing1" style="width: 100%;" required>
                        <option></option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="pembimbing2">Pembimbing 2<?php echo form_error('pembimbing2',' <span class="text-danger">');?></label>
                      <select class="form-control select2" data-placeholder="Silahkan pilih Pembimbing 2" id="pembimbing2" name="pembimbing2" style="width: 100%;" required>
                        <option></option>
                      </select>
                    </div>
                  <?php }?>


                </div>
               

                <div class="card-footer">
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-light">Batal</button>
                  </div>
                </div>
              </form>
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
<!-- InputMask -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js');?>"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<script>
  $(function () {
      const $pembimbing1 = $('#pembimbing1');
      const $pembimbing2 = $('#pembimbing2'); 
    //Initialize Select2 Elements
      $('.select2').select2();
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'tanggal/bulan/tahun' });
      $('[data-mask]').inputmask();
      $.widget.bridge('uibutton', $.ui.button);

      $('#prodi').change(function(){
        var $SelectedProdi ='';
        $('#prodi option:selected').each(function(){
          $SelectedProdi += $(this).val();
          GetPembimbing1($SelectedProdi);
          GetPembimbing2($SelectedProdi);
        })
      });

      function GetPembimbing1(prodi){
        var api = '<?php echo base_url();?>'+prodi+'/rank/1';
        var datas='';
        
        $.ajax({
          type : 'GET',
          url : api,
          datatype: 'json',
          success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
              datas += '<option value="'+ this.kode_dosen + '">' + this.nama_dosen + '</li>' ;
            });
            $pembimbing1.html('<option></option>'+datas);
          },error:function(data){
            alert('mohon maaf, data tidak bisa diambil'); 
            console.log('tidak dapat mengambil data');
          }
        });
      }
      function GetPembimbing2(prodi){
        var api = '<?php echo base_url();?>'+prodi+'/rank/2';
        var datas='';
        
        $.ajax({
          type : 'GET',
          url : api,
          datatype: 'json',
          success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
              datas += '<option value="'+ this.kode_dosen + '">' + this.nama_dosen + '</li>' ;
            });
            $pembimbing2.html('<option></option>'+datas);
          },error:function(data){
            alert('mohon maaf, data tidak bisa diambil'); 
            console.log('tidak dapat mengambil data');
          }
        });
      }
  });
</script>
</body>
</html>
