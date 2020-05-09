<table class="tg">
  <thead>
    <tr class="text-center">
      <th><strong>NO</strong></th>
      <th><strong>NAMA</strong></th>
      <th><strong>NIK/NIDN</strong></th>
      <th><strong>PROGRAM STUDI</strong></th>
      <th><strong>JENIS KELAMIN</strong></th>
      <th><strong>EMAIL</strong></th>
      <th><strong>HANDPHONE</strong></th>
      </tr>
    </thead>
    <tbody id="table-dosen">
      <?php $no = 1; foreach ($users as $user) :?>
        <tr>
          <td class="text-center"><?php echo $no++;?></td>
          <td><?php echo $user->nama;?></td>
          <td><?php echo $user->username;?></td>
          <td>
            <?php
              $prodis = $model->get_prodi_dosen($user->id);
              foreach($prodis as $prodi) echo $prodi->nama_prodi.' , ';
            ?>
          </td>
          <td class="center"><?php echo $user->gender;?></td>
          <td><?php echo $user->email;?></td>
          <td><?php echo $user->handphone;?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
</table>
