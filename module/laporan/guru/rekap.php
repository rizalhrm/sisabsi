<?php
$acuan=$_GET['idj'];
$sqlacuan=mysql_query("select * from jadwal where idj='$acuan'");
$rss=mysql_fetch_array($sqlacuan);
$sqlkss=mysql_query("select * from kelas where idk='$rss[idk]'");
$kss=mysql_fetch_array($sqlkss);
$sqlmp=mysql_query("select * from mata_pelajaran where idm='$rss[idm]'");
$nama_mp=mysql_fetch_array($sqlmp);
$sqlidh=mysql_query("select * from hari where idh='$rss[idh]'");
$nama_hari=mysql_fetch_array($sqlidh);

$pecah = explode(" ", $tgl_lengkap);
$satu=$pecah[0];
$dua=$pecah[1];
$tahun1=$pecah[2];

if ($dua=="Juli" || $dua=="Agustus" || $dua=="September" || $dua=="Oktober" || $dua=="November" || $dua=="Desember") {
  $tahun2=$tahun1 + 1;
}
else {
  $tahun2=$tahun1 - 1;
}
?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">
                      <strong>
                      <?php
                      if ($dua=="Juli" || $dua=="Agustus" || $dua=="September" || $dua=="Oktober" || $dua=="November" || $dua=="Desember") {
                        echo "Tahun Ajaran $tahun1 - $tahun2";
                      }
                      else {
                        echo "Tahun Ajaran $tahun2 - $tahun1";
                      }
                      ?>
                      </strong>
                      <form action="module/laporan/guru/cetak_rekap.php" method="post">
                        <input type="hidden" name="idj" value="<?php echo $acuan; ?>">
                        <input type="hidden" name="tgl_lengkap" value="<?php echo $tgl_lengkap; ?>">
                        <input style="float:right; margin-top:-40px;" class="btn btn-success btn-lg" type="submit" name="cetak" value="Cetak">
                      </form>
                    </h3>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Absensi Kelas <?php echo "<b>$kss[nama] | $nama_mp[nama_mp]</b>";
?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
<?php
$sqlabsen=mysql_query("select DISTINCT tgl from absen where idj='$acuan'");
$jumlahtanggal = mysql_num_rows($sqlabsen);
$jumlahkolom=$jumlahtanggal+1;
 ?>
<table class="table table-striped table-bordered table-hover">
  <tr>
    <td colspan="<?php echo $jumlahkolom; ?>" class="text-center info"><?php echo "<b>$nama_hari[hari], $rss[jam_mulai] - $rss[jam_selesai]</b>";?></td>
  </tr>
  <tr>
    <td class="success text-center" rowspan="2"><b>Siswa</b></td>
    <td colspan="<?php echo $jumlahtanggal; ?>" class="text-center success"><b>Tanggal (TGL/BLN)</b></td>
  </tr>
  <tr>
    <?php
    while ($tglnya=mysql_fetch_array($sqlabsen)) {
      $pecah = explode("-", $tglnya['tgl']);
      $satu=$pecah[0];
      $dua=$pecah[1];
      $tiga=$pecah[2];
    ?>
    <td class="text-center warning"><?php echo "<b>$tiga/$dua</b>"; ?></td>
<?php } ?>
  </tr>
  <?php
  $sqlrss=mysql_query("select * from siswa where idk='$rss[idk]'");
  while ($siswanya=mysql_fetch_array($sqlrss)) {
  ?>
  <tr>
    <td class="text-center warning"><?php echo $siswanya['nama']; ?></td>
    <?php
    $sqlabsen2=mysql_query("select ket from absen where ids='$siswanya[ids]' AND idj='$acuan'");
    while ($ketnya=mysql_fetch_array($sqlabsen2)) {
    ?>
    <td class="text-center"><?php echo $ketnya['ket']; ?></td>
    <?php } ?>
  </tr>
<?php } ?>
</table>

                            </div>


                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Keterangan Absensi</h4>
                                <p>A = Tidak Masuk Tanpa Keterangan<br>
                                <p>I = Tidak Masuk Ada Surat Ijin Atau Pemberitahuan</p>
                                <p>S = Tidak Masuk Ada Surat Dokter Atau Pemberitahuan</p>
                                <p>M = Hadir</p>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
