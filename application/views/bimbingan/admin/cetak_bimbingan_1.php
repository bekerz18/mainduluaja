<table class="tg">
  <thead>
    <tr>
      <th><strong>NO</strong></th>
      <th><strong>NAMA</strong></th>
      <th><strong>PRODI</strong></th>
      <th><strong>JUDUL</strong></th>
      <th><strong>BIMBINGAN BAB</strong></th>
      <th><strong>STATUS</strong></th>
      <th><strong>PEMBIMBING</strong></th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach ($bimbingans as $bimbingan):  ?>
                  <tr>
                    <td class="center"><?php echo $no++;?></td>
                    <td class="center"><?php echo $bimbingan["nama_mahasiswa"].'<br>'.$bimbingan['nim_mahasiswa'];?></td>
                    <td class="center">
                      <?php if($bimbingan["prodi"] == "adpend"){echo "Administrasi Pendidikan";
                    }elseif($bimbingan["prodi"] == "manajemen"){
                      echo "Manajemen";
                    }elseif($bimbingan["prodi"] == "hukum"){echo "Hukum";}?></td>
                    <td><?php echo $bimbingan["judul"];?></td>
                    <td class="center"><?php echo $bimbingan["bab"];?></td>
                    <td class="center">
                      <?php if($bimbingan["status"] == "sudah"){
                        echo '<span class="text-success">Sudah diacc</span><br>Pada '.date("l, d F Y H:i:s", strtotime($bimbingan["tgl_acc"]));
                      }elseif($bimbingan["status"] == "belum"){
                        echo 'Sedang dalam bimbingan';
                      };?>
                        
                      </td>
                    <td><?php echo $bimbingan['pembimbing'];?></td>
                  </tr>
    <?php endforeach;?>
  </tbody>
</table>