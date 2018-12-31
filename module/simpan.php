<?php
include "../config/conn.php";

if($_GET['act']=="input_user"){
$pw=md5($_POST['pass']);
mysql_query("INSERT INTO user(nama,pass,level,id)
VALUES(
'$_POST[nama]',
'$pw',
'admin_guru','$_POST[sekolah]')");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=user')</script>";

}
if($_GET['act']=="edit_user"){
if(!empty($_POST['pass'])){
$pw=md5($_POST['pass']);
mysql_query("update user set nama='$_POST[nama]',
pass='$pw',id='$_POST[sekolah]' where idu='$_POST[idu]'");
}else{
mysql_query("update user set nama='$_POST[nama]',id='$_POST[sekolah]' where idu='$_POST[idu]'");

}
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=user')</script>";

}

if($_GET['act']=="hapus_user"){
mysql_query("delete from user where idu='$_GET[idu]'");
echo "<script>window.alert('Data Terhapus');
        window.location=('../media.php?module=user')</script>";

}



if($_GET['act']=="input_siswa")
{
$mr=md5($_POST["k_password"]);
mysql_query("INSERT INTO siswa(nis,nama,jk,alamat,idk,tlp,bapak,k_bapak,ibu,k_ibu,pass)
VALUES(
'$_POST[nis]',
'$_POST[nama]',
'$_POST[jk]',
'$_POST[alamat]',
'$_POST[kelas]',
'$_POST[tlp]',
'$_POST[bapak]',
'$_POST[k_bapak]',
'$_POST[ibu]',
'$_POST[k_ibu]',
'$mr')");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=siswa&kls=semua')</script>";

}

if($_GET['act']=="edit_siswa"){
$mr=md5($_POST["k_password"]);
mysql_query("UPDATE siswa SET nis='$_POST[nis]',
nama='$_POST[nama]',
jk='$_POST[jk]',
alamat='$_POST[alamat]',
idk='$_POST[kelas]',
tlp='$_POST[tlp]',
bapak='$_POST[bapak]',
k_bapak='$_POST[k_bapak]',
ibu='$_POST[ibu]',
k_ibu='$_POST[k_ibu]',
pass='$mr'  where ids='$_POST[id]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=siswa&kls=semua')</script>";

}

if($_GET['act']=="siswa_det"){
	$pw=md5($_POST['pass']);
if(!empty($_POST['pass'])){
mysql_query("UPDATE siswa SET pass='$pw' where ids='$_POST[id]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=siswa_det')</script>";
}else{
echo "<script>window.alert('Isi Password');
        window.location=('../media.php?module=siswa_det')</script>";

}
}

if($_GET['act']=="hapus"){
mysql_query("delete from siswa where ids='$_GET[ids]'");
echo "<script>window.alert('Data Terhapus');
        window.location=('../media.php?module=siswa&kls=semua')</script>";

}
if($_GET['act']=="input_absen"){
//echo "$_GET[klas] <br>";
//echo "$_GET[tanggal] <br>";
//echo "$_GET[bulan] <br>";
//echo "$_GET[tahun] <br>";


	$sql=mysql_query("select * from siswa where idk='$_GET[kelas]' ");
	while($rs=mysql_fetch_array($sql)){

$ra=$rs['ids'];
$tgl=$_GET['tanggal'];
	$sqla=mysql_query("select * from absen where ids='$rs[ids]' and tgl='$tgl' and idj='$_GET[idj]'");
	$rsa=mysql_fetch_array($sqla);
	$conk=mysql_num_rows($sqla);

//echo "$rs[nama] $_POST[$ra] <br>";
if($conk==0){

mysql_query("INSERT INTO absen(ids,idj,tgl,ket)
VALUES(
'$rs[ids]',
'$_GET[idj]',
'$tgl',
'$_POST[$ra]')");
//echo "SIMPAN";
}else{
mysql_query("update absen set ket='$_POST[$ra]' where ids='$rs[ids]' and tgl='$tgl' and idj='$_GET[idj]'");
//echo "edit";

}


	}
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=jadwal_mengajar')</script>";

}


if($_GET['act']=="input_sekolah"){
mysql_query("INSERT INTO sekolah(kode,nama,alamat)
VALUES(
'$_POST[kode]',
'$_POST[nama]',
'$_POST[alamat]')");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=sekolah')</script>";

}
if($_GET['act']=="edit_sekolah"){
mysql_query("update sekolah set kode='$_POST[kode]',
nama='$_POST[nama]',
alamat='$_POST[alamat]' where id='$_POST[id]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=sekolah')</script>";

}
if($_GET['act']=="hapus_sekolah"){
mysql_query("delete from sekolah where id='$_GET[id]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=sekolah')</script>";

}




if($_GET['act']=="input_kelas"){
mysql_query("INSERT INTO kelas(id,nama)
VALUES(
'$_POST[id]',
'$_POST[nama]')");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=kelas')</script>";

}
if($_GET['act']=="edit_kelas"){
mysql_query("update kelas set id='$_POST[id]',
nama='$_POST[nama]' where idk='$_POST[idk]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=kelas')</script>";

}
if($_GET['act']=="hapus_kelas"){
mysql_query("delete from kelas  where idk='$_GET[idk]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=kelas')</script>";

}



if($_GET['act']=="input_pelajaran"){
mysql_query("INSERT INTO mata_pelajaran(nama_mp)
VALUES(
'$_POST[nama_mp]')");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=mata_pelajaran')</script>";

}
if($_GET['act']=="edit_pelajaran"){
mysql_query("update mata_pelajaran set nama_mp='$_POST[nama_mp]' where idm='$_POST[idm]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=mata_pelajaran')</script>";

}
if($_GET['act']=="hapus_pelajaran"){
mysql_query("delete from mata_pelajaran  where idm='$_GET[idm]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=mata_pelajaran')</script>";

}


if($_GET['act']=="input_jadwal"){
mysql_query("INSERT INTO jadwal(idh,idg,idk,idm,jam_mulai,jam_selesai)
VALUES(
'$_POST[hari]','$_POST[guru]','$_POST[kelas]','$_POST[pelajaran]','$_POST[jam_mulai]','$_POST[jam_selesai]')");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=senin')</script>";

}
if($_GET['act']=="edit_jadwal"){
mysql_query("update jadwal set idh='$_POST[hari]' ,
idg='$_POST[guru]',
idk='$_POST[kelas]',
idm='$_POST[pelajaran]',
jam_mulai='$_POST[jam_mulai]',
jam_selesai='$_POST[jam_selesai]' where idj='$_POST[idj]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=senin')</script>";

}
if($_GET['act']=="hapus_jadwal"){
mysql_query("delete from jadwal where idj='$_GET[idj]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=senin')</script>";

}


if($_GET['act']=="input_guru"){
$mrg=md5($_POST['k_password']);
mysql_query("INSERT INTO guru(nip,nama,jk,alamat,idk,pass)
VALUES(
'$_POST[nip]',
'$_POST[nama]',
'$_POST[jk]',
'$_POST[alamat]',
'$_POST[kelas]',
'$mrg')");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=guru&kls=semua')</script>";

}
if($_GET['act']=="edit_guru"){
$mrg=md5($_POST['k_password']);
mysql_query("update guru set nip='$_POST[nip]',
nama='$_POST[nama]',
jk='$_POST[jk]',
alamat='$_POST[alamat]',
pass='$mrg',
idk='$_POST[kelas]' where idg='$_POST[idg]'");
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=guru&kls=semua')</script>";

}
if($_GET['act']=="hapus_guru"){
mysql_query("delete from guru  where idg='$_GET[idg]'");
echo "<script>window.alert('Data Guru Sudah Terhapus');
		window.location=('../media.php?module=guru&kls=semua')</script>";

}



if($_GET['act']=="guru_det"){
if(!empty($_POST['pass'])){
$pw=md5($_POST['pass']);
mysql_query("update guru set nama='$_POST[nama]',
jk='$_POST[jk]',
alamat='$_POST[alamat]',pass='$pw' where idg='$_POST[idg]'");
}else{
mysql_query("update guru set nama='$_POST[nama]',
jk='$_POST[jk]',
alamat='$_POST[alamat]' where idg='$_POST[idg]'");

}
echo "<script>window.alert('Data Tersimpan');
        window.location=('../media.php?module=guru_det')</script>";

}


?>
