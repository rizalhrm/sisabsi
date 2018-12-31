            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Jadwal Mengajar</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php
            	$sql=mysql_query("select * from guru where nip='$uidi'");
            	$rs=mysql_fetch_array($sql);
             ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Hari</th>
                                            <th class="text-center">Jam</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Mata Pelajaran</th>
                                            <th class="text-center">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=1;
	$sql=mysql_query("select jadwal.idj , hari.hari , kelas.nama AS nama_kelas, guru.idg AS id_guru, mata_pelajaran.nama_mp
  , jadwal.jam_selesai, jadwal.jam_mulai from jadwal,hari,kelas,guru,mata_pelajaran WHERE jadwal.idh=hari.idh AND jadwal.idk=kelas.idk AND jadwal.idg=guru.idg AND jadwal.idm=mata_pelajaran.idm
  AND guru.idg='$rs[idg]'
  ORDER BY jadwal.idh ASC");
	while($rs=mysql_fetch_array($sql)){

?>                                        <tr class="odd gradeX">
                                            <td><?php echo"$no";  ?></td>
                                            <td ><?php echo"$rs[hari]";  ?></td>
                                            <td ><?php echo"$rs[jam_mulai] - $rs[jam_selesai]";  ?></td>
                                            <td ><?php echo"$rs[nama_kelas]";  ?></td>
                                            <td ><?php echo"$rs[nama_mp]";  ?></td>
                                        <td class="text-center"><a href="./././media.php?module=absen&idj=<?php echo $rs['idj'] ?>"><button type="button" class="btn btn-info">Mulai Absen</button></a>
                                          <a href="./././media.php?module=rekap_g&idj=<?php echo $rs['idj'] ?>"><button type="button" class="btn btn-warning">Rekap Absen</button></a>
                                        </td>
                                        </tr>
<?php
$no++;}
?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
