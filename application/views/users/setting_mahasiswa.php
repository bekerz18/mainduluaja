  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Users</a></li>
              <li class="breadcrumb-item active">Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Pengaturan Akun</h3>
        </div>
        <div class="card-body">
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
          <?php echo form_open();?>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" name="nim" id="nim" class="form-control form-control-lg" value="<?php echo $this->session->userdata('username');?>" disabled>
            </div>
            <div class="form-group">
              <label for="nama">NAMA</label>
              <input type="text" name="nama" id="nama" class="form-control form-control-lg" value="<?php echo $this->session->userdata('nama');?>" disabled>
            </div>
            <div class="form-group">
              <label for="gender">JENIS KELAMIN</label>
              <input type="text" name="gender" id="gender" class="form-control form-control-lg" value="<?php echo $this->session->userdata('gender');?>" disabled>
            </div>
            <div class="form-group">
              <label for="prodi">PROGRAM STUDI</label>
              <input type="text" name="prodi" id="prodi" class="form-control form-control-lg" value="<?php if($this->session->userdata('prodi') == 'adpend'){
                  echo 'Administrasi Pendidikan';
                }elseif($this->session->userdata('prodi') == 'manajemen'){
                  echo 'Manajemen';
                }elseif($this->session->userdata('prodi') == 'hukum'){
                  echo 'Hukum';
                }else{
                  echo '';
                }?>" disabled>
            </div>
            <div class="form-group">
              <label for="konsentrasi">KONSENTRASI</label>
              <input type="text" name="konsentrasi" id="konsentrasi" class="form-control form-control-lg" value="<?php echo $this->session->userdata('konsentrasi');?>" disabled>
            </div>
            <div class="form-group">
              <label for="email">EMAIL</label>
              <input type="email" name="email" id="email" class="form-control form-control-lg" value="<?php echo $this->session->userdata('email');?>" placeholder="Silahkan isi bilamana ingin diubah">
            </div>
            <div class="form-group">
              <label for="handphone">NO HP/TELEPON</label>
              <input type="text" name="handphone" id="handphone" class="form-control form-control-lg" value="<?php echo $this->session->userdata('handphone');?>" placeholder="Silahkan isi bilamana ingin diubah">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Silahkan isi bilamana ingin diubah">
            </div>
            <div class="form-group text-center">
              <a href="<?php echo base_url('beranda');?>">
                <button type="button" class="btn btn-lg btn-light">Kembali</button>
              </a>
              <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
            </div>
          <?php echo form_close();?>
        </div>
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
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>

</body>
</html>
