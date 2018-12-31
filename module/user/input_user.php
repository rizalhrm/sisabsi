<?php
if($_GET['act']=="input"){
	?>
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Data User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_user">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" placeholder="Username" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" placeholder="Password" name="pass">
                                        </div>

                                                                                <div class="form-group">
                                            <label>Sekolah</label>
                                            <select class="form-control" name="sekolah">
  <?php
	$sqla=mysql_query("select * from sekolah");
	while($rsa=mysql_fetch_array($sqla)){

	echo "<option value='$rsa[id]'>$rsa[nama]</option>";
}

?>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-success">Submit Button</button>
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
if($_GET['act']=="edit_user"){
	?>
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data User
                        </div>
                        <div class="panel-body">
                            <div class="row">
<?php
                            	$sql=mysql_query("select * from user where idu='$_GET[idu]'");
								$rs=mysql_fetch_array($sql);

?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_user">
<input type="hidden" name="idu" value="<?php echo $_GET['idu'] ?>" />

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" placeholder="Username" name="nama" value="<?php echo "$rs[nama]"; ?>">
</div>
                                        <div class="form-group">

                                            <label>Password</label>
                                            <input class="form-control" placeholder="Password" name="pass">

                                        </div>
                                        <div class="form-group">
                                            <label>Sekolah</label>
                                            <select class="form-control" name="sekolah">
  <?php
	$sqla=mysql_query("select * from sekolah");
	while($rsa=mysql_fetch_array($sqla)){
if($_SESSION['level']=="admin_guru"){
if($rsa['id']==$_SESSION['id']){

if($rs['id']==$rsa['id']){
	echo "<option value='$rsa[id]' selected>$rsa[nama]</option>";
}else{
	echo "<option value='$rsa[id]'>$rsa[nama]</option>";
}

}
}else{
if($rs['id']==$rsa['id']){
	echo "<option value='$rsa[id]' selected>$rsa[nama]</option>";
}else{
	echo "<option value='$rsa[id]'>$rsa[nama]</option>";
}

	}
}?>
                                          </select>
                                        </div>

                                        <button type="submit" class="btn btn-success">Submit Button</button>
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
