<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: sign_in.php');
}
?>

<?php
// function untuk memanggil function.php
require 'function.php';
$berkass = query_data("SELECT*FROM tbl_berkas");
if (isset($_POST['search'])) {
  $keyword = $_POST['pencarian'];
  $berkass = query_data("SELECT*FROM tbl_berkas
  WHERE nama_berkas LIKE '%$keyword%' ||
  keterangan_berkas LIKE '%$keyword%' ||
  kategori_berkas LIKE '%$keyword%'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
          <a class="nav-link text-white" href="berkas.php">Berkas</a>
          <a class="nav-link text-white" href="kategori.php">Kategori</a>
          <a class="nav-link text-white" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
    <h1 class="text-center">Data Berkas</h1>
    <form action="" method="post">
      <div class="row g-3 align-items-center mb-3">
        <div class="col-5">
          <input type="text" name="pencarian" id="inputPassword6" class="form-control" placeholder="Pencarian...">
        </div>
        <div class="col-auto">
          <button class="btn btn-dark" name="search">Search</button>
        </div>
      </div>
    </form>
    <table class="table table-dark table-striped">
      <a href="tambah_berkas.php" class="btn btn-primary mb-2" name="tambah">Tambah</a>
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nama Berkas</th>
          <th scope="col">Tgl Upload</th>
          <th scope="col">Keterangan Berkas</th>
          <th scope="col">Kategori Berkas</th>
          <th scope="col">Nama File Berkas</th>
          <th scope="col">Hapus Data</th>
          <th scope="col">Update Data</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (!$berkass) {
          ?>
          <tr>
            <td colspan="8" class="text-center">No Data</td>
          </tr>
          <?php
        } else {
          $id = 1;
          foreach ($berkass as $berkas):
            ?>
            <tr>
              <td>
                <?= $id ?>
              </td>
              <td>
                <?= $berkas['nama_berkas'] ?>
              </td>
              <td>
                <?= $berkas['tgl_upload'] ?>
              </td>
              <td>
                <?= $berkas['keterangan_berkas'] ?>
              </td>
              <td>
                <?= $berkas['kategori_berkas'] ?>
              </td>
              <td>
                <a href="berkas/<?= $berkas['nama_file_berkas'] ?>" class="btn btn-info">donwload</a>
              </td>
              <td>
                <a href="hapus_berkas.php?id=<?= $berkas['id'] ?>&nama_file_berkas=<?= $berkas['nama_file_berkas'] ?>"
                  class="btn btn-danger">Hapus</a>
              </td>
              <td>
                <a href="update_berkas.php?id=<?= $berkas['id'] ?>&nama_file_berkas=<?= $berkas['nama_file_berkas'] ?>"
                  class="btn btn-info">Ubah</a> ?>
              </td>
            </tr>
            <?php
            $id++;
          endforeach;
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>