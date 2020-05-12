<table class="tg">
  <thead>
    <tr>
      <th><strong>NO</strong></th>
      <th><strong>NAMA</strong></th>
      <th><strong>PRODI</strong></th>
      <th><strong>JUDUL</strong></th>
      <th><strong>JADWAL SIDANG</strong></th>
      <th><strong>PENGUJI 1</strong></th>
      <th><strong>PENGUJI 2</strong></th>
      <th><strong>PENGUJI 3</strong></th>
      <th><strong>NILAI</strong></th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($thesisies as $thesis):?>
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
        <td>
        <?php
          $penguji1= $model->searchDosenBy($thesis['id_penguji1']);
          echo $penguji1['nama'].'<br><span class="center">';
          if($thesis['nilai_1'] == NULL){
            echo 'Belum Ada';
          }else{
            echo $thesis['nilai_1'];
          }
          echo '</span>';
        ?>
      </td>
      <td>
        <?php
          $penguji2= $model->searchDosenBy($thesis['id_penguji2']);
          echo $penguji2['nama'].'<br><span class="center">';
          if($thesis['nilai_2'] == NULL){
            echo 'Belum Ada';
          }else{
            echo $thesis['nilai_1'];
          }
          echo '</span>';
        ?>
      </td>
      <td>
        <?php
          $penguji3= $model->searchDosenBy($thesis['id_penguji3']);
          echo $penguji3['nama'].'<br><span class="center">';
          if($thesis['nilai_3'] == NULL){
            echo 'Belum Ada';
          }else{
            echo $thesis['nilai_3'];
          }
          echo '</span>';
        ?>
      </td>
      <td><?php if($thesis["nilai"] == NULL){
                            echo 'Belum Ada';
                          }else{
                            echo number_format($thesis["nilai"],2);
                          }
                          ?>
                          </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>