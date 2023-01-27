<?php
require 'function.php';
$id = $_GET['id'];
$nama_file_berkas = $_GET['nama_file_berkas'];
if (hapus_berkas($id,$nama_file_berkas) > 0) {
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
