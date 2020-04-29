<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar Pengajuan - Pascasarjana Universitas Galuh</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');?>">
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
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    a:hover{
      cursor: pointer;
    }
  </style>
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
          <?php if($this->session->userdata('level')==2){?>
            <li><a href="<?php echo base_url('pengajuan-judul');?>" class="dropdown-item">Pengajuan Judul</a></li>
          <?php }?>
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
              <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
              <li class="breadcrumb-item active">Daftar Pengajuan</li>
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
                <h3 class="card-title">Daftar Pengajuan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if($this->session->userdata('level') == 2){?>
                  <div class="row">
                    <a href="<?php echo base_url('pengajuan-judul');?>">
                      <button type="button" class="btn btn-info">Ajukan Judul</button>
                    </a>
                  </div>
                <?php }?>
                <?php if($this->session->userdata('success_delete')) {?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Berhasil menghapus data.
                    </div>
                  <?php }elseif($this->session->userdata('failed_delete')){?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Gagal menghapus data.
                    </div>
                  <?php }?>
                  <?php if($this->session->flashdata('success_upd')){?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Berhasil mengubah data.
                    </div>
                  <?php }elseif($this->session->flashdata('failed_upd')){?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Gagal mengubah data.
                    </div>
                  <?php }?>
                <table id="data-pengajuan" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>NO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>PRODI</th>
                    <th>KONSENTRASI</th>
                    <th>JUDUL</th>
                    <th>PENGAJUAN</th>
                    <th>STATUS</th>
                    <th>PEMBIMBING 1</th>
                    <th>PEMBIMBING 2</th>
                    <th>OPTIONS</th>
                  </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1; foreach ($pengajuans as $pengajuan):  ?>
                      <tr>
                        <td class="text-center"><?php echo $no++;?></td>
                        <td><?php echo $pengajuan->username;?></td>
                        <td><?php echo $pengajuan->nama;?></td>
                        <td>
                          <?php
                          if($pengajuan->prodi == "adpend"){
                            echo "Adm Pend";
                          }elseif($pengajuan->prodi == "manajemen"){
                            echo "Manajemen";
                          }else{
                            echo "Hukum";
                          }
                          ?>
                        </td>
                        <td><?php echo $pengajuan->konsentrasi;?></td>
                        <td><?php echo $pengajuan->judul;?></td>
                        <td><?php echo date("d-m-Y H:i:s", strtotime($pengajuan->tglpengajuan));?></td>
                        <td class="text-center">
                          <?php
                            if($pengajuan->status == "belum"){
                              echo "Sedang diproses";
                            }elseif($pengajuan->status == "tolak"){
                              echo "Ditolak Pada <br>".date("d-m-Y H:i:s", strtotime($pengajuan->tglditerima));
                            }elseif($pengajuan->status == "terima"){
                              echo "Diterima Pada <br>".date("d-m-Y H:i:s", strtotime($pengajuan->tglditerima));
                            }
                          ?> 
                        </td>
                        <td>
                          <?php
                            if($pengajuan->id_pembimbing1 == NULL || $pengajuan->status == "tolak"){
                              echo "Tidak Ada";
                            }else{
                              $dosbing1 = $model->get_dosen($pengajuan->id_pembimbing1);
                              echo $dosbing1['nama'];
                            }
                          ?> 
                        </td>
                        <td>
                          <?php
                            if($pengajuan->id_pembimbing2 == NULL || $pengajuan->status == "tolak"){
                              echo "Tidak Ada";
                            }else{
                              $dosbing2 = $model->get_dosen($pengajuan->id_pembimbing2);
                              echo $dosbing2['nama'];
                            }
                          ?> 
                        </td>
                        
                          <td class="text-center">
                            <a class="ubah-pengajuan text-info text-sm" data-id="<?php echo $pengajuan->id_pengajuan;?>">Ubah</a> <a class="text-warning text-sm" href="pengajuan/tolak/<?php echo $pengajuan->id_pengajuan;?>">Tolak</a> <a class="text-danger text-sm" href="pengajuan/hapus/<?php echo $pengajuan->id_pengajuan;?>">Hapus</a>
                          </td>
                       

                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>

              </div>
              <?php if($this->session->userdata('level') == 0) :?>
                <div class="modal fade" id="modal-ubah">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Ubah Pengajuan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden"id="idubah" value="">
                        <div class="form-group">
                          <label for="nim">NIM :</label>
                          <input type="text" class="form-control form-control-lg" id="nim" readonly>
                        </div>
                        <div class="form-group">
                          <label for="username-ubah">NAMA :</label>
                          <input type="text" class="form-control form-control-lg" id="nama" readonly>
                        </div>
                        <div class="form-group">
                          <label for="prodi">PROGRAM STUDI :</label>
                          <input type="text" id="prodi" class="form-control form-control-lg" readonly>
                        </div>
                        <div class="form-group">
                          <label for="konsentrasi">KONSENTRASI :</label>
                          <input type="text" class="form-control form-control-lg" id="konsentrasi" readonly>
                        </div>
                        <div class="form-group">
                          <label for="judul">JUDUL :</label>
                          <input type="text" class="form-control form-control-lg" id="judul"  readonly>
                        </div>
                        <div class="form-group">
                          <label for="tglpengajuan">Tanggal Pengajuan</label>
                            <input type="text" class="form-control form-control-lg" id="tglpengajuan" readonly>
                        </div>
                        <div class="form-group">
                          <label for="pembimbing1">Pembimbing 1</label>
                          <select class="form-control form-control-lg select2" data-placeholder="Silahkan pilih Pembimbing 1" id="pembimbing1"style="width: 100%;" required>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="pembimbing2">Pembimbing 2</label>
                          <select class="form-control form-control-lg select2" data-placeholder="Silahkan pilih Pembimbing 2" id="pembimbing2" name="pembimbing2" style="width: 100%;" required>
                          </select>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <button type="button" id="ubah" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
              <?php endif;?>
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
<!-- Select2 -->
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<script>
  $(function () {

    $('#data-pengajuan').DataTable({ "paging": true, "lengthChange": false, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });
    <?php if($this->session->userdata('level') == 0) :?>
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      const $ubahBtn = $(".ubah-pengajuan");
      // if click ubah
      $ubahBtn.click(function(){
        var id = $(this).data('id');
        $.ajax({
          type : 'GET',
          url :'<?php echo base_url('pengajuan/get_judul/');?>'+id,
          dataType : 'json',
          success:function(data){
            $("#idubah").val(id);
            $("#nim").val(data[0].username);
            $("#nama").val(data[0].nama);
            $("#prodi").val(data[0].nama_prodi);
            $("#tglpengajuan").val(data[0].tglpengajuan);
            $("#tglditerima").val(data[0].tglditerima);
            $("#judul").val(data[0].judul);
            $("#konsentrasi").val(data[0].konsentrasi);
            $("#modal-ubah").modal();
            GetPembimbing1(data[0].prodi);
            GetPembimbing2(data[0].prodi);
          },error:function(data){
            Swal.fire(
              'Gagal',
              'Gagal mengambil data :(',
              'error'
            )
          }
        });
        
        
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
              datas += '<option value="'+ this.id + '">' + this.nama_dosen + '</li>' ;
            });
            $("#pembimbing1").html('<option></option>'+datas);
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
              datas += '<option value="'+ this.id+ '">' + this.nama_dosen + '</li>' ;
            });
            $("#pembimbing2").html('<option></option>'+datas);
          },error:function(data){
            alert('mohon maaf, data tidak bisa diambil'); 
            console.log('tidak dapat mengambil data');
          }
        });
      }
      $("#ubah").on('click',function(){
        var id = $("#idubah").val();
        var pembimbing1 = $("#pembimbing1").val();
        var pembimbing2 = $("#pembimbing2").val();
       

        if(id == '' || pembimbing1 =='' || pembimbing2 == ''){
          Swal.fire(
              'Perhatian!',
              'Silahkan lengkapi data!',
              'warning'
            )
        }else{
          $.ajax({
            type : 'POST',
            url : '<?php echo base_url('pengajuan/update');?>',
            data: {id:id,pembimbing1:pembimbing1,pembimbing2:pembimbing2},
            success: function(data){
              location.reload();
            },error: function(data){
              Swal.fire(
                'Gagal',
                'Gagal menyimpan data :(',
                'error'
              )
            }
          });
        }
      });
      $('.select2').select2();
    <?php endif;?>

  });
</script>
</body>
</html>
