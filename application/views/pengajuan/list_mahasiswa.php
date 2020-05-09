
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
                
                <?php if($this->session->userdata('success_delete')) {?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Berhasil menghapus data.
                    </div>
                  <?php }elseif($this->session->userdata('failed_delete')){?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Gagal menghapus data.
                    </div>
                  <?php }?>
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
                  <a href="<?php echo base_url('pengajuan/cetak');?>" target="_blank">
                    <button type="button" class="btn btn-info">
                      <i class="fas fa-print"></i> Cetak
                    </button>
                  </a>
                <table id="data-pengajuan" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>NO</th>
                    <th>JUDUL</th>
                    <th>PENGAJUAN</th>
                    <th>STATUS</th>
                    <th>OPSI</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1; foreach ($pengajuans as $pengajuan):  ?>
                      <tr>
                        <td class="text-center"><?php echo $no++;?></td>
                        <td><?php echo $pengajuan->judul;?></td>
                        <td><?php echo date("d-m-Y H:i:s", strtotime($pengajuan->tglpengajuan));?></td>
                        <td class="text-center">
                          <?php
                            if($pengajuan->status == "belum"){
                              echo "Sedang diproses";
                            }elseif($pengajuan->status == "tolak"){
                              echo "Ditolak Pada <br>".date("d-m-Y H:i:s", strtotime($pengajuan->tglditerima));
                            }elseif($pengajuan->status == "terima"){
                              echo "Diterima Pada <br>".date("d-m-Y H:i:s", strtotime($pengajuan->tglditerima));
                            }
                          ?> 
                        </td>
                        <td class="text-center">
                          <a class="font-md text-info" href="<?php echo base_url('pengajuan/detail/').$pengajuan->id_pengajuan;?>">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>

              </div>
              <?php if($this->session->userdata('level') == 0) :?>
                <div class="modal fade" id="modal-ubah">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Ubah Pengajuan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden"id="idubah" value="">
                        <div class="form-group">
                          <label for="nim">NIM :</label>
                          <input type="text" class="form-control form-control-lg" id="nim" readonly>
                        </div>
                        <div class="form-group">
                          <label for="username-ubah">NAMA :</label>
                          <input type="text" class="form-control form-control-lg" id="nama" readonly>
                        </div>
                        <div class="form-group">
                          <label for="prodi">PROGRAM STUDI :</label>
                          <input type="text" id="prodi" class="form-control form-control-lg" readonly>
                        </div>
                        <div class="form-group">
                          <label for="konsentrasi">KONSENTRASI :</label>
                          <input type="text" class="form-control form-control-lg" id="konsentrasi" readonly>
                        </div>
                        <div class="form-group">
                          <label for="judul">JUDUL :</label>
                          <input type="text" class="form-control form-control-lg" id="judul"  readonly>
                        </div>
                        <div class="form-group">
                          <label for="tglpengajuan">Tanggal Pengajuan</label>
                            <input type="text" class="form-control form-control-lg" id="tglpengajuan" readonly>
                        </div>
                        <div class="form-group">
                          <label for="pembimbing1">Pembimbing 1</label>
                          <select class="form-control form-control-lg select2" data-placeholder="Silahkan pilih Pembimbing 1" id="pembimbing1"style="width: 100%;" required>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="pembimbing2">Pembimbing 2</label>
                          <select class="form-control form-control-lg select2" data-placeholder="Silahkan pilih Pembimbing 2" id="pembimbing2" name="pembimbing2" style="width: 100%;" required>
                          </select>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <button type="button" id="ubah" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
              <?php endif;?>
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
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<script>
  $(function () {

    $('#data-pengajuan').DataTable({ "paging": true, "lengthChange": false, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });
    <?php if($this->session->userdata('level') == 0) :?>
      const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      const $ubahBtn = $(".ubah-pengajuan");
      // if click ubah
      $ubahBtn.click(function(){
        var id = $(this).data('id');
        $.ajax({
          type : 'GET',
          url :'<?php echo base_url('pengajuan/get_judul/');?>'+id,
          dataType : 'json',
          success:function(data){
            $("#idubah").val(id);
            $("#nim").val(data[0].username);
            $("#nama").val(data[0].nama);
            $("#prodi").val(data[0].nama_prodi);
            $("#tglpengajuan").val(data[0].tglpengajuan);
            $("#tglditerima").val(data[0].tglditerima);
            $("#judul").val(data[0].judul);
            $("#konsentrasi").val(data[0].konsentrasi);
            $("#modal-ubah").modal();
            GetPembimbing1(data[0].prodi);
            GetPembimbing2(data[0].prodi);
          },error:function(data){
            Swal.fire(
              'Gagal',
              'Gagal mengambil data :(',
              'error'
            )
          }
        });
        
        
      });
      function GetPembimbing1(prodi){
        var api = '<?php echo base_url();?>'+prodi+'/rank/1';
        var datas='';
        
        $.ajax({
          type : 'GET',
          url : api,
          datatype: 'json',
          success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
              datas += '<option value="'+ this.id + '">' + this.nama_dosen + '</li>' ;
            });
            $("#pembimbing1").html('<option></option>'+datas);
          },error:function(data){
            alert('mohon maaf, data tidak bisa diambil'); 
            console.log('tidak dapat mengambil data');
          }
        });
      }
      function GetPembimbing2(prodi){
        var api = '<?php echo base_url();?>'+prodi+'/rank/2';
        var datas='';
        
        $.ajax({
          type : 'GET',
          url : api,
          datatype: 'json',
          success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
              datas += '<option value="'+ this.id+ '">' + this.nama_dosen + '</li>' ;
            });
            $("#pembimbing2").html('<option></option>'+datas);
          },error:function(data){
            alert('mohon maaf, data tidak bisa diambil'); 
            console.log('tidak dapat mengambil data');
          }
        });
      }
      $("#ubah").on('click',function(){
        var id = $("#idubah").val();
        var pembimbing1 = $("#pembimbing1").val();
        var pembimbing2 = $("#pembimbing2").val();
       

        if(id == '' || pembimbing1 =='' || pembimbing2 == ''){
          Swal.fire(
              'Perhatian!',
              'Silahkan lengkapi data!',
              'warning'
            )
        }else{
          $.ajax({
            type : 'POST',
            url : '<?php echo base_url('pengajuan/update');?>',
            data: {id:id,pembimbing1:pembimbing1,pembimbing2:pembimbing2},
            success: function(data){
              location.reload();
            },error: function(data){
              Swal.fire(
                'Gagal',
                'Gagal menyimpan data :(',
                'error'
              )
            }
          });
        }
      });
      $('.select2').select2();
    <?php endif;?>

  });
</script>
</body>
</html>
