<?php
include 'conf.php';
include 'template/header.php';

$message = getMessage();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nama_barang = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $stok = mysqli_real_escape_string($conn, $_POST['stok']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
}

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                        <h1 class="m-0">Tambah Barang</h1>
                    </div><!-- /.col -->
                <div class="col-sm-6">
            
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang" name="nama_barang" required>
                  </div>
                </div>
                <!-- /.card-body -->
                 <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori" required>
                          <option value="">Pilih Kategori</option>
                          <option value="Elektronik">Elektronik</option>
                          <option value="Furniture">Furniture</option>
                          <option value="Buku">Buku</option>
                          <option value="Aksesoris">Aksesoris</option>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                      </div>
                <div class="form-group">
                    <label for="harga_barang">Harga Barang (Rp)</label>
                    <input type="number" class="form-control"
                     id="harga_barang" placeholder="Harga Barang" name="harga_barang" required>
                </div>
                <div class="form-group">
                    <label for="stok">Stok Barang</label>
                    <input type="number" class="form-control"
                     id="stok" placeholder="Stok" name="stok" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Barang</label>
                    <textarea type="number" class="form-control"
                     id="deskripsi" placeholder="Deskripsi Barang" name="deskripsi" rows="4" required></textarea>
                </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>