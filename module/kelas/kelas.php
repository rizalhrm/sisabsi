            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Kelas</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Kelas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Kode Sekolah</th>
                                            <th class="text-center">Nama Sekolah</th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=1;
	$sql=mysql_query("select * from kelas");
	while($rs=mysql_fetch_array($sql)){
	$sqla=mysql_query("select * from sekolah where id='$rs[id]'");
	$rsa=mysql_fetch_array($sqla);
if($_SESSION['level']=="admin_guru"){
if($rsa['id']==$_SESSION['id']){

?>                                        <tr class="odd gradeX">
                                            <td><?php echo"$rsa[kode]";  ?></td>
                                            <td><?php echo"$rsa[nama]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama]";  ?></td>

                                        <td class="text-center"><a href="./././media.php?module=input_kelas&act=edit_kelas&idk=<?php echo $rs['idk'] ?>"><button type="button" class="btn btn-info">Edit</button> <a href="././module/simpan.php?act=hapus_kelas&idk=<?php echo $rs['idk'] ?>"><button type="button" class="btn btn-danger">Hapus</button></a></td>

                                        </tr>
<?php
}
}else{
?>
                                        <tr class="odd gradeX">
                                            <td><?php echo"$rsa[kode]";  ?></td>
                                            <td><?php echo"$rsa[nama]";  ?></td>
                                            <td class="text-center"><?php echo"$rs[nama]";  ?></td>

                                        <td class="text-center"><a href="./././media.php?module=input_kelas&act=edit_kelas&idk=<?php echo $rs['idk'] ?>"><button type="button" class="btn btn-info">Edit</button> <a href="././module/simpan.php?act=hapus_kelas&idk=<?php echo $rs['idk'] ?>"><button type="button" class="btn btn-danger">Hapus</button></a></td>

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
