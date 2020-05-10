
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
                <h3 class="card-title">Detail Pengajuan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <a href="<?php echo base_url('pengajuan/detail/').$this->uri->segment(3).'/cetak';?>" target="_blank">
                      <button type="button" class="btn btn-info">
                        <i class="fas fa-print"></i> Cetak
                      </button>
                    </a>
                  </div>
                  <br>
                <?php if($pengajuan['status'] == 'terima' && $status_proposal == 'sudah'):?>
                  
                  <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="custom-content-above-home-tab" data-toggle="pill" href="#data-pengajuan" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Data Pengajuan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#data-proposal" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Data Proposal</a>
                    </li>
                    <?php if($pengajuans['pembimbing1'] != NULL && $pengajuans['pembimbing2'] != NULL){?>
                      <li class="nav-item">
                      <a class="nav-link" id="custom-content-above-pembimbing-tab" data-toggle="pill" href="#data-pembimbing" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Data Pembimbing</a>
                    </li>
                    <?php }?>
                  </ul>
                  <div class="tab-content" id="custom-content-above-tabContent">
                    <div class="tab-pane fade active show" id="data-pengajuan" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                      <div class="row">
                        <br>
                       <dl class="row">
                        <dt class="col-sm-2">NIM</dt>
                          <dd class="col-sm-10">: <?php echo $pengajuan["nim"];?></dd>
                          
                        <dt class="col-sm-2">NAMA</dt>
                          <dd class="col-sm-10">: <?php echo $pengajuan["nama"];?></dd>
                          
                          
                        <dt class="col-sm-2">PENGAJUAN</dt>
                          <dd class="col-sm-10">: <?php echo date("l, d F Y H:i:s", strtotime($pengajuan["tglpengajuan"]));?></dd>
                          
                          
                        <dt class="col-sm-2">STATUS</dt>
                          <dd class="col-sm-10">: <?php
                              if($pengajuan["status"] == "belum"){
                                echo "Sedang diproses";
                              }elseif($pengajuan["status"] == "tolak"){
                                echo '<strong class="text-danger">Ditolak</strong> Pada '.date("l, d F Y H:i:s", strtotime($pengajuan["tglditerima"]));
                              }elseif($pengajuan["status"] == "terima"){
                                echo '<strong class="text-success">Diterima</strong> Pada ' .date("l, d F Y H:i:s", strtotime($pengajuan["tglditerima"]));
                              }
                            ?></dd>
                          
                          
                        <dt class="col-sm-2">JUDUL</dt>
                          <dd class="col-sm-10">: <?php echo $pengajuan["judul"];?></dd>
                             
                          
                        <dt class="col-sm-2">LATAR BELAKANG</dt>
                          <dd class="col-sm-10">: <?php echo $pengajuan["latarbelakang"];?></dd>
                           
                          
                        <dt class="col-sm-2">TUJUAN</dt>
                          <dd class="col-sm-10">: <?php echo $pengajuan["tujuan"];?></dd>

                        </dl>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="data-proposal" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                        <br>
                       <dl class="row">
                        <dt class="col-sm-2">PROPOSAL</dt>
                        <dd class="col-sm-10">: <a href="<?php echo base_url('uploads/proposal/').$proposal['id'].'.pdf';?>" target="_blank">Klik Untuk Melihat</a></dd>
                         <dt class="col-sm-2"><?php if($proposal['revisi'] == 'ya'){ echo 'DITOLAK PADA';}else{ echo 'DIKIRIM';}?></dt>
                             <dd class="col-sm-10"> : <?php echo date("l, d F Y H:i:s", strtotime($proposal["last_update"]));?></dd>
                        <dt class="col-sm-2">STATUS</dt>
                        <?php if($proposal['revisi'] == NULL){?>
                          <dd class="col-sm-10">: <strong class="text-warning">Sedang diproses</strong></dd>
                        <?php }elseif($proposal['revisi'] == 'tidak'){?>
                          <dd class="col-sm-10">: <strong class="text-success">Proposal Diterima</strong> Pada <?php echo date('l , d F Y H:i:s', strtotime($proposal['acc_seminar']));?></dd>
                          <dt class="col-sm-2"><strong>TANGGAL SEMINAR</strong></dt>
                          <dd class="col-sm-10">: <?php echo date('l , d F Y', strtotime($proposal['tgl_seminar']));?></dd>
                          <!-- Penguji 1 -->
                          <dt class="col-sm-2"><strong>PENGUJI 1</strong></dt>
                          <dd class="col-sm-10">: <?php echo $penguji1['nama'];?></dd>
                          <!-- Penguji 2 -->
                          <dt class="col-sm-2"><strong>PENGUJI 2</strong></dt>
                          <dd class="col-sm-10">: <?php echo $penguji2['nama'];?></dd>
                          <!-- Penguji 3 -->
                          <dt class="col-sm-2"><strong>PENGUJI 3</strong></dt>
                          <dd class="col-sm-10">: <?php echo $penguji3['nama'];?></dd>
                          <!-- Nilai -->
                          <dt class="col-sm-2"><strong>NILAI</strong></dt>
                          <dd class="col-sm-10">: <?php if($proposal["nilai_1"] == NULL || $proposal["nilai_2"] == NULL || $proposal["nilai_3"] == NULL) { echo 'Belum ada';}else{echo number_format($nilai_total['nilai'],2).'</dd>';if(number_format($nilai_total['nilai'],2) < 75){?>
                            <dt class="col-sm-2">UPLOAD REVISI</dt>
                             <dd class="col-sm-10">
                            <form action="<?php echo base_url('pengajuan/detail/').$this->uri->segment(3).'/'.$proposal['id'];?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                               <div class="custom-file">
                                <input type="file" class="custom-file-input" id="proposal" name="proposal"  accept="application/pdf">
                                <label class="custom-file-label" for="proposal">Cari Proposal</label>
                              </div>
                              <button type="submit" class="btn btn-primary">Upload Proposal</button>
                              <?php echo form_error('proposal');?>
                            <?php echo form_close();?>
                          </dd>
                          <?php }}?>
                          
                        <?php }elseif($proposal['revisi'] == 'ya'){ ?>
                          <dd class="col-sm-10">: <strong class="text-danger">Proposal Ditolak</strong></dd>
                          <dt class="col-sm-2">KETERANGAN</dt>
                           <dd class="col-sm-10">: <?php echo $proposal['ket_revisi'];?></dd>
                           <dt class="col-sm-2">UPLOAD REVISI</dt>
                             <dd class="col-sm-10">
                            <form action="<?php echo base_url('pengajuan/detail/').$this->uri->segment(3).'/'.$proposal['id'];?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                               <div class="custom-file">
                                <input type="file" class="custom-file-input" id="proposal" name="proposal"  accept="application/pdf">
                                <label class="custom-file-label" for="proposal">Cari Proposal</label>
                              </div>
                              <button type="submit" class="btn btn-primary">Upload Proposal</button>
                              <?php echo form_error('proposal');?>
                            <?php echo form_close();?>
                          </dd>
                        <?php }?>
                       </dl>
                    </div>
                    <?php if($pengajuans['pembimbing1'] != NULL && $pengajuans['pembimbing2'] != NULL){?>
                      <div class="tab-pane fade" id="data-pembimbing" role="tabpanel" aria-labelledby="custom-content-above-pembimbing-tab">
                        <br>
                        <dl class="row">
                          <dt class="col-sm-2"><strong>PEMBIMBING 1</strong></dt>
                          <dd class="col-sm-10">: <?php echo $cariDosbing1['nama'];?></dd>

                          <dt class="col-sm-2"><strong>PEMBIMBING 2</strong></dt>
                          <dd class="col-sm-10">: <?php echo $cariDosbing2['nama'];?></dd>
                        </dl>
                      </div>
                    <?php }?>
                  </div>
                <?php endif;?>
                <?php if($pengajuan['status'] == 'belum' || $pengajuan['status'] == 'tolak' || $pengajuan['status'] == 'terima' && $status_proposal == 'belum'):?>
                  <?php if($this->session->flashdata('proposal_uploaded')) {?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Berhasil mengirim proposal!
                    </div>
                  <?php }elseif($this->session->flashdata('proposal_failed')){?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Gagal mengirim proposal!
                    </div>
                  <?php }?>
                  <dl class="row">
                    <dt class="col-sm-2">NIM</dt>
                      <dd class="col-sm-10">: <?php echo $pengajuan["nim"];?></dd>
                      
                    <dt class="col-sm-2">NAMA</dt>
                      <dd class="col-sm-10">: <?php echo $pengajuan["nama"];?></dd>
                      
                      
                    <dt class="col-sm-2">PENGAJUAN</dt>
                      <dd class="col-sm-10">: <?php echo date("l, d F Y H:i:s", strtotime($pengajuan["tglpengajuan"]));?></dd>
                      
                      
                    <dt class="col-sm-2">STATUS</dt>
                      <dd class="col-sm-10">: <?php
                          if($pengajuan["status"] == "belum"){
                                echo '<strong class="text-warning">Sedang diproses</strong>';
                              }elseif($pengajuan["status"] == "tolak"){
                                echo '<strong class="text-danger">Ditolak</strong> Pada '.date("l, d F Y H:i:s", strtotime($pengajuan["tglditerima"]));
                              }elseif($pengajuan["status"] == "terima"){
                                echo '<strong class="text-success">Diterima</strong> Pada ' .date("l, d F Y H:i:s", strtotime($pengajuan["tglditerima"]));
                              }
                        ?></dd>
                      
                      <?php if($pengajuan["status"] == "tolak"):?>
                         
                      <dt class="col-sm-2">ALASAN</dt>
                        <dd class="col-sm-10">: <?php echo $pengajuan["alasan"];?></dd>
                         
                      <?php endif;?>
                      
                    <dt class="col-sm-2">JUDUL</dt>
                      <dd class="col-sm-10">: <?php echo $pengajuan["judul"];?></dd>
                         
                      
                    <dt class="col-sm-2">LATAR BELAKANG</dt>
                      <dd class="col-sm-10">: <?php echo $pengajuan["latarbelakang"];?></dd>
                       
                      
                    <dt class="col-sm-2">TUJUAN</dt>
                      <dd class="col-sm-10">: <?php echo $pengajuan["tujuan"];?></dd>

                      <?php if($pengajuan["status"] == "terima" && $status_proposal == 'belum'):?>
                         
                      <dt class="col-sm-2">KIRIM PROPOSAL</dt>
                        : <dd class="col-sm-3">
                          <?php echo form_open_multipart ();?>
                             <div class="custom-file">
                              <input type="file" class="custom-file-input" id="proposal" name="proposal"  accept="application/pdf">
                              <label class="custom-file-label" for="proposal">Cari Proposal</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Proposal</button>
                            <?php echo form_error('proposal');?>
                          <?php echo form_close();?>
                        </dd>
                         
                      <?php endif;?>
                    </dl>
                <?php endif;?>                    
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
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>

</body>
</html>