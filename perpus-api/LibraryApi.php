<?php

require_once 'DatabaseConnection.php';
require_once 'Library.php';

$db = new DatabaseConnection();
$library = new Library($db);

function getBooks($library)
{
    $books = $library->getBooks();
    var_dump($books);
    echo json_encode($books);
}

function getBookById($library, $bookId)
{
    $book = $library->getBooksById('buku', 'nomor_buku', $bookId);
    echo json_encode($book);
}

function addBook($library, $data)
{
    $result = $library->addBook('buku', $data);
    echo json_encode(['success' => $result]);
}

function updateBook($library, $bookId, $data)
{
    $result = $library->updateBook('buku', $data, 'nomor_buku', $bookId);
    echo json_encode(['success' => $result]);
}

function deleteBook($library, $bookId)
{
    $result = $library->deleteBook('buku', 'nomor_buku', $bookId);
    echo json_encode(['success' => $result]);
}


$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'GET') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action === 'getBooks') {
            getBooks($library);
        } elseif ($action === 'getBookById' && isset($_GET['id'])) {
            $bookId = $_GET['id'];
            getBookById($library, $bookId);
        }
    }
} elseif ($requestMethod === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        if ($action === 'addBook') {

            $data = json_decode(file_get_contents('php://input'), true);
            addBook($library, $data);
        } elseif ($action === 'updateBook' && isset($_POST['id'])) {
            $bookId = $_POST['id'];

            $data = json_decode(file_get_contents('php://input'), true);
            updateBook($library, $bookId, $data);
        }
    }
} elseif ($requestMethod === 'DELETE' && isset($_GET['action']) && $_GET['action'] === 'deleteBook' && isset($_GET['id'])) {
    $bookId = $_GET['id'];
    deleteBook($library, $bookId);
}
