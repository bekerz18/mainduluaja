
  <table class="tg">
  <?php if($pengajuan['status'] == 'terima' && $status_proposal == 'sudah'):?>
    <tr>
      <th colspan="2"><strong>DATA PENGAJUAN</strong></th></tr>
      <tr><th>NIM</th>
      <td>: <?php echo $pengajuan["nim"];?></td></tr>
      <tr><th>NAMA</th>
      <td>: <?php echo $pengajuan["nama"];?></td></tr>
      <tr><th>PENGAJUAN</th>
      <td>: <?php echo date("l, d F Y H:i:s", strtotime($pengajuan["tglpengajuan"]));?></td></tr>
      <tr><th>STATUS</th>
      <td>: 
        <?php
        if($pengajuan["status"] == "belum"){
          echo "Sedang diproses";
        }elseif($pengajuan["status"] == "tolak"){
          echo '<strong class="text-danger">Ditolak</strong> Pada '.date("l, d F Y H:i:s", strtotime($pengajuan["tglditerima"]));
        }elseif($pengajuan["status"] == "terima"){
          echo '<strong class="text-success">Diterima</strong> Pada ' .date("l, d F Y H:i:s", strtotime($pengajuan["tglditerima"]));
        }
        ?></td></tr>
      <tr><th>JUDUL</th>
      <td>: <?php echo $pengajuan["judul"];?></td></tr>
      <tr><th>LATAR BELAKANG</th>
      <td>: <?php echo $pengajuan["latarbelakang"];?></td></tr>
      <tr><th>TUJUAN</th>
      <td>: <?php echo $pengajuan["tujuan"];?></td></tr>
    <tr>
      <th colspan="2"><strong>DATA PROPOSAL</strong></th></tr>
      <tr><th><?php if($proposal['revisi'] == 'ya'){ echo 'DITOLAK PADA';}else{ echo 'DIKIRIM';}?></th>
      <td>: <?php echo date("l, d F Y H:i:s", strtotime($proposal["last_update"]));?></td></tr>
      <tr><th>STATUS</th>
      <?php if($proposal['revisi'] == NULL){?>
        <td>: <strong class="text-warning">Sedang diproses</strong></td></tr>
      <?php }elseif($proposal['revisi'] == 'tidak'){?>
        <td>: <strong class="text-success">Proposal Diterima</strong> Pada <?php echo date('l , d F Y H:i:s', strtotime($proposal['acc_seminar']));?></td></tr>
      <tr><th>TANGGAL SEMINAR</th>
      <td>: <?php echo date('l , d F Y', strtotime($proposal['tgl_seminar']));?> </td></tr>
      <tr><th>PENGUJI 1</th>
      <td>: <?php echo $penguji1['nama'];?></td></tr>
      <tr><th>PENGUJI 2</th>
      <td>: <?php echo $penguji2['nama'];?></td></tr>
      <tr><th>PENGUJI 3</th>
      <td>: <?php echo $penguji3['nama'];?></td></tr>
      <tr><th>NILAI</th>
      <td>:
        <?php
        if($proposal["nilai_1"] == NULL || $proposal["nilai_2"] == NULL || $proposal["nilai_3"] == NULL){
          echo 'Belum ada';
        }else{
          echo number_format($nilai_total['nilai'],2);
        }
        ?></td></tr>
    <?php }elseif($proposal['revisi'] == 'ya'){ ?>
      <td>: <strong class="text-danger">Proposal Ditolak</strong></td></tr>
      <tr>
        <th>KETERANGAN</th>
        <td>: <?php echo $proposal['ket_revisi'];?></td>
      </tr>
    <?php }?>
    <?php if($pengajuans['pembimbing1'] != NULL && $pengajuans['pembimbing2'] != NULL){?>
      <tr>
        <th colspan="2"><strong>DATA PEMBIMBING</strong></th></tr>
        <tr><th>PEMBIMBING 1</th>
        <td>: <?php echo $cariDosbing1['nama'];?></td></tr>
        <tr><th>PEMBIMBING 2</th>
        <td>: <?php echo $cariDosbing2['nama'];?></td></tr>
      </tr>
    <?php }?>
  
<?php endif;?>
<?php if($pengajuan['status'] == 'belum' || $pengajuan['status'] == 'tolak' || $pengajuan['status'] == 'terima' && $status_proposal == 'belum'):?>
  <tr>
    <th colspan="2"><strong>DATA PENGAJUAN</strong></th>
  </tr>
  <tr>
    <th>NIM</th>
    <td>: <?php echo $pengajuan["nim"];?></td>
  </tr>
  <tr>
    <th>NAMA</th>
    <td>: <?php echo $pengajuan["nama"];?></td>
  </tr>
  <tr>
    <th>PENGAJUAN</th>
    <td>: <?php echo date("l, d F Y H:i:s", strtotime($pengajuan["tglpengajuan"]));?></td>
  </tr>
  <tr>
    <th>STATUS</th>
    <td>: <?php
    if($pengajuan["status"] == "belum"){
      echo '<strong class="text-warning">Sedang diproses</strong>';
    }elseif($pengajuan["status"] == "tolak"){
      echo '<strong class="text-danger">Ditolak</strong> Pada '.date("l, d F Y H:i:s", strtotime($pengajuan["tglditerima"]));
    }elseif($pengajuan["status"] == "terima"){
      echo '<strong class="text-success">Diterima</strong> Pada ' .date("l, d F Y H:i:s", strtotime($pengajuan["tglditerima"]));
    }
    ?></td>
  </tr>
  <?php if($pengajuan["status"] == "tolak"):?>
    <tr>
      <th>ALASAN</th>
      <td>: <?php echo $pengajuan["alasan"];?></td>
    </tr>
  <?php endif;?>
  <tr>
    <th>JUDUL</th>
    <td>: <?php echo $pengajuan["judul"];?></td>
  </tr>
  <tr>
    <th>LATAR BELAKANG</th>
    <td>: <?php echo $pengajuan["latarbelakang"];?></td>
  </tr>
  <tr>
    <th>TUJUAN</th>
    <td>: <?php echo $pengajuan["tujuan"];?></td>
  </tr>
  <?php if($pengajuan["status"] == "terima" && $status_proposal == 'belum'){?>
    <tr>
      <th colspan="2" class="text-warning">KIRIM PROPOSAL!</th>
    </tr>
  <?php } ?>
<?php endif;?>                    

</table>
