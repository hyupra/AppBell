<?php
include "koneksi.php";
$sql_mp3 = "SELECT * FROM `tb_mp3`";
$mp3_query = mysqli_query($koneksi, $sql_mp3);
$nom = 1;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Auto Bell</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/chartist/css/chartist.css" rel="stylesheet">
    <link href="lib/rickshaw/css/rickshaw.min.css" rel="stylesheet">

    <!-- Slim CSS -->
    <link rel="stylesheet" href="css/slim.css">

  </head>
  <body>
    <div class="slim-header">
      <div class="container">
        <div class="slim-header-left">
          <h2 class="slim-logo"><a href="index.html">Apllikasi Bell<span>.</span></a></h2>
        </div><!-- slim-header-left -->
        <div class="slim-header-right">

          <div class="dropdown dropdown-c">
            <a href="#" class="logged-user" data-toggle="dropdown">
              <span>wahyu</span>
              <i class="fa fa-angle-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <nav class=" nav">
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
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon ion-ios-home-outline"></i>
              <span>Beranda</span>
            </a>
          </li>
          <li class="nav-item active">
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
            <li class="breadcrumb-item"><a href="#">Aplikasi Bell</a></li>
            <li class="breadcrumb-item active" aria-current="page">Beranda</li>
          </ol>
          <h6 class="slim-pagetitle">Beranda</h6>
        </div><!-- slim-pageheader -->


        <div class="card">
    <div class="card-body">


<!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
  Upload
</button>


<br><br>
<table class="table table-hover table-responsive-sm">
    <thead>
        <tr>
        <th scope="col">No</th>
        <th scope="col">id_mp3</th>
        <th scope="col">Nama_file</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
            foreach($mp3_query as $jadwalx){
    ?>
        <tr>
            <th scope="row"><?php echo $nom++; ?></th>
            <td><?php echo $jadwalx['id_mp3']; ?></td>
            <td><?php echo $jadwalx['nama_file']; ?></td>
            <td><a name="hapus" value="hapus" href='crud_sql/hapus_mp3.php?id_mp3=<?php echo $jadwalx['id_mp3']?>' class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
            
  </div>
</div>


<?php
include "koneksi.php";
// ambil data file
if(isset($_POST['upload'])){
$namaFile = $_FILES['berkas']['name'];
$namaSementara = $_FILES['berkas']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "terupload/";
$ekstensi_diperbolehkan	= array('mp3');
			
			$x = explode('.', $namaFile);
			$ekstensi = strtolower(end($x));


// pindahkan file


if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
  $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
        if ($terupload) {
            echo "<script>alert('Upload Berhasil')</script>";

                $sql = "INSERT INTO `tb_mp3` (`id_mp3`, `nama_file`, `keterangan`) VALUES (NULL, '$namaFile', 'q')";
                $query = mysqli_query($koneksi, $sql);
                
        } else {
            echo "Upload Gagal!";
        }

    }else
    echo "<script>alert('Ekstensi harus mp3')</script>";
}
?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Mp3</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     
        <div class="custom-file">
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="berkas" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Upload File mp3</label>
        </div>
        </div>
        <div class="modal-footer">
                <center><button type="submit" name="upload" value="upload" class="btn btn-primary">Upload</button></center>
            </form>
        </div>
 


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
