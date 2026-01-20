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
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                    <div class="col-sm-6">
            
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <div class="content">
            <div class="container-fluid"></div>
            <div class="col-12">
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Barang</h3>
                <div class="card-tools">
                    <a href="add.php" class="btn btn-primary btn-sm">Tambah Barang</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM barang ORDER BY id DESC";
                    $result = mysqli_prepare($conn, $query);
                    mysqli_stmt_execute($result);
                    $result = mysqli_stmt_get_result($result);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)):
                    ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_barang']?></td>
                    <td><?= $row['kategori']?></td>
                    <td><?= $row['harga']?></td>
                    <td><?= $row['stok']?></td>
                    <td><?= $row['deskripsi']?> </td>
                    <td class="text-center">
    <div class="btn-group" role="group">
        <a href="" class="btn btn-warning btn-sm mr-1">Edit</a>
        <a href="" class="btn btn-danger btn-sm">Hapus</a>
    </div>
</td>


                  </tr>
                  <?php endwhile; ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>






<?php
include 'template/footer.php';
?>