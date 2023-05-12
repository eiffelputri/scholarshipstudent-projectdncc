<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--link css-->
    <link rel="stylesheet" href="css/style.css">

    <!--link font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Landing Page</title>
  </head>
  <body>
  <?php 
        require_once("config/connection.php");
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $sekolah = $_POST['sekolah'];
            $studi = $_POST['studi'];

            $query = mysqli_query($connection, "UPDATE student SET nama = '$nama', sekolah = '$sekolah', studi = '$studi' WHERE id = $id");

            if($query){
                header('Location: student.php?status=berhasil&from=edit');
            }else{
                header('Location: student.php?status=gagal&from=edit');
            }
        }
    ?>

    <?php
        $id = $_GET['id'];
        $query = mysqli_query($connection, "SELECT * FROM student WHERE id = $id");

        $namaEdit = '';
        $sekolahEdit = '';
        $studiEdit = '';
        while($data = mysqli_fetch_array($query)){
            $namaEdit = $data['nama'];
            $sekolahEdit = $data['sekolah'];
            $studiEdit = $data['studi'];
        }
    ?>
    
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light navbar-bg">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <i class="fas fa-edit"></i>  
            Schoolarship</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="student.php">Data Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tambah.php">Tambah Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
            <div class="d-flex sign">
              <a href="#" class="btn rounded-pill">Daftar</a>
              <a href="#" class="btn rounded-pill btn-dark">Masuk</a>
            </div>
          </div>
        </div>
      </nav>

      <!--container-->
      <div class="container">
          <div class="row mt-5 mb-5">
              <div class="col-sm-12">
                  <div class="row">
                      <div class="col-md-6 col-12 col1">
                      </div>
                  </div>
              </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                    <form action="edit.php" method="POST">
                        <input type="hidden" value="<?php echo $_GET['id']?>" name="id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap siswa" required value="<?php echo $namaEdit?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="asal">Asal Sekolah</label>
                                    <input type="text" name="sekolah" id="sekolah" class="form-control" placeholder="Masukkan asal sekolah siswa" required value="<?php echo $sekolahEdit?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="studi">Program Studi</label>
                                    <input type="text" name="studi" id="studi" class="form-control" placeholder="Masukkan program studi yang diterima" required value="<?php echo $studiEdit?>">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <input type="submit" value="Simpan" name="submit" class="btn btn-sm btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>