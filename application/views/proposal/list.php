

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Proposal</a></li>
              <li class="breadcrumb-item active">Daftar Proposal</li>
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
            <h3 class="card-title">Daftar Proposal</h3>
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
            <a href="<?php echo base_url('proposal/cetak');?>" target="_blank">
              <button type="button" class="btn btn-info">
                <i class="fas fa-print"></i> Cetak
              </button>
            </a>
            <table id="table-proposal" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th>NO</th>
                  <th>NAMA</th>
                  <th>JUDUL</th>
                  <th>TERAKHIR DIUBAH</th>
                  <th>STATUS</th>
                  <th>NILAI</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody id="data-proposal">
                <?php $no = 1; foreach ($proposals as $proposal):  ?>
                  <tr>
                    <td class="text-center"><?php echo $no++;?></td>
                    <td class="text-center"><?php echo $proposal["nama_mahasiswa"].'<br>'.$proposal["nim_mahasiswa"];?></td>
                    <td><a href="<?php echo base_url('uploads/proposal/').$proposal["id_proposal"].'.pdf';?>" target="_blank" alt="<?php echo $proposal["judul_proposal"];?>"><?php echo $proposal["judul_proposal"];?></a></td>
                    <td class="text-center"><?php echo date("l, d F Y H:i:s", strtotime($proposal["last_update"]));?></td>
                    <td class="text-center">
                      <?php
                      if($proposal["status_proposal"] == NULL){
                        echo 'Dalam Antrian Proses';
                      }elseif($proposal["status_proposal"] == 'ya'){
                        echo 'Revisi';
                      }else{
                        echo 'Seminar Pada<br>'.date("d-m-Y",strtotime($proposal["seminar"]));
                      }
                      ?>
                    </td>
                    <td><?php if($proposal["nilai"] == NULL){
                      echo 'Belum Ada';
                    }else{
                      echo number_format($proposal["nilai"],2);
                    }
                    ?>
                    </td>
                    <td class="text-center"><a class="text-info detail-proposal" data-id="<?php echo $proposal["id_proposal"];?>" href="#">Detail</a>  <a class="text-danger" href="<?php echo base_url('proposal/delete/').$proposal["id_proposal"];?>">Hapus</a></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
          <!-- Start Modal Details -->
          <div class="modal fade" id="modal-detail-proposal">
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
                          <label for="prodi">PRODI</label>
                          <input type="text" name="prodi" id="prodi" value="prodi" class="form-control form-control-md" readonly>
                        </div>
                        <div class="form-group">
                          <label for="judul">JUDUL</label>
                          <input type="text" name="judul" id="judul" value="judul" class="form-control form-control-md"  readonly>
                        </div>
                        <div class="form-group">
                          <a id="proposal" href="#" alt="Klik Untuk Melihat Proposal" class="text-md" title="Klik Untuk Melihat Proposal" target="_blank">Klik Untuk Melihat Proposal</a>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="tglseminar">TANGGAL SEMINAR</label>
                          <input type="date" name="tglseminar" id="tglseminar" class="form-control form-control-md" min='<?php echo date('Y-m-d');?>'>
                        </div>
                        <div class="form-group">
                          <label for="Penguji1">PENGUJI 1</label>
                          <select id="penguji1" data-placeholder="Silahkan Pililh Penguji 1" class="form-control form-control-md select2" data-placeholder="Silahkan pilih Status" style="width: 100%;" required>
                            <option></option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="Penguji2">PENGUJI 2</label>
                          <select id="penguji2" data-placeholder="Silahkan Pililh Penguji 2" class="form-control form-control-md select2" data-placeholder="Silahkan pilih Status" style="width: 100%;" required>
                             <option></option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="Penguji3">PENGUJI 3</label>
                          <select id="penguji3" data-placeholder="Silahkan Pililh Penguji 3" class="form-control form-control-md select2" data-placeholder="Silahkan pilih Status" style="width: 100%;" required>
                             <option></option>
                          </select>
                        </div>
                        <div class="form-group" id="acc">

                        </div>
                      </div>
                    </div>
                  <!-- Element End -->  
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="button" id="btn-simpan-proposal" class="btn btn-primary">Simpan</button>
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

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<script>
  $(function () {
    const $btnSimpanProposal = $("#btn-simpan-proposal");
    const $DataProposal = $("#data-proposal");
    const $TableProposal = $("#table-proposal");


    $btnSimpanProposal.click(function(){validasi()});
   
    $('#table-proposal').DataTable({ "paging": true, "lengthChange": false, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });

    $("#data-proposal").on('click','.detail-proposal',function(){
      let $id = $(this).data('id');
      getProposal($id);  

    });

    $('.select2').select2();

    /* Start Function Get Proposal */

    function getProposal($id){
      let $prodi ='';
      $.ajax({
        type : 'GET',
        url : '<?php echo base_url('proposal/getproposal/');?>'+$id,
        dataType: 'json',
        success: function(data){
          
          if(data[0].prodi == 'adpend'){
            $prodi = 'Administrasi Pendidikan';
          }else if(data[0].prodi == 'manajemen'){
            $prodi = 'Manajemen';
          }else if(data[0].prodi == 'hukum'){
            $prodi = 'Hukum';
          };
          if(data[0].status_proposal == 'tidak'){
            $("#elacc").remove();
            $("#acc").append('<div id="elacc"><label for="tglacc">Tanggal ACC Seminar</label><br><strong id="tglacc"></strong></div>');
            var acc = new Date(data[0].acc_seminar).toLocaleString(['ban', 'id']);
            $("#tglseminar").val(data[0].tglseminar);
            $("#tglacc").text(acc+' WIB');
            getPenguji(data[0].prodi,data[0].penguji1,data[0].penguji2,data[0].penguji3);
          }else{
            getPenguji(data[0].prodi,'no');
          }
          $("#mahasiswa").val(data[0].nama_mahasiswa);
          $("#nim").val(data[0].nim_mahasiswa);
          $("#prodi").val($prodi);
          $("#judul").val(data[0].judul_proposal);
          $("#proposal").attr("href","<?php echo base_url('uploads/proposal/');?>"+data[0].id_proposal+".pdf");
          $("#id_proposal").val(data[0].id_proposal);
          $("#modal-detail-proposal").modal();
        },error: function(data){
          alert('Gagal membuka detail');
        }
      });
    }

    /* End Function Get Proposal */
    function getPenguji($prodi,penguji1,penguji2,penguji3){
      var datas='';
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('proposal/jsonpenguji/');?>'+$prodi,
        dataType: 'json',
        success: function(data){
          if(penguji1 == 'no'){
            for(var i=0; i < data.length; i++){
              datas += '<option value="'+data[i].id_dosen+'">'+data[i].nama+'</option>'
            }
            $("#penguji1").html('<option></option>'+datas);
            $("#penguji2").html('<option></option>'+datas);
            $("#penguji3").html('<option></option>'+datas);
          }else{
            var dosens1='';
            var dosens2='';
            var dosens3='';
            for(var i=0; i < data.length; i++){
              if(data[i].id_dosen == penguji1){
                dosens1 += '<option value="'+data[i].id_dosen+'" selected>'+data[i].nama+'</option>';
              }else{
                dosens1 += '<option value="'+data[i].id_dosen+'">'+data[i].nama+'</option>';
              }
              if(data[i].id_dosen == penguji2){
                dosens2 += '<option value="'+data[i].id_dosen+'" selected>'+data[i].nama+'</option>';
              }else{
                dosens2 += '<option value="'+data[i].id_dosen+'">'+data[i].nama+'</option>';
              }
              if(data[i].id_dosen == penguji3){
                dosens3 += '<option value="'+data[i].id_dosen+'" selected>'+data[i].nama+'</option>';
              }else{
                dosens3 += '<option value="'+data[i].id_dosen+'">'+data[i].nama+'</option>';
              }
            }
            $("#penguji1").html('<option></option>'+dosens1);
            $("#penguji2").html('<option></option>'+dosens2);
            $("#penguji3").html('<option></option>'+dosens3);
          }
        }
      });
    }
    
    function validasi(){
      let $id = $("#id_proposal").val();
      let $tanggal = $("#tglseminar").val();
      let $penguji1 = $("#penguji1").val();
      let $penguji2 = $("#penguji2").val();
      let $penguji3 = $("#penguji3").val();
      if($tanggal == '' || $penguji1 == '' || $penguji2 == '' || $penguji3 == ''){
        Swal.fire(
          'Perhatikan!',
          'Silahkan Isi Semuanya',
          'warning'
          );
      }else if($penguji1 == $penguji2 || $penguji1 == $penguji3 || $penguji2 == $penguji3){
        Swal.fire(
          'Perhatikan!',
          'Penguji Tidak Boleh Sama!',
          'warning'
          );
      }
      else{
        updateProposal($id,$tanggal,$penguji1,$penguji2,$penguji3);
      }
    }

    function updateProposal(id,tanggal,penguji1,penguji2,penguji3){
      $.ajax({
        type: 'POST',
        url : '<?php echo base_url('proposal/updateProposal');?>',
        data: {id:id,tanggal:tanggal,penguji1:penguji1,penguji2:penguji2,penguji3:penguji3},
        success:function(data){
          Swal.fire(
          'Berhasil!',
          'Pengajuan Proposal Telah Diperbarui!',
          'success'
          );
          getProposal(id);
          getAll();
        },error:function(data){
          Swal.fire(
          'Gagal',
          'Mohon maaf, kami tidak bisa memperbarui :(',
          'error'
          );
        }
      });
    }
    function getAll(){
      var datas='';
      $.ajax({
        type: 'GET',
        url:'<?php echo base_url('proposal/getall/');?>',
        dataType:'json',
        success:function(data){
          var nilai ='';
          for(var i=0; i<data.length;i++){
            var modfified = new Date(data[i].last_update).toLocaleString(['ban', 'id']) 
            var status='';
            var tanggal='';
            if(data[i].status_proposal == ''){
              status = 'Dalam Antrian Proses';
            }else if(data[i].status_proposal == 'ya'){
              status = 'Revisi';
            }else{
              status ='Seminar Pada<br>';
              tanggal = data[i].seminar;
            }
            if(data[i].nilai == null){
              nilai = 'Belum Ada';
            }else{
              nilai = data[i].nilai.toFixed(2);
            }
            datas+= '<tr><td class="text-center">'+(i+1)+'</td><td class="text-center">'+data[i].nama_mahasiswa+'<br>'+data[i].nim_mahasiswa+'</td><td><a href="<?php echo base_url('uploads/proposal/');?>'+data[i].id_proposal+'.pdf" target="_blank" alt="'+data[i].judul_proposal+'">'+data[i].judul_proposal+'</a></td><td class="text-center">'+modfified+'</td><td class="text-center">'+status+tanggal+'</td><td>'+nilai+'</td><td class="text-center"><a class="text-info detail-proposal" data-id="'+data[i].id_proposal+'" href="#">Detail</td></tr>';
          }
          $TableProposal.dataTable().fnClearTable();
          $TableProposal.dataTable().fnDestroy();
          $DataProposal.html(datas);
          $TableProposal.DataTable({ "paging": true, "lengthChange": true, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });
        },error:function(data){
          console.log('gagal mengambil data');
        }
      });
    }
  });
</script>
</body>
</html>
