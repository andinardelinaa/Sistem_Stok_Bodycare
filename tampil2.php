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
    <div class="header">
        <center><h1>TAMPIL BARANG</h1></center>
</div>
    <br>
    <div class="container">
<table>
                <tr>
                    <th>No. </th>
                    <th>Jenis Barang</th>
                    <th>Nama Barang</th>
                    <th>tanggal Pembelian</th>
                    <th>Harga Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Total Bayar</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
        <tbody>
                  <?php 
                      include('koneksi.php');
                      $no = 1;
                      $query = mysqli_query($connection,"SELECT * FROM tbl_bodycare");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['jenis_barang'] ?></td>
                      <td><?php echo $row['nama_barang'] ?></td>
                      <td><?php 
                               $tanggal = $row['tanggal'];
                                $newDate = date("d-m-Y", strtotime($tanggal));
                                echo $newDate;
                          ?>
                        </td>
                      <td><?php echo $row['harga_barang'] ?></td>
                      <td><?php echo $row['jumlah_barang'] ?></td>
                      <td><?php echo $row['total_bayar'] ?></td>
                      <td><img src="uploads/<?php echo $row['foto'] ?>" alt="Foto Produk" width="100"></td>
                      <td class="text-center">
                        <a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="detail.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary">DETAIL</a>
                      </td>

                  </tr>

                <?php } ?>
                </tbody>


    </table>
                      </div>
    </article>
    </section>

    <footer>
    <p>Copyright @ Andin Ardelina</p>
    </footer>

</body>
</html>