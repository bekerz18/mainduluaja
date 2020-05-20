

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
            <?php if($this->session->flashdata('success_acc')){?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                BAB ini telah diacc.
              </div>
            <?php }elseif($this->session->flashdata('failed_acc')){?>
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                Gagal melakukan perubahan.
              </div>
            <?php }?>
            <div class="row">
               <?php if($chatisEnd["status"] !="sudah"){?>
              <a href="<?php echo base_url('bimbingan/acc/').$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6);?>">
                <button type="button" class="btn btn-md btn-outline-success">ACC</button>
              </a>
            <?php }else{?>
              <a href="<?php echo base_url('bimbingan/batal_acc/').$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6);?>">
                <button type="button" class="btn btn-md btn-success">Batal ACC</button>
              </a>
            <?php }?>
            </div>
            <br>
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="tab-riwayat-bimbingan" data-toggle="pill" href="#riwayat-bimbingan" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Riwayat Bimbingan</a>
              </li>
              <?php if($chatisEnd["status"] !="sudah"){?>
              <li class="nav-item">
                <a class="nav-link" id="tab-tambah-percakapan" data-toggle="pill" href="#tambah-percakapan" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Tambah Percakapan</a>
              </li>
              <?php }?>
              <li class="nav-item">
                <a class="nav-link" id="tab-riwayat-bimbingan-other" data-toggle="pill" href="#riwayat-bimbingan-other" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Riwayat Bimbingan Pembimbing <?php if($this->uri->segment(3) == "1"){ echo "2";}else{echo "1";}?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="tab-detail" data-toggle="pill" href="#detail" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Detail</a>
              </li>
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
              <?php if($chatisEnd["status"] !="sudah"){?>
                <div class="tab-pane fade" id="tambah-percakapan" role="tabpanel" aria-labelledby="tab-tambah-percakapan">
                   <?php echo form_open_multipart();?>
                   <div class="form-group">
                      <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi');?></label>
                      <textarea id="deskripsi" name="deskripsi" class="form-control form-control-md" rows="4" placeholder="Silahkan masukan deskripsi" required=""></textarea>
                    </div>
                    <div class="form-group">
                      <label for="file">Berkas (PDF)</label>
                      <input type="file" class="form-control form-control-md" id="file" name="file" accept="application/pdf">
                    </div>
                      
                      <label>Sebelum Dikirim, Silahkan Periksa Dulu. Karena anda tidak bisa menghapusnya</label>
                    <div class="form-group">
                      <input type="submit" value="Kirim" class="btn btn-success float-left">
                    </div>
                   <?php echo form_close();?> 
                </div>
              <?php }?>
              <div class="tab-pane fade" id="detail" role="tabpanel" aria-labelledby="tab-detail">
                <br>
                <table class="table table-sm">
                  <tr>
                    <th width="15,px">NIM</th>
                    <td>: <?php echo $detail["nim_mahasiswa"];?></td>
                  </tr>
                  <tr>
                    <th>NAMA</th>
                    <td>: <?php echo $detail["nama_mahasiswa"];?></td>
                  </tr>
                  <tr>
                    <th>PRODI</th>
                    <td>:
                      <?php
                        if($detail["prodi"] == "adpend"){
                          echo "Administrasi Pendidikan";
                        }elseif($detail["prodi"] == "manajemen"){
                          echo "Manajemen";
                        }else{
                          echo "Hukum";
                        }
                        ?>
                      </td>
                  </tr>
                  <tr>
                    <th>JUDUL</th>
                    <td>: <?php echo $detail["judul"];?></td>
                  </tr>
                  <tr>
                    <th>LATAR BELAKANG</th>
                    <td>: <?php echo $detail["latarbelakang"];?></td>
                  </tr>
                  <tr>
                    <th>TUJUAN</th>
                    <td>: <?php echo $detail["tujuan"];?></td>
                  </tr>
                  <tr>
                    <th>FILE PENDUKUNG</th>
                    <td>: <a href="<?php echo base_url('uploads/proposal/').$detail["proposal"];?>" target="_blank">Klik Untuk Membuka</a></td>
                  </tr>
                </table>
              </div>
              <div class="tab-pane fade" id="riwayat-bimbingan-other" role="tabpanel" aria-labelledby="tab-riwayat-bimbingan-other">
                <?php
                  $getBab = $model->getBabBimbinganOther($this->uri->segment(4),$this->uri->segment(3));
                  
                  $IDBimbinganOther = $model->getIDBimbinganOther($getBab["bab"],$this->uri->segment(3));
                  
                  if(!$IDBimbinganOther){?>

                  <?php }else{
                    // $classBimbingan = $this->load->Controller("Bimbingan");
                    $DetailsOther = $model->getBimbinganDetail($IDBimbinganOther["id"]);
                    ?>
                    <br>
                 <div class="row">
                  <div class="col-md-12">
                    <!-- The time line -->
                      <div class="timeline">
                        <?php foreach($DetailsOther as $DetailOther):?>
                          <?php
                          $users = $model->findUsersInConvers($DetailOther["level"],$DetailOther["id_pengguna"]);

                          ?>
                            <!-- timeline item -->
                            <div>
                              <?php if($DetailOther["level"] == 2){?>
                                <i class="fas fa-user bg-secondary"></i>
                              <?php } elseif($DetailOther["level"] == 1){?>
                                <i class="fas fa-user bg-primary"></i>
                              <?php }?>
                              <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> <?php echo $DetailOther["tanggal"];?></span>
                                <h3 class="timeline-header"><a href="#"><?php echo $users["nama"];?></a></h3>

                                <div class="timeline-body">
                                  <?php echo $DetailOther["deskripsi"];?>
                                  <?php if($DetailOther["file"] != NULL){?>
                                    <div class="card-footer bg-white">
                                      <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                        <li>
                                          <span class="mailbox-attachment-icon"><i class="far fa-file-pdf"></i></span>

                                          <div class="mailbox-attachment-info">
                                            <a href="<?php echo base_url('uploads/bimbingan/').$DetailOther["file"];?>" target="_blank" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> <?php echo $DetailOther["file"];?></a>
                                                <span class="mailbox-attachment-size clearfix mt-1">
                                                  <span></span>
                                                  <a href="<?php echo base_url('uploads/bimbingan/').$DetailOther["file"];?>" target="_blank" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
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
                  <?php }?>
                
               </div>
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
