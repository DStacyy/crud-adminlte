<?php
include 'conf.php';
include 'template/header.php';

$message = getMessage();
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                            <h1 class="m-0">Halaman Admin</h1>
                        </div>
                    <div class="col-sm-6">
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid"></div>
            <div class="col-12">
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Admin</h3>
                <div class="card-tools">
                    <a href="admin-add.php" class="btn btn-primary btn-sm">Tambah Admin</a>
                </div>
              </div>

              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM admin ORDER BY id DESC";
                    $result = mysqli_prepare($conn, $query);
                    mysqli_stmt_execute($result);
                    $result = mysqli_stmt_get_result($result);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)):
                    ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['telepon']?></td>
                    <td><?= $row['created_at']?></td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <a href="admin-edit.php?id=<?=$row['id']?>" class="btn btn-warning btn-sm mr-1">Edit</a>
                            <a href="admin-del.php?id=<?=$row['id']?>" 
                               class="btn btn-block btn-outline-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </div>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php'; ?>
