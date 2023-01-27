<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: sign_in.php');
}
?>
<?php
require 'function.php';
$id = $_GET['id'];
if (hapus_kategori($id) > 0) {
    echo '
  <script>
    window.location.replace("kategori.php")
    alert("Berhasil")
  </script>
  ';
} else {
    echo '
  <script>
    window.location.replace("kategori.php")
    alert("Gagal")
  </script>
  ';
}