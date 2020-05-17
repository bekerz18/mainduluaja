<table class="tg">
  <thead>
    <tr>
      <th rowspan="2"><strong>NO</strong></th>
      <th rowspan="2"><strong>NAMA</strong></th>
      <th rowspan="2"><strong>PRODI</strong></th>
      <th rowspan="2"><strong>JUDUL</strong></th>
      <th rowspan="2"><strong>BIMBINGAN BAB</strong></th>
      <th colspan="2"><strong>STATUS</strong></th>
    </tr>
    <tr>
      <th><strong>PEMBIMBING 1</strong></th>
      <th><strong>PEMBIMBING 2</strong></th>
    </tr>
  </thead>
  <?php if($pembimbing == "1"){?>
    <tbody id="pengajuan">
                <?php 
                $no = 1; foreach ($bimbingans as $bimbingan): 
                ?>
                <?php
                 $getBimbingan2 = $model->get_info_bimbingan2($bimbingan["id_pengajuan"],$bimbingan["bab"]);
                 $status='';
                 if(!$getBimbingan2){
                  $status = 'Belum melakukan bimbingan';
                 }else if($getBimbingan2["status"] =="belum"){
                  $status = 'Sedang dalam bimbingan';
                }
                  else if($getBimbingan2["status"] == "sudah"){
                    $status = '<span class="text-success">Sudah diacc</span><br>Pada '.date("l, d F Y H:i:s", strtotime($getBimbingan2["tgl_acc"]));
                  }
                 
                ?>
                  <tr>
                    <td class="center align-middle"><?php echo $no++;?></td>
                    <td class="center align-middle"><?php echo $bimbingan["nama_mahasiswa"].'<br>'.$bimbingan['nim_mahasiswa'];?></td>
                    <td class="center align-middle">
                      <?php if($bimbingan["prodi"] == "adpend"){echo "Administrasi Pendidikan";
                    }elseif($bimbingan["prodi"] == "manajemen"){
                      echo "Manajemen";
                    }elseif($bimbingan["prodi"] == "hukum"){echo "Hukum";}?></td>

                    <td><?php echo $bimbingan["judul"];?></td>
                    <td class="center align-middle"><?php echo $bimbingan["bab"];?></td>
                    <td class="center align-middle">
                      <?php if($bimbingan["status"] == "sudah"){
                        echo '<span class="text-success">Sudah diacc</span><br>Pada '.date("l, d F Y H:i:s", strtotime($bimbingan["tgl_acc"]));
                      }elseif($bimbingan["status"] == "belum"){
                        echo 'Sedang dalam bimbingan';
                      };?>
                        
                      </td>
                      <td class="center align-middle">
                        <?php echo $status;?>
                      </td>
                   
                  </tr>
                <?php endforeach;?>
              </tbody>
            <?php }else{?>
              <tbody id="pengajuan">
                <?php $no = 1; foreach ($bimbingans as $bimbingan):  ?>
                <?php
                 $getBimbingan1 = $model->get_info_bimbingan1($bimbingan["id_pengajuan"],$bimbingan["bab"]);
                 $status='';
                 if(!$getBimbingan1){
                  $status = 'Belum melakukan bimbingan';
                 }else if($getBimbingan1["status"] =="belum"){
                  $status = 'Sedang dalam bimbingan';
                }
                  else if($getBimbingan1["status"] == "sudah"){
                    $status = '<span class="text-success">Sudah diacc</span><br>Pada '.date("l, d F Y H:i:s", strtotime($getBimbingan1["tgl_acc"]));
                  }
                 
                ?>
                  <tr>
                    <td class="center align-middle"><?php echo $no++;?></td>
                    <td class="center align-middle"><?php echo $bimbingan["nama_mahasiswa"].'<br>'.$bimbingan['nim_mahasiswa'];?></td>
                    <td class="center align-middle">
                      <?php if($bimbingan["prodi"] == "adpend"){echo "Administrasi Pendidikan";
                    }elseif($bimbingan["prodi"] == "manajemen"){
                      echo "Manajemen";
                    }elseif($bimbingan["prodi"] == "hukum"){echo "Hukum";}?></td>

                    <td><?php echo $bimbingan["judul"];?></td>
                    <td class="center align-middle"><?php echo $bimbingan["bab"];?></td>
                    <td class="center align-middle">
                        <?php echo $status;?>
                      </td>
                    
                    <td class="center align-middle">
                      <?php if($bimbingan["status"] == "sudah"){
                        echo '<span class="text-success">Sudah diacc</span><br>Pada '.date("l, d F Y H:i:s", strtotime($bimbingan["tgl_acc"]));
                      }elseif($bimbingan["status"] == "belum"){
                        echo 'Sedang dalam bimbingan';
                      };?>
                        
                      </td>

                   
                  </tr>
                <?php endforeach;?>
              </tbody>
            <?php }?>
  </table>
<?php
  $tanggalFirst = date("l, d F Y",strtotime(explode(" ", $range)[0]));
  $tanggalLast = date("l, d F Y",strtotime(explode(" ", $range)[2]));
?>
<br>
<span class="font-italic">Dari <?php echo $tanggalFirst;?></span><br>
<span class="font-italic">Sampai <?php echo $tanggalLast;?></span>