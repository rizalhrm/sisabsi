            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Siswa</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          <?php
                          $klas=$_GET['kls'];
                          if($klas=="semua")
                          {
                          	echo "Data Semua Siswa";
                          }
                          else
                          {
                          	$claris=mysql_query("select * from kelas where idk='$_GET[kls]'");
                            $click=mysql_fetch_array($claris);
                            echo "Data Siswa Kelas $click[nama]";
                          }
                           ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NIS</th>
                                            <th class="text-center" width="30%">Nama</th>
                                            <th class="text-center">JK</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">No Telepon</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
$no=1;
$klas=$_GET['kls'];
if($klas=="semua")
{
	$sql=mysql_query("select * from siswa");
}
else
{
	$sql=mysql_query("select * from siswa where idk='$_GET[kls]'");
}

	while($rs=mysql_fetch_array($sql))
	{
		$sqlw=mysql_query("select * from kelas where idk='$rs[idk]'");
		$rsw=mysql_fetch_array($sqlw);
		$sqlb=mysql_query("select * from sekolah where id='$rsw[id]'");
		$rsb=mysql_fetch_array($sqlb);

if($_SESSION['level']=="admin_guru"){

if($rsb['id']==$_SESSION['id']){
?>                                        <tr class="odd gradeX">
                                            <td><?php echo"$rs[nis]";  ?></td>
                                            <td><?php echo"$rs[nama]";  ?></td>
<?php
if($rs['jk']=="L"){
?>
                                            <td class="text-center">Laki - Laki</td>
<?php
}else{
?>
                                            <td class="text-center">Perempuan</td>
<?php
}
?>
                                            <td><?php echo"$rs[idk]";  ?></td>
                                            <td><?php echo"$rs[tlp]";  ?></td>

                                        <td class="text-center">
										<a href="./././media.php?module=input_siswa&act=edit&ids=<?php echo $rs['ids'] ?>">
										<button type="button" class="btn btn-info">Edit
										</button> <a href="././module/simpan.php?act=hapus&ids=<?php echo $rs['ids'] ?>">
										<button type="button" class="btn btn-danger">Hapus</button></a></td>

                                        </tr>
<?php
}
}else{
?>
                                        <tr class="odd gradeX">
                                            <td><?php echo"$rs[nis]";  ?></td>
                                            <td><?php echo"$rs[nama]";  ?></td>
<?php
if($rs['jk']=="L"){
?>
                                            <td class="text-center">Laki - Laki</td>
<?php
}else{
?>
                                            <td class="text-center">Perempuan</td>
<?php
}
?>
                                        <td><?php
                                        $namakelas=mysql_query("SELECT * FROM kelas WHERE idk='$rs[idk]'");
                                        $nama_kelas=mysql_fetch_array($namakelas);
                                         echo"$nama_kelas[nama]";  ?></td>
                                        <td><?php echo"$rs[tlp]";  ?></td>

										<td class="text-center">

										<a href="./././media.php?module=detail_siswa&act=details&ids=<?php echo $rs['ids'] ?>">
										<button type="button" class="btn btn-warning">Details</button> </a>

										<a href="./././media.php?module=input_siswa&act=edit&ids=<?php echo $rs['ids'] ?>">
										<button type="button" class="btn btn-info">Edit</button> </a>


										<a href="././module/simpan.php?act=hapus&ids=<?php echo $rs['ids'] ?>">
										<button type="button" class="btn btn-danger">Hapus</button></a>

										</td>
                                        </tr>
<?php
}
}
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
