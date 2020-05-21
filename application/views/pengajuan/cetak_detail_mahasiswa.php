
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
    <?php
      if($proposal["nilai_tampil"] == 'ya'){?>
        <tr>
          <th>KETERANGAN</th>
          <td> : <?php
          if($proposal["nilai_1"] == NULL || $proposal["nilai_2"] == NULL || $proposal["nilai_3"] == NULL) {
            echo 'Belum ada';
          }else{
            if(number_format($nilai_total['nilai'],2) >= 86 && number_format($nilai_total['nilai'],2) <= 100){
              echo "A";
            }else if(number_format($nilai_total['nilai'],2) >= 76 && number_format($nilai_total['nilai'],2) <= 85){
              echo "B";
            }else if(number_format($nilai_total['nilai'],2) >= 66 && number_format($nilai_total['nilai'],2) <= 75){
              echo "C";
            }else if(number_format($nilai_total['nilai'],2) >= 56 && number_format($nilai_total['nilai'],2) <= 65){
              echo "D";
            }else if(number_format($nilai_total['nilai'],2) <= 55){
              echo "E";
            }
          }?>
          </td>
        </tr>
            <?php }?>
          
        
     <?php if($proposal['revisi'] == 'tidak' && $checkKompre == "ya"){?>
      <tr>
        <th colspan="2"><strong>DATA KOMPREHENSIF</strong></th>
      </tr>
      <tr>
        <th>NIM</th>
        <td>: <?php echo $pengajuan["nim"];?></td>
      </tr>
      <tr>
        <th>TANGGAL DAFTAR</th>
        <td>: <?php echo date("l, d F Y H:i:s",strtotime($kompreData["tgl_daftar"]));?></td></tr>
        <tr><th>TANGGAL DITERIMA</th>
        <td>: <?php echo date("l, d F Y H:i:s",strtotime($kompreData["tgl_terima"]));?></td></tr>
        <tr><th>TANGGAL SIDANG</th><td>: <?php echo date("l, d F Y",strtotime($kompreData["tgl_sidang"]));?></td></tr>
        <tr><th>PENGUJI 1</th><td>: <?php echo $kompreData["penguji1"];?></td></tr>
        <tr><th>PENGUJI 2</th><td>: <?php echo $kompreData["penguji2"];?></td></tr>
        <tr><th>PENGUJI 3</th><td>: <?php echo $kompreData["penguji3"];?></td></tr>
        <tr><th>NILAI </th><td>: 
          <?php
            $nilai = $model->nilaiKompre($kompreData["id_pengajuan"]);
            if($nilai["nilai"] == NULL){
              echo 'Belum Ada';
            }else{
              echo number_format($nilai['nilai'],2);
            }
              if(number_format($nilai['nilai'],2) < 75){
                echo ' Revisi';
              }?>
            </td>
            </tr>
          <?php }?>
          <?php
          $nilai = $model->nilaiKompre($kompreData["id_pengajuan"]);
          if($kompreData["nilai_tampil"] == 'ya'){?>
            <tr>
              <th><strong>KETERANGAN</strong></th>
                <td> : <?php
                if($nilai["nilai"] == NULL){
                  echo 'Belum Ada';
                  }else if(number_format($nilai['nilai'],2) >= 86 && number_format($nilai['nilai'],2) <= 100){
                    echo "A";
                  }else if(number_format($nilai['nilai'],2) >= 76 && number_format($nilai['nilai'],2) <= 85){
                    echo "B";
                  }else if(number_format($nilai['nilai'],2) >= 66 && number_format($nilai['nilai'],2) <= 75){
                    echo "C";
                  }else if(number_format($nilai['nilai'],2) >= 56 && number_format($nilai['nilai'],2) <= 65){
                    echo "D";
                  }else if(number_format($nilai['nilai'],2) <= 55){
                    echo "E";
                  }?>
                  </td>
                </tr>
              <?php }?>
          <?php if($pengajuans['pembimbing1'] != NULL && $pengajuans['pembimbing2'] != NULL){?>
            <tr>
              <th colspan="2"><strong>DATA PEMBIMBING</strong></th></tr>
              <tr><th>PEMBIMBING 1</th>
                <td>: <?php echo $cariDosbing1['nama'];?></td></tr>
                <tr><th>PEMBIMBING 2</th>
                  <td>: <?php echo $cariDosbing2['nama'];?></td>
                </tr>
              <?php }?>

              <?php if($tesis_is == 'ada'){?>
    <tr>
      <th colspan="2"><strong>DATA THESIS</strong></th>
    </tr>
    <?php if($checkThesis == "ya"){?>
      <tr>
        <th>TANGGAL DAFTAR</th>
        <td>: <?php echo date("l, d F Y H:i:s",strtotime($thesis["tgl_daftar"]));?></td>
      </tr>
      <tr>
        <th>TANGGAL DITERIMA</th>
        <td>: <?php echo date("l, d F Y H:i:s",strtotime($thesis["tgl_terima"]));?></td>
      </tr>
      <tr>
        <th>TANGGAL SIDANG</th>
        <td>: <?php echo date("l, d F Y",strtotime($thesis["tgl_sidang"]));?></td>
      </tr>
      <tr>
        <th>PEMBIMBING </th>
        <td>: <?php echo $thesis["penguji1"];?></td>
      </tr>
      <tr>
        <th>PENGUJI 2</th>
        <td>: <?php echo $thesis["penguji2"];?></td>
      </tr>
      <tr>
        <th>PENGUJI 3</th>
        <td>: <?php echo $thesis["penguji3"];?></td>
      </tr>
      <tr>
        <th>NILAI </th>
        <td>: 
          <?php
            $nilai = $model->nilaiThesis($thesis["id_pengajuan"]);
            if($nilai["nilai"] == NULL){
              echo 'Belum Ada';
            }else{
              if($thesis['nilai_tampil'] != 'ya'){
                echo 'Sedang diproses';
              }else{
                echo number_format($nilai['nilai'],2);
                if(number_format($nilai['nilai'],2) < 75){
                  echo ' Revisi';
                }
              }
            }
            ?>
            </td>
          </tr>

          <?php
          $nilai = $model->nilaiThesis($thesis["id_pengajuan"]);
          if($thesis['nilai_tampil'] == 'ya'){?>
            <tr>
              <th>KETERANGAN</th>
              <td> :
                <?php
                if($nilai["nilai"] == NULL){
                    echo 'Belum Ada';
                  }
                  else if(number_format($nilai['nilai'],2) >= 86 && number_format($nilai['nilai'],2) <= 100){
                    echo "A";
                  }else if(number_format($nilai['nilai'],2) >= 76 && number_format($nilai['nilai'],2) < 86){
                    echo "B";
                  }else if(number_format($nilai['nilai'],2) >= 66 && number_format($nilai['nilai'],2) < 76){
                    echo "C";
                  }else if(number_format($nilai['nilai'],2) >= 56 && number_format($nilai['nilai'],2) < 66){
                        echo "D";
                  }else if(number_format($nilai['nilai'],2) <= 55){
                    echo "E";
                  }
                }
                ?>
                </td>
            </tr>
          <?php }?>
        <?php }?>
  
<?php endif;?>

</table>
