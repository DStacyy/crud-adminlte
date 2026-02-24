<?php
include 'conf.php';
include 'template/header.php';
include 'func.php';

$keyword = isset ($_GET ['keyword']) ? $_GET['keyword'] : '';
$kategori_filter = isset ($_GET['keyword']) ? $_GET['keyword'] : '';

$result = getBarang($keyword, $kategori_filter);

$daftar_kategori = getKategori();
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
            <?php if ($message):?>
              <div class="alert alert-dismissable alert-<?= $message['type'] ?>">
                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $message ['type'];?>
              </div>
              <?php endif; ?>
              <div class="card card primary">
                <div class="card-header">
                  <h3 class="card-title">Pencarian Dan Filter</h3>
                  <div class="card-tools">
                    <button class="btn btn-model" type="button" data-card-widget="collapse"></button>
                    <i class="fas fa-minus"></i>
                  </div>
                </div>
                <div class="class-body">
                  <form action="barang.php" method="GET" class="from-inline">
                    <div class="form=-group mb-2 mr-2">
                      <label for="keyword" class="sr-only">Kata Kunci</label>
                      <input type="text" name="keyword">
                    </div>
                    <div class="form=-group mb-2 mr-2">
                      <label for="kategori" class="sr-only">Kategori</label>
                      <select class="form-control" id="kategori"name="kategori"  >
                        <option value="semua">Semua Kategori</option>
                          <?php foreach ($daftar_kategori as $kat): ?>
                            <option value="<?php echo htmlspecialchars($kat)? 'selected':'';?>"
                              <?php echo ($kategori_filter == $kat) ? 'selected' : ''; ?>>
                              <?php echo htmlspecialchars($kat);?>
                            </option>  
                            <?php endforeach; ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 mr-2">
                      <i class="fas fa-search">Cari</i>
                    </button>
                    <a href="barang.php" class="btn btn-primary mb-2 mr-2">
                      <i class="fas fa-redo">Reset</i>
                    </a>
                  </form>
                </div>
              </div>
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
        <a href="edit.php?id=<?=$row['id']?>" class="btn btn-warning btn-sm mr-1">Edit</a>
        <a href="del.php?id=<?=$row['id']?>" class="btn btn-block btn-outline-danger btn-sm"
        onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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