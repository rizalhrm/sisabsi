<?php
if($_GET['act']=="input"){
	?>
          <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Input Data Mata Pelajaran</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Mata Pelajaran
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_pelajaran">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Mata Pelajaran</label>
                                            <input type="text" class="form-control" placeholder="Mata Pelajaran" name="nama_mp">
                                        </div>


                                        <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                    </form>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <?php } ?>

         <?php
if($_GET['act']=="edit_pelajaran"){
	?>
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Mata Pelajaran</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data Mata Pelajaran
                        </div>
                        <div class="panel-body">
                            <div class="row">
<?php
                            	$sql=mysql_query("select * from mata_pelajaran where idm='$_GET[idm]'");
								$rs=mysql_fetch_array($sql);

?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_pelajaran">
<input type="hidden" name="idm" value="<?php echo $_GET['idm'] ?>" />

                                <div class="col-lg-6">

                                        <div class="form-group">

                                            <label>Mata Pelajaran</label>
                                            <input class="form-control" placeholder="Mata Pelajaran" name="nama_mp" value="<?php echo "$rs[nama_mp]"; ?>">

                                        </div>


                                        <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                    </form>

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php } ?>
