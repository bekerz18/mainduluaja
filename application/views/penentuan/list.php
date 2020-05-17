

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Penentuan Pembimbing</a></li>
              <li class="breadcrumb-item active">Daftar Penentuan Pembimbing</li>
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
            <h3 class="card-title">Daftar Penentuan Pembimbing</h3>
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
            <a href="<?php echo base_url('pengajuan/penentuan_pembimbing/cetak');?>">
              <button type="button" class="btn btn-info">
                <i class="fas fa-print"></i> Cetak
              </button>
            </a>
            <table id="table-pengajuan" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th>NO</th>
                  <th>NAMA</th>
                  <th>PRODI</th>
                  <th>JUDUL</th>
                  <th>PEMBIMBING 1</th>
                  <th>PEMBIMBING 2</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody id="data-pengajuans">
                <?php $no=0; foreach ($pengajuans as $pengajuan) :$no++?>
                  <tr>
                    <td class="text-center"><?php echo $no;?></td>
                    <td class="text-center"><?php echo $pengajuan["nama"].'<br>'.$pengajuan["nim"];?></td>
                    <td class="text-center"><?php echo $pengajuan["nama_prodi"];?></td>
                    <td class="text-center"><?php echo $pengajuan["judul"];?></td>
                    <td><?php if($pengajuan['pembimbing1'] == ''){echo 'Belum Ada';}else{ echo $pengajuan['pembimbing1'];}?></td>
                    <td><?php if($pengajuan['pembimbing2'] == ''){echo 'Belum Ada';}else{ echo $pengajuan['pembimbing2'];}?></td>
                    <td class="text-center"><a class="details-penentuan text-info" data-id="<?php echo $pengajuan["id_pengajuan"];?>">Details</a>   <a class="text-danger" href="<?php echo base_url('pengajuan/penentuan_pembimbing/hapus/').$pengajuan["id_pengajuan"];?>">Hapus</a></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <!-- Start Modal Details -->
          <div class="modal fade" id="modal-detail-pengajuan">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Detail</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- Element Start -->
                  <input type="hidden" name="id_proposal" id="id_proposal">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="mahasiswa">NIM MAHASISWA</label>
                          <input type="text" name="nim" id="nim" class="form-control form-control-md" value="nim"readonly>
                        </div>
                        <div class="form-group">
                          <label for="mahasiswa">NAMA MAHASISWA</label>
                          <input type="text" name="mahasiswa" id="mahasiswa" class="form-control form-control-md" value="mahasiswa"readonly>
                        </div>
                        <div class="form-group">
                          <label for="prodi">PROGRAM STUDI</label>
                          <input type="text" name="prodi" id="prodi" value="prodi" class="form-control form-control-md" readonly>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="judul">JUDUL</label>
                          <input type="text" name="judul" id="judul" value="judul" class="form-control form-control-md"  readonly>
                        </div>
                        <div class="form-group">
                          <label for="accseminar">ACC SEMINAR PROPOSAL</label>
                          <input type="text" name="accseminar" id="accseminar" value="accseminar" class="form-control form-control-md"  readonly>
                        </div>
                        <div class="form-group">
                          <label for="pembimbing1">PEMBIMBING 1</label>
                          <select id="pembimbing1" class="form-control form-control-md select2" data-placeholder="Silahkan pilih Pembimbing 1" style="width: 100%;" required>
                            <option></option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="pembimbing2">PEMBIMBING 2</label>
                          <select id="pembimbing2" class="form-control form-control-md select2" data-placeholder="Silahkan pilih Pembimbing 2" style="width: 100%;" required>
                            <option></option>
                          </select>
                        </div>
                      </div>
                    </div>
                  <!-- Element End -->  
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="button" id="btn-simpan-penentuan" class="btn btn-primary">Simpan</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- End Modal Details -->
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
    var $idPengajuan='';
    $(".select2").select2();
    $('#table-pengajuan').DataTable({ "paging": true, "lengthChange": true, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });

    $("#data-pengajuans").on("click",".details-penentuan",function(){
      let id = $(this).data('id');
      getPengajuan(id);
    });

    $("#btn-simpan-penentuan").click(function(){
      updatePembimbing();
    });

    function getPengajuan(id){
      $.ajax({
        type : 'GET',
        url : '<?php echo base_url('pengajuan/get_penentuan/');?>'+id,
        dataType : 'json',
        success:function(data){
          var accseminar = new Date(data[0].acc_seminar).toLocaleString(['ban', 'id']);
          $idPengajuan =  data[0].id_pengajuan;
          $("#nim").val(data[0].nim);
          $("#mahasiswa").val(data[0].nama);
          $("#prodi").val(data[0].nama_prodi);
          $("#judul").val(data[0].judul);
          $("#accseminar").val(accseminar+' WIB');
          if(data[0].pembimbing1 == null || data[0].pembimbing2 == null){
            GetPembimbing1(data[0].sebutan_prodi,0);
            GetPembimbing2(data[0].sebutan_prodi,0);
          }else{
            GetPembimbing1(data[0].sebutan_prodi,data[0].pembimbing1);
            GetPembimbing2(data[0].sebutan_prodi,data[0].pembimbing2);
          }
          $("#modal-detail-pengajuan").modal();
        },error:function(data){
          alert('Gagal mengambil data');
        }
      });
    }
    function GetPembimbing1(prodi,id){
        var api = '<?php echo base_url();?>'+prodi+'/rank/1';
        var datas='';
        
        $.ajax({
          type : 'GET',
          url : api,
          datatype: 'json',
          success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
              if(id == this.id){
                datas += '<option value="'+ this.id + '" selected>' + this.nama_dosen + '</li>' ;
              }else{
                datas += '<option value="'+ this.id + '">' + this.nama_dosen + '</li>' ;
              }
              
            });
            $("#pembimbing1").html('<option></option>'+datas);
          },error:function(data){
            alert('mohon maaf, data tidak bisa diambil'); 
            console.log('tidak dapat mengambil data');
          }
        });
      }
      function GetPembimbing2(prodi,id){
        var api = '<?php echo base_url();?>'+prodi+'/rank/2';
        var datas='';
        
        $.ajax({
          type : 'GET',
          url : api,
          datatype: 'json',
          success:function(data){
            var posts = JSON.parse(data);
            $.each(posts, function() {
              if(id == this.id){
                datas += '<option value="'+ this.id + '" selected>' + this.nama_dosen + '</li>' ;
              }else{
                datas += '<option value="'+ this.id + '">' + this.nama_dosen + '</li>' ;
              }
            });
            $("#pembimbing2").html('<option></option>'+datas);
          },error:function(data){
            alert('mohon maaf, data tidak bisa diambil'); 
            console.log('tidak dapat mengambil data');
          }
        });
      }

      function updatePembimbing(){
        let $pembimbing1 = $("#pembimbing1").val();
        let $pembimbing2 = $("#pembimbing2").val();
        let $status = 'penentuan';
        if($pembimbing1 == '' || $pembimbing2 ==''){
          Swal.fire(
            'Perhatikan!',
            'Data Pembimbing Harus Diisi!',
            'warning',
            )
        }else{
          $.ajax({
            type : 'POST',
            url : '<?php echo base_url('pengajuan/update/');?>',
            data:{status:$status,pembimbing1:$pembimbing1,pembimbing2:$pembimbing2,id:$idPengajuan},
            success:function(data){
              Swal.fire(
                'Berhasil!',
                'Berhasil menyimpan data!',
                'success',
                );
              getPenentuan();
            },error: function(data){
              Swal.fire(
                'Gagal',
                'Gagal menyimpan data! :(',
                'error'
                );
            }
          });
        }
      }

      function getPenentuan(){
        var datas='';
        $.ajax({
          type : 'GET',
          url : '<?php echo base_url('pengajuan/getpenentuan/');?>',
          dataType : 'json',
          success : function(data){
            
            for(var i=0 ; i < data.length; i++){

              let pembimbing1 = data[i].pembimbing1;
              let pembimbing2 = data[i].pembimbing2;
              if(pembimbing1 == null || pembimbing2 == null){
                pembimbing1 = 'Belum Ada';
                pembimbing2 = 'Belum Ada';
              }
              datas += '<tr><td class="text-center">'+(i+1)+'</td><td class="text-center">'+data[i].nama+'<br>'+data[i].nim+'</td><td class="text-center">'+data[i].nama_prodi+'</td><td>'+data[i].judul+'</td><td>'+pembimbing1+'</td><td>'+pembimbing2+'</td><td class="text-center"><a class="details-penentuan text-info" data-id="'+data[i].id_pengajuan+'">Details</a></td></tr>';
            }
            $('#table-pengajuan').dataTable().fnClearTable();
            $('#table-pengajuan').dataTable().fnDestroy();
            $("#data-pengajuans").html(datas);
            $('#table-pengajuan').DataTable({ "paging": true, "lengthChange": true, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });
          },error: function(data){
            console.log("Gagal Mengambil Data Penentuan");
          }
        });
      }
  });
</script>
</body>
</html>
