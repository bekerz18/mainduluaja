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
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($kompres as $kompre):?>
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
        <td>
        <?php
          $penguji1= $model->searchDosenBy($kompre['id_penguji1']);
          echo $penguji1['nama'].'<br><span class="center">';
          if($kompre['nilai_1'] == NULL){
            echo 'Belum Ada';
          }else{
            echo $kompre['nilai_1'];
          }
          echo '</span>';
        ?>
      </td>
      <td>
        <?php
          $penguji2= $model->searchDosenBy($kompre['id_penguji2']);
          echo $penguji2['nama'].'<br><span class="center">';
          if($kompre['nilai_2'] == NULL){
            echo 'Belum Ada';
          }else{
            echo $kompre['nilai_1'];
          }
          echo '</span>';
        ?>
      </td>
      <td>
        <?php
          $penguji3= $model->searchDosenBy($kompre['id_penguji3']);
          echo $penguji3['nama'].'<br><span class="center">';
          if($kompre['nilai_3'] == NULL){
            echo 'Belum Ada';
          }else{
            echo $kompre['nilai_3'];
          }
          echo '</span>';
        ?>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>