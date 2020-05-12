<table class="tg">
  <thead>
    <tr>
      <th><strong>NO</strong></th>
      <th><strong>NAMA</strong></th>
      <th><strong>PRODI</strong></th>
      <th><strong>JUDUL</strong></th>
      <th><strong>STATUS</strong></th>
      <th><strong>DAFTAR</strong></th>
      <th><strong>PENGUJI 1</strong></th>
      <th><strong>PENGUJI 2</strong></th>
      <th><strong>PENGUJI 3</strong></th>
      <th><strong>TANGGAL SIDANG</strong></th>
      <th><strong>NILAI</strong></th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($thesis as $data):  ?>
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
          <td>
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
             <td>
            <?php 
              $dosen = $model->cariDosen($data['id_penguji1']);
              echo $dosen['nama'];
              ?>
          </td>
          <td>
            <?php 
              $dosen2 = $model->cariDosen($data['id_penguji2']);
              echo $dosen2['nama'];
              ?>
          </td>
          <td>
            <?php 
              $dosen3 = $model->cariDosen($data['id_penguji3']);
              echo $dosen3['nama'];
              ?>
            </td>
            <td>
            <?php echo date("l, d F Y",strtotime($data["tgl_sidang"]));?>
              
            </td>
            <td><?php if($data["nilai"] == NULL){
                    echo 'Belum Ada';
                  }else{
                    echo number_format($data["nilai"],2);
                  }
                  ?>
                </td>
             </tr>
    <?php endforeach;?>
  </tbody>
</table>