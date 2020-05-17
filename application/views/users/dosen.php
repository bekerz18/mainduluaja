
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Users</a></li>
              <li class="breadcrumb-item active">Daftar Dosen</li>
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
                <h3 class="card-title">Daftar Dosen</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if($this->session->userdata('success')) {?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Berhasil menghapus data.
                    </div>
                  <?php }elseif($this->session->userdata('failed')){?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Gagal menghapus data.
                    </div>
                  <?php }?>
                  <?php if($this->session->flashdata('success_add')){?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Berhasil menambahkan data.
                    </div>
                  <?php }elseif($this->session->flashdata('failed_add')){?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                      Gagal menambah data.
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

                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-tambah">
                  Tambah Dosen
                </button>
                <a href="<?php echo base_url('users/dosen/cetak');?>" >
                  <button type="button" class="btn btn-info">
                    <i class="fas fa-print"></i> Cetak
                  </button>
                </a>
                <table id="data-pengajuan" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NIK/NIDN</th>
                    <th>PROGRAM STUDI</th>
                    <th>OPSI</th>
                  </tr>
                  <tbody id="table-dosen">
                    <?php $no = 1; foreach ($users as $user) :?>
                      <tr>
                        <td class="text-center"><?php echo $no++;?></td>
                        <td><?php echo $user->nama;?></td>
                        <td><?php echo $user->username;?></td>
                        <td>
                          <?php
                            $prodis = $model->get_prodi_dosen($user->id);
                            foreach($prodis as $prodi) echo $prodi->nama_prodi.' , ';
                          ?>
                        </td>
                        <td class="text-center"><a class="add-prodi text-warning" data-nama="<?php echo $user->nama;?>" data-id="<?php echo $user->id;?>">Prodi</a> <a class="ubah-user text-info" data-id="<?php echo $user->id;?>">Ubah</a> <a class="text-danger" href="<?php echo base_url('users/hapus/dosen/').$user->id;?>">Hapus</a></td>
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>

              </div>
              
            <div class="modal fade" id="modal-ubah">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Ubah Dosen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden"id="idubah" value="">
                    <div class="form-group">
                      <label for="nama-ubah">Nama Lengkap :</label>
                      <input type="text" class="form-control form-control-lg" id="nama-ubah" placeholder="Silahkan isi dengan nama" required>
                    </div>
                    <div class="form-group">
                      <label for="nik-ubah">NIK/NIDN :</label>
                      <input type="text" class="form-control form-control-lg" id="nik-ubah" placeholder="Silahkan isi nik" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="password">Password :</label>
                      <input type="password" class="form-control form-control-lg" id="password" placeholder="Silahkan isi password" required>
                    </div>
                    <div class="form-group">
                      <label for="gender-ubah">Jenis Kelamin :</label>
                      <select id="gender-ubah" class="form-control form-control-lg" data-placeholder="Silahkan Pilih">
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" id="ubah-user" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="modal-tambah">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Dosen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="nama">Nama Lengkap :</label>
                      <input type="text" class="form-control form-control-lg" name="nama" id="nama" placeholder="Silahkan isi dengan nama" required>
                    </div>
                    <div class="form-group">
                      <label for="nik">NIK :</label>
                      <input type="text" class="form-control form-control-lg" name="nik" id="nik" placeholder="Silahkan isi NIK/NIDN" required>
                    </div>
                    <div class="form-group">
                      <label for="gender">Jenis Kelamin :</label>
                      <select id="gender" class="form-control form-control-lg" data-placeholder="Silahkan Pilih">
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" id="tambah-user" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="modal-prodi">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah ke Prodi</h4>
                    <button type="button" class="closed-modal close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden"id="nmdosenprodi" value="">
                    <input type="hidden"id="iddosenprodi" value="">
                    <div class="form-group">
                      <label for="nmdosen-prodi">Nama Lengkap :</label>
                      <input type="text" class="form-control form-control-lg" id="nmdosen-prodi" readonly>
                    </div>
                    <div class="form-group">
                      <label for="prodi">Prodi</label>
                      <select id="daftarprodi" class="form-control form-control-lg">
                        <option value="0">Silahkan Pilih</option>
                        <option value="1">Administrasi Pendidikan</option>
                        <option value="2">Manajemen</option>
                        <option value="3">Hukum</option>
                      </select>
                    </div>
                    <table id="data-prodi" class="table table-bordered table-striped">
                      <thead>
                        <tr class="text-center">
                          <th>PROGRAM STUDI</th>
                          <th>OPSI</th>
                        </tr>
                      </thead>
                      <tbody id="list-prodi">
                        
                      </tbody>
                    </table>
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="closed-modal btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" id="tambah-dosen-prodi" class="btn btn-primary">Tambah</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
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
<!-- Toastr -->
<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js');?>"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<script>
  $(function () {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $("#table-dosen").on("click",".add-prodi",function(){
      var id = $(this).data("id");

      get_dosprd(id);
    });
    $(".closed-modal").click(function(){
      location.reload();
    });
    $("#ubah-user").click(function(){
      var id = $("#nik-ubah").val();
      var gender = $("#gender-ubah").val();
      var nama = $("#nama-ubah").val();
      var password = $("#password").val();

      if(nama == '' || password== '' ){
        Swal.fire(
              'Hei!',
              'Silahkan lengkapi terlebih dahulu',
              'warning'
            )
      }else{
        $.ajax({
          type: 'POST',
          url : '<?php echo base_url('users/update_dosen/');?>'+id,
          data : {nama:nama,gender:gender,password:password},
          success: function(data){
              $("#nik-ubah").val('');
              $("#nama-ubah").val('');
              $("#password").val('');
              $("#modal-ubah").modal('hide');
              location.reload();
            },error: function(data){
              Swal.fire(
                'Gagal',
                'Gagal mengubah admin :(',
                'error'
              );
            }
        });
      }
    });

    $('#data-pengajuan').DataTable({ "paging": true, "lengthChange": true, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });
    function get_dosprd(id){
      $("#iddosenprodi").val(id);
      var datas='';
      $.ajax({
        type : 'GET',
        url : '<?php echo base_url('users/dosenAtprodi/');?>'+id,
        success:function(data){
          if(data.length > 0){
          var prodis = JSON.parse(data);
            $.each(prodis, function() {

              
              datas += '<tr><td>'+this.nama_prodi+'</td><td><a class="hapus-prod text-danger" data-prodid="'+this.id_prodi_detail+'" data-dosen="'+this.id_dosen+'">Hapus</a></td></tr>';
              $("#nmdosen-prodi").val(this.nama_dosen);
            });
          }else{
            datas='<tr><td colspan="2">Belum ada data</td></tr>';
          }
           $("#list-prodi").html(datas);
        },error:function(data){

        }
      });
      
      $("#modal-prodi").modal();
    }

    $("#table-dosen").on("click",".ubah-user", function(){
      var id = $(this).data('id');
      $("#idubah").val(id);
      getuser(id);
     

    });
   
      
    
    function getuser(id){
      $.ajax({
        type : 'GET',
        dataType : 'json',
        url: '<?php echo base_url('users/info_dosen/');?>'+id,
        success : function(data){
          $("#nama-ubah").val(data.nama);
          $("#nik-ubah").val(data.username);
          if(data.gender=="Pria"){
            $("#gender-ubah").html('<option value="Pria" selected>Pria</option><option value="Wanita">Wanita</option>');
          }else{
            $("#gender-ubah").html('<option value="Pria">Pria</option><option value="Wanita" selected>Wanita</option>');
          }
          
          
          $("#modal-ubah").modal();
        },error:function(data){
          Swal.fire(
              'Gagal',
              'Gagal mengambil data :(',
              'error'
            )
        }
      })
    }
    const $btnTambah = $("#tambah-user");

    $btnTambah.click(function(){
      var nik = $("#nik").val();
      var nama = $("#nama").val();
      var gender = $("#gender").val();
      if(nik == '' || nama == ''){
        Swal.fire(
              'Hei!',
              'Silahkan lengkapi terlebih dahulu',
              'warning'
            )
      }else{
        $.ajax({

          type: 'POST',
          url: '<?php echo base_url('users/insert_dosen');?>',
          data: {nik:nik,nama:nama,gender:gender},
          success: function(data){
            $("#nik").val('');
            $("#nama").val('');
            location.reload();
          },error: function(data){
            Swal.fire(
              'Gagal',
              'Gagal menambahkan dosen :(',
              'error'
            )
          }
        });
      }

    });

    $("#tambah-dosen-prodi").click(function(){
      var dosen = $("#iddosenprodi").val();
      var prodi = $("#daftarprodi").val();
      tambah_prodi(dosen,prodi);


    });

    function tambah_prodi(dosen,prodi){

      
      if(prodi == "0"){
        console.log('silahkan pilih');
      }else{
        if(check_prodi(prodi,dosen) === true){
          console.log('sudah ada');
        }else{
          insert_prd(prodi,dosen);
        }
      }
    }
    function insert_prd(prodi,dosen){

      $.ajax({
        type : 'POST',
        url : '<?php echo base_url('users/insert_prod_detail/');?>',
        data : {prodi:prodi,dosen:dosen},
        success:function(data){
          Swal.fire(
              'Berhasil!',
              'Data berhasil ditambahkan',
              'success'
            );
          get_dosprd(dosen);
        },error: function(data){
            Swal.fire(
              'Gagal',
              'Gagal menambahkan dosen :(',
              'error'
            )
          }
      });
    }
    function check_prodi(prodi,dosen){
      
      $.ajax({
        type : 'GET',
        url : '<?php echo base_url('users/check_dosprod/');?>'+dosen+'/'+prodi,
        dataType: 'json',
        success:function(data){
          if(data.length > 0){
            console.log('ada');
            return true;
          }
         
        
        },error:function(data){
          alert('tidak bisa mengcek :(, silahkan reload');
        }
      });

      
    }

    $("#data-prodi").on("click",".hapus-prod",function(){
      var id = $(this).data('prodid');
      var dosen =$(this).data('dosen');
      $.ajax({
        type : 'post',
        url : '<?php echo base_url('users/delete_prod_detail');?>',
        data:{id:id},
        success:function(data){
          Swal.fire(
              'Berhasil!',
              'Data berhasil dihapus',
              'success'
            );
          get_dosprd(dosen);
        },error: function(data){
            Swal.fire(
              'Gagal',
              'Gagal menghapus :(',
              'error'
            )
          }
      })
    });


  });
</script>
</body>
</html>
