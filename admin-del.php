<?php
include 'conf.php';

if (!isset($_GET['id'])) {
    header('Location: admin.php');
    exit();
}

$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "DELETE FROM admin WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    header("Location: admin.php?msg=deleted");
    exit();
} else {
    die("Error: " . mysqli_error($conn));
}
?>
