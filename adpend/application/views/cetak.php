<div class="kop row">
  <div class="head logo-1 col-3">
    <img class="rounded" src="<?php echo $url. '/assets/images/logo_unigal.jpg';?>" height="150px">
  </div>
  <div class="head text-1 col-6 center">
    <h1>UNIVERSITAS GALUH</h1>
    <h2>PROGRAM PASCASARJANA</h2>
  </div>
  <div class="head logo-2 col-3">
    <img class="rounded" src="<?php echo $url.'/assets/images/ico.jpg';?>" height="150px">
  </div>
</div>
<h3 class="center"><?php echo $title;?></h3>
<table id="data-pembimbing" class="table table-bordered table-striped">
  <thead>
    <tr class="text-center">
      <th>NO</th>
      <th>NAMA DOSEN</th>
      <th>NILAI PREFERENSI</th>
      <th>PENENTUAN</th>
    </tr>
  </thead>
  <tbody id="pembimbing-manajemen">
    <?php  $no =0; foreach ($dosens as $dosen):$no++?>
    <tr>
      <td class="center"><?php echo $no;?></td>
      <td><?php echo $dosen["nama_dosen"];?></td>
      <td><?php echo $dosen["nilai"];?></td>
      <td><?php echo $css;?>
        <?php if($no <= 10){
          echo 'Dosen Pembimbing';
        }else{
          echo 'Bukan Dosen Pembimbing';
        }?>
        
      </td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>

