<?php
error_reporting(0);
//Jam-------------------------
date_default_timezone_set("Asia/Jakarta");
$jamphp = Date('H:i');
include "koneksi.php";
include "asset/waktu/hari_jadwal.php";
include "asset/waktu/hari.php";
include "asset/waktu/jam.php";
//SQL----------------------
$sql_mp3="SELECT * FROM `tb_mp3`";
$sql_jadwal="SELECT tb_jadwal.hari,tb_jadwal.jam_bunyi,tb_jadwal.nama_jadwal,tb_mp3.nama_file FROM tb_jadwal INNER JOIN tb_mp3 ON tb_jadwal.id_mp3 = tb_mp3.id_mp3 where hari = '$hari_ini2'";
$sql_jadwal_bunyi = "SELECT * FROM `tb_jadwal` where hari = '$hari_ini2' and jam_bunyi >='$jamphp' order by jam_bunyi asc limit 0,1 ";

$sql_bunyi = "SELECT tb_jadwal.hari,tb_jadwal.jam_bunyi,tb_jadwal.nama_jadwal,tb_mp3.nama_file FROM tb_jadwal INNER JOIN tb_mp3 ON tb_jadwal.id_mp3 = tb_mp3.id_mp3 where hari = '$hari_ini2' and jam_bunyi >='$jamphp' order by jam_bunyi asc limit 0,1";
//Query-------------------------
$query_mp3=mysqli_query($koneksi,$sql_mp3);
$query_jadwal=mysqli_query($koneksi,$sql_jadwal);
$query_bunyi = mysqli_query($koneksi, $sql_bunyi);
//DATA---------------------------
$fvt_bunyi =mysqli_fetch_array($query_bunyi);
$st = substr($fvt_bunyi['jam_bunyi'],0,5);


$i = 1;
$musik=$_POST['musik'];
$username=$_POST['username'];
$password=$_POST['password'];
//echo $jamphp;
//echo $st;
//echo $fvt_bunyi['nama_file'];

?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="refresh" content="58" >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Aplikasi</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/chartist/css/chartist.css" rel="stylesheet">
    <link href="lib/rickshaw/css/rickshaw.min.css" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="css/slim.css">

  </head>
  <body>


  <?php
  if($jamphp == $st){ ?>

  <audio src="terupload/<?php echo $fvt_bunyi['nama_file'];?>" autoplay></audio>
 <?php
 }
?>


    <div class="slim-header">
      <div class="container">
        <div class="slim-header-left">
          <h2 class="slim-logo"><a href="index.html">BEll SEKOLAH<span>.</span></a></h2>
        </div><!-- slim-header-left -->
        <div class="slim-header-right">




          <div class="dropdown dropdown-c">
            <a href="#" class="logged-user" data-toggle="dropdown">
              <!-- <img src="http://via.placeholder.com/500x500" alt=""> -->
              <span>wahyu</span>
              <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <nav class="nav">
                <a href="page-profile.html" class="nav-link"><i class="icon ion-person"></i> View Profile</a>
                <a href="page-signin.html" class="nav-link"><i class="icon ion-forward"></i> Sign Out</a>
              </nav>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </div><!-- header-right -->
      </div><!-- container -->
    </div><!-- slim-header -->

    <div class="slim-navbar">
      <div class="container">
        <ul class="nav">

          <li class="nav-item active">
            <a class="nav-link" href="index.php">
              <i class="icon ion-ios-home-outline"></i>
              <span>Beranda</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="upload_h.php">
              <i class="icon ion-ios-upload-outline"></i>
              <span>Upload MP3</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pengaturan.php">
              <i class="icon ion-ios-cog-outline"></i>
              <span>Pengaturan</span>
            </a>
          </li>
        </ul>
      </div><!-- container -->
    </div><!-- slim-navbar -->

    <div class="slim-mainpanel">
      <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item " style="font-size: 17px";><a href="#"><script language='JavaScript'>document.write(tanggallengkap);</script></a></li>
          </ol>
          <h6 class="slim-pagetitle" style="font-size: 30px;"><div id='jam' ></div></h6>
        </div><!-- slim-pageheader -->


        <div class="card">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <h5>Jadwal Hari <script language='JavaScript'>document.write(namahari[hari]);</script></h5>
            <table class="table table-hover table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Hari</th>
                <th scope="col">Jam Berbunyi</th>
                <th scope="col">Jadwal</th>
                <th scope="col">Audio</th>
              </tr>
            </thead>
            <tbody>
            <?php
                foreach($query_jadwal as $jadwalx){
                ?>
              <tr>
                <th scope="row"><?php echo $i ++?></th>
                <td><?php echo $jadwalx['hari'];?></td>
                <td><?php echo $jadwalx['jam_bunyi'];?></td>
                <td><?php echo $jadwalx['nama_jadwal'];?></td>
                <td><?php echo $jadwalx['nama_file'];?></td>
              </tr>
           <?php } ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>





<?php
  include "asset/jam.php";
?>





      </div><!-- container -->
    </div><!-- slim-mainpanel -->



    <script src="lib/jquery/js/jquery.js"></script>
    <script src="lib/popper.js/js/popper.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="lib/chartist/js/chartist.js"></script>
    <script src="lib/d3/js/d3.js"></script>
    <script src="lib/rickshaw/js/rickshaw.min.js"></script>
    <script src="lib/jquery.sparkline.bower/js/jquery.sparkline.min.js"></script>

    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/slim.js"></script>


  </body>
</html>
