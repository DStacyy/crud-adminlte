<?php
include 'conf.php';

$message = getMessage();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $telepon  = mysqli_real_escape_string($conn, $_POST['telepon']);
    
    $query = "INSERT INTO admin (nama, email, password, telepon)
              VALUES ('$nama', '$email', '$password', '$telepon')";

    if (mysqli_query($conn, $query)) {
        showMessage('success', 'Data admin berhasil ditambahkan');
        header('Location: admin.php');
        exit();
    } else {
        showMessage('danger', 'Data admin gagal ditambahkan: ' . mysqli_error($conn));
    }
}

include 'template/header.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                        <h1 class="m-0">Tambah Admin</h1>
                    </div>
                <div class="col-sm-6">
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Admin</h3>
              </div>

              <form method="POST" action="">
                <div class="card-body">

                  <div class="form-group">
                    <label for="nama">Nama Admin</label>
                    <input type="text" class="form-control" id="nama"
                           placeholder="Nama Admin" name="nama" required>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email"
                           placeholder="Email" name="email" required>
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password"
                           placeholder="Password" name="password" required>
                  </div>

                  <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" class="form-control" id="telepon"
                           placeholder="No Telepon" name="telepon" required>
                  </div>

                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>
