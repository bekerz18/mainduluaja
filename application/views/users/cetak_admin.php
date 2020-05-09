<table class="tg">
  <thead>
    <tr>
      <th><strong>NO</strong></th>
      <th><strong>NAMA</strong></th>
      <th><strong>USERNAME</strong></th>
      <th><strong>JENIS KELAMIN</strong></th>
      <th><strong>Email</strong></th>
    </tr>
  </thead>
  <tbody id="table-admin">
    <?php $no = 1; foreach ($users as $user) :?>
      <tr>
        <td class="no"><?php echo $no++;?></td>
        <td><?php echo $user->nama;?></td>
        <td><?php echo $user->username;?></td>
        <td class="center"><?php echo $user->gender;?></td>
        <td><?php echo $user->email;?></td>
      </tr>
    <?php endforeach;?>
  </tbody>
</table>
