<?php
include 'conf.php';

if (!isset($_GET['id'])) {
    header('Location: barang.php');
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "DELETE FROM barang WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    showMessage('success', 'Data berhasil dihapus');
    header("Location: barang.php");
    exit();
} else {
    showMessage('danger', 'Gagal menghapus data: ' . mysqli_error($conn));
}
?>
