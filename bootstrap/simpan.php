<?php

//include koneksi database
include('koneksi_barang.php');

//get data dari form
$jenis     = $_POST['jenis'];
$nama = $_POST['nama'];
$nomor = $_POST['nomor'];
$tanggal =$_POST['tanggal'];
$harga =$_POST['harga'];
$jumlah =$_POST['jumlah'];
$total =$_POST['total'];

$nama_foto =$_FILES['foto']['name'];
$explode_foto = explode('.', $nama_foto);
$ekstensi_foto = $explode_foto[1];
$ukuran_foto = $_FILES['foto']['size'];
$tmp_foto = $_FILES['foto']['tmp_name'];
$ekstensi_boleh = array ('jpg', 'jpeg', 'png');
$ukuran_boleh = 1028000;
$direktori_foto = 'foto/';

if (in_array($ekstensi_foto, $ekstensi_boleh)) {
  if ($ukuran_foto <= $ukuran_boleh);

  move_uploaded_file($tmp_foto, $direktori_foto.$nama_foto);

} 


//query insert data ke dalam database
$query = "INSERT INTO bt_bodycare (jenis_barang, nama_barang, nomor_barang, tanggal, harga_barang, jumlah_barang, total_bayar, foto) 
VALUES ('$jenis', '$nama', '$nomor', '$tanggal', '$harga', '$jumlah', '$total', '$nama_foto')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman tampil.php 
    header("location: tampil_barang.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>

