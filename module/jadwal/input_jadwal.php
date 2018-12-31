<?php
if($_GET['act']=="input"){
	?>
          <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Input Data Jadwal</strong></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Data Jadwal
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                    <form method="post" role="form" action="././module/simpan.php?act=input_jadwal">

                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Hari</label>
																						<select class="form-control" name="hari" required>
																							<option>--Pilih Hari--</option>
  <?php
	$sql=mysql_query("select * from hari");
	while($rs=mysql_fetch_array($sql)){
	echo "<option value='$rs[idh]'>$rs[hari]</option>";
}

?>
                                          </select>
                                        </div>
																				<div class="form-group">
                                            <label>Jam Mulai</label>
																						<input type="time" class="form-control" required placeholder="Jam Mulai" name="jam_mulai">
                                        </div>
																				<div class="form-group">
                                            <label>Jam Selesai</label>
																						<input type="time" class="form-control" placeholder="Jam Selesai" name="jam_selesai">
                                        </div>
																</div>
																<div class="col-lg-6">
																	<div class="form-group">
																			<label>Mata Pelajaran</label>
																			<select class="form-control" name="pelajaran" required>
																				<option>--Pilih Mata Pelajaran--</option>
<?php
$sql=mysql_query("select * from mata_pelajaran");
while($rs=mysql_fetch_array($sql)){
echo "<option value='$rs[idm]'>$rs[nama_mp]</option>";
}

?>
																		</select>
																	</div>
																	<div class="form-group">
																			<label>Kelas</label>
																			<select class="form-control" name="kelas" required>
																				<option>--Pilih Kelas--</option>
<?php
$sql=mysql_query("select * from kelas");
while($rs=mysql_fetch_array($sql)){
echo "<option value='$rs[idk]'>$rs[nama]</option>";
}

?>
																		</select>
																	</div>
																	<div class="form-group">
																			<label>Guru</label>
																			<select class="form-control" name="guru" required>
																				<option>--Pilih Guru--</option>
<?php
$sql=mysql_query("select * from guru");
while($rs=mysql_fetch_array($sql)){
echo "<option value='$rs[idg]'>$rs[nama]</option>";
}

?>
																		</select>
																	</div>
																</div>
														</div>
														<div class="row">
																<div class="col-lg-12" align="center">
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
if($_GET['act']=="edit_jadwal"){
	?>
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Data Jadwal</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Edit Data Jadwal
                        </div>
                        <div class="panel-body">
                            <div class="row">
<?php
                            	$sql=mysql_query("select * from jadwal where idj='$_GET[idj]'");
								$rsx=mysql_fetch_array($sql);

?>
                                    <form method="post" role="form" action="././module/simpan.php?act=edit_jadwal">
<input type="hidden" name="idj" value="<?php echo $_GET['idj'] ?>" />

                                <div class="col-lg-6">


																				<div class="form-group">
                                            <label>Hari</label>
																						<select class="form-control" name="hari" required>
																							<option disabled>--Pilih Hari--</option>
  <?php
	$sqlx1=mysql_query("select * from hari WHERE idh='$rsx[idh]'");
	$rsx1=mysql_fetch_assoc($sqlx1);
	$sqlhari=mysql_query("select * from hari");
	$rshari=mysql_fetch_assoc($sqlhari);
	echo "<option if($rsx1[idh] == $rshari[idh] ) {echo \"selected\"; } hidden value='$rsx1[idh]'>$rsx1[hari]</option>";
	$sqlx2=mysql_query("select * from hari");
	while($rsx2=mysql_fetch_array($sqlx2)){
	echo "<option value='$rsx2[idh]'>$rsx2[hari]</option>";
}
?>
                                          </select>
                                        </div>
																				<div class="form-group">

                                            <label>Jam Mulai</label>
                                            <input type="time" class="form-control" name="jam_mulai" value="<?php echo "$rsx[jam_mulai]"; ?>">

                                        </div>
																				<div class="form-group">
																						<label>Jam Selesai</label>
																						<input type="time" class="form-control" value="<?php echo "$rsx[jam_selesai]"; ?>" name="jam_selesai">
																				</div>
																				</div>

												<div class="col-lg-6">
												<div class="form-group">
												<label>Mata Pelajaran</label>
												<select class="form-control" name="pelajaran" required>
												<option disabled>--Pilih Mata Pelajaran--</option>
												<?php
												$sqlx1=mysql_query("select * from mata_pelajaran WHERE idm='$rsx[idm]'");
												$rsx1=mysql_fetch_assoc($sqlx1);
												$sqlmp=mysql_query("select * from mata_pelajaran");
												$rsmp=mysql_fetch_assoc($sqlmp);
												echo "<option if($rsx1[idm] == $rsmp[idm] ) {echo \"selected\"; } hidden value='$rsx1[idm]'>$rsx1[nama_mp]</option>";
												$sqlx2=mysql_query("select * from mata_pelajaran");
												while($rsx2=mysql_fetch_array($sqlx2)){
												echo "<option value='$rsx2[idm]'>$rsx2[nama_mp]</option>";
												}

												?>
												</select>
												</div>
												<div class="form-group">
												<label>Kelas</label>
												<select class="form-control" name="kelas" required>
												<option disabled>--Pilih Kelas--</option>
												<?php
												$sqlx1=mysql_query("select * from kelas WHERE idk='$rsx[idk]'");
												$rsx1=mysql_fetch_assoc($sqlx1);
												$sqlkls=mysql_query("select * from kelas");
												$rskls=mysql_fetch_assoc($sqlkls);
												echo "<option if($rsx1[idk] == $rskls[idk] ) {echo \"selected\"; } hidden value='$rsx1[idk]'>$rsx1[nama]</option>";
												$sqlx2=mysql_query("select * from kelas");
												while($rsx2=mysql_fetch_array($sqlx2)){
												echo "<option value='$rsx2[idk]'>$rsx2[nama]</option>";
												}

												?>
												</select>
												</div>
												<div class="form-group">
												<label>Guru</label>
												<select class="form-control" name="guru" required>
												<option disabled>--Pilih Guru--</option>
												<?php
												$sqlx1=mysql_query("select * from guru WHERE idg='$rsx[idg]'");
												$rsx1=mysql_fetch_assoc($sqlx1);
												$sqlgr=mysql_query("select * from guru");
												$rsgr=mysql_fetch_assoc($sqlgr);
												echo "<option if($rsx1[idg] == $rsgr[idg] ) {echo \"selected\"; } hidden value='$rsx1[idg]'>$rsx1[nama]</option>";
												$sqlx2=mysql_query("select * from guru");
												while($rsx2=mysql_fetch_array($sqlx2)){
												echo "<option value='$rsx2[idg]'>$rsx2[nama]</option>";
												}

												?>
												</select>
												</div>
												</div>
												</div>
												<div class="row">
												<div class="col-lg-12" align="center">
												<button type="submit" class="btn btn-success">Simpan</button>
												</div>
																				<!-- /.col-lg-6 (nested) -->
																				</form>

																				</div>
																				<!-- /.row (nested) -->
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
