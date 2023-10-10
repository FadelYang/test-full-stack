<?php

$jsonFile = "data.json";
$jsonString = file_get_contents($jsonFile);
$jsonData = json_decode($jsonString, true);

foreach ($newArray as $item) {
    echo "No Nota: " . $item['no_nota'] . "\n";
    echo "Nama Barang: " . $item['nm_barang'] . "\n";
    echo "Harga: " . $item['harga'] . "\n";
    echo "Jumlah: " . $item['jumlah'] . "\n";
    echo "Total: " . $item['total'] . "\n";
    echo "\n";
}

function customFilter($item)
{
    return $item['skill'] === 'programming';
}

$filteredData = array_filter($jsonData, 'customFilter');

var_dump($filteredData);