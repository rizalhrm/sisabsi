<?php
$acuan=$_GET['idj'];
$sqlacuan=mysql_query("select * from jadwal where idj='$acuan'");
$rss=mysql_fetch_array($sqlacuan);
$sqlrss=mysql_query("select * from siswa where nis='$uidi'");
$siswa=mysql_fetch_array($sqlrss);
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
                        echo "Tahun Ajaran $tahun1 - $tahun2 ($nama_mp[nama_mp])";
                      }
                      else {
                        echo "Tahun Ajaran $tahun2 - $tahun1 ($nama_mp[nama_mp])";
                      }
                      ?>
                      </strong>
                    </h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data Absensi Siswa
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
<?php
$sqlabsen=mysql_query("select DISTINCT tgl from absen where idj='$acuan' AND ids='$siswa[ids]'");
 ?>
<table class="table table-striped table-bordered table-hover">
  <tr>
    <td colspan="2" class="text-center info"><?php echo "<b>$nama_hari[hari], $rss[jam_mulai] - $rss[jam_selesai]</b>";?></td>
  </tr>
  <tr>
    <td class="success text-center" rowspan="2"><b>Tanggal (TGL/BLN)</b></td>
    <td class="text-center success"><b>Siswa</b></td>
  </tr>
  <tr>
    <?php
    $siswanya=mysql_fetch_array($sqlrss);
    ?>
    <td class="text-center warning"><?php echo "<b>$usre | Kelas : $rs[nama]</b>"; ?></td>
  </tr>
  <?php
  while ($tglnya=mysql_fetch_array($sqlabsen)) {
    $pecah = explode("-", $tglnya['tgl']);
    $satu=$pecah[0];
    $dua=$pecah[1];
    $tiga=$pecah[2];
  ?>
  <tr>
    <td class="text-center warning"><?php echo "<b>$tiga/$dua</b>"; ?></td>
    <?php
    $sqlabsen2=mysql_query("select ket from absen where ids='$siswa[ids]' AND idj='$acuan' AND tgl='$tglnya[tgl]'");
    while($ketnya=mysql_fetch_array($sqlabsen2)) {
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
                                <p>A = Tidak Masuk Tanpa Keterangan</p>
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
