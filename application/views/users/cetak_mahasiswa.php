<table class="tg">
  <thead>
    <tr>
      <th><strong>NO</strong></th>
      <th><strong>NAMA</strong></th>
      <th><strong>NIM</strong></th>
      <th><strong>PROGRAM STUDI</strong></th>
      <th><strong>KONSENTRASI</strong></th>
      <th><strong>JENIS KELAMIN</strong></th>
      <th><strong>EMAIL</strong></th>
      <th><strong>HANDPHONE</strong></th>
    </tr>
  </thead>
  <tbody id="table-mahasiswa">
    <?php $no = 1; foreach ($users as $user) :?>
      <tr>
        <td class="text-center"><?php echo $no++;?></td>
        <td><?php echo $user->nama;?></td>
        <td><?php echo $user->username;?></td>
        <td>
          <?php
            if($user->prodi == "adpend"){
              echo "Adm Pend";
            }elseif($user->prodi == "manajemen"){
              echo "Manajemen";
            }else{
              echo "Hukum";
            }
          ?>
        </td>
        <td><?php echo $user->konsentrasi;?></td>
        <td class="center"><?php echo $user->gender;?></td>
        <td><?php echo $user->email;?></td>
        <td><?php echo $user->handphone;?></td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>
