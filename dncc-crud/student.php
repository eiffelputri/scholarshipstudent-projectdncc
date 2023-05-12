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

            <?php if(isset($_GET['status'])) : ?>
            <?php if($_GET['status'] == "berhasil") : ?>
            <div class="alert alert-secondary" role="alert">
            <?php 
                if($_GET['from'] == "tambah"){
                    echo "Data berhasil disimpan";
                }elseif($_GET['from'] == "edit"){
                    echo "Data berhasil diedit";
                }else{
                    echo "Data berhasil dihapus";
                }
            ?>
            </div>
            <?php endif; ?>

            <?php if($_GET['status'] == "gagal") : ?>
            <div class="alert alert-danger" role="alert">
            <?php 
                if($_GET['from'] == "tambah"){
                    echo "Data gagal disimpan";
                }elseif($_GET['from'] == "edit"){
                    echo "Data gagal diedit";
                }else{
                    echo "Data gagal dihapus";
                }
            ?>
            </div>
            <?php endif; ?>
            <?php endif; ?>

            <?php
            require_once("config/connection.php");
            $query = mysqli_query($connection, "SELECT * FROM student ORDER BY nama ASC");
            ?>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-stripped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <td>Nama</td>
                                <td>Asal Sekolah</td>
                                <td>Program Studi</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php while($row = mysqli_fetch_array($query)) : ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['sekolah'] ?></td>
                                    <td><?php echo $row['studi'] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="hapus.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php $no++ ?>
                            <?php endwhile; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>