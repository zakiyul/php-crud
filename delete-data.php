<?php
  include "db.php";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tb_gambar WHERE id_gambar=$id");
    echo "
      <script>
        alert('Data berhasil dihapus!!');
        document.location.href = 'data.php';
      </script>
    ";
  }else{
    echo "
      <script>
        alert('Data gagal dihapus!');
        document.location.href = 'data.php';
      </script>
    ";
  }
?>