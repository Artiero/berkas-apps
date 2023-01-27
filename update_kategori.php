<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: sign_in.php');
}
?>
<?php
require 'function.php';
$id = $_GET['id'];
$cekbiodata = mysqli_query($conn, "SELECT*FROM tbl_kategori WHERE id=$id");
$resultbiodata = mysqli_fetch_assoc($cekbiodata);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update_Biodata</title>
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
                    <a class="nav-link text-white" href="kategori.php">kategori</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-2 text-center">Form Update Kategori</h1>
        <form action="" method="post">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $id ?>">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                    value="<?= $resultbiodata['nama_kategori'] ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="update">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <?php
    if (isset($_POST['update'])) {
        if (update_kategori($_POST) > 0) {
            echo '
        <script>
        window.location.replace("kategori.php")
        alert("Berhasil")
        </script>
        ';
        } else {
            echo '
        <script>
        window.location.replace("update_kategori.php?id=' . $id . '")
        alert("Gagal")
        </script>
        ';
        }
    }
    ?>
</body>

</html>