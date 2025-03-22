<?php
// Include koneksi database
include('koneksi.php');

// Periksa apakah parameter ID ada
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);

    // Query untuk mengambil detail barang berdasarkan ID
    $query = "SELECT * FROM tbl_bodycare WHERE id = $id";
    $result = mysqli_query($connection, $query);

    // Periksa apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan!";
        exit();
    }
} else {
    echo "Parameter 'id' tidak valid.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel ="stylesheet" href="style.css">
</head>
<body>
    <header>
        <center>
    <h1>SISTEM KOSMETIK</h1>
    <h2>BODYCARE</h2>
        </center>
    </header>
    <section>
        <nav> 
            <h2>
            <ul type='disc'>
            <li><a href="tambah.php" target="_self">Tambah</a></li>
            <li><a href="tampil2.php" target="_self">Tampil</a></li>
            <li><a href="update.php" target="_self">Update</a></li>
            <li><a href="detail.php" target="_self">Detail</a></li>
            </ul>
            </h2>
        </nav>
    
    <article>
    <div class="container scrollable-table-container">
        <table class="table table-bordered">
            <tr>
            <div class="header">
                    <h1><center>Detail Bodycare</center></h1>                
                </div>
                <br/>
                <th>Jenis Barang</th>
                <td><?php echo $row['jenis_barang']; ?></td>
            </tr>
            <tr>
                <th>Nama Barang</th>
                <td><?php echo $row['nama_barang']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Pembelian</th>
                <td>
                    <?php 
                        $tanggal = $row['tanggal'];
                        $newDate = date("d-m-Y", strtotime($tanggal));
                        echo $newDate;
                    ?>
                </td>
            </tr>
            <tr>
                <th>Harga Barang</th>
                <td><?php echo $row['harga_barang']; ?></td>
            </tr>
            <tr>
                <th>Jumlah Barang</th>
                <td><?php echo $row['jumlah_barang']; ?></td>
            </tr>
            <tr>
                <th>Total Pembayaran</th>
                <td><?php echo $row['total_bayar']; ?></td>
            </tr>
            <tr>
                <th>Foto Barang</th>
                <td><img src="uploads/<?php echo $row['foto']; ?>" alt="Foto Produk" width="150"></td>
            </tr>
        </table>
        <a href="tampil_barang.php" class="btn btn-secondary">KEMBALI</a>
    </div>
    </article>
    </section>

    <footer>
    <p>Copyright  Andin Ardelina</p>
    </footer>

</body>
</html>