

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
            <?php if($this->session->userdata('level') == 2){?>
              <div class="row">
                <a href="<?php echo base_url('pengajuan-judul');?>">
                  <button type="button" class="btn btn-info">Ajukan Judul</button>
                </a>
              </div>
            <?php }?>
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
                  <th>NAMA</th>
                  <th>JUDUL</th>
                  <th>DIAJUKAN</th>
                  <th>STATUS</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody id="pengajuan">
                <?php $no = 1; foreach ($pengajuans as $pengajuan):  ?>
                  <tr>
                    <td class="text-center"><?php echo $no++;?></td>
                    <td><?php echo $pengajuan->nama.'<br>'.$pengajuan->username;?></td>
                    <td><?php echo $pengajuan->judul;?></td>
                    <td><?php echo date("l, d F Y H:i:s", strtotime($pengajuan->tglpengajuan));?></td>
                    <td class="text-center">
                      <?php
                        if($pengajuan->status == "belum"){
                          echo "Sedang diproses";
                        }elseif($pengajuan->status == "tolak"){
                          echo "Ditolak Pada <br>".date("l, d F Y H:i:s", strtotime($pengajuan->tglditerima));
                        }elseif($pengajuan->status == "terima"){
                          echo "Diterima Pada <br>".date("l, d F Y H:i:s", strtotime($pengajuan->tglditerima));
                        }
                      ?> 
                    </td>
                    <td class="text-center">
                      <a class="detail-pengajuan text-info text-md" data-id="<?php echo $pengajuan->id_pengajuan;?>">Detail</a>   <a class="text-success text-md" href="pengajuan/cetak/<?php echo $pengajuan->id_pengajuan;?>">Cetak</a>   <a class="text-danger text-md" href="pengajuan/hapus/<?php echo $pengajuan->id_pengajuan;?>">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </section>
        <!-- Modal Detail -->
        <div class="modal fade" id="modal-detail">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Data Pengajuan</h4>
                <button type="button" class="close closed" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="hidden" id="id_pengajuan">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="nim">NIM :</label>
                      <input type="text" id="nim" class="form-control form-control-lg" readonly>
                    </div>
                    <div class="form-group">
                      <label for="username-ubah">NAMA :</label>
                      <input type="text" id="nama" class="form-control form-control-lg" readonly>
                    </div>
                    <div class="form-group">
                      <label for="prodi">PROGRAM STUDI :</label>
                      <input type="text" id="prodi" class="form-control form-control-lg" readonly>
                    </div>
                    <div class="form-group">
                      <label for="konsentrasi">KONSENTRASI :</label>
                      <input type="text" id="konsentrasi" class="form-control form-control-lg" readonly>
                    </div>
                    <div class="form-group">
                      <label for="tglpengajuan">TANGGAL PENGAJUAN :</label>
                      <input type="text" id="tglpengajuan" class="form-control form-control-lg" readonly>
                    </div>
                    <div id="area-respon" class="form-group">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="judul">JUDUL :</label>
                      <input type="text" id="judul" class="form-control form-control-lg" readonly>
                    </div>
                    <div class="form-group">
                      <label for="latarbelakang">LATAR BELAKANG :</label>
                      <textarea id="latarbelakang" class="form-control form-control-lg" readonly></textarea>
                    </div>
                    <div class="form-group">
                      <label for="tujuan">TUJUAN :</label>
                      <textarea id="tujuan" class="form-control form-control-lg" readonly></textarea>
                    </div>
                    <div class="form-group">
                      <label for="status">STATUS :</label>
                      <select id="status" class="form-control form-control-lg select2" data-placeholder="Silahkan pilih Status" style="width: 100%;" required>
                      </select>
                    </div>
                  <div class="form-group">
                    <label for="alasan">ALASAN DITOLAK :</label>
                     <textarea id="alasan" class="form-control form-control-lg" placeholder="Cantumkan Alasan, Bilamana Pengajuan Ditolak"></textarea>
                  </div> 
                </div>
              </div> 
              <div class="modal-footer justify-content-between">
                <button type="button" class="closed btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="simpan-detail">Simpan</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- End Modal Detail -->
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
    const $btnSaveDetail = $("#simpan-detail");
   
    $('.select2').select2();

    $('#data-pengajuan').DataTable({ "paging": true, "lengthChange": false, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });


    $("#pengajuan").on("click",".detail-pengajuan",function(){
      var id = $(this).data('id');
      getPengajuan(id);

      $("#modal-detail").modal();
    });

    $(".closed").click(function(){
      $("#tglditerima").remove();
      $("#alasan").val('');
    });

    $btnSaveDetail.click(function(){
      var status = $("#status").val();
      var alasan = $("#alasan").val();
      var id = $("#id_pengajuan").val();

      if(status == 'terima'){
        updatePengajuan(id,status)
      }else if(status == 'tolak' && alasan == ''){
        $("#alasan").focus();
        Swal.fire(
          'Perhatikan!',
          'Silahkan Isi Alasan Ditolak',
          'warning'
          );
      }else if(status == 'tolak' && alasan != ''){
        updatePengajuan(id,status)
      }else if(status == 'belum'){
        updatePengajuan(id,status)
      }

    });

    // function update pengajuan
    function updatePengajuan(id,type){
      if(type == 'tolak'){
        desc = 'tolak!';
      }else if(type == 'terima'){
        desc = 'terima!';
      }else if(type == 'belum'){
        desc = 'kembalikan Ke Semula!';
      }

      var status = $("#status").val();
      var alasan = $("#alasan").val();
      var id = id;

      $.ajax({
        type : 'POST',
        url : '<?php echo base_url('pengajuan/update/');?>',
        data:{id:id,status:status,alasan:alasan},
        success:function(data){
          Swal.fire(
            'Berhasil!',
            'Pengajuan Telah Di'+desc,
            'success'
          );
          if(type == 'terima' || type == 'belum'){
            $("#alasan").val('');
          }
          getPengajuan(id);
          getPengajuanAll();
        },error:function(data){
           Swal.fire(
            'Gagal!',
            'Mohon maaf, gagal menyimpan data',
            'error'
          );
        }
      });
    }

    // function get pengajuan by id

    function getPengajuan(id){
      $.ajax({
        type : 'GET',
        url : '<?php echo base_url('pengajuan/get_judul/');?>'+id,
        dataType : 'json',
        success:function(data){
          var tglpengajuan = new Date(data[0].tglpengajuan).toLocaleString(['ban', 'id']);
          var tglrespon = new Date(data[0].tglditerima).toLocaleString(['ban', 'id']);
          $("#id_pengajuan").val(data[0].id_pengajuan);
          $("#nim").val(data[0].nim);
          $("#nama").val(data[0].nama);
          $("#prodi").val(data[0].nama_prodi);
          $("#konsentrasi").val(data[0].konsentrasi);
          $("#tglpengajuan").val(tglpengajuan);
          $("#judul").val(data[0].judul);
          $("#latarbelakang").val(data[0].latarbelakang);
          $("#tujuan").val(data[0].tujuan);
          if(data[0].status_pengajuan == 'belum'){
            $("#tglditerima").remove();
            $("#status").html('<option></option><option value="belum" selected>BELUM</option><option value="terima">TERIMA</option><option value="tolak">TOLAK</option>');
          }else if(data[0].status_pengajuan == 'tolak'){
            $("#tglditerima").remove();
            $("#status").html('<option></option><option value="belum">BELUM</option><option value="terima">TERIMA</option><option value="tolak" selected>TOLAK</option>');
            $("#area-respon").append('<div id="tglditerima"><label for="tglditerima">TANGGAL DITOLAK :</label><input type="text" class="form-control form-control-lg" value="'+tglrespon+'" readonly></div>');
            $("#alasan").val(data[0].alasan);
          }else if(data[0].status_pengajuan == 'terima'){
            $("#tglditerima").remove();
            $("#status").html('<option></option><option value="belum">BELUM</option><option value="terima" selected>TERIMA</option><option value="tolak">TOLAK</option>');
            $("#area-respon").append('<div id="tglditerima"><label for="tglditerima">TANGGAL DITERIMA :</label><input type="text" class="form-control form-control-lg" value="'+tglrespon+'" readonly></div>');
          }
        },error:function(data){
          alert('Gagal mengambil data');
        }
      });
    }

    // function get pengajuan all
    function getPengajuanAll(){
      var datas,tglDiajukan,tglStatus,status,opsi = '';
      $.ajax({
        type:'GET',
        url:'<?php echo base_url('pengajuan/get_pengajuan/');?>',
        dataType: 'json',
        async:false,
        success:function(data){
          for(var i=0 ;i < data.length; i++){

            if(data[i].status == "belum"){
              status = "Sedang diproses";
            }else if(data[i].status == "tolak"){
              tglStatus = new Date(data[i].tglditerima).toLocaleString(['ban', 'id']);
              status = "Ditolak Pada <br>"+tglStatus;
            }else if(data[i].status =="terima"){
              tglStatus = new Date(data[i].tglditerima).toLocaleString(['ban', 'id']);
              status = "Diterima Pada <br>"+tglStatus;
            }
            opsi = '<td class="text-center"><a class="detail-pengajuan text-info text-md" data-id="'+data[i].id_pengajuan+'">Detail</a>   <a class="text-success text-md" href="pengajuan/cetak/'+data[i].id_pengajuan+'">Cetak</a>   <a class="text-danger text-md" href="pengajuan/hapus/'+data[i].id_pengajuan+'">Hapus</a></td>';

            tglDiajukan = new Date(data[i].tglpengajuan).toLocaleString(['ban', 'id']);

            datas+='<tr><td class="text-center">'+(i+1)+'</td><td>'+data[i].nama+'<br>'+data[i].username+'</td><td>'+data[i].judul+'</td><td>'+tglDiajukan+'</td><td class="text-center">'+status+'</td>'+opsi+'</tr>'
          }
          $('#data-pengajuan').dataTable().fnClearTable();
          $('#data-pengajuan').dataTable().fnDestroy();
          $("#pengajuan").html(datas);
          $('#data-pengajuan').DataTable({ "paging": true, "lengthChange": false, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });
        }
      });
    }

  });
</script>
</body>
</html>
