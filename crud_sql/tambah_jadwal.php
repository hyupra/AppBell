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
$pembaruan = date("Y-m-d h:i");

$query = "INSERT INTO `tb_jadwal` (`id_jadwal`, `nama_jadwal`, `hari`, `jam_bunyi`, `id_mp3`, `pembaruan`) VALUES (NULL, '$nama_jadwal', '$hari', '$jam_bunyi', '$sama', '$pembaruan');";

$sql = mysqli_query($koneksi , $query);

header("location:../pengaturan.php");
 echo $query;
//mysql_close($host);
?>