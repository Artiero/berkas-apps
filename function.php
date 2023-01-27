<?php
$conn = mysqli_connect("localhost", "root", "root", "db_berkas");
function query_data($data)
{
  global $conn;
  $result = mysqli_query($conn, $data);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
function upload()
{
  $namaFile = $_FILES['file']['name'];
  $ukuranFile = $_FILES['file']['size'];
  $error = $_FILES['file']['error'];
  $tmpName = $_FILES['file']['tmp_name'];
  // cek jika tidak ada gambar diupload

  if ($error === 4) {
    echo "
            <script>
                alert('Masukkan file');
            </script>
            ";
    return false;
  }
  if($ukuranFile > 5000000){
    echo "
            <script>
                alert('Tidak lebih dari 3mb');
            </script>
            ";
    return false;
  }
  // cek yang boleh diupload
  $ekstensiFileValid = ['docx', 'xlsx', 'pptx', 'pdf'];
  $ekstensiFile = explode('.', $namaFile);
  $ekstensiFile = strtolower(end($ekstensiFile));
  if (!in_array($ekstensiFile, $ekstensiFileValid)) {
    echo "
            <script>
                alert('Upload file berekstensi docx, xlsx atau pptx');
            </script>
            ";
    return false;
  }
  // lolos pengecekan
  //generate
  $namaFileBaru = uniqid();
  // 8sdfi989898
  $namaFileBaru .= '.';
  // 8sdfi989898.
  $namaFileBaru .= $ekstensiFile;
// 8sdfi989898.docx
  move_uploaded_file($tmpName, 'berkas/' . $namaFileBaru);
  return $namaFileBaru;
}
function add_biodata($data)
{
  global $conn;
  $nama_berkas = $data['nama_berkas'];
  $tgl_upload = $data['tgl_upload'];
  $keterangan_berkas = $data['keterangan_berkas'];
  $kategori_berkas = $data['kategori_berkas'];
  $nama_file_berkas = upload();
  if($nama_file_berkas){
    mysqli_query($conn, "INSERT INTO tbl_berkas VALUES(NULL,'$nama_berkas','$tgl_upload','$keterangan_berkas','$kategori_berkas','$nama_file_berkas')");
  }
  
  return mysqli_affected_rows($conn);
}
function hapus_berkas($id,$nama_file_berkas)
{
  global $conn;
  unlink("berkas/$nama_file_berkas");
  mysqli_query($conn, "DELETE FROM tbl_berkas WHERE id=$id");
  return mysqli_affected_rows($conn);

}
function hapus_kategori($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM tbl_kategori WHERE id=$id");
  return mysqli_affected_rows($conn);
}
function add_kategori($data)
{
  global $conn;
  $nama_kategori = $data['nama_kategori'];
  mysqli_query($conn, "INSERT INTO tbl_kategori VALUES(NULL,'$nama_kategori')");
  return mysqli_affected_rows($conn);
}
function update_berkas($data)
{
  global $conn;
  $id = $data['id'];
  $nama_berkas = $data['nama_berkas'];
  $tgl_upload = $data['tgl_upload'];
  $keterangan_berkas = $data['keterangan_berkas'];
  $kategori_berkas = $data['kategori_berkas'];
  $file_lama = $data['file_lama'];
  if($_FILES['file']['error']===4){
    $file = $file_lama;
  }else{
    $file = upload();
    unlink("berkas/$file_lama");
  } 
  mysqli_query($conn, "UPDATE tbl_berkas SET  
  nama_berkas='$nama_berkas',
  tgl_upload='$tgl_upload',
  keterangan_berkas='$keterangan_berkas',
  kategori_berkas='$kategori_berkas',
  nama_file_berkas='$file'
  WHERE id= $id");
  return mysqli_affected_rows($conn);
}
function update_kategori($data)
{
  global $conn;
  $id = $data['id'];
  $nama_kategori = $data['nama_kategori'];
  mysqli_query($conn, "UPDATE tbl_kategori SET
  nama_kategori='$nama_kategori' WHERE id= $id");
  return mysqli_affected_rows($conn);
}
function add_account($data){
  global $conn;
  $nama = $data['nama'];
  $username = $data['username'];
  $password = $data['password'];
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($conn, "INSERT INTO tbl_admin VALUES('$username','$hash_password','$nama')");
  return mysqli_affected_rows($conn);
}
function login($data){
  global $conn;
  $username = $data['username'];
  $password = $data['password'];
  // Perintah query sql
  $query = "SELECT * FROM tbl_admin WHERE username='$username'";
  $get = mysqli_query($conn, $query);
  // Mengambil jumlah baris
  $result = mysqli_num_rows($get);
  // Mengambil data
  $row_account = mysqli_fetch_assoc($get);
  if($result === 1){
    if(password_verify($password, $row_account['password'])){
      return true;
    }else{
      return false;
    }
  }else{
    return false;
  }
}