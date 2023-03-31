<?php
include '../koneksi.php';
// menyimpan data id kedalam variabel


    $id  = $_GET['id_mp3'];
    echo $id;
    // query SQL untuk insert data
    $query="DELETE from tb_mp3 where id_mp3='$id'";
    echo $query;
    mysqli_query($koneksi, $query);
    // mengalihkan ke halaman index.php
    header("location:../upload_h.php");

?>