<?php
  include "db.php";
  if(!isset($_GET['id'])){
    echo "
      <script>
        alert('Data tidak ditemukan!');
        document.location.href = 'data.php';
      </script>
    ";
  }

  $id = $_GET['id'];
  $query = mysqli_query($conn, "SELECT * FROM tb_gambar WHERE id_gambar=$id");
  $data_gambar = mysqli_fetch_assoc($query);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>

    <title>zkki</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="/webki/3/">Home</a>
        <a class="nav-link" href="/webki/3/data.php">Data</a>
      </div>
    </div>
  </div>
</nav>
    <div class="container mt-3">
    <form method="POST" enctype="multipart/form-data">
      <table class="table table-bordered">
        <tr>
          <td>nama</td>
          <td>:</td>
          <td>
            <input type="text" name="nama" class="form-control" value="<?= $data_gambar['nama'] ?>">
          </td>
        </tr>
        <tr>
          <td>gambar</td>
          <td>:</td>
          <td>
            <input type="file" name="gambar" id="gambar" class="form-control">
            <small>gambar saat ini :  <a href="http://localhost/tmp_upload/<?= $data_gambar['file'] ?>"><?= $data_gambar['file'] ?></a> </small>
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <input type="submit" class="btn btn-primary" value="Edit" name="kirim">
          </td>
        </tr>
        <?php
          if(isset($_POST["kirim"])){
            $nama = $_POST["nama"];
            $nama_file = $_FILES["gambar"]["name"];
            $sumber = $_FILES["gambar"]["tmp_name"];
            $folder = '/opt/lampp/htdocs/tmp_upload/';
            if($sumber == ""){
              $update = mysqli_query($conn, "UPDATE tb_gambar SET nama='$nama' WHERE id_gambar=$id");
              if($update){
                echo "
                  <script>
                    alert('doi berhasil diupdate!');
                    document.location.href = 'data.php';
                  </script>
                ";
              }else{
                echo "
                  <script>
                    
                    alert('doi gagal diupdate! :( TANPA GAMBAR');
                    document.location.href = 'data.php';
                  </script>
                ";
              }
            }else{
              move_uploaded_file($sumber, $folder.$nama_file);
              $update = mysqli_query($conn, "UPDATE tb_gambar SET nama='$nama', file='$nama_file' WHERE id_gambar=$id");
  
              if($update){
                echo "
                  <script>
                    alert('doi berhasil diupdate!');
                    document.location.href = 'data.php';
                  </script>
                ";
              }else{
                echo "
                  <script>
                    
                    alert('doi gagal diupdate! :( DENGAN GAMBAR');
                    document.location.href = 'data.php';
                  </script>
                ";
              }
            }
          }

        ?>
      </table>
    </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>