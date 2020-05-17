

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
              <li class="breadcrumb-item active">Daftar Bimbingan</li>
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
            <h3 class="card-title">Daftar Bimbingan 2</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <button type="button" id="btn-cta-cetak" class="btn btn-info">
              <i class="fas fa-print"></i> Cetak
            </button>
            <table id="table-bimbingan" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th rowspan="2" class="align-middle">NO</th>
                  <th rowspan="2" class="align-middle">NAMA</th>
                  <th rowspan="2" class="align-middle">PRODI</th>
                  <th rowspan="2" class="align-middle">JUDUL</th>
                  <th rowspan="2" class="align-middle">BIMBINGAN BAB</th>
                  <th colspan="2" class="align-middle">STATUS</th>
                  <th rowspan="2" class="align-middle">OPSI</th>
                  
                  
                </tr>
                <tr class="text-center">
                  <th>PEMBIMBING1</th>
                  <th>PEMBIMBING2</th>
                </tr>
              </thead>
              <tbody id="pengajuan">
                <?php $no = 1; foreach ($bimbingans as $bimbingan):  ?>
                <?php
                 $getBimbingan1 = $model->get_info_bimbingan1($bimbingan["id_pengajuan"],$bimbingan["bab"]);
                 $status='';
                 if(!$getBimbingan1){
                  $status = 'Belum melakukan bimbingan';
                 }else if($getBimbingan1["status"] =="belum"){
                  $status = 'Sedang dalam bimbingan';
                }
                  else if($getBimbingan1["status"] == "sudah"){
                    $status = '<span class="text-success">Sudah diacc</span><br>Pada '.date("l, d F Y H:i:s", strtotime($getBimbingan1["tgl_acc"]));
                  }
                 
                ?>
                  <tr>
                    <td class="text-center align-middle"><?php echo $no++;?></td>
                    <td class="text-center align-middle"><?php echo $bimbingan["nama_mahasiswa"].'<br>'.$bimbingan['nim_mahasiswa'];?></td>
                    <td class="text-center align-middle">
                      <?php if($bimbingan["prodi"] == "adpend"){echo "Administrasi Pendidikan";
                    }elseif($bimbingan["prodi"] == "manajemen"){
                      echo "Manajemen";
                    }elseif($bimbingan["prodi"] == "hukum"){echo "Hukum";}?></td>

                    <td><?php echo $bimbingan["judul"];?></td>
                    <td class="text-center align-middle"><?php echo $bimbingan["bab"];?></td>
                    <td class="text-center align-middle">
                        <?php echo $status;?>
                      </td>
                    
                    <td class="text-center align-middle">
                      <?php if($bimbingan["status"] == "sudah"){
                        echo '<span class="text-success">Sudah diacc</span><br>Pada '.date("l, d F Y H:i:s", strtotime($bimbingan["tgl_acc"]));
                      }elseif($bimbingan["status"] == "belum"){
                        echo 'Sedang dalam bimbingan';
                      };?>
                        
                      </td>

                    <td class="text-center align-middle">
                      <a href="<?php echo base_url('bimbingan/bimbingan/2/').$bimbingan["id_bimbingan"].'/'.$bimbingan["bab"].'/'.$bimbingan["id_pengajuan"];?>"class="detail-bimbingan text-info" data-id="<?php echo $bimbingan["id_bimbingan"];?>">Detail</a>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
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
        <!-- Modal Cetak -->
        <div class="modal fade" id="modal-cetak">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <?php echo form_open('bimbingan/cetak_dosen/2');?>
              <div class="modal-header">
                <h4 class="modal-title">Cetak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                    <label>Tanggal:</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control float-right" id="reservation" name="tanggal_range" required>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
              </div>

              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="btn-cetak" type="submit" class="btn btn-primary">Cetak</button>
              </div>
            </div>
            <?php echo form_close();?>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      <!-- End ModalCetak -->
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
<!-- InputMask -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js');?>"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<script>
  jQuery(function(){
    jQuery('#table-bimbingan').DataTable({ "paging": true, "lengthChange": true, "searching": true, "ordering": true, "info": true, "autoWidth": true, "responsive": true, });
    $('#reservation').daterangepicker();
    $("#btn-cta-cetak").click(function(){
      $("#modal-cetak").modal();
    });
  });
</script>
</body>
</html>
