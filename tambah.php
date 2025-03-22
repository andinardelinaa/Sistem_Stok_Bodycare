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
                    <li><a href="update.php" target="_self">Update</a></li>
                    <li><a href="detail.php" target="_self">Detail</a></li>
                </ul>
            </h2>
        </nav>
    
        <article>
            <form action="simpan_barang.php" method="POST" enctype="multipart/form-data">
                <div class="header">
                    <h1><center>Tambah Bodycare</center></h1>                
                </div>
                <br/>
           
                <label>Jenis Barang :  </label>
                <select name="jenis" class="form-control" id="jenis" onchange="Bayar()">
                    <option value="Body Lotion">Body Lotion</option>
                    <option value="Body Wash">Body Wash</option>
                    <option value="Body Serum">Body Serum</option>
                    <option value="Sunblock">Sunblock</option>
                    <option value="Body Scrub">Body Scrub</option>
                </select>
                <br/><br/>

                <label>Nama Barang : </label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan nama produk" class="form-control" required>
                <br/><br/>

                <label>Tanggal Pembelian: :</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                <br/><br/>

                <label>Harga Barang :</label>
                <input type="number" name="harga" id="harga" placeholder="Masukkan harga barang" class="form-control" required readonly>
                <br><br>

                <label>Jumlah Barang :</label>
                <input type="number" name="jumlah" id="jumlah" onchange="totalharga()" placeholder="Masukkan jumlah barang" class="form-control" required>
                <br><br>
                <label>Total Pembayaran: :</label>
                <input type="number" name="total" id="total" placeholder="Total harga" class="form-control" required readonly>
                <br><br>
                <label>Foto Barang :</label>
                <input type="file" name="foto" id="foto" class="form-control" required>
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
            var jenis = document.getElementById("jenis").value;
            var harga = 0;

            if(jenis === "Body Lotion"){
                harga = 30000;
            } else if (jenis === "Body Wash"){
                harga = 25000;
            } else if (jenis === "Body Scrub"){
                harga = 60000;
            } else if(jenis === "Body Serum"){
                harga = 40000;
            } else {
                harga = 20000;
            }
            document.getElementById("harga").value = harga;
            totalharga();
        }
        function totalharga() {
            var harga = document.getElementById("harga").value;
            var jumlah = document.getElementById("jumlah").value;
            var total = harga * jumlah;
            document.getElementById("total").value = total;
        }
    </script>
</body>
</html>
