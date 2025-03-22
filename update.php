<?php 
  
  include('koneksi.php');
  
  $id = $_GET['id'];
  
  $query = "SELECT * FROM tbl_bodycare WHERE id = $id LIMIT 1";

  $result = mysqli_query($connection, $query);

  $row = mysqli_fetch_array($result);

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="style.css">
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
                    <li><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></li>
                    <li><a href="detail.php" target="_self">Detail</a></li>
                </ul>
            </h2>
        </nav>
    
        <article>
            <form action="edit.php" method="POST">
                <div class="header">
                    <h1><center>Edit Bodycare</center></h1>                
                </div>
                <br/>
           
                <label>Jenis Barang :  </label>
                <select name="jenis" class="form-control" id="jenis">
                    <option value="Body Lotion" <?php if($row['jenis_barang'] == 'Body Lotion'){echo 'selected';} ?>>Body Lotion</option>
                    <option value="Body Wash" <?php if($row['jenis_barang'] == 'Body Wash'){echo 'selected';} ?>>Body Wash</option>
                    <option value="Body Serum" <?php if($row['jenis_barang'] == 'Body Serum'){echo 'selected';} ?>>Body Serum</option>
                    <option value="Body Scrub" <?php if($row['jenis_barang'] == 'Body Scrub'){echo 'selected';} ?>>Body Scrub</option>
                    <option value="Sunblock" <?php if($row['jenis_barang'] == 'Sunblock'){echo 'selected';} ?>>Sunblock</option>
                </select>
                <br/><br/>

                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                <label>Nama Barang : </label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan nama produk" class="form-control" value="<?php echo $row['nama_barang'] ?>" required>
                <br/><br/>

                <label>Tanggal Pembelian: :</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo $row['tanggal'] ?>" required>
                <br/><br/>

                <label>Harga Barang :</label>
                <input type="number" name="harga" id="harga" onchange="Bayar()" placeholder="Masukkan harga barang" class="form-control" value="<?php echo $row['harga_barang'] ?>" required>
                <br><br>

                <label>Jumlah Barang :</label>
                <input type="number" name="jumlah" id="jumlah" onchange="Bayar()" placeholder="Masukkan jumlah barang" class="form-control" value="<?php echo $row['jumlah_barang'] ?>" required>
                <br><br>
                <label>Total Pembayaran: :</label>
                <input type="number" name="total" id="total" placeholder="Total harga" class="form-control" value="<?php echo $row['total_bayar'] ?>" required readonly>
                <br><br>
                <label>Foto Barang :</label>
                <input type="file" name="foto" id="foto" class="form-control" value="<?php echo $row['foto'] ?>" required>
                <br><br>    

                <input type="submit" name="submit" class="btn btn-success">
                <input type="reset" class="btn btn-warning">
                <br><br>
                <a href="index.php">KEMBALI</a></br>
            </form> 
        </article>
    </section>

    <footer>
        <p>Copyright @ Andin Ardelina</p>
    </footer>
    
    <script type="text/javascript">
        function Bayar(){
            var harga = parseInt(document.getElementById('harga').value);
            var jumlah = parseInt(document.getElementById('jumlah').value);
            var total = jumlah * harga;
            document.getElementById('total').value = total;
        }
    </script>
</body>
</html>
