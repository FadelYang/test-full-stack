<?php
include 'Library.php';
include 'DatabaseConnection.php';

$dbConnection = new DatabaseConnection();
$library = new Library($dbConnection);

if (isset($_POST['submit'])) {
    $array = [
        $_POST['nomor_buku'],
        $_POST['nama_buku'],
        $_POST['penulis'],
        $_POST['penerbit'],
        date('Y-m-d', strtotime($_POST["tanggal_masuk_perpustakaan"])),
    ];

    $library->addBook('buku', $array);
    echo $library->redirect('index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Tambah Data</h3>
    <?php include('Form.php') ?>
</body

</html>