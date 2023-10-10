-- nomor a
SELECT
    *
FROM
    pembeli
WHERE
    alamat = "Sleman"

-- nomor b
SELECT
    transaksi.id_transaksi,
    transaksi.id_barang,
    transaksi.tanggal,
    transaksi.keterangan
FROM
    transaksi
JOIN
    pembeli
ON transaksi.id_pembeli = pembeli.id_pembeli
WHERE
    alamat.pembeli = "Sleman"
    
-- nomor c
SELECT
    id_barang.barang,
    nama_barang.barang,
    harga.barang,
    stok.barang,
    id_supplier.barang
FROM
    barang
JOIN transaksi ON barang.id_barang = transaksi.id_barang
JOIN pembeli ON pembeli.id_pembeli = trasaksi.id_pembeli
WHERE pembeli.alamat = "Sleman" and Date between 2022-1-1 and 2022-1-31

-- nomor d
SELECT SUM(transaksi.id_transaksi) AS "TOTAL TRANSAKSI"
FROM transaksi
JOIN pembeli ON pembeli.id_pembeli = transaksi.id_pembeli
WHERE pembeli.nama_pembeli = "Yanto Messi"