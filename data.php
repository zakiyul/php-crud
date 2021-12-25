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
        <a class="nav-link" aria-current="page" href="/webki/3">Home</a>
        <a class="nav-link active" href="/webki/3/data.php">Data</a>
      </div>
    </div>
  </div>
</nav>
    <div class="container mt-3">
    <form action="." method="POST" enctype="multipart/form-data">
      <table class="table table-bordered table-responsive">
        <tr>
          <td>No</td>
          <td>Nama</td>
          <td>Gambar</td>
          <td>Pilihan</td>
        </tr>
        <?php
          $query = mysqli_query($conn, "SELECT * FROM tb_gambar");
          $nomor = 0;

          while($row = mysqli_fetch_array($query)){
            $nomor = $nomor + 1;
        ?>
        <tr>
          <td> <?php echo $nomor ?> </td>
          <td> <?php echo $row["nama"] ?> </td>
          <td> <img style="height: 100px;" src="http://localhost/tmp_upload/<?php echo $row["file"] ?>" alt="<?php echo $row["nama"] ?>"> </td>
          <td>
            <a href="edit.php?id=<?= $row["id_gambar"] ?>" class="btn btn-warning">Edit</a>
            <a href="hapus.php?id=<?= $row["id_gambar"] ?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </table>
    </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>