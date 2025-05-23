<?php
session_start();
include('koneksi.php');

if (isset($_GET['no_buku'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['no_buku']);

    $query = "DELETE FROM buku WHERE no_buku='$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal: " . mysqli_error($koneksi));
    }
}

header('Location: admin.php');
exit;
?>