<?php
session_start();
include('koneksi.php');

if(isset($_POST['tambah'])){
    $kode_buku = $_POST['kode_buku'];
    $no_buku = $_POST['no_buku'];
    $judul_buku = $_POST['judul_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $nama_penulis = $_POST['nama_penulis'];
    $penerbit = $_POST['penerbit'];
    $jumlah_halaman = $_POST['jumlah_halaman'];
    $harga = $_POST['harga'];
    $gambar_buku = $_POST['gambar_buku'];

    $sql = "INSERT INTO buku(kode_buku, no_buku, judul_buku, tahun_terbit, nama_penulis, penerbit, jumlah_halaman, harga, gambar_buku)
    VALUES ('$kode_buku', '$no_buku', '$judul_buku', '$tahun_terbit', '$nama_penulis', '$penerbit', '$jumlah_halaman', '$harga', '$gambar_buku')";
    mysqli_query($koneksi, $sql);
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <form action="admin.php" method="post">
        <input type="text" name="kode_buku" placeholder="Kode_Buku" required><br>
        <input type="number" name="no_buku" placeholder="No_Buku" required><br>
        <input type="text" name="judul_buku" placeholder="Judul_Buku" required><br>
        <input type="number" name="tahun_terbit" placeholder="Tahun_Terbit" required><br>
        <input type="text" name="nama_penulis" placeholder="Nama_Penulis" required><br>
        <input type="text" name="penerbit" placeholder="Penerbit" required><br>
        <input type="number" name="jumlah_halaman" placeholder="Jumlah_Halaman" required><br>
        <input type="number" name="harga" placeholder="Harga" required><br>
        <input type="text" name="gambar_buku" placeholder="Gambar_Buku" required><br>

        <input type="submit" name="tambah" value="Tambah">
        </form>
        <table border="1">
            <tr>
                <th>KODE BUKU</th>
                <th>NO BUKU</th>
                <th>JUDUL BUKU</th>
                <th>TAHUN TERBIT</th>
                <th>NAMA PENULIS</th>
                <th>PENERBIT</th>
                <th>JUMLAH HALAMAN</th>
                <th>HARGA</th>
                <th>GAMBAR</th>
                <th>ACTION</th>
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
                <a href="edit.php?no_buku=<?=$data['no_buku']?>">EDIT</a>
                <a href="hapus.php?no_buku=<?=$data['no_buku']?>">HAPUS</a>
                </td>
            </tr>
            <?php
                }
                ?>
</body>
</html>