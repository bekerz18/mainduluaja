

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
            <a href="<?php echo base_url('bimbingan/riwayat/cetak');?>">
              <button type="button" class="btn btn-info">
                <i class="fas fa-print"></i> Cetak
              </button>
            </a>
            
            <table class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
<!--                   <th width="10px">NO</th> -->
                  <th>KETERANGAN</th>
                  <th>Hari, Tanggal</th>
                </tr>
              </thead>
                <tbody>
                  <?php if($pengajuan != 'nothing'){?>
                    <tr>
                      <!-- <td>1</td> -->
                      <td>Pengajuan</td>
                      <td class="text-center"><?php echo date("l, d F Y",strtotime($pengajuan['tglpengajuan']));?></td>
                    </tr>
                    <tr>
                      <!-- <td>2</td> -->
                      <td>ACC Judul</td>
                      <td class="text-center"><?php echo date("l, d F Y",strtotime($pengajuan['tglditerima']));?></td>
                    </tr>
                  <?php }?>
                  <?php if($pengajuan != 'nothing' && $proposal != 'nothing'){?>
                    <tr>
                      <!-- <td>3</td> -->
                      <td>Upload Proposal</td>
                      <td class="text-center"><?php echo date("l, d F Y",strtotime($proposal['last_update']));?></td>
                    </tr>
                    <?php if($proposal['acc_seminar'] != NULL):?>
                      <tr>
                        <!-- <td>4</td> -->
                        <td>ACC Seminar Proposal</td>
                        <td class="text-center"><?php echo date("l, d F Y",strtotime($proposal['acc_seminar']));?></td>
                      </tr>
                    <?php endif;?>
                    <?php if($proposal['tgl_seminar'] != NULL):?>
                      <tr>
                        <!-- <td>4</td> -->
                        <td>Seminar Proposal</td>
                        <td class="text-center"><?php echo date("l, d F Y",strtotime($proposal['tgl_seminar']));?></td>
                      </tr>
                    <?php endif;?>
                    <?php if($kompre != 'nothing'):?>
                      <tr>
                        <!-- <td>5</td> -->
                        <td>Daftar Sidang Komprehensif</td>
                        <td class="text-center"><?php echo date("l, d F Y",strtotime($kompre['tgl_daftar']));?></td>
                      </tr>
                      <?php if($kompre['tgl_terima'] != NULL):?>
                        <tr>
                          <!-- <td>6</td> -->
                          <td>ACC Sidang Komprehensif</td>
                          <td class="text-center"><?php echo date("l, d F Y",strtotime($kompre['tgl_terima']));?></td>
                        </tr>
                        <?php if($kompre['tgl_sidang'] != NULL):?>
                          <tr>
                            <!-- <td>7</td> -->
                            <td>Sidang Komprehensif</td>
                            <td class="text-center"><?php echo date("l, d F Y",strtotime($kompre['tgl_sidang']));?></td>
                          </tr>
                        <?php endif;?>
                      <?php endif;?>
                    <?php endif;?>
                    <?php if($bimDets != 'nothing'):?>
                      <?php foreach($bimDets as $bimDet):?>
                        <tr>
                          <td><?php echo 'Bimbingan BAB '.$bimDet['bab'].' Kepada Pembimbing '.$bimDet['pembimbing'];?></td>
                          <td class="text-center"><?php echo date("l, d F Y",strtotime($bimDet['tanggal']));?></td>
                        </tr>
                        <?php
                          $bimAcc = $model->getBimAcc($bimDet['id_bimbingan']);
                          if($bimAcc){
                        ?>
                          <tr>
                            <td><?php echo 'ACC BAB '.$bimAcc['bab'].' Oleh Pembimbing '.$bimAcc['pembimbing'];?></td>
                            <td class="text-center"><?php echo date("l, d F Y",strtotime($bimAcc['tgl_acc']));?></td>
                          </tr>
                        <?php }?>
                      <?php endforeach;?>
                      <?php if($thesis != 'nothing'):?>
                        <tr>
                          <td>Daftar Sidang Thesis</td>
                          <td class="text-center"><?php echo date("l, d F Y",strtotime($thesis['tgl_daftar']));?></td>
                        </tr>
                        <?php if($thesis['tgl_terima'] != NULL):?>
                          <tr>
                            <td>ACC Thesis</td>
                            <td class="text-center"><?php echo date("l, d F Y",strtotime($thesis['tgl_terima']));?></td>
                          </tr>
                        <?php endif;?>
                        <?php if($thesis['tgl_sidang'] != NULL):?>
                          <tr>
                            <td>Sidang Thesis</td>
                            <td class="text-center"><?php echo date("l, d F Y",strtotime($thesis['tgl_sidang']));?></td>
                          </tr>
                        <?php endif;?>
                      <?php endif;?>
                    <?php endif;?>
                  <?php }?>
                </tbody>
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

<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<script>
  $(function () {
   

    $('.table').DataTable({ "paging": true, "lengthChange": true, "searching": true, "ordering": true, "info": true, "autoWidth": true, "responsive": true, });
    
  });
</script>
</body>
</html>
