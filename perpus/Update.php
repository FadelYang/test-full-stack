<?php
include 'Library.php';
include 'DatabaseConnection.php';

$dbConnection = new DatabaseConnection();
$library = new Library($dbConnection);

if (isset($_POST['submit'])) {
            
    if ($library->getBooksById('buku', 'nomor_buku', $_POST['nomor_buku']) == 1) {
        $array = [
            $_POST['nomor_buku'],
            $_POST['nama_buku'],
            $_POST['penulis'],
            $_POST['penerbit'],
            date('Y-m-d', strtotime($_POST["tanggal_masuk_perpustakaan"])),
        ];

        $library->updateBook('buku', $array, 'nomor_buku', $_POST['nomor_buku']);
        echo $library->redirect('index.php', 'memperbarui');
    }
}
$item = mysqli_fetch_array($library->getBooksById('buku', 'nomor_buku', $_GET['nomor_buku']));
?>

<!DOCTYPE html>
<html>

<head>
    <title>Document</title>
</head>

<body>
    <h3>Update Data</h3>
    <?php include('Form.php') ?>
</body>

</html>