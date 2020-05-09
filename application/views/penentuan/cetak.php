<table class="tg">
  <thead>
    <tr>
      <th><strong>NO</strong></th>
      <th><strong>NAMA</strong></th>
      <th><strong>PRODI</strong></th>
      <th><strong>JUDUL</strong></th>
      <th><strong>PEMBIMBING 1</strong></th>
      <th><strong>PEMBIMBING 2</strong></th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($pengajuans as $pengajuan):  ?>
    <tr>
      <td class="center"><?php echo $no++;?></td>
      <td class="center"><?php echo $pengajuan["nama"].'<br>'.$pengajuan["nim"];?></td>
      <td class="center"><?php echo $pengajuan["judul"];?></td>
      <td class="center"><?php echo $pengajuan["nama_prodi"];?></td>
      <td><?php if($pengajuan['pembimbing1'] == ''){echo 'Belum Ada';}else{ echo $pengajuan['pembimbing1'];}?></td>
      <td><?php if($pengajuan['pembimbing2'] == ''){echo 'Belum Ada';}else{ echo $pengajuan['pembimbing2'];}?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>