<?php
include 'Library.php';
include 'DatabaseConnection.php';

$dbConnection = new DatabaseConnection();
$library = new Library($dbConnection);

$library->deleteBook('buku', 'nomor_buku', $_GET['nomor_buku']);
echo $library->redirect('index.php');

