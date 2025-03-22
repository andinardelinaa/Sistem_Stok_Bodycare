<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Bodycare</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH BODYCARE
            </div>
            <div class="card-body">
              <form action="simpan_barang.php" method="POST">
                
                <div class="form-group">
                  <label>Jenis Barang :</label>
                  <td>
				          <select name ="jenis" class= "form-control">
					        <option value ="Body Lotion">Body Lotion</option>
					        <option value ="Body Wash">Body Wash</option>
					        <option value ="Body Serum">Body Serum</option>
					        <option value ="Sunsblock">Sunblock</option>
                            <option value ="Body Scrub">Body Scrub</option>
				          </select>
				          </td>
                </div>
                <div class="form-group">
                  <label>Nama Barang :</label>
                  <input type="text" name="nama" placeholder="Masukkan nama produk" class="form-control" required>
                </div>

                  <div class="form-group">
                  <label>Stok Barang :</label>
                  <input type="number" name="stok" placeholder="Masukkan stok barang" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Tanggal Kadaluarsa :</label>
                  <input type="date" name="tanggal" class="form-control" required>
                </div>

                  <div class="form-group">
                  <label>Harga Barang :</label>
                  <input type="number" name="harga" placeholder="Masukkan harga barang" class="form-control" required>
                </div>

                <div class="form-group">
                  <label>Foto Barang :</label>
                  <input type="file" name="foto" class="form-control" required>
                </div>

                
                <button type="submit" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>
                <br>
                <a href="index.php">KEMBALI</a>
                </br>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   
  </body>
</html>