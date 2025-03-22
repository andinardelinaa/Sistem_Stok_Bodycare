<?php
// Include koneksi database
include('koneksi_barang.php');

// Periksa apakah parameter ID ada
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);

    // Query untuk mengambil detail barang berdasarkan ID yang ada pada database
    $query = "SELECT * FROM bt_bodycare WHERE id = $id";
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

<!--ini adalah dokumen html-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Detail Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
    <!--header-->
  <h2 >SISTEM KOSMETIK</h2>
  <p>Bodycare</p>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="input_barang.php">Tambah</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tampil_barang.php">Tampil</a>
    </li>
    <!--sebagai penanda bahwa laman ini sedang dibuka-->
    <li class="nav-item">
      <a class="nav-link active" >Detail</a>
    </li>
  </ul>
</div>
<hr>
<div class="container mt-3">
    <h2 style="background-color: lightblue">DETAIL DATA BODYCARE</h2>
</div>
    <br>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <!--output jenis barang-->
                <th>Jenis Barang</th>
                <!--memanggil data dalam database-->
                <td><?php echo $row['jenis_barang']; ?></td>
            </tr>
            <tr>
                <!--output nama barang-->
                <th>Nama Barang</th>
                <!--memanggil data dalam database-->
                <td><?php echo $row['nama_barang']; ?></td>
            </tr>
            <tr>
                <!--output nama barang-->
                <th>Nomor Barang</th>
                <!--memanggil data dalam database-->
                <td><?php echo $row['nomor_barang']; ?></td>
            </tr>
            <tr>
                <!--output tanggal pembelian-->
                <th>Tanggal Pembelian</th>
                <td><!--memanggil data dalam database-->
                    <?php 
                        $tanggal = $row['tanggal'];
                        $newDate = date("d-m-Y", strtotime($tanggal));
                        echo $newDate;
                    ?>
                </td>
            </tr>
            <tr>
                <!--output harga barang-->
                <th>Harga Barang</th>
                <!--memanggil data dalam database-->
                <td><?php echo $row['harga_barang']; ?></td>
            </tr>
            <tr>
                <!--output jumlah barang-->
                <th>Jumlah Barang</th>
                <!--memanggil data dalam database-->
                <td><?php echo $row['jumlah_barang']; ?></td>
            </tr>
            <tr>
                <!--output total bayar-->
                <th>Total Pembayaran</th>
                <!--memanggil data dalam database-->
                <td><?php echo $row['total_bayar']; ?></td>
            </tr>
            <tr>
                <!--output foto barang-->
                <th>Foto Barang</th>
                <!--memanggil data dalam database-->
                <td><img src="uploads/<?php echo $row['foto']; ?>" alt="Foto" width="200"></td>
            </tr>
        </table>
        <!-- a href digunakan untuk menautkan dengan laman tampil barang-->
        <a href="tampil_barang.php" class="btn btn-secondary">KEMBALI</a>
    </div>

</body>
</html>
