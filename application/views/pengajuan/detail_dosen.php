
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
              <li class="breadcrumb-item active">Detail Bimbingan</li>
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
                <h3 class="card-title">Detail Bimbingan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <a href="<?php echo base_url('pengajuan/cetak/bimbingan/'.$pengajuan['id_pengajuan']);?>">
                    <button type="button" class="btn btn-info">
                      <i class="fas fa-print"></i> Cetak
                    </button>
                  </a>
                </div>
                
                <br>

                <div class="row">
                  <table id="table-bimbingan" class="table table-bordered table-striped">
                      <?php
                        $pembimbing1 = $model->searchDosenBy($pengajuan['pembimbing1']);
                        $pembimbing2 = $model->searchDosenBy($pengajuan['pembimbing2']);
                      ?>
                      <tr>
                        <th>NIM</th>
                        <td>: <?php echo $pengajuan['nim'];?></td>
                      </tr>
                      <tr>
                        <th>NAMA</th>
                        <td>: <?php echo $pengajuan['nama'];?></td>
                      </tr>
                      <tr>
                        <th>PRODI</th>
                        <td>: <?php echo $pengajuan['nama_prodi'];?></td>
                      </tr>
                      <tr>
                        <th>JUDUL</th>
                        <td>: <?php echo $pengajuan['judul'];?></td>
                      </tr>
                      <tr>
                        <th>LATAR BELAKANG</th>
                        <td>: <?php echo $pengajuan['latarbelakang'];?></td>
                      </tr>
                      <tr>
                        <th>TUJUAN</th>
                        <td>: <?php echo $pengajuan['tujuan'];?></td>
                      </tr>
                      <tr>
                        <th>TANGGAL DIAJUKAN</th>
                        <td>: <?php echo date('l, d F Y H:i:s',strtotime($pengajuan['tglpengajuan']));?></td>
                      </tr>
                      <tr>
                        <th>TANGGAL DITERIMA</th>
                        <td>: <?php echo date('l, d F Y H:i:s',strtotime($pengajuan['tglditerima']));?></td>
                      </tr>
                      <tr>
                        <th>SIDANG KOMPREHENSIF</th>
                        <td>: 
                            <?php if($this->session->userdata('id') != $pengajuan['pembimbing1']){
                              if($pengajuan['sidang_kompre1'] == 'ya'){
                                echo $pembimbing1['nama'].' <button type="button" class="btn btn-sm btn-success">Sudah menerima</button>';
                              }elseif($pengajuan['sidang_kompre1'] == null){
                                echo $pembimbing1['nama'].' Belum menerima';
                              }
                              echo '|';
                            }?>  
                              <?php if($this->session->userdata('id') == $pengajuan['pembimbing1'] && $pengajuan['sidang_kompre1'] == NULL){?> 
                              
                              <a href="<?php echo base_url('pengajuan/izinKompre/').$pengajuan["id_pengajuan"];?>">
                                <button type="button" class="btn btn-sm btn-primary">Terima</button>
                              </a>

                            <?php } elseif($this->session->userdata('id') == $pengajuan['pembimbing1'] && $pengajuan['sidang_kompre1'] == 'ya'){?>
                              <a href="<?php echo base_url('pengajuan/izinKompre/').$pengajuan["id_pengajuan"].'/batal';?>">
                                <button type="button" class="btn btn-sm btn-warning">Batal Terima</button>
                              </a>
                            <?php }?>
                            <?php if($this->session->userdata('id') == $pengajuan['pembimbing2'] && $pengajuan['sidang_kompre2'] == NULL){?> 
                              
                              <a href="<?php echo base_url('pengajuan/izinKompre/').$pengajuan["id_pengajuan"];?>">
                                <button type="button" class="btn btn-sm btn-primary">Terima</button>
                              </a>

                            <?php } elseif($this->session->userdata('id') == $pengajuan['pembimbing2'] && $pengajuan['sidang_kompre2'] == 'ya'){?>
                              <a href="<?php echo base_url('pengajuan/izinKompre/').$pengajuan["id_pengajuan"].'/batal';?>">
                                <button type="button" class="btn btn-sm btn-warning">Batal Terima</button>
                              </a>
                            <?php }?>
                            |
                            <?php if($this->session->userdata('id') != $pengajuan['pembimbing2']){
                              if($pengajuan['sidang_kompre2'] == 'ya'){
                                echo $pembimbing2['nama'].' <button type="button" class="btn btn-sm btn-success">Sudah menerima</button>';
                              }elseif($pengajuan['sidang_kompre1'] == null){
                                echo $pembimbing2['nama'].' Belum menerima';
                              }
                            }?>
                          </td>
                      </tr>
                      <tr>
                        <th>SIDANG THESIS</th>
                        <td>: 
                            <?php if($this->session->userdata('id') != $pengajuan['pembimbing1']){
                              if($pengajuan['acc_thesis1'] == 'ya'){
                                echo $pembimbing1['nama'].' <button type="button" class="btn btn-sm btn-success">Sudah menerima</button>';
                              }elseif($pengajuan['acc_thesis1'] == null){
                                echo $pembimbing1['nama'].' Belum menerima';
                              }
                              echo '|';
                            }?>  
                              <?php if($this->session->userdata('id') == $pengajuan['pembimbing1'] && $pengajuan['acc_thesis1'] == NULL){?> 
                              
                              <a href="<?php echo base_url('pengajuan/izinThesis/').$pengajuan["id_pengajuan"];?>">
                                <button type="button" class="btn btn-sm btn-primary">Terima</button>
                              </a>

                            <?php } elseif($this->session->userdata('id') == $pengajuan['pembimbing1'] && $pengajuan['acc_thesis1'] == 'ya'){?>
                              <a href="<?php echo base_url('pengajuan/izinThesis/').$pengajuan["id_pengajuan"].'/batal';?>">
                                <button type="button" class="btn btn-sm btn-warning">Batal Terima</button>
                              </a>
                            <?php }?>
                            <?php if($this->session->userdata('id') == $pengajuan['pembimbing2'] && $pengajuan['acc_thesis2'] == NULL){?> 
                              
                              <a href="<?php echo base_url('pengajuan/izinThesis/').$pengajuan["id_pengajuan"];?>">
                                <button type="button" class="btn btn-sm btn-primary">Terima</button>
                              </a>

                            <?php } elseif($this->session->userdata('id') == $pengajuan['pembimbing2'] && $pengajuan['acc_thesis2'] == 'ya'){?>
                              <a href="<?php echo base_url('pengajuan/izinThesis/').$pengajuan["id_pengajuan"].'/batal';?>">
                                <button type="button" class="btn btn-sm btn-warning">Batal Terima</button>
                              </a>
                            <?php }?>
                            |
                            <?php if($this->session->userdata('id') != $pengajuan['pembimbing2']){
                              if($pengajuan['acc_thesis2'] == 'ya'){
                                echo $pembimbing2['nama'].' <button type="button" class="btn btn-sm btn-success">Sudah menerima</button>';
                              }elseif($pengajuan['acc_thesis1'] == null){
                                echo $pembimbing2['nama'].' Belum menerima';
                              }
                            }?>
                          </td>
                      </tr>
                  </table>
                </div>
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


<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>

</body>
</html>
