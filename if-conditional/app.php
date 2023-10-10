<?php

$data = [
    [
        'no_nota' => 1034,
        'nm_barang' => 'jaket',
        'harga' => 549000,
        'jumlah' => 2,
        'total' => 1098000,
    ],
    [
        'no_nota' => 1046,
        'nm_barang' => 'celana',
        'harga' => 250000,
        'jumlah' => 1,
        'total' => 250000,
    ],
    [
        'no_nota' => 1187,
        'nm_barang' => 'tas',
        'harga' => 300000,
        'jumlah' => 4,
        'total' => 1200000,
    ],
    [
        'no_nota' => 1286,
        'nm_barang' => 'baju',
        'harga' => 120000,
        'jumlah' => 3,
        'total' => 360000,
    ],
];

$newArray = [];


for ($i=0; $i <= count($data) -1; $i++) { 
    if (($data[$i]["total"] > 1000000) && ($data[$i]["jumlah"] > 2)) {
        $data[$i]["total"] = $data[$i]["total"] - ($data[$i]["total"] * 0.1);
        $data[$i]["total"] = $data[$i]["total"] - ($data[$i]["total"] * 0.15);
    } else if (($data[$i]["total"] > 1000000)) {
        $data[$i]["total"] = $data[$i]["total"] - ($data[$i]["total"] * 0.1);
    } else if (($data[$i]["jumlah"] > 2)) {
        $data[$i]["total"] = $data[$i]["total"] - ($data[$i]["total"] * 0.15);
    }

    if (strlen($data[$i]["nm_barang"]) > 4) {
        $newData = [
            'no_nota' => $data[$i]["no_nota"],
            'nm_barang' => $data[$i]["nm_barang"],
            'harga' => $data[$i]["harga"],
            'jumlah' => $data[$i]["jumlah"],
            'total' => $data[$i]["total"],
        ];

        array_push($newArray, $newData);
    }
}


foreach ($newArray as $item) {
    echo "No Nota: " . $item['no_nota'] . "\n";
    echo "Nama Barang: " . $item['nm_barang'] . "\n";
    echo "Harga: " . $item['harga'] . "\n";
    echo "Jumlah: " . $item['jumlah'] . "\n";
    echo "Total: " . $item['total'] . "\n";
    echo "\n";
}

foreach ($data as $item) {
    echo "No Nota: " . $item['no_nota'] . "\n";
    echo "Nama Barang: " . $item['nm_barang'] . "\n";
    echo "Harga: " . $item['harga'] . "\n";
    echo "Jumlah: " . $item['jumlah'] . "\n";
    echo "Total: " . $item['total'] . "\n";
    echo "\n";
}