

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Bimbingan</a></li>
              <li class="breadcrumb-item active">Detail Bimbingan <?php echo $this->uri->segment(3);?></li>
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
            <h3 class="card-title">Detail Bimbingan <?php echo $this->uri->segment(3);?></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="tab-riwayat-bimbingan" data-toggle="pill" href="#riwayat-bimbingan" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Riwayat Bimbingan</a>
              </li>
              <?php if($chatisEnd !="sudah"){?>
              <li class="nav-item">
                <a class="nav-link" id="tab-tambah-percakapan" data-toggle="pill" href="#tambah-percakapan" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Tambah Percakapan</a>
              </li>
            <?php }?>
            </ul>
            <div class="tab-content" id="custom-content-above-tabContent">
              <div class="tab-pane fade active show" id="riwayat-bimbingan" role="tabpanel" aria-labelledby="tab-riwayat-bimbingan">
                <br>
                 <div class="row">
                  <div class="col-md-12">
                    <!-- The time line -->
                      <div class="timeline">
                    <?php foreach($histories as $history):?>
                      
                        <!-- timeline item -->
                        <div>
                          <?php if($history["level"] == 2){?>
                            <i class="fas fa-user bg-secondary"></i>
                          <?php } elseif($history["level"] == 1){?>
                            <i class="fas fa-user bg-green"></i>
                          <?php }?>
                          <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> <?php echo $history["tanggal"];?></span>
                            <h3 class="timeline-header"><a href="#"><?php echo $history["pengguna"];?></a></h3>

                            <div class="timeline-body">
                              <?php echo $history["deskripsi"];?>
                              <?php if($history["file"] != NULL){?>
                                <div class="card-footer bg-white">
                                  <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                    <li>
                                      <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                                      <div class="mailbox-attachment-info">
                                        <a href="<?php echo base_url('uploads/bimbingan/').$history["file"];?>" target="_blank" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> <?php echo $history["file"];?></a>
                                            <span class="mailbox-attachment-size clearfix mt-1">
                                              <span></span>
                                              <a href="<?php echo base_url('uploads/bimbingan/').$history["file"];?>" target="_blank" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                            </span>
                                      </div>
                                    </li>
                                   
                                  </ul>
                                </div>
                              <?php }?>
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                      <?php endforeach;?>
                      
                    </div>
                  </div>
                  <!-- /.col -->
                </div> 
              </div>
              <?php if($chatisEnd !="sudah"){?>
                <div class="tab-pane fade" id="tambah-percakapan" role="tabpanel" aria-labelledby="tab-tambah-percakapan">
                   <?php echo form_open_multipart();?>
                   <div class="form-group">
                      <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi');?></label>
                      <textarea id="deskripsi" name="deskripsi" class="form-control form-control-md" rows="4" placeholder="Silahkan masukan deskripsi" required=""></textarea>
                    </div>
                    <div class="form-group">
                      <label for="file">Berkas (PDF)</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="file" accept="application/pdf">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <label>Sebelum Dikirim, Silahkan Periksa Dulu. Karena anda tidak bisa menghapusnya</label>
                    <div class="form-group">
                      <input type="submit" value="Kirim" class="btn btn-success float-left">
                    </div>
                   <?php echo form_close();?> 
                </div>
              <?php }?>
            </div>
          </div>
        </section>
        <!-- /.content -->
        <!-- Modal Detail -->
        <div class="modal fade" id="modal-mulai">
          <div class="modal-dialog modal-default">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Data Pengajuan</h4>
                <button type="button" class="close closed" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              	<div class="form-group">
	              	<select id="bimbingan" class="select2 form-control form-control-md" data-placeholder="Pilih Bimbingan BAB" style="width:100%">
	              	</select>
	            </div>
              </div> 
              <div class="modal-footer justify-content-between">
                <button type="button" class="closed btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-mulai-bimbingan" data-id="<?php echo $id_pengajuan;?>">Mulai Bimbingan</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- End Modal Detail -->
      </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.3
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
</body>
</html>
