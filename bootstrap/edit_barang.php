<?php

//include koneksi database
include('koneksi_barang.php');

//get data dari form
$id = $_POST['id'];
$jenis     = $_POST['jenis'];
$nama =  $_POST['nama'];
$tanggal =$_POST['tanggal'];
$harga =$_POST['harga'];
$jumlah =$_POST['jumlah'];
$total =$_POST['total'];
$foto =$_POST['foto'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE bt_bodycare SET jenis_barang = '$jenis', nama_barang = '$nama', tanggal='$tanggal', harga_barang='$harga', Jumlah_barang='$jumlah', total_bayar='$total'WHERE id = '$id'";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($connection->query($query)) {
    //redirect ke halaman index.php 
    header("location: tampil_barang.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>