<?php
include '../inc/koneksi.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $get = mysqli_query($conn, "SELECT foto FROM pemain WHERE id = $id");
  $data = mysqli_fetch_assoc($get);
  $foto = $data['foto'];

  mysqli_query($conn, "DELETE FROM pemain WHERE id = $id");

  $path = "../img/" . $foto;
  if (file_exists($path)) {
    unlink($path);
  }

  header("Location: pemain-list.php");
  exit;
} else {
  echo "ID tidak valid!";
}
