<?php
$id_menu = $_GET['id'];

$koneksi = mysqli_connect("localhost", "root", "", "Bobaho");

function hapus($id_menu){
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM menu_costumer where id_menu = $id_menu");

  return mysqli_affected_rows($koneksi);
}

if (hapus($id_menu) > 0 ){
  echo
  "<script>
  alert('Data berhasil dihapus');
  document.location.href = 'read.php';
  </script>";
}
else{
  echo
  "<script>
  alert('Data gagal dihapus');
  document.location.href = 'read.php';
  </script>";
}
?>