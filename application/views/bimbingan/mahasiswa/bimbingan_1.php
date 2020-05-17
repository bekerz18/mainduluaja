

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
            <a href="<?php echo base_url('bimbingan/cetak/1');?>">
              <button type="button" class="btn btn-info">
                <i class="fas fa-print"></i> Cetak
              </button>
            </a>
            <?php if($isdone =="belum"){?>
              <a href="#" class="mulai-bimbingan" data-id="<?php echo uniqid();?>">
              	<button type="button" class="btn btn-primary">Mulai Bimbingan</button>
              </a>
            <?php }?>
            <table id="table-bimbingan" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center">
                  <th>NO</th>
                  <th>BIMBINGAN BAB</th>
                  <th>STATUS</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody id="pengajuan">
                <?php $no = 1; foreach ($bimbingans as $bimbingan):  ?>
                  <tr>
                    <td class="text-center"><?php echo $no++;?></td>
                    <td class="text-center"><?php echo $bimbingan["bab"];?></td>
                    <td class="text-center">
                      <?php if($bimbingan["status"] == "sudah"){
                        echo '<span class="text-success">Sudah diacc</span><br>Pada '.date("l, d F Y H:i:s", strtotime($bimbingan["tgl_acc"]));
                      }elseif($bimbingan["status"] == "belum"){
                        echo 'Sedang dalam bimbingan';
                      };?>
                        
                      </td>
                    <td class="text-center">
                    	<a href="<?php echo base_url('bimbingan/bimbingan/1/').$bimbingan["id_bimbingan"];?>"class="detail-bimbingan text-info" data-id="<?php echo $bimbingan["id_bimbingan"];?>">Detail</a>
                    </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
            </table>
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
   

    $(".mulai-bimbingan").click(function(){
    	let $bimbingan = 1;
    	let $mahasiswa = '<?php echo $this->session->userdata('id');?>';
    	checkBimbingan($bimbingan,$mahasiswa);
    })
   
    $('.select2').select2();

    $('#table-bimbingan').DataTable({ "paging": true, "lengthChange": true, "searching": true, "ordering": true, "info": true, "autoWidth": true, "responsive": true, });
    $("#btn-mulai-bimbingan").click(function(){
    	let $id = $(this).data('id');
    	let $pembimbing = '1';
    	let $bab = $("#bimbingan").val();
      if($bab == "" || $bab =="0"){
        alert('Silahkan pilih')
      }else{
        addBimbingan($id,$pembimbing,$bab);
      }
    	

    });
    function addBimbingan($id, $pembimbing,$bab){

    	$.ajax({
    		type : 'POST',
    		url: '<?php echo base_url('bimbingan/addBimbingan/');?>',
    		data:{id:$id,bab:$bab,pembimbing:$pembimbing},
    		success:function(data){
          location.reload();
    		},error:function(data){
    			alert('Gagal');
    		}
    	})
    }
    function checkBimbingan($bimbingan,$mahasiswa){
    	$datas = '';
    	$.ajax({
    		type: 'GET',
    		url: '<?php echo base_url('bimbingan/checkBimbingan/');?>'+$bimbingan+'/'+$mahasiswa,
    		dataType: 'json',
    		success:function(data){
    			if(data.length == 0){
    				$datas = '<option></option><option value="1">BAB I</option>';
    			}
    			for(var i=0; i < data.length; i++){
            if(data[i].bab == "1" && data[i].status=="belum"){
              $("#btn-mulai-bimbingan").attr("disabled","");
              $datas = '<option value="0">Silahkan Selesaikan BAB I Terlebih Dahulu</option>';
              $("#bimbingan").attr("disabled","");
            }else if(data[i].bab == "1" && data[i].status == "sudah"){
              $datas = '<option></option><option value="2">BAB II</option>'
            }else if(data[i].bab == "2" && data[i].status=="belum"){
              $("#btn-mulai-bimbingan").attr("disabled","");
              $datas = '<option value="0">Silahkan Selesaikan BAB II Terlebih Dahulu</option>';
              $("#bimbingan").attr("disabled","");
            }else if(data[i].bab == "2" && data[i].status == "sudah"){
              $datas =  '<option></option><option value="3">BAB III</option>';
            }else if(data[i].bab == "3" && data[i].status=="belum"){
              $("#btn-mulai-bimbingan").attr("disabled","");
              $datas = '<option value="0">Silahkan Selesaikan BAB III Terlebih Dahulu</option>';
              $("#bimbingan").attr("disabled","")
            }else if(data[i].bab == "3" && data[i].status == "sudah"){
              $datas =  '<option></option><option value="4">BAB IV</option>';
            }else{
              $datas = '<option></option>';
              $("#btn-mulai-bimbingan").attr("disabled","");
              $("#bimbingan").attr("data-placeholder","Selamat!");
              $("#bimbingan").attr("disabled","");
            }
          }

    			$("#bimbingan").html($datas);
    			$("#modal-mulai").modal();

    		}

    	})
    }
  });
</script>
</body>
</html>
