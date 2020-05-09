<table class="tg">
  <thead>
    <tr>
      <th><strong>NO</strong></th>
      <th><strong>NAMA</strong></th>
      <th><strong>JUDUL</strong></th>
      <th><strong>DIAJUKAN</strong></th>
      <th><strong>STATUS</strong></th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($pengajuans as $pengajuan):  ?>
    <tr>
      <td class="center"><?php echo $no++;?></td>
      <td><?php echo $pengajuan->nama.'<br>'.$pengajuan->username;?></td>
      <td><?php echo $pengajuan->judul;?></td>
      <td><?php echo date("d-m-Y H:i:s", strtotime($pengajuan->tglpengajuan));?></td>
      <td class="center">
        <?php
          if($pengajuan->status == "belum"){
            echo "Sedang diproses";
          }elseif($pengajuan->status == "tolak"){
            echo "Ditolak Pada <br>".date("d-m-Y H:i:s", strtotime($pengajuan->tglditerima));
          }elseif($pengajuan->status == "terima"){
            echo "Diterima Pada <br>".date("d-m-Y H:i:s", strtotime($pengajuan->tglditerima));
          }
        ?> 
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
