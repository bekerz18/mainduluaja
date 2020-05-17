<table class="tg">
  <thead>
    <tr>
      <th><strong>NO</strong></th>
      <th><strong>BIMBINGAN BAB</strong></th>
      <th><strong>STATUS</strong></th>
    </tr>
  </thead>
  <tbody id="pengajuan">
    <?php $no = 1; foreach ($bimbingans as $bimbingan):  ?>
      <tr>
        <td class="center"><?php echo $no++;?></td>
        <td class="center"><?php echo $bimbingan["bab"];?></td>
        <td class="center">
          <?php if($bimbingan["status"] == "sudah"){
            echo '<span class="text-success">Sudah diacc</span><br>Pada '.date("l, d F Y H:i:s", strtotime($bimbingan["tgl_acc"]));
          }elseif($bimbingan["status"] == "belum"){
            echo 'Sedang dalam bimbingan';
          };?>
        </td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>
