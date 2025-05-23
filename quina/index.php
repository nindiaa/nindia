<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ukk5");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>USER</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>KODE BUKU</th>
            <th>NO BUKU</th>
            <th>JUDUL BUKU</th>
            <th>TAHUN TERBIT</th>
            <th>NAMA PENULIS</th>
            <th>penerbit</th>
            <th>JUMLAH HALAMAN</th>
            <th>HARGA</th>
            <th>GAMBAR</th>
        </tr>
        <?php
            $sql = mysqli_query($koneksi, "SELECT * FROM buku");
            while($data = mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td><?=$data['kode_buku']?></td>
            <td><?=$data['no_buku']?></td>
            <td><?=$data['judul_buku']?></td>
            <td><?=$data['tahun_terbit']?></td>
            <td><?=$data['nama_penulis']?></td>
            <td><?=$data['penerbit']?></td>
            <td><?=$data['jumlah_halaman']?></td>
            <td><?=$data['harga']?></td>
            <td>
                <img src="<?=$data['gambar_buku']?>" alt="cover" width="80px">
            </td>
            <td>
            <a href="pinjam.php?no_buku=<?=$data['no_buku']?>">Pinjam</a>
            <a href="kembali.php?no_buku=<?=$data['no_buku']?>">Kembali</a>
        </td>
        </tr>
        <?php
            }
            ?>
            </table>
</body>
</html>
