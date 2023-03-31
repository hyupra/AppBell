<?php
include('../koneksi.php');
$id_jadwal = $_GET['id_jadwal'];
$hari = $_GET['hari'];
$nama_jadwal = $_GET['nama_jadwal'];
$jam_bunyi = $_GET['jam_bunyi'];
$audio = $_GET['audiosc'];
//query update
$conv = "SELECT id_mp3 FROM `tb_mp3` where nama_file='$audio'";
$quer = mysqli_query($koneksi , $conv);
$we = mysqli_fetch_array($quer);
$sama = $we['id_mp3'];

$query = "UPDATE `tb_jadwal` SET `nama_jadwal` = '$nama_jadwal', `hari` = '$hari', `jam_bunyi` = '$jam_bunyi', `id_mp3` = '$sama' WHERE `tb_jadwal`.`id_jadwal` = $id_jadwal;";
$sql = mysqli_query($koneksi , $query);

header("location:../pengaturan.php");
 echo $query;
//mysql_close($host);
?>