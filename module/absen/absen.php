<?php
$today= hari_ina(date("l"));
$query=mysql_query("select * from hari where hari='$today'");
$id_hari=mysql_fetch_array($query);
$now= date("H:i:s");
$aktifkan=mysql_query("update jadwal set aktif=1 where idh=$id_hari[idh] AND jam_mulai<= '$now' AND jam_selesai>= '$now'");
$nonaktifkan=mysql_query("update jadwal set aktif=0 where idh<>$id_hari[idh]");
$nonaktifkan2=mysql_query("update jadwal set aktif=0 where idh=$id_hari[idh] AND jam_mulai>= '$now' OR jam_selesai<= '$now'");
$tentukan=mysql_query("select * from jadwal WHERE idj='$_GET[idj]'");
$aktifgak=mysql_fetch_array($tentukan);
if ($aktifgak['aktif']==1) {
  include "input_absen.php";
}
else {
  echo "<center><br><h3>Maaf, Anda tidak bisa mengabsen siswa diluar jam pelajaran.</h3>
    <a href=media.php?module=jadwal_mengajar><b>Kembali</b></a></center>";
}
 ?>
