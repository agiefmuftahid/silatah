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
                            <th>Nama Ormawa</th>
                            <th>Tingkat</th>
                            <th>Kegiatan</th>
                            <th>Tempat</th>
                            <th>Waktu</th>
                            <th>Tahun</th>
                            <th>Dana</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $no=0; foreach($data as $dt){?>
                        <tr>
                                  <td><?php echo ++$no;?></td>
                                  <td><?php echo $dt->namaOrmawa;?></td>
                                  <td><?php echo $dt->tingkat;?></td>
                                  <td><?php echo $dt->kegiatan;?></td>
                                  <td><?php echo $dt->tempat;?></td>
                                  <td><?php echo $dt->waktu;?></td>
                                  <td><?php echo $dt->tahun;?></td>
                                  <td><?php echo $dt->dana;?></td>
                        </tr>
                        <?php }?>
                        </tbody>
 </table>
</body>
</html>