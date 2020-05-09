
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">Penentuan Pembimbing</a></li>
              <li class="breadcrumb-item active">Pembimbing Manajemen</li>
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
                <h3 class="card-title">Data Pembimbing</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="<?php echo base_url('manajemen/cetak');?>">
                  <button type="button" class="btn btn-info">
                    <i class="fas fa-print"></i> Cetak
                  </button>
                </a>
                <table id="data-pembimbing" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>NO</th>
                    <th>NAMA DOSEN</th>
                    <th>NILAI PREFERENSI</th>
                    <th>PENENTUAN</th>
                  </tr>
                  </thead>
                  <tbody id="pembimbing-manajemen">
                    
                  </tbody>
                </table>

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

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<script>
  $(function () {
    const $PembAdmin = $("#pembimbing-manajemen");
    var $datas = '';
    var $status = '';
    $.ajax({
      type : 'GET',
      url : '<?php echo base_url('/manajemen/all');?>',
      dataType : 'json',
      success:function(data){
        for(var i = 0; i < data.length; i++){
          if(i < 10){
            $status = "Dosen Pembimbing";
          }else{
            $status = "Bukan Dosen Pembimbing";
          }
          $datas += '<tr><td class="text-center">'+(i+1)+'</td><td>'+data[i].nama_dosen+'</td><td class="text-center">'+data[i].nilai+'</td><td>'+$status+'</td></tr>';
        }
        
        $("#data-pembimbing").dataTable().fnClearTable();
        $("#data-pembimbing").dataTable().fnDestroy();
        $PembAdmin.html($datas);
        $('#data-pembimbing').DataTable({ "paging": true, "lengthChange": false, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true, });
      },error : function(data){
        alert('Gagal mengambil data');
      }
    })

    

  });
</script>
</body>
</html>
