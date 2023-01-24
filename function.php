<?php
$conn = mysqli_connect("localhost", "root", "root", "db_berkas");
function query_data($data)
{
  global $conn;
  $result = mysqli_query($conn, $data);
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
function add_biodata($data)
{
  global $conn;
  $nama_berkas = $data['nama_berkas'];
  $tgl_upload = $data['tgl_upload'];
  $keterangan_berkas = $data['keterangan_berkas'];
  $kategori_berkas = $data['kategori_berkas'];
  $nama_file_berkas = $data['nama_file_berkas'];
  mysqli_query($conn, "INSERT INTO tbl_berkas VALUES(NULL,'$nama_berkas','$tgl_upload','$keterangan_berkas','$kategori_berkas','$nama_file_berkas')");
  return mysqli_affected_rows($conn);
}
function hapus_berkas($id)
{
  global $conn;
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