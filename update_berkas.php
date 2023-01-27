<?php
require 'function.php';
$id = $_GET['id'];
$nama_file_berkas = $_GET['nama_file_berkas'];
$cekbiodata = mysqli_query($conn, "SELECT*FROM tbl_berkas WHERE id=$id");
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
		<h1 class="mt-2 text-center">Form Update berkas</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<input type="hidden" name="id" value="<?= $id ?>">
				<input type="hidden" name="file_lama" value="<?= $nama_file_berkas ?>">
				<label for="nama_berkas" class="form-label">Nama Berkas</label>
				<input type="text" class="form-control" id="nama_berkas" name="nama_berkas"
					value="<?= $resultbiodata['nama_berkas'] ?>">
			</div>
			<div class="mb-3">
				<label for="tgl_upload" class="form-label">Tanggal Upload</label>
				<input type="date" class="form-control" id="tgl_upload" name="tgl_upload"
					value="<?= $resultbiodata['tgl_upload'] ?>">
				<div class="mb-3">
					<label for="keterangan_berkas" class="form-label">Keterangan Berkas</label>
					<textarea class="form-control" id="keterangan_berkas" rows="5"
						name="keterangan_berkas"><?= $resultbiodata['keterangan_berkas'] ?></textarea>
				</div>
				<div class="mb-3">
					<label for="kategori_berkas" class="form-label">Kategori Berkas</label>
					<input type="text" class="form-control" id="kategori_berkas" name="kategori_berkas"
						value="<?= $resultbiodata['kategori_berkas'] ?>">
				</div>
                <div class="input-group mb-3">  
                    <input type="file" name="file" class="form-control" id="inputGroupFile02">
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                </div>
				<button type="submit" class="btn btn-primary" name="update">Submit</button>
		</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"></script>
	<?php
	if (isset($_POST['update'])) {
		if (update_berkas($_POST) > 0) {
			echo '
        <script>
        window.location.replace("berkas.php")
        alert("Berhasil")
        </script>
        ';
		} else {
			echo '
        <script>
        window.location.replace("update_berkas.php?id=' . $id . '")
        alert("Gagal")
        </script>
        ';
		}
	}
	?>
</body>

</html>