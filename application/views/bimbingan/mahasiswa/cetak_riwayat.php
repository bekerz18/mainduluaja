<table class="tg">
  <thead>
                <tr class="center">
<!--                   <th width="10px">NO</th> -->
                  <th><strong>KETERANGAN</strong></th>
                  <th><strong>Hari, Tanggal</strong></th>
                </tr>
              </thead>
                <tbody>
                  <?php if($pengajuan != 'nothing'){?>
                    <tr>
                      <!-- <td>1</td> -->
                      <td>Pengajuan</td>
                      <td class="center"><?php echo date("l, d F Y",strtotime($pengajuan['tglpengajuan']));?></td>
                    </tr>
                    <tr>
                      <!-- <td>2</td> -->
                      <td>ACC Judul</td>
                      <td class="center"><?php echo date("l, d F Y",strtotime($pengajuan['tglditerima']));?></td>
                    </tr>
                  <?php }?>
                  <?php if($pengajuan != 'nothing' && $proposal != 'nothing'){?>
                    <tr>
                      <!-- <td>3</td> -->
                      <td>Upload Proposal</td>
                      <td class="center"><?php echo date("l, d F Y",strtotime($proposal['last_update']));?></td>
                    </tr>
                    <?php if($proposal['acc_seminar'] != NULL):?>
                      <tr>
                        <!-- <td>4</td> -->
                        <td>ACC Seminar Proposal</td>
                        <td class="center"><?php echo date("l, d F Y",strtotime($proposal['acc_seminar']));?></td>
                      </tr>
                    <?php endif;?>
                    <?php if($proposal['tgl_seminar'] != NULL):?>
                      <tr>
                        <!-- <td>4</td> -->
                        <td>Seminar Proposal</td>
                        <td class="center"><?php echo date("l, d F Y",strtotime($proposal['tgl_seminar']));?></td>
                      </tr>
                    <?php endif;?>
                    <?php if($kompre != 'nothing'):?>
                      <tr>
                        <!-- <td>5</td> -->
                        <td>Daftar Sidang Komprehensif</td>
                        <td class="center"><?php echo date("l, d F Y",strtotime($kompre['tgl_daftar']));?></td>
                      </tr>
                      <?php if($kompre['tgl_terima'] != NULL):?>
                        <tr>
                          <!-- <td>6</td> -->
                          <td>ACC Sidang Komprehensif</td>
                          <td class="center"><?php echo date("l, d F Y",strtotime($kompre['tgl_terima']));?></td>
                        </tr>
                        <?php if($kompre['tgl_sidang'] != NULL):?>
                          <tr>
                            <!-- <td>7</td> -->
                            <td>Sidang Komprehensif</td>
                            <td class="center"><?php echo date("l, d F Y",strtotime($kompre['tgl_sidang']));?></td>
                          </tr>
                        <?php endif;?>
                      <?php endif;?>
                    <?php endif;?>
                    <?php if($bimDets != 'nothing'):?>
                      <?php foreach($bimDets as $bimDet):?>
                        <tr>
                          <td><?php echo 'Bimbingan BAB '.$bimDet['bab'].' Kepada Pembimbing '.$bimDet['pembimbing'];?></td>
                          <td class="center"><?php echo date("l, d F Y",strtotime($bimDet['tanggal']));?></td>
                        </tr>
                        <?php
                          $bimAcc = $model->getBimAcc($bimDet['id_bimbingan']);
                          if($bimAcc){
                        ?>
                          <tr>
                            <td><?php echo 'ACC BAB '.$bimAcc['bab'].' Oleh Pembimbing '.$bimAcc['pembimbing'];?></td>
                            <td class="center"><?php echo date("l, d F Y",strtotime($bimAcc['tgl_acc']));?></td>
                          </tr>
                        <?php }?>
                      <?php endforeach;?>
                      <?php if($thesis != 'nothing'):?>
                        <tr>
                          <td>Daftar Sidang Thesis</td>
                          <td class="center"><?php echo date("l, d F Y",strtotime($thesis['tgl_daftar']));?></td>
                        </tr>
                        <?php if($thesis['tgl_terima'] != NULL):?>
                          <tr>
                            <td>ACC Thesis</td>
                            <td class="center"><?php echo date("l, d F Y",strtotime($thesis['tgl_terima']));?></td>
                          </tr>
                        <?php endif;?>
                        <?php if($thesis['tgl_sidang'] != NULL):?>
                          <tr>
                            <td>Sidang Thesis</td>
                            <td class="center"><?php echo date("l, d F Y",strtotime($thesis['tgl_sidang']));?></td>
                          </tr>
                        <?php endif;?>
                      <?php endif;?>
                    <?php endif;?>
                  <?php }?>
                </tbody>
        
</table>
