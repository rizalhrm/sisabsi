            <div class="row">
                <div class="col-lg-12">
					<h3 class="page-header"><strong>Input Data Absensi</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <?php $idj=$_GET['idj'];
                            $dataquery=mysql_query("select * from jadwal where idj='$idj'");
                            $arrayj=mysql_fetch_array($dataquery);
                            $datamp=mysql_query("select * from mata_pelajaran where idm='$arrayj[idm]'");
                            $arraymp=mysql_fetch_array($datamp);

                            echo "Data Siswa";
							$sqlj=mysql_query("select * from kelas where idk='$arrayj[idk]'");
							$rsj=mysql_fetch_array($sqlj);

							echo "Kelas $rsj[nama] | $arraymp[nama_mp]";
							 ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                           <form method="post" role="form" action="././module/simpan.php?act=input_absen&idj=<?php echo $idj ?>&tanggal=<?php echo date("Y-m-d") ?>&kelas=<?php echo $arrayj['idk'] ?>">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NIS</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Keterangan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=1;
$tg=date("Y-m-d");
$sqljk=mysql_query("select * from siswa where idk='$arrayj[idk]'");
	while($rs=mysql_fetch_array($sqljk)){
	$sqla=mysql_query("select * from absen where ids='$rs[ids]' and tgl='$tg' and idj='$idj'");
	$rsa=mysql_fetch_array($sqla);
	$conk=mysql_num_rows($sqla);
	$sqlw=mysql_query("select * from kelas where idk='$rs[idk]'");
	$rsw=mysql_fetch_array($sqlw);
	$sqlb=mysql_query("select * from sekolah where id='$rsw[id]'");
	$rsb=mysql_fetch_array($sqlb);

?>                                        <tr class="odd gradeX">
                                            <td><label style="font-weight:normal;"><?php echo "$rs[nis]";  ?></label></td>
                                            <td><label style="font-weight:normal;"><?php echo "$rs[nama]";  ?></label></td>

                                            <td class="text-center">
                                                                                    <div class="form-group">

<?php
if($conk==0){
?>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="A"  >A
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="I">I
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="S">S
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="M" >M
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="N" checked>N
                                            </label>


<?php } ?>

<?php
if($rsa['ket']=="A"){
?>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="A" checked >A
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="I">I
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="S">S
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="M" >M
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="N" >N
                                            </label>


<?php } ?>
<?php
if($rsa['ket']=="I"){
?>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="A"  >A
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="I" checked>I
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="S">S
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="M" >M
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="N" >N
                                            </label>


<?php } ?>
<?php
if($rsa['ket']=="S"){
?>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="A"  >A
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="I" >I
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="S" checked>S
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="M" >M
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="N" >N
                                            </label>


<?php } ?>
<?php
if($rsa['ket']=="M"){
?>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="A"  >A
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="I" >I
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="S" >S
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="M" checked>M
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="N" >N
                                            </label>


<?php } ?>
<?php
if($rsa['ket']=="N"){
?>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="A"  >A
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="I" >I
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="S" >S
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="M" >M
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="<?php echo $rs['ids'] ?>" value="N" checked >N
                                            </label>


<?php } ?>


                                        </div>

                                            </td>

                                        </tr>
<?php
}
?>
                                    </tbody>
                                </table>
                                        <button type="submit" class="btn btn-success">Simpan Data Absen</button>

</form>
                            </div>
                            <!-- /.table-responsive -->
<br>
                            <div class="well">
                                <h4>Keterangan Absensi</h4>
                                <p>A = Tidak Masuk Tanpa Keterangan</p>
                                <p>I = Tidak Masuk Ada Surat Ijin Atau Pemberitahuan</p>
                                <p>S = Tidak Masuk Ada Surat Dokter Atau Pemberitahuan</p>
                                <p>M = Hadir</p>
                                <p>N = Belum di Absen</p>

                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
