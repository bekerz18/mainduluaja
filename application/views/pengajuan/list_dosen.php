
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
                  <li class="nav-item">
                    <a class="nav-link" id="tab-komprehensif" data-toggle="pill" href="#komprehensif" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Sidang Komprehensif</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="tab-thesis" data-toggle="pill" href="#thesis" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Sidang Thesis</a>
                  </li>
                </ul>
                <div class="tab-content" id="custom-content-above-tabContent">
                  <div class="tab-pane fade active show" id="penilaian" role="tabpanel" aria-labelledby="tab-proposal">
                    <br>
                    <div>
                      <h5 class="text-center text-lg text-bold">DATA PROPOSAL</h5> 
                      <a href="<?php echo base_url('pengajuan/cetak/proposal');?>">
                        <button type="button" class="btn btn-info">
                          <i class="fas fa-print"></i> Cetak
                        </button>
                      </a>
                    </div>
                    <br>
                    <table id="table-pengajuans" class="table table-bordered table-striped">
                      <thead>
                      <tr class="text-center">
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>PRODI</th>
                        <th>JUDUL</th>
                        <th>JADWAL SEMINAR</th>
                        <th>NILAI</th>
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
                            <td><?php if($proposal["nilai"] == NULL){
                              echo 'Belum Ada';
                            }else{
                              echo number_format($proposal["nilai"],2);
                            }
                            ?>
                            </td>
                            <td class="text-center"><a class="detail-pengajuan text-info" href="#" data-id="<?php echo $proposal["id_proposal"];?>">Detail</a></td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="bimbingan" role="tabpanel" aria-labelledby="tab-bimbingan">
                    <br>
                    <div>
                      <h5 class="text-center text-lg text-bold">DATA BIMBINGAN</h5> 
                    <a href="<?php echo base_url('pengajuan/cetak/bimbingan');?>">
                      <button type="button" class="btn btn-info">
                        <i class="fas fa-print"></i> Cetak
                      </button>
                    </a>

                    </div>                   
                    <br>
                    <table id="table-bimbingan" class="table table-bordered table-striped">
                      <thead>
                      <tr class="text-center">
                        <th width="10px">NO</th>
                        <th>NAMA</th>
                        <th>PRODI</th>
                        <th>JUDUL</th>
                        <th>OPSI</th>
                      </tr>
                      <tbody id="data-bimbingans">
                         <?php $no = 1; foreach ($pengajuans as $pengajuan):?>
                          <tr class="text-center">
                            <td><?php echo $no++;?></td>
                            <td><?php echo $pengajuan['nama'].'<br>'.$pengajuan['nim'];?></td>
                            <td><?php echo $pengajuan['nama_prodi'];?></td>
                            <td><?php echo $pengajuan['judul'];?></td>
                            <td><a class="text-info text-md" href="<?php echo base_url('pengajuan/detail/').$pengajuan['id_pengajuan'];?>">
                            Detail</a>
                            
                          </td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="komprehensif" role="tabpanel" aria-labelledby="tab-komprehensif">
                  <br>
                  <div>
                    <h5 class="text-center text-lg text-bold">DATA KOMPREHENSIF</h5> 
                    <a href="<?php echo base_url('pengajuan/cetak/komprehensif');?>">
                      <button type="button" class="btn btn-info">
                        <i class="fas fa-print"></i> Cetak
                      </button>
                    </a>
                  </div>
                    <br>
                  <table id="table-kompre" class="table table-bordered table-striped">
                    <thead>
                      <tr class="text-center">
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>PRODI</th>
                        <th>JUDUL</th>
                        <th>JADWAL SIDANG</th>
                        <th>NILAI</th>
                        <th>OPSI</th>
                      </tr>
                    </thead>
                    <tbody id="data-kompre">
                      <?php $no=0; foreach($kompres as $kompre): $no++?>
                        <tr class="text-center">
                          <td><?php echo $no;?></td>
                          <td><?php echo $kompre['nama_mahasiswa'].'<br>'.$kompre['nim_mahasiswa'];?></td>
                          <td>
                            <?php if($kompre['prodi'] == "adpend"){
                              echo "Administrasi Pendidikan";
                            }elseif($kompre['prodi'] == "manajemen"){
                              echo "Manajemen";
                            }else{
                              echo "Hukum";
                            }
                            ?>
                          </td>
                          <td><?php echo $kompre["judul"];?></td>
                          <td><?php echo date('l, d F Y',strtotime($kompre['tgl_sidang']));?></td>
                          <td><?php if($kompre["nilai"] == NULL){
                            echo 'Belum Ada';
                          }else{
                            echo number_format($kompre["nilai"],2);
                          }
                          ?>
                          </td>
                          
                          <td><a class="details-kompre text-info text-md" data-id="<?php echo $kompre["id_komprehensif"];?>">Detail</a></td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="thesis" role="tabpanel" aria-labelledby="tab-thesis">
                  <br>
                  <div>
                    <h5 class="text-center text-lg text-bold">DATA THESIS</h5> 
                    <a href="<?php echo base_url('pengajuan/cetak/thesis');?>">
                      <button type="button" class="btn btn-info">
                        <i class="fas fa-print"></i> Cetak
                      </button>
                    </a>
                  </div>
                    <br>
                  <table id="table-thesis" class="table table-bordered table-striped">
                    <thead>
                      <tr class="text-center">
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>PRODI</th>
                        <th>JUDUL</th>
                        <th>JADWAL SIDANG</th>
                        <th>NILAI</th>
                        <th>OPSI</th>
                      </tr>
                    </thead>
                    <tbody id="data-thesis">
                      <?php $no=0; foreach($thesisies as $thesis): $no++?>
                        <tr class="text-center">
                          <td><?php echo $no;?></td>
                          <td><?php echo $thesis['nama_mahasiswa'].'<br>'.$thesis['nim_mahasiswa'];?></td>
                          <td>
                            <?php if($thesis['prodi'] == "adpend"){
                              echo "Administrasi Pendidikan";
                            }elseif($thesis['prodi'] == "manajemen"){
                              echo "Manajemen";
                            }else{
                              echo "Hukum";
                            }
                            ?>
                          </td>
                          <td><?php echo $thesis["judul"];?></td>
                          <td><?php echo date('l, d F Y',strtotime($thesis['tgl_sidang']));?></td>
                          <td><?php if($thesis["nilai"] == NULL){
                            echo 'Belum Ada';
                          }else{
                            echo number_format($thesis["nilai"],2);
                          }
                          ?>
                          </td>
                          
                          <td><a class="details-thesis text-info text-md" data-id="<?php echo $thesis["id_thesis"];?>">Detail</a></td>
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
       <!-- Start Modal Details -->
          <div class="modal fade" id="modal-detail-kompre">
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
                  <input type="hidden" name="id_komprehensif" id="id_komprehensif">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="nim_mahasiswa_kompre">NIM MAHASISWA</label>
                          <input type="text" name="nim_mahasiswa_kompre" id="nim_mahasiswa_kompre" class="form-control form-control-md" value="nim"readonly>
                        </div>
                        <div class="form-group">
                          <label for="nama_mahasiswa_kompre">NAMA MAHASISWA</label>
                          <input type="text" name="nama_mahasiswa_kompre" id="nama_mahasiswa_kompre" class="form-control form-control-md" value="nama_mahasiswa_kompre"readonly>
                        </div>
                        <div class="form-group">
                          <label for="prodi_kompre">PRODI</label>
                          <input type="text" name="prodi_kompre" id="prodi_kompre" value="prodi" class="form-control form-control-md" readonly>
                        </div>
                        <div class="form-group">
                          <label for="judul_kompre">JUDUL</label>
                          <input type="text" name="judul_kompre" id="judul_kompre" value="judul_kompre" class="form-control form-control-md"  readonly>
                        </div>
                        <div class="form-group">
                          <label for="tgl_daftar_kompre">TANGGAL DAFTAR</label>
                          <input type="text" name="tgl_daftar_kompre" id="tgl_daftar_kompre" value="tgl_daftar_kompre" class="form-control form-control-md"  readonly>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="tgl_sidang_kompre">TANGGAL SIDANG</label>
                          <input type="text" name="tgl_sidang_kompre" id="tgl_sidang_kompre" class="form-control form-control-md" value="tgl_sidang_kompre">
                        </div>
                        <div class="form-group">
                          <label for="nama_penguji1_kompre">PENGUJI 1</label><br>
                          <span id="nama_penguji1_kompre" class="text-md">nama_penguji1_kompre</span>
                            <div id="nilai_1_kompre"></div>
                            <span id="nilai_penguji1_kompre" class="text-md font-italic">NILAI: </span>
                        </div>
                        <div class="form-group">
                          <label for="nama_penguji2_kompre">PENGUJI 2</label><br>
                          <span id="nama_penguji2_kompre" class="text-md">nama_penguji2_kompre</span>
                            <div id="nilai_2_kompre"></div>
                            <span id="nilai_penguji2_kompre" class="text-md font-italic">NILAI: </span>
                        </div>
                       <div class="form-group">
                          <label for="nama_penguji3_kompre">PENGUJI 3</label><br>
                          <span id="nama_penguji3_kompre" class="text-md">nama_penguji3kompre</span>
                            <div id="nilai_3_kompre"></div>
                            <span id="nilai_penguji3_kompre" class="text-md font-italic">NILAI: </span>
                        </div>

                      </div>
                    </div>
                  <!-- Element End -->  
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="button" id="btn-simpan-kompre" class="btn btn-primary">Simpan</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- End Modal Details -->
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
                  <input type="hidden" name="thesis" id="thesis">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="nim_mahasiswa_thesis">NIM MAHASISWA</label>
                          <input type="text" name="nim_mahasiswa_thesis" id="nim_mahasiswa_thesis" class="form-control form-control-md" value="nim"readonly>
                        </div>
                        <div class="form-group">
                          <label for="nama_mahasiswa_thesis">NAMA MAHASISWA</label>
                          <input type="text" name="nama_mahasiswa_thesis" id="nama_mahasiswa_thesis" class="form-control form-control-md" value="nama_mahasiswa_thesis"readonly>
                        </div>
                        <div class="form-group">
                          <label for="prodi_thesis">PRODI</label>
                          <input type="text" name="prodi_thesis" id="prodi_thesis" value="prodi" class="form-control form-control-md" readonly>
                        </div>
                        <div class="form-group">
                          <label for="judul_thesis">JUDUL</label> <a href="#" target="_blank" id="link_thesis" class="text-info">Klik Untuk Melihat Thesis</a><br>
                          <input type="text" name="judul_thesis" id="judul_thesis" value="judul_thesis" class="form-control form-control-md"  readonly>
                        </div>
                        <div class="form-group">
                          <label for="tgl_daftar_thesis">TANGGAL DAFTAR</label>
                          <input type="text" name="tgl_daftar_thesis" id="tgl_daftar_thesis" value="tgl_daftar_thesis" class="form-control form-control-md"  readonly>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label for="tgl_sidang_thesis">TANGGAL SIDANG</label>
                          <input type="text" name="tgl_sidang_thesis" id="tgl_sidang_thesis" class="form-control form-control-md" value="tgl_sidang_thesis">
                        </div>
                        <div class="form-group">
                          <label for="nama_penguji1_thesis">DOSEN PEMBIMBING</label><br>
                          <span id="nama_penguji1_thesis" class="text-md">nama_penguji1_thesis</span>
                            <div id="nilai_1_thesis"></div>
                            <span id="nilai_penguji1_thesis" class="text-md font-italic">NILAI: </span>
                        </div>
                        <div class="form-group">
                          <label for="nama_penguji2_thesis">PENGUJI 2</label><br>
                          <span id="nama_penguji2_thesis" class="text-md">nama_penguji2_thesis</span>
                            <div id="nilai_2_thesis"></div>
                            <span id="nilai_penguji2_thesis" class="text-md font-italic">NILAI: </span>
                        </div>
                       <div class="form-group">
                          <label for="nama_penguji3_thesis">PENGUJI 3</label><br>
                          <span id="nama_penguji3_thesis" class="text-md">nama_penguji3thesis</span>
                            <div id="nilai_3_thesis"></div>
                            <span id="nilai_penguji3_thesis" class="text-md font-italic">NILAI: </span>
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
    var penguji_kompre ='';
    var $id_proposal = '';
    var $id_kompre ='';
    var $id_thesis='';
    var penguji_thesis='';
    const $ModalDetails = $("#modal-details-pengajuan");
 
    $('.table').DataTable({ "paging": true, "lengthChange": true, "searching": true, "ordering": true, "info": true, "autoWidth": false, "responsive": true});
    $("#data-pengajuans").on("click",".detail-pengajuan",function(){
      let $id = $(this).data('id');
      getProposal($id);
      
    });

    $("#button-ubah-pengajuan").click(function(){
      if(penguji == 1){
        var nilai = $("#nilai_penguji1").val();
        updateNilai(penguji,nilai,$id_proposal,"proposal");
      }else if(penguji == 2){
        var nilai = $("#nilai_penguji2").val();
        updateNilai(penguji,nilai,$id_proposal,"proposal");
      }else if(penguji == 3){
        var nilai = $("#nilai_penguji3").val();
        updateNilai(penguji,nilai,$id_proposal,"proposal");
      }else{
        console.log('maaf, tidak dapat mengambil identitas penguji');
      }
    });
    $("#data-kompre").on("click",".details-kompre",function(){
      let $id = $(this).data("id");
      getKompro($id);

    });
    $("#data-thesis").on("click",".details-thesis",function(){
      let $id = $(this).data("id");
      getThesis($id);

    });

    jQuery("#btn-simpan-kompre").click(function(){
      if(penguji_kompre == 1){
        var nilai = $("#nilai_penguji1_kompre").val();
        updateNilai(penguji_kompre,nilai,$id_kompre,"kompre");
      }else if(penguji_kompre == 2){
        var nilai = $("#nilai_penguji2_kompre").val();
        updateNilai(penguji_kompre,nilai,$id_kompre,"kompre");
      }else if(penguji_kompre == 3){
        var nilai = $("#nilai_penguji3_kompre").val();
        updateNilai(penguji_kompre,nilai,$id_kompre,"kompre");
      }else{
        console.log('maaf, tidak dapat mengambil identitas penguji');
      }
    });
    jQuery("#btn-simpan-thesis").click(function(){
      if(penguji_thesis == 1){
        var nilai = $("#nilai_penguji1_thesis").val();
        updateNilai(penguji_thesis,nilai,$id_thesis,"thesis");
      }else if(penguji_thesis == 2){
        var nilai = $("#nilai_penguji2_thesis").val();
        updateNilai(penguji_thesis,nilai,$id_thesis,"thesis");
      }else if(penguji_thesis == 3){
        var nilai = $("#nilai_penguji3_thesis").val();
        updateNilai(penguji_thesis,nilai,$id_thesis,"thesis");
      }else{
        console.log('maaf, tidak dapat mengambil identitas penguji');
      }
    });
    function getPenguji($dosenID,$pengujiNumber,type){
      $.ajax({
        type : 'GET',
        dataType : 'json',
        url: '<?php echo base_url('users/info_dosen/');?>'+$dosenID,
        success : function(data){
          if(type == "proposal"){
            if($pengujiNumber == 1){
              $("#nama_penguji1").text(data.nama);
            }else if($pengujiNumber == 2){
              $("#nama_penguji2").text(data.nama);
            }else if($pengujiNumber == 3){
              $("#nama_penguji3").text(data.nama);
            }
            $ModalDetails.modal();
          }else if(type == "kompre"){
            if($pengujiNumber == 1){
              $("#nama_penguji1_kompre").text(data.nama);
            }else if($pengujiNumber == 2){
              $("#nama_penguji2_kompre").text(data.nama);
            }else if($pengujiNumber == 3){
              $("#nama_penguji3_kompre").text(data.nama);
            }
            $("#modal-detail-kompre").modal();
          }else if(type == "thesis"){
            if($pengujiNumber == 1){
              $("#nama_penguji1_thesis").text(data.nama);
            }else if($pengujiNumber == 2){
              $("#nama_penguji2_thesis").text(data.nama);
            }else if($pengujiNumber == 3){
              $("#nama_penguji3_thesis").text(data.nama);
            }
            $("#modal-detail-thesis").modal();
          }
          
        },error:function(data){
          console.log('tidak dapat mengambil data dosen');
        }
      })
    }
    
   
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
          getPenguji(data[0].penguji1,1,'proposal');
          getPenguji(data[0].penguji2,2,'proposal');
          getPenguji(data[0].penguji3,3,'proposal');
          if("<?php echo $this->session->userdata('id');?>" == data[0].penguji1){
            penguji = 1;
            $("#nilai_penguji2").text("");
            $("#nilai_penguji3").text("");
           
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

            $("#nilai_penguji1").text("");
            $("#nilai_penguji3").text("");

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

            $("#nilai_penguji1").text("");
            $("#nilai_penguji2").text("");

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
    

    function updateNilai($kelompok,$nilai,$id,type){
      console.log($kelompok+$nilai+$id+type);
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
        if(type=="proposal"){
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
          }else if(type=="kompre"){
            $.ajax({
              type: 'POST',
              url : '<?php echo base_url('komprehensif/updateNilai/');?>',
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
          }else if(type=="thesis"){
            $.ajax({
              type: 'POST',
              url : '<?php echo base_url('thesis/updateNilai/');?>',
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
    }
    // GET KoMPREHENSIF
    function getKompro($kompreID){
      $.ajax({
        type: 'GET',
        url : '<?php echo base_url('komprehensif/getkompre/');?>'+$kompreID,
        dataType :'json',
        success: function(data){

          $id_kompre = data[0].id_komprehensif;
          console.log($id_kompre);

          $("#tgl_sidang_kompre").val(new Date(data[0].tgl_sidang).toLocaleString(['ban', 'id']));
          $("#nim_mahasiswa_kompre").val(data[0].nim_mahasiswa);
          $("#nama_mahasiswa_kompre").val(data[0].nama_mahasiswa);
          $("#judul_kompre").val(data[0].judul);
          if(data[0].prodi == "adpend"){
            $("#prodi_kompre").val("Administrasi Pendidikan");
          }else if(data[0].prodi == "amnajemen"){
            $("#prodi_kompre").val("Manajemen");
          }else if(data[0].prodi == "hukum"){
            $("#prodi_kompre").val("Hukum");
          }
          $("#tgl_daftar_kompre").val(new Date(data[0].tgl_daftar).toLocaleString(['ban', 'id']));
        getPenguji(data[0].id_penguji1,1,'kompre');
        getPenguji(data[0].id_penguji2,2,'kompre');
        getPenguji(data[0].id_penguji3,3,'kompre');
        if("<?php echo $this->session->userdata('id');?>" == data[0].id_penguji1){
            penguji_kompre = 1;
            $("#nilai_penguji2_kompre").text("");
            $("#nilai_penguji3_kompre").text("");

            $("#nilai_penguji1_kompre").remove();

            if("<?php echo date('Y-m-d');?>" < data[0].tglseminar){
              $("#nilai_1_kompre").append('<input type="number" id="nilai_penguji1_kompre" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" readonly>');
            }else{
              if(data[0].nilai1 != null){
                $("#nilai_1_kompre").append('<input type="number" id="nilai_penguji1_kompre" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" value="'+data[0].nilai1+'" min="0" max="100">');
              }else{
                $("#nilai_1_kompre").append('<input type="number" id="nilai_penguji1_kompre" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" min="0" max="100">');
              }
            }
            
          }else if("<?php echo $this->session->userdata('id');?>" == data[0].id_penguji2){
            penguji_kompre = 2;
            $("#nilai_penguji1_kompre").text("");
            $("#nilai_penguji3_kompre").text("");

            $("#nilai_penguji2_kompre").remove();

            if("<?php echo date('Y-m-d');?>" < data[0].tglseminar){
              $("#nilai_2_kompre").append('<input type="number" id="nilai_penguji2_kompre" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" readonly>');
            }else{
              if(data[0].nilai2 != null){
                $("#nilai_2_kompre").append('<input type="number" id="nilai_penguji2_kompre" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" value="'+data[0].nilai2+'" min="0" max="100">');
              }else{
                $("#nilai_2_kompre").append('<input type="number" id="nilai_penguji2_kompre" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" min="0" max="100">');
              }
            }
          }else if("<?php echo $this->session->userdata('id');?>" == data[0].id_penguji3){
            penguji_kompre = 3;
            $("#nilai_penguji1_kompre").text("");
            $("#nilai_penguji2_kompre").text("");

            $("#nilai_penguji3_kompre").remove();

            if("<?php echo date('Y-m-d');?>" < data[0].tglseminar){
              $("#nilai_3_kompre").append('<input type="number" id="nilai_penguji3_kompre" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" readonly>');
            }else{
              if(data[0].nilai3 != null){
                $("#nilai_3_kompre").append('<input type="number" id="nilai_penguji3_kompre" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" value="'+data[0].nilai3+'" min="0" max="100">');
              }else{
                $("#nilai_3_kompre").append('<input type="number" id="nilai_penguji3_kompre" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" min="0" max="100">');
              }
            }
          }

        
        },error:function(data){
          console.log('tidak dapat mengambil data pengajuan');
        }
      });
    }

    // Get Thesis
    function getThesis($thesisID){
      $.ajax({
        type: 'GET',
        url : '<?php echo base_url('thesis/getthesis/');?>'+$thesisID,
        dataType :'json',
        success: function(data){

          $id_thesis = data[0].id_thesis;
        

          $("#tgl_sidang_thesis").val(new Date(data[0].tgl_sidang).toLocaleString(['ban', 'id']));
          $("#nim_mahasiswa_thesis").val(data[0].nim_mahasiswa);
          $("#nama_mahasiswa_thesis").val(data[0].nama_mahasiswa);
          $("#link_thesis").attr("href","<?php echo base_url('uploads/thesis/');?>"+data[0].id_thesis+'.pdf');
          $("#judul_thesis").val(data[0].judul);
          if(data[0].prodi == "adpend"){
            $("#prodi_thesis").val("Administrasi Pendidikan");
          }else if(data[0].prodi == "amnajemen"){
            $("#prodi_thesis").val("Manajemen");
          }else if(data[0].prodi == "hukum"){
            $("#prodi_thesis").val("Hukum");
          }
          $("#tgl_daftar_thesis").val(new Date(data[0].tgl_daftar).toLocaleString(['ban', 'id']));
        getPenguji(data[0].id_penguji1,1,'thesis');
        getPenguji(data[0].id_penguji2,2,'thesis');
        getPenguji(data[0].id_penguji3,3,'thesis');
        if("<?php echo $this->session->userdata('id');?>" == data[0].id_penguji1){
            penguji_thesis = 1;
            $("#nilai_penguji2_thesis").text("");
            $("#nilai_penguji3_thesis").text("");

            $("#nilai_penguji1_thesis").remove();
            
            if("<?php echo date('Y-m-d');?>" < data[0].tglseminar){
              $("#nilai_1_thesis").append('<input type="number" id="nilai_penguji1_thesis" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" readonly>');
            }else{
              if(data[0].nilai1 != null){
                $("#nilai_1_thesis").append('<input type="number" id="nilai_penguji1_thesis" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" value="'+data[0].nilai1+'" min="0" max="100">');
              }else{
                $("#nilai_1_thesis").append('<input type="number" id="nilai_penguji1_thesis" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" min="0" max="100">');
              }
            }
            
          }else if("<?php echo $this->session->userdata('id');?>" == data[0].id_penguji2){
            penguji_thesis = 2;
            $("#nilai_penguji1_thesis").text("");
            $("#nilai_penguji3_thesis").text("");

            $("#nilai_penguji2_thesis").remove();
            
            if("<?php echo date('Y-m-d');?>" < data[0].tglseminar){
              $("#nilai_2_thesis").append('<input type="number" id="nilai_penguji2_thesis" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" readonly>');
            }else{
              if(data[0].nilai2 != null){
                $("#nilai_2_thesis").append('<input type="number" id="nilai_penguji2_thesis" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" value="'+data[0].nilai2+'" min="0" max="100">');
              }else{
                $("#nilai_2_thesis").append('<input type="number" id="nilai_penguji2_thesis" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" min="0" max="100">');
              }
            }
          }else if("<?php echo $this->session->userdata('id');?>" == data[0].id_penguji3){
            penguji_thesis = 3;
            $("#nilai_penguji1_thesis").text("");
            $("#nilai_penguji2_thesis").text("");

            $("#nilai_penguji3_thesis").remove();
            
            if("<?php echo date('Y-m-d');?>" < data[0].tglseminar){
              $("#nilai_3_thesis").append('<input type="number" id="nilai_penguji3_thesis" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" readonly>');
            }else{
              if(data[0].nilai3 != null){
                $("#nilai_3_thesis").append('<input type="number" id="nilai_penguji3_thesis" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" value="'+data[0].nilai3+'" min="0" max="100">');
              }else{
                $("#nilai_3_thesis").append('<input type="number" id="nilai_penguji3_thesis" class="form-control form-control-lg" placeholder="Silahkan Isi Nilai Hasil Sidang" min="0" max="100">');
              }
            }
          }

        
        },error:function(data){
          console.log('tidak dapat mengambil data pengajuan');
        }
      });
    }

  });

</script>
</body>
</html>
