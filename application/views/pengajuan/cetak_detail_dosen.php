<table class="tg">
                      <?php
                        $pembimbing1 = $model->searchDosenBy($pengajuan['pembimbing1']);
                        $pembimbing2 = $model->searchDosenBy($pengajuan['pembimbing2']);
                      ?>
                      <tr>
                        <th>NIM</th>
                        <td>: <?php echo $pengajuan['nim'];?></td>
                      </tr>
                      <tr>
                        <th>NAMA</th>
                        <td>: <?php echo $pengajuan['nama'];?></td>
                      </tr>
                      <tr>
                        <th>PRODI</th>
                        <td>: <?php echo $pengajuan['nama_prodi'];?></td>
                      </tr>
                      <tr>
                        <th>JUDUL</th>
                        <td>: <?php echo $pengajuan['judul'];?></td>
                      </tr>
                      <tr>
                        <th>LATAR BELAKANG</th>
                        <td>: <?php echo $pengajuan['latarbelakang'];?></td>
                      </tr>
                      <tr>
                        <th>TUJUAN</th>
                        <td>: <?php echo $pengajuan['tujuan'];?></td>
                      </tr>
                      <tr>
                        <th>TANGGAL DIAJUKAN</th>
                        <td>: <?php echo date('l, d F Y H:i:s',strtotime($pengajuan['tglpengajuan']));?></td>
                      </tr>
                      <tr>
                        <th>TANGGAL DITERIMA</th>
                        <td>: <?php echo date('l, d F Y H:i:s',strtotime($pengajuan['tglditerima']));?></td>
                      </tr>
                      <tr>
                        <th>SIDANG KOMPREHENSIF</th>
                        <td>: 
                            <?php  if($pengajuan['sidang_kompre1'] == 'ya'){
                                echo $pembimbing1['nama'].' <button type="button" class="btn btn-sm btn-success">Sudah menerima</button>';
                              }elseif($pengajuan['sidang_kompre1'] == null){
                                echo $pembimbing1['nama'].' Belum menerima';
                              }
                             
                            ?>  
                             |

                            <?php  if($pengajuan['sidang_kompre2'] == 'ya'){
                                echo $pembimbing2['nama'].' <button type="button" class="btn btn-sm btn-success">Sudah menerima</button>';
                              }elseif($pengajuan['sidang_kompre12'] == null){
                                echo $pembimbing2['nama'].' Belum menerima';
                              }
                            
                            ?> 
                          </td>
                      </tr>
                      <tr>
                        <th>SIDANG THESIS</th>
                        <td>: 
                            <?php  if($pengajuan['acc_thesis1'] == 'ya'){
                                echo $pembimbing1['nama'].' <button type="button" class="btn btn-sm btn-success">Sudah menerima</button>';
                              }elseif($pengajuan['acc_thesis1'] == null){
                                echo $pembimbing1['nama'].' Belum menerima';
                              }
                             
                            ?>  
                             |

                            <?php  if($pengajuan['acc_thesis2'] == 'ya'){
                                echo $pembimbing2['nama'].' <button type="button" class="btn btn-sm btn-success">Sudah menerima</button>';
                              }elseif($pengajuan['acc_thesis2'] == null){
                                echo $pembimbing2['nama'].' Belum menerima';
                              }
                            
                            ?> 
                          </td>
                        
                      </tr>
                  </table>