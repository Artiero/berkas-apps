<?php
$conn = mysqli_connect("localhost", "root", "root", "db_berkas");
function query_data($data){
  global $conn;
  $result = mysqli_query($conn, $data);
  while($row=mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}