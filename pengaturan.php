<?php
include "koneksi.php";
$sql_jadwals = "SELECT tb_jadwal.pembaruan,tb_jadwal.id_jadwal,tb_jadwal.hari,tb_jadwal.jam_bunyi,tb_jadwal.nama_jadwal,tb_mp3.nama_file FROM tb_jadwal INNER JOIN tb_mp3 ON tb_jadwal.id_mp3 = tb_mp3.id_mp3";
$query_jadwal = mysqli_query($koneksi , $sql_jadwals);

$sql_mp3 = "SELECT * FROM tb_mp3";
$mp3_query = mysqli_query($koneksi , $sql_mp3);
$i = 1;
$l = 1;
$sl = 1;
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

    <title>P</title>

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
          <li class="nav-item ">
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
          <li class="nav-item active">
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
  Tambah
</button>



<br><br>

            <table class="table table-hover table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Hari</th>
                <th scope="col">Jam Berbunyi</th>
                <th scope="col">Jadwal</th>
                <th scope="col">Audio</th>
                <th scope="col">Pembaruan</th>
                <th scope="col">Aksi</th>
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
                <td><?php echo $jadwalx['pembaruan'];?></td>
                <td>
                 
                 
                 
                 
                 
                 <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $sl++; ?>">
                      Edit
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="edit<?php echo $l++; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Jadwal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                          <div class="card" style="width: 22rem;">
                                <div class="card-body">
                              <form role="form" action="crud_sql/edit_jadwal.php" method="get">
                                  <div class="form-group">
                                    <input name="id_jadwal" type="hidden" class="form-control"  value="<?php echo $jadwalx['id_jadwal']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hari</label>
                                    <input name="hari" type="text" class="form-control"  value="<?php echo $jadwalx['hari']; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Jam Berbunyi</label>
                                    <input name="jam_bunyi" type="time" class="form-control"  value="<?php echo $jadwalx['jam_bunyi'];?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Jadwal</label>
                                    <input name="nama_jadwal" type="text" class="form-control"  value="<?php echo $jadwalx['nama_jadwal'];?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Audio.mp3</label>
                                    <select name="audiosc" class="form-control" id="exampleFormControlSelect1">
                                      <?php
                                      
                                      foreach($mp3_query as $row){
                                      ?>
                                      <option><?php echo $row['nama_file']; ?></option>
                                     <?php
                                      }
                                      ?>
                                    </select>
                                  </div>
                                    </div>
                                    </div>
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                              </form>
                                    
                          </div>
                        </div>
                      </div>
                    </div>
                    <a name="hapus" value="hapus" href='crud_sql/hapus_jadwal.php?id_jadwal=<?php echo $jadwalx['id_jadwal']?>' class="btn btn-danger btn-sm">Hapus</a>
                   
              
                  </td>
              </tr> 
           <?php } ?>
            </tbody>
          </table>


  </div>
</div> <!---------ISI END------------>




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
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
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




<!-- Modal Tambah Jadwal -->
<div class="modal fade mx-auto" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card" style="width: 22rem;">
<div class="card-body">

      <form  role="form" action="crud_sql/tambah_jadwal.php" method="get">
          <div class="form-group">
            <label for="exampleInputEmail1">Hari</label>
            <input name="hari" type="text" class="form-control"   placeholder="Masukan Hari">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jam Berbunyi</label>
            <input name="jam_bunyi" type="time" class="form-control"  placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Jadwal</label>
            <input name="nama_jadwal" type="text" class="form-control"  placeholder="Contoh : Masuk Jam Ke 1">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Pilih Audio.mp3</label>
            <select name="audiosc" class="form-control" id="exampleFormControlSelect1">
            <option>----</option>
              <?php
              
              foreach($mp3_query as $row){
              ?>
              <?php $row['id_mp3'];?>
              <option><?php echo $row['nama_file']; ?></option>
<?php
              }
?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>  
      </div>
    </div>
  </div>
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
