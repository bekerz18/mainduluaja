

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
            <button type="button" id="btn-cta-cetak" class="btn btn-info">
              <i class="fas fa-print"></i> Cetak
            </button>
            <table id="table-proposal" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th>NO</th>
                  <th>NAMA</th>
                  <th>JUDUL</th>
                  <th>DIAJUKAN</th>
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
                    <td class="text-center"><?php if($proposal["nilai"] == NULL){
                      echo 'Belum Ada';
                    }else{
                      echo number_format($proposal["nilai"],2).'<br>';
                      if(number_format($proposal['nilai'],2) >= 86 && number_format($proposal['nilai'],2) <= 100){
                        echo "A";
                      }else if(number_format($proposal['nilai'],2) >= 76 && number_format($proposal['nilai'],2) < 86){
                        echo "B";
                      }else if(number_format($proposal['nilai'],2) >= 66 && number_format($proposal['nilai'],2) < 76){
                        echo "C";
                      }else if(number_format($proposal['nilai'],2) >= 56 && number_format($proposal['nilai'],2) < 66){
                        echo "D";
                      }else if(number_format($proposal['nilai'],2) <= 55){
                        echo "E";
                      }
                    }
                    ?>
                    </td>
                    <td class="text-center"><a class="text-info detail-proposal" data-id="<?php echo $proposal["id_proposal"];?>" href="#">Detail</a>  <a class="text-danger" href="<?php echo base_url('proposal/delete/').$proposal["id_proposal"];?>">Hapus</a></td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
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
                          <label for="Penguji1">PENGUJI 1</label> <span id="nilai_1"></span>
                          <select id="penguji1" data-placeholder="Silahkan Pililh Penguji 1" class="form-control form-control-md select2" data-placeholder="Silahkan pilih Status" style="width: 100%;" required>
                            <option></option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="Penguji2">PENGUJI 2</label> <span id="nilai_2"></span>
                          <select id="penguji2" data-placeholder="Silahkan Pililh Penguji 2" class="form-control form-control-md select2" data-placeholder="Silahkan pilih Status" style="width: 100%;" required>
                             <option></option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="Penguji3">PENGUJI 3</label> <span id="nilai_3"></span>
                          <select id="penguji3" data-placeholder="Silahkan Pililh Penguji 3" class="form-control form-control-md select2" data-placeholder="Silahkan pilih Status" style="width: 100%;" required>
                             <option></option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="nilai_tampil">TAMPILKAN NILAI</label>
                          <input type="radio" value="ya" id="nilai_tampil_ya" name="nilai_tampil">YA
                          <input type="radio" value="tidak" id="nilai_tampil_tidak" name="nilai_tampil">TIDAK
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
        <!-- Modal Cetak -->
        <div class="modal fade" id="modal-cetak">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <?php echo form_open('proposal/cetak');?>
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
<!-- InputMask -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js');?>"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
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
   
    $('#table-proposal').DataTable({ "paging": true, "lengthChange": true, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });

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
          let nilai1 = data[0].nilai1;
          let nilai2 = data[0].nilai2;
          let nilai3 = data[0].nilai3;
          if(data[0].nilai_tampil == 'ya'){
            $("#nilai_tampil_ya"). prop("checked", true);
          }else{
            $("#nilai_tampil_tidak"). prop("checked", true);
          }
          
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
          if(nilai1 == null){
            nilai1 = 'Belum ada';
          }
          if(nilai2 == null){
            nilai2 = 'Belum ada';
          }
          if(nilai3 == null){
            nilai3 = 'Belum ada';
          }
          jQuery("#nilai_1").text('Nilai : '+nilai1);
          jQuery("#nilai_2").text('Nilai : '+nilai2);
          jQuery("#nilai_3").text('Nilai : '+nilai3);
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
      let $nilai_tampil = $("input[name='nilai_tampil']:checked"). val();
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
        updateProposal($id,$tanggal,$penguji1,$penguji2,$penguji3,$nilai_tampil);
      }
    }

    function updateProposal(id,tanggal,penguji1,penguji2,penguji3,nilai_tampil){
      $.ajax({
        type: 'POST',
        url : '<?php echo base_url('proposal/updateProposal');?>',
        data: {id:id,tanggal:tanggal,penguji1:penguji1,penguji2:penguji2,penguji3:penguji3,nilai_tampil:nilai_tampil},
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
    $('#reservation').daterangepicker();
    $("#btn-cta-cetak").click(function(){
      $("#modal-cetak").modal();
    });
  });
</script>
</body>
</html>
