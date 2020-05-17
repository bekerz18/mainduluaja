
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
                <?php if($this->session->flashdata('berhasil_kompre')) {?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                  Berhasil mendaftar sidang kompre!
                </div>
              <?php } elseif($this->session->flashdata('gagal_kompre')) {?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                  Gagal mendaftar sidang kompre!
                </div>
              <?php } elseif($this->session->flashdata('having')) {?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                  Telah terdaftar!
                </div>
              <?php }elseif($this->session->flashdata('id_not_found')) {?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                  Belum bisa mendaftarkan!
                </div>
              <?php }?>
              <?php if($this->session->flashdata('berhasil_kompre_thesis')) {?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                  Berhasil mendaftar sidang thesis!
                </div>
              <?php } elseif($this->session->flashdata('gagal_kompre_thesis')) {?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                  Gagal mendaftar sidang thesis!
                </div>
              <?php } elseif($this->session->flashdata('having_thesis')) {?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                  Telah terdaftar!
                </div>
              <?php }elseif($this->session->flashdata('id_not_found_thesis')) {?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                  Belum bisa mendaftarkan!
                </div>
              <?php }?>
              
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
                    <?php if($proposal['revisi'] == 'tidak'){?>
                      
                    
                      <li class="nav-item">
                      <a class="nav-link" id="custom-content-above-pembimbing-tab" data-toggle="pill" href="#data-pembimbing" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Data Pembimbing</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" id="tab-sidang-kompre" data-toggle="pill" href="#daftar-sidang-kompre" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Data Komprehensif</a>
                    </li>
             
                   
                      <li class="nav-item">
                      <a class="nav-link" id="custom-content-above-tesis-tab" data-toggle="pill" href="#data-tesis" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Data Tesis</a>
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
                          <dd class="col-sm-10">: <?php if($proposal["nilai_1"] == NULL || $proposal["nilai_2"] == NULL || $proposal["nilai_3"] == NULL) { echo 'Belum ada';}else{
                            if($proposal['nilai_tampil'] != 'ya'){
                              echo 'Sedang diproses';
                            }else{
                            echo number_format($nilai_total['nilai'],2).'</dd>';if(number_format($nilai_total['nilai'],2) < 75){?>
                            
                            <dt class="col-sm-2">UPLOAD REVISI</dt>
                             <dd class="col-sm-10">
                            <form action="<?php echo base_url('pengajuan/detail/').$this->uri->segment(3).'/'.$proposal['id'];?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                             
                                <input type="file" class="form-control" id="proposal" name="proposal"  accept="application/pdf">
                                
                             
                              <button type="submit" class="btn btn-primary">Upload Proposal</button>
                              <?php echo form_error('proposal');?>
                            <?php echo form_close();?>
                          </dd>
                          <?php }}}?>
                          <?php
                          
                          if($proposal["nilai_tampil"] == 'ya'){?>
                                      <dt class="col-sm-2">KETERANGAN</dt>
                                      <dd class="col-sm-10"> : <?php
                                      if($proposal["nilai_1"] == NULL || $proposal["nilai_2"] == NULL || $proposal["nilai_3"] == NULL) {
                                        echo 'Belum ada';
                                      }else{
                                        if(number_format($nilai_total['nilai'],2) >= 86 && number_format($nilai_total['nilai'],2) <= 100){
                                            echo "A";
                                          }else if(number_format($nilai_total['nilai'],2) >= 76 && number_format($nilai_total['nilai'],2) <= 85){
                                            echo "B";
                                          }else if(number_format($nilai_total['nilai'],2) >= 66 && number_format($nilai_total['nilai'],2) <= 75){
                                            echo "C";
                                          }else if(number_format($nilai_total['nilai'],2) >= 56 && number_format($nilai_total['nilai'],2) <= 65){
                                            echo "D";
                                          }else if(number_format($nilai_total['nilai'],2) <= 55){
                                            echo "E";
                                          }

                                      } ?>
                                      </dd>
                                      <?php }?>
                          
                        <?php }elseif($proposal['revisi'] == 'ya'){ ?>
                          <dd class="col-sm-10">: <strong class="text-danger">Proposal Ditolak</strong></dd>
                          <dt class="col-sm-2">KETERANGAN</dt>
                           <dd class="col-sm-10">: <?php echo $proposal['ket_revisi'];?></dd>
                           <dt class="col-sm-2">UPLOAD REVISI</dt>
                             <dd class="col-sm-10">
                            <form action="<?php echo base_url('pengajuan/detail/').$this->uri->segment(3).'/'.$proposal['id'];?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                               
                                <input type="file" class="form-control" id="proposal" name="proposal"  accept="application/pdf">
                               
                             
                              <button type="submit" class="btn btn-primary">Upload Proposal</button>
                              <?php echo form_error('proposal');?>
                            <?php echo form_close();?>
                          </dd>
                        <?php }?>
                       </dl>
                    </div>
                    <?php if($proposal['revisi'] == 'tidak'){?>
                      <div class="tab-pane fade" id="daftar-sidang-kompre" role="tabpanel" aria-labelledby="tab-sidang-kompre">
                        <br>
                          <?php if($cariDosbing1['nama'] != null){?>
                            <?php if($pengajuan['sidang_kompre1'] == 'ya' && $pengajuan['sidang_kompre2'] == 'ya'){?>
                            <?php if($checkKompre == "belum"){?>
                              <div class="text-center">
                                <a href="<?php echo base_url('komprehensif/register/').$this->uri->segment(3);?>">
                                  <button type="button" class="btn btn-lg btn-primary">Daftar Sidang Kompre</button>
                                </a>
                              </div>
                            <?php }elseif($checkKompre == "tidak"){?>
                              <div class="text-center">
                                <a href="#" disabled>
                                  <button type="button" class="btn btn-lg btn-primary" disabled>Pendaftaran Dalam Proses</button>
                                </a>
                              </div>
                            <?php }elseif($checkKompre == "ya"){?>
                              <dl class="row">
                                <dt class="col-sm-2">TANGGAL DAFTAR</dt>
                                <dd class="col-sm-10">: <?php echo date("l, d F Y H:i:s",strtotime($kompreData["tgl_daftar"]));?></dd>
                                  
                                <dt class="col-sm-2">TANGGAL DITERIMA</dt>
                                <dd class="col-sm-10">: <?php echo date("l, d F Y H:i:s",strtotime($kompreData["tgl_terima"]));?></dd>

                                <dt class="col-sm-2">TANGGAL SIDANG</dt>
                                <dd class="col-sm-10">: <?php echo date("l, d F Y",strtotime($kompreData["tgl_sidang"]));?></dd>

                                <dt class="col-sm-2">PENGUJI 1</dt>
                                <dd class="col-sm-10">: <?php echo $kompreData["penguji1"];?></dd>

                                <dt class="col-sm-2">PENGUJI 2</dt>
                                <dd class="col-sm-10">: <?php echo $kompreData["penguji2"];?></dd>

                                <dt class="col-sm-2">PENGUJI 3</dt>
                                <dd class="col-sm-10">: <?php echo $kompreData["penguji3"];?></dd>

                                <dt class="col-sm-2">NILAI </dt>
                                <dd class="col-sm-10">: 
                                  <?php
                                    $nilai = $model->nilaiKompre($kompreData["id_pengajuan"]);
                                    if($nilai["nilai"] == NULL){
                                      echo 'Belum Ada';
                                    }else{
                                      if($kompreData["nilai_tampil"] != "ya"){
                                        echo 'Sedang diproses';
                                      }else{
                                      echo number_format($nilai['nilai'],2);
                                       if(number_format($nilai['nilai'],2) < 75){
                                      echo ' Revisi';?>
                                    </dd>

                                      
                                    
                                
                                      <dt class="col-sm-4">
                                      <div class="text-center">
                                      <a href="<?php echo base_url('komprehensif/register/').$this->uri->segment(3).'/re';?>">
                                        <button type="button" class="btn btn-lg btn-primary">Daftar Sidang Kompre</button>
                                      </a>
                                    </div>
                                  </dt>
                                    <?php } } }?>
                                      
                                    </dd>
                                    <?php
                                    $nilai = $model->nilaiKompre($kompreData["id_pengajuan"]);
                                    if($kompreData['nilai_tampil'] == 'ya'){?>
                                      <dt class="col-sm-2">KETERANGAN</dt>
                                      <dd class="col-sm-10"> : <?php
                                      if($nilai["nilai"] == NULL){
                                        echo 'Belum Ada';
                                      }else{
                                          if(number_format($nilai['nilai'],2) >= 86 && number_format($nilai['nilai'],2) <= 100){
                                            echo "A";
                                          }else if(number_format($nilai['nilai'],2) >= 76 && number_format($nilai['nilai'],2) < 86){
                                            echo "B";
                                          }else if(number_format($nilai['nilai'],2) >= 66 && number_format($nilai['nilai'],2) < 76){
                                            echo "C";
                                          }else if(number_format($nilai['nilai'],2) >= 56 && number_format($nilai['nilai'],2) < 66){
                                            echo "D";
                                          }else if(number_format($nilai['nilai'],2) <= 55){
                                            echo "E";
                                          }
                                        }
                                      }
                                    ?>
                                  </dd>
                                    

                              </dl>
                            <?php }?>
                          <?php } else{?>
                            <div class="text-center">
                                
                                  <button type="button" class="btn btn-lg btn-primary" disabled>Daftar Sidang Kompre</button>
                                
                              </div>
                        <?php }}?>


                      </div>
                      
                      <div class="tab-pane fade" id="data-pembimbing" role="tabpanel" aria-labelledby="custom-content-above-pembimbing-tab">
                        <br>
                        <dl class="row">
                          <dt class="col-sm-2"><strong>PEMBIMBING 1</strong></dt>
                          <dd class="col-sm-10">: <?php echo $cariDosbing1['nama'];?></dd>

                          <dt class="col-sm-2"><strong>PEMBIMBING 2</strong></dt>
                          <dd class="col-sm-10">: <?php echo $cariDosbing2['nama'];?></dd>
                        </dl>
                      </div>
                   
                    
                      <div class="tab-pane fade" id="data-tesis" role="tabpanel" aria-labelledby="custom-content-above-tesis-tab-tab">
                        <?php if(!isset($status_kompre)){?>
                        <?php if($tesis_is == 'ada'){?>
                        <br>
                        <?php if($checkThesis == "belum"){?>
                          <div class="text-center">
                                <?php echo form_open_multipart ('thesis/register/'.$this->uri->segment(3));?>
                                <div class="form-group">
                                   <label for="thesis">Cari Thesis</label>
                                    <input type="file" class="form-control" id="thesis" name="thesis"  id="thesis" accept="application/pdf" required="">
                                    
                                  
                                </div>
                                <div class="form-group">
                                   <button type="submi" class="btn btn-lg btn-primary">Daftar Sidang Thesis</button>
                                 </div>
                                  <?php echo form_error('thesis');?>
                                <?php echo form_close();?>
                            
                          </div>
                        <?php }elseif($checkThesis == "tidak"){?>
                          <div class="text-center">
                            <a href="#" disabled>
                              <button type="button" class="btn btn-lg btn-primary" disabled>Pendaftaran Dalam Proses</button>
                            </a>
                          </div>
                        <?php }elseif($checkThesis == "ya"){?>
                          <dl class="row">
                            <dt class="col-sm-2">TANGGAL DAFTAR</dt>
                            <dd class="col-sm-10">: <?php echo date("l, d F Y H:i:s",strtotime($thesis["tgl_daftar"]));?></dd>
                              
                            <dt class="col-sm-2">TANGGAL DITERIMA</dt>
                            <dd class="col-sm-10">: <?php echo date("l, d F Y H:i:s",strtotime($thesis["tgl_terima"]));?></dd>

                            <dt class="col-sm-2">TANGGAL SIDANG</dt>
                            <dd class="col-sm-10">: <?php echo date("l, d F Y",strtotime($thesis["tgl_sidang"]));?></dd>

                            <dt class="col-sm-2">PENGUJI 1</dt>
                            <dd class="col-sm-10">: <?php echo $thesis["penguji1"];?></dd>

                            <dt class="col-sm-2">PENGUJI 2</dt>
                            <dd class="col-sm-10">: <?php echo $thesis["penguji2"];?></dd>

                            <dt class="col-sm-2">PENGUJI 3</dt>
                            <dd class="col-sm-10">: <?php echo $thesis["penguji3"];?></dd>

                            <dt class="col-sm-2">NILAI </dt>
                            <dd class="col-sm-10">: 
                              <?php
                                $nilai = $model->nilaiThesis($thesis["id_pengajuan"]);
                                if($nilai["nilai"] == NULL){
                                  echo 'Belum Ada';
                                }else{
                            if($thesis['nilai_tampil'] != 'ya'){
                              echo 'Sedang diproses';
                            }else{
                                  echo number_format($nilai['nilai'],2);
                                    if(number_format($nilai['nilai'],2) < 75){
                                    echo ' Revisi';
                                  }
                                }
                              }
                                ?>
                                  
                                </dd>
                                <?php
                                $nilai = $model->nilaiThesis($thesis["id_pengajuan"]);

                                if($thesis['nilai_tampil'] == 'ya'){?>

                                <dt class="col-sm-2">KETERANGAN</dt>
                                <dd class="col-sm-10"> : <?php
                                if($nilai["nilai"] == NULL){
                                    echo 'Belum Ada';
                                  }
                                    else if(number_format($nilai['nilai'],2) >= 86 && number_format($nilai['nilai'],2) <= 100){
                                      echo "A";
                                    }else if(number_format($nilai['nilai'],2) >= 76 && number_format($nilai['nilai'],2) < 86){
                                      echo "B";
                                    }else if(number_format($nilai['nilai'],2) >= 66 && number_format($nilai['nilai'],2) < 76){
                                      echo "C";
                                    }else if(number_format($nilai['nilai'],2) >= 56 && number_format($nilai['nilai'],2) < 66){
                                      echo "D";
                                    }else if(number_format($nilai['nilai'],2) <= 55){
                                      echo "E";
                                    }
                                  }
                                ?>
                              </dd>
                                


                          </dl>
                        <?php }?>
                        <?php } }?>
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
                         
                      <dt class="col-sm-2">PROPOSAL</dt>
                        : <dd class="col-sm-3">
                          <?php echo form_open_multipart ();?>
                             
                              <input type="file" class="form-control" id="proposal" name="proposal"  accept="application/pdf">
                             
                            
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
