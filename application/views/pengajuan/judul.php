
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
                    <input type="text" class="form-control form-control-lg" id="nim"  name="nim" placeholder="Silahkan masukan NIM" value="<?php if($this->session->userdata('level') == 2) echo $this->session->userdata('username');?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Lengkap<?php echo form_error('nama',' <span class="text-danger">');?></label>
                    <input type="text" class="form-control form-control-lg" id="nama" name="nama" placeholder="Silahkan Masukan Nama" value="<?php if($this->session->userdata('level') == 2) echo $this->session->userdata('nama');?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="judul">Judul Tugas Akhir<?php echo form_error('judul',' <span class="text-danger">');?></label>
                    <input type="text" class="form-control form-control-lg" id="judul" name="judul" placeholder="Silahkan Masukan Judul Tugas Akhir" required>
                  </div>
                  <div class="form-group">
                    <label for="latarbelakang">Latar Belakang<?php echo form_error('latarbelakang',' <span class="text-danger">');?></label>
                      <textarea class="form-control form-control-lg" id="latarbelakang" name="latarbelakang" placeholder="Silahkan Masukan Latar Belakang" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="tujuan">Tujuan<?php echo form_error('tujuan',' <span class="text-danger">');?></label>
                      <textarea class="form-control form-control-lg" id="tujuan" name="tujuan" placeholder="Silahkan Masukan Tujuan" required></textarea>
                  </div>


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
    $("#tujuan").val('');
    $("#latarbelakang").val('');
    //Initialize Select2 Elements
      $('.select2').select2();
      $.widget.bridge('uibutton', $.ui.button);

  });
</script>
</body>
</html>
