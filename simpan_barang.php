<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$jenis     = $_POST['jenis'];
$nama =  $_POST['nama'];
$tanggal =$_POST['tanggal'];
$harga =$_POST['harga'];
$jumlah =$_POST['jumlah'];
$total =$_POST['total'];
$foto =$_POST['foto'];


//query insert data ke dalam database
$query = "INSERT INTO tbl_bodycare (jenis_barang, nama_barang, tanggal, harga_barang, jumlah_barang, total_bayar, foto) 
VALUES ('$jenis', '$nama', '$tanggal', '$harga', '$jumlah', '$total', '$foto')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($connection->query($query)) {

    //redirect ke halaman index.php 
    header("location: index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>

