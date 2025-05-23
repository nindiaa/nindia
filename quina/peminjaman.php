<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'] == 'POST')){
    $user_id = $_POST['user_id'];
    $kode_buku = $_POST['kode_buku'];
    $jumlah_pinjam = $_POST['jumlah_pinjam'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];

    $query = "INSERT INTO peminjaman (user_id, kode_buku, jumlah_pinjam, tanggal_pinjam)
              VALUES ('$user_id', '$kode_buku', $jumlah_pinjam, '$tanggal_pinjam')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Data peminjaman berhasil disimpan. <a href='form_peminjaman.php'>Pinjam lagi</a>";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEMINJAMAN</title>
</head>
<body>
    <form method="post" action="simpan_peminjaman.php">
        <input type="text" name="user_id" required><br><br>
        <input type="text" name="kode_buku" required><br><br>
        <input type="number" name="jumlah_pinjam" required><br><br>
        <input type="date" name="tanggal_pinjam" required><br><br>

        <input type="submit" name="tambah" value="tambah">
    </form>
</body>
</html>

