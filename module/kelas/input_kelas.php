<?php
if($_GET['act']=="input"){
	?>
          <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Input Data Kelas</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Kelas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_kelas">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama Sekolah</label>
                                            <select class="form-control" name="id">
  <?php
	$sql=mysql_query("select * from sekolah");
	while($rs=mysql_fetch_array($sql)){
if($_SESSION['level']=="admin_guru"){
if($rs['id']==$_SESSION['id']){

	echo "<option value='$rs[id]'>$rs[nama]</option>";
}
}else{
		echo "<option value='$rs[id]'>$rs[nama]</option>";

	}
}
?>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Kelas</label>
                                            <input class="form-control" placeholder="Kelas" name="nama">
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
if($_GET['act']=="edit_kelas"){
	?>
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Kelas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data Kelas
                        </div>
                        <div class="panel-body">
                            <div class="row">
<?php
                            	$sql=mysql_query("select * from kelas where idk='$_GET[idk]'");
								$rs=mysql_fetch_array($sql);

?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_kelas">
<input type="hidden" name="idk" value="<?php echo $_GET['idk'] ?>" />

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select class="form-control" name="id">
  <?php
	$sqla=mysql_query("select * from sekolah");
	while($rsa=mysql_fetch_array($sqla)){
if($_SESSION['level']=="admin_guru"){
if($rsa['id']==$_SESSION['id']){

if($rs['id']==$rsa['id']){

	echo "<option value='$rsa[id]' selected='selected'>$rsa[nama]</option>";
}else{
	echo "<option value='$rsa[id]'>$rsa[nama]</option>";
}

}
}else{
if($rs['id']==$rsa['id']){

	echo "<option value='$rsa[id]' selected='selected'>$rsa[nama]</option>";
}else{
	echo "<option value='$rsa[id]'>$rsa[nama]</option>";
}

}
}
?>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Sekolah</label>
                                            <input class="form-control" placeholder="Kelas" name="nama" value="<?php echo $rs['nama'] ?>">
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
