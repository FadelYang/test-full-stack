<?php

class DatabaseConnection
{
    public $koneksi;

    function __construct()
    {
        $this->koneksi = mysqli_connect('localhost', 'root', '', 'botika_1');

        if (!$this->koneksi) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getConnectionToDatabase()
    {
        return $this->koneksi;
    }
}
