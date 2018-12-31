<?php
if($_GET['module']=="home"){
include "module/home.php";
}
if($_GET['module']=="siswa"){
include "module/siswa/siswa.php";
}
if($_GET['module']=="tampil"){
include "module/siswa/tampil.php";
}
if($_GET['module']=="input_siswa"){
include "module/siswa/input_siswa.php";
}
if($_GET['module']=="siswa_det"){
include "module/siswa/siswa_det.php";
}
if($_GET['module']=="detail_siswa"){
include "module/siswa/detail_siswa.php";
}

if($_GET['module']=="absen"){
include "module/absen/absen.php";
}

if($_GET['module']=="rekap_s"){
include "module/laporan/siswa/rekap.php";
}
if($_GET['module']=="rekap_g"){
include "module/laporan/guru/rekap.php";
}


if($_GET['module']=="user"){
include "module/user/user.php";
}
if($_GET['module']=="input_user"){
include "module/user/input_user.php";
}

if($_GET['module']=="input_guru"){
include "module/guru/input_guru.php";
}
if($_GET['module']=="detail_guru"){
include "module/guru/detail_guru.php";
}
if($_GET['module']=="guru_det"){
include "module/guru/guru_det.php";
}

if($_GET['module']=="jadwal_mengajar"){
include "module/guru/jadwal_mengajar.php";
}
if($_GET['module']=="guru"){
include "module/guru/guru.php";
}
if($_GET['module']=="input_kelas"){
include "module/kelas/input_kelas.php";
}
if($_GET['module']=="kelas"){
include "module/kelas/kelas.php";
}
if($_GET['module']=="input_sekolah"){
include "module/sekolah/input_sekolah.php";
}
if($_GET['module']=="sekolah"){
include "module/sekolah/sekolah.php";
}
if($_GET['module']=="mata_pelajaran"){
include "module/pelajaran/pelajaran.php";
}
if($_GET['module']=="input_pelajaran"){
include "module/pelajaran/input_pelajaran.php";
}
if($_GET['module']=="senin"){
include "module/jadwal/senin.php";
}
if($_GET['module']=="selasa"){
include "module/jadwal/selasa.php";
}
if($_GET['module']=="rabu"){
include "module/jadwal/rabu.php";
}
if($_GET['module']=="kamis"){
include "module/jadwal/kamis.php";
}
if($_GET['module']=="jumat"){
include "module/jadwal/jumat.php";
}
if($_GET['module']=="input_jadwal"){
include "module/jadwal/input_jadwal.php";
}

if($_GET['module']=="siswa_senin"){
include "module/jadwal_siswa/siswa_senin.php";
}
if($_GET['module']=="siswa_selasa"){
include "module/jadwal_siswa/siswa_selasa.php";
}
if($_GET['module']=="siswa_rabu"){
include "module/jadwal_siswa/siswa_rabu.php";
}
if($_GET['module']=="siswa_kamis"){
include "module/jadwal_siswa/siswa_kamis.php";
}
if($_GET['module']=="siswa_jumat"){
include "module/jadwal_siswa/siswa_jumat.php";
}
?>
