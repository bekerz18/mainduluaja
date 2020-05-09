<table class="tg">
  <thead>
    <tr>
      <th><strong>NO</strong></th>
      <th><strong>NAMA</strong></th>
      <th><strong>PRODI</strong></th>
      <th><strong>JUDUL</strong></th>
      <th><strong>JADWAL SEMINAR</strong></th>
      <th><strong>PENGUJI 1</strong></th>
      <th><strong>PENGUJI 2</strong></th>
      <th><strong>PENGUJI 3</strong></th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($proposals as $proposal):?>
    <tr>
      <td class="center"><?php echo $no++;?></td>
      <td class="center"><?php echo $proposal['nama_mahasiswa'].'<br>'.$proposal['nim_mahasiswa'];?></td>
      <td class="center"><?php echo $proposal['prodi'];?></td>
      <td><?php echo $proposal['judul'];?></td>
      <td><?php echo date('l, d F Y',strtotime($proposal['tgl_seminar']));?></td>
       <td>
        <?php
          $penguji1= $model->searchDosenBy($proposal['id_penguji1']);
          echo $penguji1['nama'].'<br><span class="center">';
          if($proposal['nilai_1'] == NULL){
            echo 'Belum Ada';
          }else{
            echo $proposal['nilai_1'];
          }
          echo '</span>';
        ?>
      </td>
      <td>
        <?php
          $penguji2= $model->searchDosenBy($proposal['id_penguji2']);
          echo $penguji2['nama'].'<br><span class="center">';
          if($proposal['nilai_2'] == NULL){
            echo 'Belum Ada';
          }else{
            echo $proposal['nilai_2'];
          }
          echo '</span>';
        ?>
      </td>
      <td>
        <?php
          $penguji3= $model->searchDosenBy($proposal['id_penguji3']);
          echo $penguji3['nama'].'<br><span class="center">';
          if($proposal['nilai_3'] == NULL){
            echo 'Belum Ada';
          }else{
            echo $proposal['nilai_3'];
          }
          echo '</span>';
        ?>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
