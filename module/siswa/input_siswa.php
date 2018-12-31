<?php
if($_GET['act']=="input"){
	?>
          <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><strong>Input Data Siswa</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Siswa
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_siswa">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input class="form-control" placeholder="Nis" name="nis">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" placeholder="Nama" name="nama">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="L"
                                                    checked>Laki - Laki
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="P">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select class="form-control" name="kelas">
  <?php
	$sql=mysql_query("select * from kelas");
	while($rs=mysql_fetch_array($sql)){

	$sqla=mysql_query("select * from sekolah where id='$rs[id]'");
	$rsa=mysql_fetch_array($sqla);
if($_SESSION['level']=="admin_guru"){
if($rsa['id']==$_SESSION['id']){
	echo "<option value='$rs[idk]'>$rs[nama]</option>";
}
}else{
	echo "<option value='$rs[idk]'>$rs[nama]</option>";
	}
}
?>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">+62</span>
                                            <input type="text" class="form-control" placeholder="No Telepon" name="tlp">
                                        </div>
</div>

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama Ayah</label>
                                            <input class="form-control" placeholder="Nama" name="bapak">
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <input class="form-control" placeholder="Pekerjaan" name="k_bapak">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Ibu</label>
                                            <input class="form-control" placeholder="Nama" name="ibu">
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <input class="form-control" placeholder="Pekerjaan" name="k_ibu">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" placeholder="Password" name="k_password" type="password">
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
if($_GET['act']=="edit"){
	?>
          <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Edit Data Siswa</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data Siswa
                        </div>
                        <div class="panel-body">
                            <div class="row">
<?php
                            	$sql=mysql_query("select * from siswa where ids='$_GET[ids]'");
								$rs=mysql_fetch_array($sql);
?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_siswa">
<input type="hidden" name="id" value="<?php echo $_GET['ids'] ?>" />
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input class="form-control" required placeholder="Nis" name="nis" value="<?php echo "$rs[nis]"; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" placeholder="Nama" name="nama" value="<?php echo "$rs[nama]"; ?>">
                                        </div>
                                        <div class="form-group">

                                           <label>Jenis Kelamin</label>
        <?php if($rs['jk']=="L"){ ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="L"
                                                    checked>Laki - Laki
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="P">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
<?php } ?>
        <?php if($rs['jk']=="P"){ ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="L"
                                                    >Laki - Laki
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="jk" value="P" checked>
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
<?php } ?>


                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"><?php echo "$rs[alamat]"; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <select class="form-control" name="kelas">
  <?php
 	$sqlc=mysql_query("select * from kelas");
	while($rsc=mysql_fetch_array($sqlc)){
	$sqla=mysql_query("select * from sekolah where id='$rsc[id]'");
	$rsa=mysql_fetch_array($sqla);
if($_SESSION['level']=="admin_guru"){
if($rsa['id']==$_SESSION['id']){

if($rs['idk']==$rsc['idk']){
	echo "<option value='$rsc[idk]' selected>$rsc[nama]</option>";
}else{
	echo "<option value='$rsc[idk]'>$rsc[nama]</option>";

}
}
}else{
if($rs['idk']==$rsc['idk']){
	echo "<option value='$rsc[idk]' selected>$rsc[nama]</option>";
}else{
	echo "<option value='$rsc[idk]'>$rsc[nama]</option>";

}

}
}?>
                                          </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">+62</span>
                                            <input type="text" class="form-control" placeholder="No Telepon" name="tlp" value="<?php echo "$rs[tlp]"; ?>">
                                        </div>
</div>

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama Ayah</label>
                                            <input class="form-control" placeholder="Nama" name="bapak" value="<?php echo "$rs[bapak]"; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <input class="form-control" placeholder="Pekerjaan" name="k_bapak" value="<?php echo "$rs[k_bapak]"; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Ibu</label>
                                            <input class="form-control" placeholder="Nama" name="ibu" value="<?php echo "$rs[ibu]"; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <input class="form-control" placeholder="Pekerjaan" name="k_ibu" value="<?php echo "$rs[k_ibu]"; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" placeholder="Password" name="k_password" value="" type="password">
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
