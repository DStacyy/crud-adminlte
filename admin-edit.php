<?php
include 'conf.php';

if (!isset($_GET['id'])) {
    header('Location: admin.php');
    exit();
}

// ambil data admin berdasarkan id
$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM admin WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$adm = mysqli_fetch_assoc($result);

if (!$adm) {
    showMessage('danger', 'Data admin tidak ditemukan');
}

// PROSES EDIT DATA
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama    = mysqli_real_escape_string($conn, $_POST['nama']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);

    // kalau password diisi, update. kalau kosong, biarin
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $update = "UPDATE admin SET 
                    nama = '$nama',
                    email = '$email',
                    password = '$password',
                    telepon = '$telepon'
                   WHERE id = '$id'";
    } else {
        $update = "UPDATE admin SET 
                    nama = '$nama',
                    email = '$email',
                    telepon = '$telepon'
                   WHERE id = '$id'";
    }

    if (mysqli_query($conn, $update)) {
        showMessage('success', 'Data admin berhasil diupdate');
        header("Location: admin.php");
        exit();
    } else {
        showMessage('danger', 'Gagal update data: ' . mysqli_error($conn));
    }
}

include 'template/header.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                        <h1 class="m-0">Ubah Data Admin</h1>
                    </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Admin</h3>
              </div>

              <form method="POST" action="">
                <div class="card-body">

                  <div class="form-group">
                    <label for="nama">Nama Admin</label>
                    <input type="text" class="form-control" id="nama"
                           name="nama" required
                           value="<?= htmlspecialchars($adm['nama']) ?>">
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email"
                           name="email" required
                           value="<?= htmlspecialchars($adm['email']) ?>">
                  </div>

                  <div class="form-group">
                    <label for="password">Password Baru (opsional)</label>
                    <input type="password" class="form-control" id="password"
                           name="password" placeholder="Kosongkan jika tidak diubah">
                  </div>

                  <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" class="form-control" id="telepon"
                           name="telepon" required
                           value="<?= htmlspecialchars($adm['telepon']) ?>">
                  </div>

                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="admin.php" class="btn btn-secondary">Kembali</a>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>
