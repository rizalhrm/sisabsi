            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Data Mata Pelajaran</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Mata Pelajaran
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Mata Pelajaran</th>
                                            <th class="text-center">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=1;
	$sql=mysql_query("select * from mata_pelajaran");
	while($rs=mysql_fetch_array($sql)){

?>                                        <tr class="odd gradeX">
                                            <td><?php echo"$no";  ?></td>
                                            <td ><?php echo"$rs[nama_mp]";  ?></td>

                                        <td class="text-center"><a href="./././media.php?module=input_pelajaran&act=edit_pelajaran&idm=<?php echo $rs['idm'] ?>"><button type="button" class="btn btn-info">Edit</button></a>
                                        <a href="././module/simpan.php?act=hapus_pelajaran&idm=<?php echo $rs['idm'] ?>"><button type="button" class="btn btn-danger">Hapus</button></a></td>
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
