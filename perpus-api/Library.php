<?php

use DatabaseConnection;

class Library
{
    private $koneksi;

    public function __construct(DatabaseConnection $koneksi)
    {
        $this->koneksi = $koneksi->getConnectionToDatabase();
    }

    public function getBooks($tableName = "buku")
    {
        $books = mysqli_query(
            $this->koneksi,
            "SELECT * FROM $tableName"
        ) or die($this->koneksi->error);

        return $books;
    }

    public function getBooksById($tableName, $key, $id)
    {
        $book = mysqli_query(
            $this->koneksi,
            "SELECT * FROM $tableName WHERE $key = $id"
        ) or die($this->koneksi->error);

        return $book;
    }

    public function addBook($tableName, $data)
    {
        $rawValue = array_values(($data));
        $value = implode("', '", $rawValue);

        return mysqli_query(
            $this->koneksi,
            "INSERT INTO $tableName VALUES('$value')"
        ) or die($this->koneksi->error);
    }

    public function updateBook($tableName = "buku", $data, $key, $id)
    {
        $this->deleteBook($tableName, $key, $id);

        return $this->addBook($tableName, $data);
    }

    public function deleteBook($table, $key, $id)
    {
        return mysqli_query(
            $this->koneksi,
            "DELETE FROM $table WHERE $key = $id"
        ) or die($this->koneksi->error);
    }

    public function redirect($value, $comment = 'menambahkan')
    {
        return "<script>alert('berhasil " . $comment . " data.'); window.location = '" . $value . "'; </script>";
    }
}
