<table class="tg">
  <thead>
    <tr>
      <th><strong>NO</strong></th>
      <th><strong>NAMA</strong></th>
      <th><strong>NIM</strong></th>
      <th><strong>PRODI</strong></th>
      <th><strong>JUDUL</strong></th>
      <th><strong>LATAR BELAKANG</strong></th>
      <th><strong>TUJUAN</strong></th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($pengajuans as $pengajuan):?>
    <tr>
      <td class="center"><?php echo $no++;?></td>
      <td><?php echo $pengajuan['nama'];?></td>
      <td><?php echo $pengajuan['nim'];?></td>
      <td><?php echo $pengajuan['nama_prodi'];?></td>
      <td><?php echo $pengajuan['judul'];?></td>
      <td><?php echo $pengajuan['latarbelakang'];?></td>
      <td><?php echo $pengajuan['tujuan'];?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
