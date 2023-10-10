<?php
include 'Library.php';
include 'DatabaseConnection.php';

$dbConnection = new DatabaseConnection();
$library = new Library($dbConnection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Daftar Produk</h3>
    <a href="AddBook.php">Tambah Buku</a>
    <br>
    <table width="100%" border="1">
        <tr>
            <td>Nomor Buku</td>
            <td>Nama Buku</td>
            <td>Penerbit</td>
            <td>Penulis</td>
            <td>Tanggal Masuk Perpustakaan</td>
        </tr>
        <?php
        $query = $library->getBooks('buku');
        while ($data = mysqli_fetch_array($query)) :
        ?>
            <tr>
                <td><?php echo $data['nomor_buku'] ?></td>
                <td><?php echo $data['nama_buku'] ?></td>
                <td><?php echo $data['penulis'] ?></td>
                <td><?php echo $data['penerbit'] ?></td>
                <td><?php echo $data['tanggal_masuk_perpustakaan'] ?></td>
                <td>
                    <a href="Update.php?nomor_buku=<?php echo $data['nomor_buku'] ?>">Edit</a> |
                    <a href="Delete.php?nomor_buku=<?php echo $data['nomor_buku'] ?>" onclick="return confirm('Yakin ingin menghapus <?php echo $data['nama'] ?> ?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>