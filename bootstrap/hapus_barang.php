<?php

include('koneksi_barang.php');

//get id
$id = $_GET['id'];

$query = "DELETE FROM bt_bodycare WHERE id = '$id'";

if($connection->query($query)) {
    header("location: tampil_barang.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>