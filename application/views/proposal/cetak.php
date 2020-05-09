<table class="tg">
  <thead>
    <tr>
      <th><strong>NO</strong></th>
      <th><strong>NAMA</strong></th>
      <th><strong>JUDUL</strong></th>
      <th><strong>TERAKHIR DIUBAH</strong></th>
      <th><strong>STATUS</strong></th>
      <th><strong>PENGUJI 1</strong></th>
      <th><strong>PENGUJI 2</strong></th>
      <th><strong>PENGUJI 3</strong></th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($proposals as $proposal):  ?>
    <tr>
      <td class="center"><?php echo $no++;?></td>
      <td class="center"><?php echo $proposal["nama_mahasiswa"].'<br>'.$proposal["nim_mahasiswa"];?></td>
      <td><?php echo $proposal["judul_proposal"];?></td>
      <td class="center"><?php echo date("d-m-Y H:i:s", strtotime($proposal["last_update"]));?></td>
      <td class="center">
        <?php
          if($proposal["status_proposal"] == NULL){
            echo 'Dalam Antrian Proses';
          }elseif($proposal["status_proposal"] == 'ya'){
            echo 'Revisi';
          }else{
            echo 'Seminar Pada<br>'.date("d-m-Y",strtotime($proposal["seminar"]));
          }
        ?>
      </td>
      <td>
        <?php
          if($proposal['status_proposal'] == 'tidak'){
            $dosen = $model->getDosen($proposal['penguji1']);
            echo $dosen['nama'];
          }else{
            echo 'Belum';
          }?>
      </td>
      <td>
        <?php
          if($proposal['status_proposal'] == 'tidak'){
            $dosen = $model->getDosen($proposal['penguji2']);
            echo $dosen['nama'];
          }else{
            echo 'Belum';
          }?>
      </td>
      <td>
        <?php
          if($proposal['status_proposal'] == 'tidak'){
            $dosen = $model->getDosen($proposal['penguji3']);
            echo $dosen['nama'];
          }else{
            echo 'Belum';
          }?>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>