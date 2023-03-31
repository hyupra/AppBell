<?php
include '../koneksi.php';
// menyimpan data id kedalam variabel


    $id  = $_GET['id_jadwal'];
    echo $id;
    // query SQL untuk insert data
    $query="DELETE from tb_jadwal where id_jadwal='$id'";
    echo $query;
    mysqli_query($koneksi, $query);
    // mengalihkan ke halaman index.php
    header("location:../pengaturan.php");

?>