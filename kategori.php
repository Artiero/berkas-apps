<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location: sign_in.php');
}
?>
<?php
require 'function.php';
$kategoris = query_data("SELECT*FROM tbl_kategori");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori</title>
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
    <h1 class="text-center">Data Kategori</h1>
    <table class="table table-dark table-striped">
      <a href="tambah_kategori.php" class="btn btn-primary mb-2" name="tambah">Tambah</a>
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Nama Kategori</th>
          <th scope="col">Hapus Data</th>
          <th scope="col">Update Data</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id = 1;
        foreach ($kategoris as $kategori):
          ?>
          <tr>
            <td>
              <?= $id ?>
            </td>
            <td>
              <?= $kategori['nama_kategori'] ?>
            </td>
            <td><a href="hapus_kategori.php?id=<?= $kategori['id'] ?>" class="btn btn-danger">Hapus</a></td>
            <td>
              <a href="update_kategori.php?id=<?= $kategori['id'] ?>" class="btn btn-info">Update</a>
            </td>
          </tr>
          <?php
          $id++;
        endforeach;
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>