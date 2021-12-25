<?php
  include "db.php";
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
    <form action="." method="POST" enctype="multipart/form-data">
      <table class="table table-bordered">
        <tr>
          <td>nama</td>
          <td>:</td>
          <td>
            <input type="text" name="nama" class="form-control">
          </td>
        </tr>
        <tr>
          <td>gambar</td>
          <td>:</td>
          <td>
            <input type="file" name="gambar" id="gambar" class="form-control">
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <input type="submit" class="btn btn-primary" value="kirim" name="kirim">
          </td>
        </tr>
        <?php
          if(isset($_POST["kirim"])){
            $nama = $_POST["nama"];
            $nama_file = $_FILES["gambar"]["name"];
            $sumber = $_FILES["gambar"]["tmp_name"];
            $folder = '/opt/lampp/htdocs/tmp_upload/';

            move_uploaded_file($sumber, $folder.$nama_file);
            $insert = mysqli_query($conn, "INSERT INTO tb_gambar VALUES(NULL, '$nama', '$nama_file')");

            if($insert){
              echo "doi berhasil diinput";
            }else{
              echo "doi tidak mau masuk";
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