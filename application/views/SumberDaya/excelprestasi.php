<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 <table>
    <thead>
        <tr>
          <th>No.</th>
          <th>Nama Mahasiswa</th>
          <th>Prodi</th>
          <th>Prestasi</th>
          <th>Tingkat</th>
        </tr>
      </thead>
    <tbody>
    <?php $no=0; foreach($data as $dt){?>
      <tr>
          <td><?php echo ++$no;?></td>
          <td><?php echo $dt->namaMahasiswa;?></td>
          <td><?php echo $dt->namaProdi;?></td>
          <td><?php echo $dt->prestasi;?></td>
          <td><?php echo $dt->tingkat;?></td>
        </tr>
    <?php }?>
    </tbody>
  </table>
</body>
</html>