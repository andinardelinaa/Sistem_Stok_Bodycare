<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>SISTEM KOSMETIK</h2>
  <p>Bodycare</p>
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link active" href="input_barang.php">Tambah</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tampil_barang.php">Tampil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Cetakcoba.php">Cetak</a>
    </li>
  </ul>
</div>

</body>
</html>
<hr>

<div class="container mt-3">
  <h2 style="background-color: lightblue">TAMBAH DATA BODYCARE</h2>
  <form action="simpan.php" method="POST" enctype="multipart/form-data" name="formku">

  <!--pilih jenis bodycare-->
    <div class="mb-3 mt-3">
      <label for="jenis"> Jenis Barang:</label>
      <select name ="jenis" class= "form-control" id="jenis" onchange="Bayar()">
			<option value ="Body Lotion">Body Lotion</option>
			<option value ="Body Wash">Body Wash</option>
			<option value ="Body Serum">Body Serum</option>
			<option value ="Sunsblock">Sunblock</option>
            <option value ="Body Scrub">Body Scrub</option>
		</select>
    </div>

     <!--input nama-->
    <div class="mb-3">
      <label for="nama">Nama Barang:</label>
      <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Barang" name="nama">
    </div>

    <div class="mb-3">
      <label for="nomor">Nomor Barang:</label>
      <input type="number" class="form-control" id="nomor" placeholder="Masukan Nomor Barang" name="nomor" onchange="ValidasiNomor()">
      <p id ="msg" name="msg"></p>
    </div>

    <!--input tanggal-->
   <div class="mb-3">
      <label for="tanggal">Tanggal Pembelian:</label>
      <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
    </div>

    <!--harga otomatis terinput-->
   <div class="mb-3">
      <label for="harga">Harga Barang:</label>
      <input type="number" class="form-control" id="harga"  placeholder="Masukan Harga Barang" name="harga">
    </div>

    <!--inputkan jumlah barang-->
    <div class="mb-3">
      <label for="jumlah">Jumlah Barang:</label>
      <input type="number" class="form-control" id="jumlah" onchange="totalharga()" placeholder="Masukan Harga Barang" name="jumlah">
    </div>

    <!--total barang didapat dari harga dikali jumlah barang-->
    <div class="mb-3">
      <label for="total">Total:</label>
      <input type="number" class="form-control" id="total" placeholder="Masukan Harga Barang" name="total">
    </div>

    <!--masukan foto-->
   <div class="mb-3">
      <label for="foto">Foto Barang:</label>
      <input type="file" class="form-control" id="foto" placeholder="Masukan Nama Barang" name="foto">
    </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
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
        //fungsi validasi nomor pemesanan
        function ValidasiNomor() {
    var no = document.formku.nomor.value;

    if (no.length !=5){
      window.alert("Nomor Tidak Valid");
    }
  } 

    
    </script>
</body>
</html>
