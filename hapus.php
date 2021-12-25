<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <title>Delete data</title>
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
  <div class="d-flex justify-content-center">
    <div class="card p-5 mt-3">
      <strong>Yakin ingin dihapus?</strong>
      <div>
        <a href="delete-data.php?id=<?= $_GET["id"] ?>" class="btn btn-danger">Hapus</a>
        <a href="data.php" class="btn btn-warning">Cancel</a>
      </div>
    </div>
  </div>
</body>
</html>