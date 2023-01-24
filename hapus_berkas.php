<?php
require 'function.php';
$id = $_GET['id'];
if (hapus_berkas($id) > 0) {
  echo '
  <script>
    window.location.replace("berkas.php")
    alert("Berhasil")
  </script>
  ';
} else {
  echo '
  <script>
    window.location.replace("berkas.php")
    alert("Gagal")
  </script>
  ';
}
