

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Thesis</a></li>
              <li class="breadcrumb-item active"><?php echo $title;?></li>
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
            <h3 class="card-title"><?php echo $title;?></h3>
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
            <table id="table-data" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th>NO</th>
                  <th>NAMA</th>
                  <th>PRODI</th>
                  <th>JUDUL</th>
                  <th>STATUS</th>
                  <th>DAFTAR</th>
                  <th>NILAI</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody id="data-thesis">
                <?php $no = 0; foreach($datas as $data): $no++?>
                <tr class="text-center">
                  <td><?php echo $no;?></td>
                  <td><?php echo $data["nama_mahasiswa"].'<br>'.$data["nim_mahasiswa"];?></td>
                  <td>
                    <?php
                      if($data["prodi"] == "adpend"){
                        echo "Administrasi Pendidikan";
                      }elseif($data["prodi"] == "manajemen"){
                        echo "Manajemen";
                      }else{
                        echo "Hukum";
                      }
                      ?>
                  </td>
                  <td><?php echo $data["judul"];?></td>
                  <td class="text-center">
                    <?php 
                    if($data["status_thesis"] == "tidak"){
                      echo "Belum Terdaftar";
                    }else{
                      echo "Terdaftar"."<br>".date("l, d F Y H:i:s",strtotime($data["tgl_terima"]));
                    }?>
                  </td>
                  <td>
                    <?php echo date("l, d F Y H:i:s",strtotime($data["tgl_daftar"]));?>
                  </td>
                  <td class="text-center"><?php if($data["nilai"] == NULL){
                    echo 'Belum Ada';
                  }else{
                    echo number_format($data["nilai"],2).'<br>';
                    if(number_format($data['nilai'],2) >= 86 && number_format($data['nilai'],2) <= 100){
                      echo "A";
                    }else if(number_format($data['nilai'],2) >= 76 && number_format($data['nilai'],2) < 86){
                      echo "B";
                    }else if(number_format($data['nilai'],2) >= 66 && number_format($data['nilai'],2) < 76){
                      echo "C";
                    }else if(number_format($data['nilai'],2) >= 56 && number_format($data['nilai'],2) < 66){
                      echo "D";
                    }else if(number_format($data['nilai'],2) <= 55){
                      echo "E";
                    }
                  }
                  ?>
                </td>
                  <td class="text-center"><a class="details-thesis text-info text-md" data-id="<?php echo $data["id_thesis"];?>">Detail</a>   <a class="text-danger text-md" href="<?php echo base_url('thesis/delete/').$data["id_thesis"];?>">Hapus</a></td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
        <!-- /.content -->
        <!-- Start Modal Details -->
          <div class="modal fade" id="modal-detail-thesis">
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
                  <input type="hidden" name="id_thesis" id="id_thesis">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="mahasiswa">NIM MAHASISWA</label>
                          <input type="text" name="nim_mahasiswa" id="nim_mahasiswa" class="form-control form-control-md" value="nim"readonly>
                        </div>
                        <div class="form-group">
                          <label for="nama_mahasiswa">NAMA MAHASISWA</label>
                          <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control form-control-md" value="nama_mahasiswa"readonly>
                        </div>
                        <div class="form-group">
                          <label for="prodi">PRODI</label>
                          <input type="text" name="prodi" id="prodi" value="prodi" class="form-control form-control-md" readonly>
                        </div>
                        <div class="form-group">
                          <label for="judul">JUDUL</label>  <a id="link_thesis" href="#" alt="Klik Untuk Melihat Thesis" class="text-md" title="Klik Untuk Melihat Thesis" target="_blank">Klik Untuk Melihat Thesis</a>
                          <input type="text" name="judul" id="judul" value="judul" class="form-control form-control-md"  readonly>
                        </div>
                        <div class="form-group">
                          <label for="tgl_daftar">TANGGAL DAFTAR</label>
                          <input type="text" name="tgl_daftar" id="tgl_daftar" value="tgl_daftar" class="form-control form-control-md"  readonly>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="tgl_sidang">TANGGAL SIDANG</label>
                          <input type="date" name="tgl_sidang" id="tgl_sidang" class="form-control form-control-md" min='<?php echo date('Y-m-d');?>'>
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
                  <button type="button" id="btn-simpan-thesis" class="btn btn-primary">Simpan</button>
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
              <?php echo form_open('thesis/cetak');?>
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
<!-- Select2 -->
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js');?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js');?>"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>
<script>
  jQuery(function(){
    jQuery("#table-data").DataTable({ "paging": true, "lengthChange": true, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });

    jQuery("#data-thesis").on("click",".details-thesis",function(){
      let $id = $(this).data("id");
      jQuery("#id_thesis").val($id);
      getThesis($id);
    });

    jQuery("#btn-simpan-thesis").click(function(){
      validasi();
    });
    function validasi(){
      let $id = jQuery("#id_thesis").val();
      let $tanggal = jQuery("#tgl_sidang").val();
      let $penguji1 = jQuery("#penguji1").val();
      let $penguji2 = jQuery("#penguji2").val();
      let $penguji3 = jQuery("#penguji3").val();
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
        updateThesis($id,$tanggal,$penguji1,$penguji2,$penguji3,$nilai_tampil);
      }
    }
    function getThesis($thesisID){
      jQuery.ajax({
        type: 'GET',
        url : '<?php echo base_url('Thesis/getThesis/');?>'+$thesisID,
        dataType :'json',
        success: function(data){
          if(data[0].nilai_tampil == 'ya'){
            $("#nilai_tampil_ya"). prop("checked", true);
          }else{
            $("#nilai_tampil_tidak"). prop("checked", true);
          }
          if(data[0].status_thesis == "ya"){
            
            jQuery("#elacc").remove();
            jQuery("#acc").append('<div id="elacc"><label for="tglacc">Tanggal ACC Sidang</label><br><strong id="tglacc"></strong></div>');
            jQuery("#tglacc").text(new Date(data[0].tgl_terima).toLocaleString(['ban', 'id']));
            getPenguji(data[0].prodi,data[0].id_penguji1,data[0].id_penguji2,data[0].id_penguji3);
          }else{
            getPenguji(data[0].prodi,'no');
          }
          let nilai1 = data[0].nilai1;
          let nilai2 = data[0].nilai2;
          let nilai3 = data[0].nilai3;
          jQuery("#link_thesis").attr("href","<?php echo base_url('uploads/thesis/');?>"+data[0].id_thesis+".pdf");
          jQuery("#tgl_sidang").val(data[0].tgl_sidang);
          jQuery("#nim_mahasiswa").val(data[0].nim_mahasiswa);
          jQuery("#nama_mahasiswa").val(data[0].nama_mahasiswa);
          jQuery("#judul").val(data[0].judul);
          if(data[0].prodi == "adpend"){
            jQuery("#prodi").val("Administrasi Pendidikan");
          }else if(data[0].prodi == "manajemen"){
            jQuery("#prodi").val("Manajemen");
          }else if(data[0].prodi == "hukum"){
            jQuery("#prodi").val("Hukum");
          }
          jQuery("#tgl_daftar").val(new Date(data[0].tgl_daftar).toLocaleString(['ban', 'id']));
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
          jQuery("#modal-detail-thesis").modal();
          
        },error: function(data){
          alert('tidak bisa mengambil data');
        }
      });
    }
    function getPenguji($prodi,penguji1,penguji2,penguji3){
      
      var datas='';
      var datas1='';
      $.ajax({
        type: 'GET',
        url: '<?php echo base_url('proposal/jsonpenguji/');?>'+$prodi,
        dataType: 'json',
        success: function(data){
          if(penguji1 == 'no'){
            for(var i=0; i < 10; i++){
              datas1 += '<option value="'+data[i].id_dosen+'">'+data[i].nama+'</option>';
            }
            $("#penguji1").html('<option></option>'+datas1);
          }else{
            var dosen1='';
            for(var i=0; i < 10; i++){
              if(data[i].id_dosen == penguji1){
                dosens1 += '<option value="'+data[i].id_dosen+'" selected>'+data[i].nama+'</option>';
              }else{
                dosens1 += '<option value="'+data[i].id_dosen+'">'+data[i].nama+'</option>';
              }
            }
            $("#penguji1").html('<option></option>'+dosens1);
          }


          if(penguji1 == 'no'){
            for(var i=0; i < data.length; i++){
              datas += '<option value="'+data[i].id_dosen+'">'+data[i].nama+'</option>'
            }
            
            $("#penguji2").html('<option></option>'+datas);
            $("#penguji3").html('<option></option>'+datas);
          }else{
            var dosens1='';
            var dosens2='';
            var dosens3='';
            for(var i=0; i < data.length; i++){
              
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
           
            $("#penguji2").html('<option></option>'+dosens2);
            $("#penguji3").html('<option></option>'+dosens3);
          }
        }
      });
    }
    function updateThesis(id,tanggal,penguji1,penguji2,penguji3,nilai_tampil){
      $.ajax({
        type: 'POST',
        url : '<?php echo base_url('Thesis/updateThesis/');?>',
        data: {tanggal:tanggal,penguji1:penguji1,penguji2:penguji2,penguji3:penguji3,nilai_tampil},
        success:function(data){
          Swal.fire(
          'Berhasil!',
          'Berhasil menambahkan jadwal sidang thesis!',
          'success'
          );
          getThesis(id);
          getAll()
        },error:function(data){
          Swal.fire(
          'Gagal',
          'Mohon maaf, kami tidak bisa membuat jadwal thesis :(',
          'error'
          );
        }
      });
    }
    function getAll(){
      var datas='';
      $.ajax({
        type: 'GET',
        url:'<?php echo base_url('thesis/index/json');?>',
        dataType:'json',
        success:function(data){
          var nilai ='';
          for(var i=0; i<data.length;i++){
            var terima = new Date(data[0].tgl_terima).toLocaleString(['ban', 'id']); 
            var status='';
            var tgl_daftar=new Date(data[0].tgl_daftar).toLocaleString(['ban', 'id']);
            if(data[i].status_Thesis == 'tidak'){
              status = 'Belum Terdaftar';
            }else if(data[i].status_thesis == 'ya'){
              status = 'Terdaftar<br>'+terima;
            }
            if(data[i].prodi == "adpend"){
              prodi = "Administrasi Pendidikan";
            }else if(data[i].prodi == "manajemen"){
               prodi = "Manajemen";
            }else if(data[i].prodi == "hukum"){
              prodi = "Hukum";
            }
            if(data[i].nilai == null){
              nilai = 'Belum Ada';
            }else{
              nilai = data[i].nilai.toFixed(2);
            }
            datas+= '<tr class="text-center"><td>'+(i+1)+'</td><td>'+data[i].nama_mahasiswa+'<br>'+data[i].nim_mahasiswa+'</td><td>'+prodi+'</td><td>'+data[i].judul+'</td><td>'+status+'</td><td>'+tgl_daftar+'</td><td>'+nilai+'</td><td><a class="text-info details-thesis" data-id="'+data[i].id_thesis+'" href="#">Detail</a>   <a class="text-danger text-md" href="<?php echo base_url('thesis/delete/')?>'+data[i].id_thesis+'">Hapus</a></td></tr>';
          }
          jQuery("#table-data").dataTable().fnClearTable();
          jQuery("#table-data").dataTable().fnDestroy();
          jQuery("#data-thesis").html(datas);
          jQuery("#table-data").DataTable({ "paging": true, "lengthChange": true, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });
        },error:function(data){
          console.log('gagal mengambil data');
        }
      });
    }
    jQuery(".select2").select2();
    jQuery('#reservation').daterangepicker();
    jQuery("#btn-cta-cetak").click(function(){
      jQuery("#modal-cetak").modal();
    });
  });
</script>
</body>
</html>
