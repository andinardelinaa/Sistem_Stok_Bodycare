<?php 
  
  include('koneksi_barang.php');
  
  $id = $_GET['id'];
  $query = "SELECT * FROM bt_bodycare WHERE id = $id LIMIT 1";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_array($result);

  ?>
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
      <a class="nav-link " href="input_barang.php">Tambah</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tampil_barang.php">Tampil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="update_barang.php?id=1">Update</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="detail_barang.php?id=1">Detail</a>
    </li>
  </ul>
</div>

</body>
</html>
<hr>

<div class="container mt-3">
  <h2 style="background-color: lightblue">EDIT DATA BODYCARE</h2>
  <form action="edit_barang.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
      <label for="jenis"> Jenis Barang:</label>
      <select name ="jenis" class= "form-control" id="jenis" onchange="Bayar()">
			<option value ="Body Lotion"  <?php if($row['jenis_barang'] == 'Body Lotion'){echo 'selected';} ?>>Body Lotion</option>
			<option value ="Body Wash" <?php if($row['jenis_barang'] == 'Body Wash'){echo 'selected';} ?>>Body Wash</option>
			<option value ="Body Serum" <?php if($row['jenis_barang'] == 'Body Serum'){echo 'selected';} ?>>Body Serum</option>
			<option value ="Sunblock" <?php if($row['jenis_barang'] == 'Sunblock'){echo 'selected';} ?>>Sunblock</option>
      <option value ="Body Scrub" <?php if($row['jenis_barang'] == 'Body Scrub'){echo 'selected';} ?>>Body Scrub</option>
		</select>
    </div>

    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

    <div class="mb-3">
      <label for="nama">Nama Barang:</label>
      <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Barang" name="nama" value="<?php echo $row['nama_barang'] ?>">
    </div>
    <div class="mb-3">
      <label for="nomor">Nomor Barang:</label>
      <input type="number" class="form-control" id="nomor" placeholder="Masukan Nomor Barang" name="nomor" value="<?php echo $row['nomor_barang'] ?>">
    </div>
   <div class="mb-3">
      <label for="tanggal">Tanggal Pembelian:</label>
      <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $row['tanggal'] ?>">
    </div>
   <div class="mb-3">
      <label for="harga">Harga Barang:</label>
      <input type="number" class="form-control" id="harga"  placeholder="Masukan Harga Barang" name="harga" value="<?php echo $row['harga_barang'] ?>">
    </div>
    <div class="mb-3">
      <label for="jumlah">Jumlah Barang:</label>
      <input type="number" class="form-control" id="jumlah" onchange="totalharga()" placeholder="Masukan Harga Barang" name="jumlah" value="<?php echo $row['jumlah_barang'] ?>">
    </div>
    <div class="mb-3">
      <label for="total">Total:</label>
      <input type="number" class="form-control" id="total" placeholder="Masukan Harga Barang" name="total" value="<?php echo $row['total_bayar'] ?>">
    </div>
   <div class="mb-3">
      <label for="foto">Foto Barang:</label>
      <input type="file" class="form-control" id="foto" placeholder="Masukan Nama Barang" name="foto">
    </div>
  
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>
<<script type="text/javascript">
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



