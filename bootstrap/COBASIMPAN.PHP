<?php

include('koneksi.php');

// Mendapatkan data dari formulir
$id = $_POST['id'];
$kategori = $_POST['kategori'];
$jenis_kulit = $_POST['jenis_kulit'];
$nama = $_POST['nama'];
$nomor = $_POST['nomor'];
$tanggal_pemesanan = $_POST['tanggal_pemesanan'];
$jumlah_pemesanan = $_POST['jumlah_pemesanan'];
$harga = $_POST['harga'];
$total = $_POST['total'];

// Menyiapkan query update
$query = "UPDATE tbl_makeup SET
    kategori = '$kategori',
    jenis_kulit = '$jenis_kulit',
    nama = '$nama',
    nomor = '$nomor',
    tanggal_pemesanan = '$tanggal_pemesanan',
    jumlah_pemesanan = '$jumlah_pemesanan',
    harga = '$harga',
    total = '$total'
    WHERE no = $id";

// Eksekusi query
if (mysqli_query($connection, $query)) {
    // Jika ada foto yang diupload, proses upload
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);

        // Upload file
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            // Update nama file foto di database
            $queryFoto = "UPDATE tbl_makeup SET foto = '$foto' WHERE no = $id";
            mysqli_query($connection, $queryFoto);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    // Redirect ke halaman tampil1.php setelah sukses
    header("Location: tampil1.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}

// Menutup koneksi
mysqli_close($connection);

?>