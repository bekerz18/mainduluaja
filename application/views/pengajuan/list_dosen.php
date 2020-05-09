
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
                <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="tab-proposal" data-toggle="pill" href="#penilaian" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Proposal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-bimbingan" data-toggle="pill" href="#bimbingan" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Bimbingan</a>
                  </li>
                </ul>
                <div class="tab-content" id="custom-content-above-tabContent">
                  <div class="tab-pane fade active show" id="penilaian" role="tabpanel" aria-labelledby="tab-proposal">
                    <br>
                    <a href="<?php echo base_url('pengajuan/cetak/proposal');?>">
                      <button type="button" class="btn btn-info">
                        <i class="fas fa-print"></i> Cetak
                      </button>
                    </a>
                    <table id="table-pengajuans" class="table table-bordered table-striped">
                      <thead>
                      <tr class="text-center">
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>PRODI</th>
                        <th>JUDUL</th>
                        <th>JADWAL SEMINAR</th>
                        <th>OPSI</th>
                      </tr>
                      <tbody id="data-pengajuans">
                         <?php $no = 1; foreach ($proposals as $proposal):?>
                          <tr>
                            <td class="text-center"><?php echo $no++;?></td>
                            <td class="text-center"><?php echo $proposal['nama_mahasiswa'].'<br>'.$proposal['nim_mahasiswa'];?></td>
                            <td class="text-center"><?php echo $proposal['prodi'];?></td>
                            <td><?php echo $proposal['judul'];?></td>
                            <td><?php echo date('l, d F Y',strtotime($proposal['tgl_seminar']));?></td>
                            <td class="text-center"><a class="detail-pengajuan text-info" href="#" data-id="<?php echo $proposal["id_proposal"];?>">Detail</a></td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="bimbingan" role="tabpanel" aria-labelledby="tab-bimbingan">
                    <br>
                    <a href="<?php echo base_url('pengajuan/cetak/bimbingan');?>">
                      <button type="button" class="btn btn-info">
                        <i class="fas fa-print"></i> Cetak
                      </button>
                    </a>                    
                    
                    <table id="table-bimbingan" class="table table-bordered table-striped">
                      <thead>
                      <tr class="text-center">
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>NIM</th>
                        <th>PRODI</th>
                        <th>JUDUL</th>
                      </tr>
                      <tbody id="data-bimbingans">
                         <?php $no = 1; foreach ($pengajuans as $pengajuan):?>
                          <tr>
                            <td class="text-center"><?php echo $no++;?></td>
                            <td><?php echo $pengajuan['nama'];?></td>
                            <td><?php echo $pengajuan['nim'];?></td>
                            <td><?php echo $pengajuan['nama_prodi'];?></td>
                            <td><?php echo $pengajuan['judul'];?></td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                </div>

                
              </div>
              <!-- Start Modal Detail -->
              <div class="modal fade" id="modal-details-pengajuan">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Detail</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="nim_mahasiswa">NIM</label><br>
                            <span id="nim_mahasiswa" class="text-md">nim_mahasiswa</span>
                          </div>
                          <div class="form-group">
                            <label for="nama_mahasiswa">NAMA</label><br>
                            <span id="nama_mahasiswa" class="text-md">nama_mahasiswa</span>
                          </div>
                          <div class="form-group">
                            <label for="judul_pengajuan">JUDUL</label> <a href="#" target="_blank" id="link_proposal" class="text-info">Klik Untuk Melihat Proposal</a><br>
                            <span id="judul_pengajuan" class="text-md">judul_pengajuan</span>
                          </div>
                          <div class="form-group">
                            <label for="jadwal_seminar">JADWAL SEMINAR</label><br>
                            <span id="jadwal_seminar" class="text-md">jadwal_seminar</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="penguji1">PENGUJI 1</label><br>
                            <span id="nama_penguji1" class="text-md">nama_penguji1</span>
                            <div id="nilai_1"></div>
                            <span id="nilai_penguji1" class="text-md font-italic">NILAI: </span>

                          </div>
                           <div class="form-group">
                            <label for="penguji1">PENGUJI 2</label><br>
                            <span id="nama_penguji2" class="text-md">nama_penguji2</span><br>
                            <div id="nilai_2">
                            <span id="nilai_penguji2" class="text-md font-italic">NILAI: </span>

                          </div>
                           <div class="form-group">
                            <label for="penguji3">PENGUJI 3</label><br>
                            <span id="nama_penguji3" class="text-md">nama_penguji3</span>
                            <div id="nilai_3"></div>
                            <span id="nilai_penguji3" class="text-md font-italic">NILAI: </span>

                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                      <button type="button" id="button-ubah-pengajuan" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- End Modal Detail -->
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
    var penguji = '';
    var $id_proposal = '';
    const $ModalDetails = $("#modal-details-pengajuan");
    $('#table-pengajuans').DataTable({ "paging": true, "lengthChange": false, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true});
    $('#table-bimbingan').DataTable({ "paging": true, "lengthChange": false, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true});
    $("#data-pengajuans").on("click",".detail-pengajuan",function(){
      let $id = $(this).data('id');
      getProposal($id);
      
    });
    $("#button-ubah-pengajuan").click(function(){
      if(penguji == 1){
        var nilai = $("#nilai_penguji1").val();
        updateNilai(penguji,nilai,$id_proposal);
      }else if(penguji == 2){
        var nilai = $("#nilai_penguji2").val();
        updateNilai(penguji,nilai,$id_proposal);
      }else if(penguji == 3){
        var nilai = $("#nilai_penguji3").val();
        updateNilai(penguji,nilai,$id_proposal);
      }else{
        console.log('maaf, tidak dapat mengambil identitas penguji');
      }
    });
    function getProposal($id){
      $.ajax({
        type: 'GET',
        url :'<?php echo base_url('proposal/getproposal/');?>'+$id,
        dataType: 'json',
        success: function(data){
          $id_proposal = $id;
          var $TglSeminar = new Date(data[0].tglseminar);
          const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
          $TglSeminar = $TglSeminar.toLocaleDateString('id', options);
          $("#nim_mahasiswa").text(data[0].nim_mahasiswa);
          $("#nama_mahasiswa").text(data[0].nama_mahasiswa);
          $("#link_proposal").attr("href","<?php echo base_url('uploads/proposal/');?>"+data[0].id_proposal+'.pdf');
          $("#judul_pengajuan").text(data[0].judul_proposal);
          $("#jadwal_seminar").text($TglSeminar);
          getPenguji(data[0].penguji1,1);
          getPenguji(data[0].penguji2,2);
          getPenguji(data[0].penguji3,3);
          if("<?php echo $this->session->userdata('id');?>" == data[0].penguji1){
            penguji = 1;
            if(data[0].nilai2 == null){
              $("#nilai_penguji2").text("NILAI: BELUM ADA");
            }else{
              $("#nilai_penguji2").text('NILAI : '+data[0].nilai2);
            }
            if(data[0].nilai3 == null){
              $("#nilai_penguji3").text("NILAI: BELUM ADA");
            }else{
              $("#nilai_penguji3").text('NILAI : '+data[0].nilai3);
            }
            $("#nilai_penguji1").remove();
            if("<?php echo date('Y-m-d');?>" < data[0].tglseminar){
              $("#nilai_1").append('<input type="number" id="nilai_penguji1" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Seminar" readonly>');
            }else{
              if(data[0].nilai1 != null){
                $("#nilai_1").append('<input type="number" id="nilai_penguji1" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Seminar" value="'+data[0].nilai1+'" min="0" max="100">');
              }else{
                $("#nilai_1").append('<input type="number" id="nilai_penguji1" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Seminar" min="0" max="100">');
              }
            }
            
          }else if("<?php echo $this->session->userdata('id');?>" == data[0].penguji2){
            penguji = 2;
            if(data[0].nilai1 == null){
              $("#nilai_penguji1").text("NILAI: BELUM ADA");
            }else{
              $("#nilai_penguji1").text('NILAI : '+data[0].nilai1);
            }
            if(data[0].nilai3 == null){
              $("#nilai_penguji3").text("NILAI: BELUM ADA");
            }else{
              $("#nilai_penguji3").text('NILAI : '+data[0].nilai3);
            }
            $("#nilai_penguji2").remove();
            if("<?php echo date('Y-m-d');?>" < data[0].tglseminar){
              $("#nilai_2").append('<input type="number" id="nilai_penguji2" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Seminar" readonly>');
            }else{
              if(data[0].nilai2 != null){
                $("#nilai_2").append('<input type="number" id="nilai_penguji2" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Seminar" value="'+data[0].nilai2+'" min="0" max="100">');
              }else{
                $("#nilai_2").append('<input type="number" id="nilai_penguji2" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Seminar" min="0" max="100">');
              }
            }
          }else if("<?php echo $this->session->userdata('id');?>" == data[0].penguji3){
            penguji = 3;
            if(data[0].nilai2 == null){
              $("#nilai_penguji2").text("NILAI: BELUM ADA");
            }else{
              $("#nilai_penguji2").text('NILAI : '+data[0].nilai2);
            }
            if(data[0].nilai1 == null){
              $("#nilai_penguji1").text("NILAI: BELUM ADA");
            }else{
              $("#nilai_penguji1").text('NILAI : '+data[0].nilai1);
            }
            $("#nilai_penguji3").remove();
            if("<?php echo date('Y-m-d');?>" < data[0].tglseminar){
              $("#nilai_3").append('<input type="number" id="nilai_penguji3" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Seminar" readonly>');
            }else{
              if(data[0].nilai3 != null){
                $("#nilai_3").append('<input type="number" id="nilai_penguji3" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Seminar" value="'+data[0].nilai3+'" min="0" max="100">');
              }else{
                $("#nilai_3").append('<input type="number" id="nilai_penguji3" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Seminar" min="0" max="100">');
              }
            }
          }

        },error:function(data){
          console.log('tidak dapat mengambil data pengajuan');
        }
      });
    }
    function getPenguji($dosenID,$pengujiNumber){
      $.ajax({
        type : 'GET',
        dataType : 'json',
        url: '<?php echo base_url('users/info_dosen/');?>'+$dosenID,
        success : function(data){
          
          if($pengujiNumber == 1){
            $("#nama_penguji1").text(data.nama);
          }else if($pengujiNumber == 2){
            $("#nama_penguji2").text(data.nama);
          }else if($pengujiNumber == 3){
            $("#nama_penguji3").text(data.nama);
          }
          $ModalDetails.modal();
        },error:function(data){
          console.log('tidak dapat mengambil data dosen');
        }
      })
    }

    function updateNilai($kelompok,$nilai,$id){
      if($nilai < 0){
        Swal.fire(
            'Perhatikan!',
            'Nilai Tidak Boleh Negatif!',
            'warning'
          );
      }else if($nilai > 100){
        Swal.fire(
            'Perhatikan!',
            'Nilai Tidak Boleh Melebihi Batas Maksimum!',
            'warning'
          );
      }else if($nilai=='' || $kelompok =='' || $id == ''){
        Swal.fire(
            'Perhatikan!',
            'Nilai Tidak Boleh Kosong!',
            'warning'
          );
      }else{
        $.ajax({
          type: 'POST',
          url : '<?php echo base_url('proposal/updateProposalNilai/');?>',
          data:{id:$id,kelompok:$kelompok,nilai:$nilai},
          success:function(data){
              Swal.fire(
              'Berhasil!',
              'Nilai Berhasil Ditambahkan!',
              'success'
            );
          },error: function(data){
            Swal.fire(
            'Gagal!',
            'Nilai Gagal Ditambahkan! :(',
            'error'
          );
          }
        });
      }
    }

  });
</script>
</body>
</html>
