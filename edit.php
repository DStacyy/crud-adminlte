<?php
include 'conf.php';

if (!isset($_GET ['id'])){
    header('Location : barang.php');
    exit();
}
//ambil data barang berdasar id
$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM barang WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$brg = mysqli_fetch_assoc($result);

if (!$brg){
    showMessage('danger', 'Data barang tidak ditemukan');
}

// PROSES EDIT DATA
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang  = mysqli_real_escape_string($conn, $_POST['nama_barang']);
    $kategori     = mysqli_real_escape_string($conn, $_POST['kategori']);
    $harga_barang = mysqli_real_escape_string($conn, $_POST['harga_barang']);
    $stok         = mysqli_real_escape_string($conn, $_POST['stok']);
    $deskripsi    = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    $update = "UPDATE barang SET 
                nama_barang = '$nama_barang',
                kategori = '$kategori',
                harga = '$harga_barang',
                stok = '$stok',
                deskripsi = '$deskripsi'
               WHERE id = '$id'";

    if (mysqli_query($conn, $update)) {
    showMessage('success', 'Data berhasil diupdate');
    header("Location: barang.php");
    exit();
    } else {
    showMessage('danger', 'Gagal update data') . mysqli_error($conn);
    }
}

include 'template/header.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                        <h1 class="m-0">Ubah Data Barang</h1>
                    </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang" 
                    name="nama_barang" value="<?= htmlspecialchars($brg['nama_barang']) ?>" required>
                  </div>
                </div>
                <!-- /.card-body -->
                 <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori" required>
                          <option value="">Pilih Kategori</option>
                          <option value="Elektronik" <?= ($brg['kategori'] == 'Elektronik')? 'selected' : '' ?>>Elektronik</option>
                          <option value="Furniture" <?= ($brg['kategori'] == 'Furniture')? 'selected' : '' ?>>Furniture</option>
                          <option value="Buku" <?= ($brg['kategori'] == 'Buku')? 'selected' : '' ?>>Buku</option>
                          <option value="Aksesoris" <?= ($brg['kategori'] == 'Aksesoris')? 'selected' : '' ?>>Aksesoris</option>
                          <option value="Lainnya" <?= ($brg['kategori'] == 'Lainnya')? 'selected' : '' ?>>Lainnya</option>
                        </select>
                      </div>
                <div class="form-group">
                    <label for="harga_barang">Harga Barang (Rp)</label>
                    <input type="number" class="form-control"
                     id="harga_barang" placeholder="Harga Barang" name="harga_barang" required value="<?= htmlspecialchars($brg['harga']) ?>">
                </div>
                <div class="form-group">
                    <label for="stok">Stok Barang</label>
                    <input type="number" class="form-control"
                     id="stok" placeholder="Stok" name="stok" required value="<?= $brg['stok'] ?>">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Barang</label>
                    <textarea type="number" class="form-control"
                     id="deskripsi" placeholder="Deskripsi Barang" name="deskripsi" rows="4" required><?= $brg['deskripsi'] ?></textarea>
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