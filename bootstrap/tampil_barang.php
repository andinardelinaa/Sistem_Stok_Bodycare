<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    table, th, td{
    border : 1px solid rgb(12, 12, 12);
    padding: 10px;
    text-align: center;
    }
    table{
    width: 100%;
    border-collapse: collapse;
    }
  </style>
</head>
<body>

<div class="container mt-3">
  <h2>SISTEM KOSMETIK</h2>
  <p>Bodycare</p>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link" href="input_barang.php">Tambah</a>
    </li><!--penanda laman sedang dibuka-->
    <li class="nav-item">
      <a class="nav-link active" href="tampil_barang.php">Tampil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="cetakcoba.php">Cetak</a>
    </li>
  </ul>
</div>
<hr>
<div class="container mt-3">
  <h2 style="background-color: lightblue">TAMPIL DATA BODYCARE</h2></center>
</div>
    <br>
    <div class="container">
<table>
        <tr style="background-color : lightblue">
        <th>No. </th>
            <th>Jenis Barang</th>
            <th>Nama Barang</th>
            <th>No Barang</th>
            <th>Tanggal Pembelian</th>
            <th>Harga Barang</th>
            <th>Jumlah Barang</th>
            <th>Total Bayar</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <tbody>
                  <?php 
                      include('koneksi_barang.php');
                      $no = 1;
                      $query = mysqli_query($connection,"SELECT * FROM bt_bodycare");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['jenis_barang'] ?></td>
                      <td><?php echo $row['nama_barang'] ?></td>
                      <td><?php echo $row['nomor_barang'] ?></td>
                      <td><?php 
                               $tanggal = $row['tanggal'];
                                $newDate = date("d-m-Y", strtotime($tanggal));
                                echo $newDate;
                          ?>
                      </td>
                      <td><?php echo $row['harga_barang'] ?></td>
                      <td><?php echo $row['jumlah_barang'] ?></td>
                      <td><?php echo $row['total_bayar'] ?></td>
                      <td><img src="foto/<?php echo $row['foto'] ?>" alt="Foto" width="100px" height="150px"></td>
                      <td class="text-center">
                        <a href="update_barang.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-success">EDIT</a>
                        <a href="detail_barang.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary">DETAIL</a>
                        <a href="hapus_barang.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                      </td>
                    </tr>
                <?php } ?>
          </tbody>
</table>

</body>
</html>

