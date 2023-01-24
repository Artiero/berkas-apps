<?php
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
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
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-2 text-center">Form tambah berkas</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama_berkas" class="form-label">Nama Berkas</label>
                <input type="text" class="form-control" id="nama_berkas" name="nama_berkas">
            </div>
            <div class="mb-3">
                <label for="tgl_upload" class="form-label">Tanggal Upload</label>
                <input type="date" class="form-control" id="tgl_upload" name="tgl_upload">
            <div class="mb-3">
                <label for="keterangan_berkas" class="form-label">Keterangan Berkas</label>
                <textarea class="form-control" id="keterangan_berkas" rows="5" name="keterangan_berkas"></textarea>
            </div>
            <div class="mb-3">
                <label for="kategori_berkas" class="form-label">Kategori Berkas</label>
                <input type="text" class="form-control" id="kategori_berkas" name="kategori_berkas">
            </div>
            <div class="mb-3">
                <label for="nama_file_berkas" class="form-label">Nama File Berkas</label>
                <input type="text" class="form-control" id="nama_file_berkas" name="nama_file_berkas">
            </div>
            <button type="submit" class="btn btn-primary" name="tambah">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <?php
    if (isset($_POST['tambah'])) {
        if (add_biodata($_POST) > 0) {
            echo '
        <script>
        window.location.replace("berkas.php")
        alert("Berhasil")
        </script>
        ';
        } else {
            echo '
        <script>
        window.location.replace("tambah_berkas.php")
        alert("Gagal")
        </script>
        ';
        }
    }
    ?>
</body>

</html>