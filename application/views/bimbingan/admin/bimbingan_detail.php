

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
            
            <br>
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="tab-riwayat-bimbingan" data-toggle="pill" href="#riwayat-bimbingan" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Riwayat Bimbingan</a>
              </li>
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
