
<form method="post">
    <table width="50%">
        <tr>
            <td width="10%">Nomor</td>
            <td width="1%">:</td>
            <td>
                <input type="hidden" name="normor_buku" value="<?php echo $item['nomor_buku'] ?>"></input>
                <input type="number" name="nomor_buku" value="<?php echo $item['nomor_buku'] ?>"></input>
            </td>
        </tr>
        <tr>
            <td width="10%">Nama Buku</td>
            <td width="1%">:</td>
            <td>
                <input type="text" name="nama buku" value="<?php echo $item['nama_buku'] ?>"></input>
            </td>
        </tr>
        <tr>
            <td width="10%">Penulis</td>
            <td width="1%">:</td>
            <td>
                <input type="string" name="penulis" value="<?php echo $item['penulis'] ?>"></input>
            </td>
        </tr>
        <tr>
            <td width="10%">Penerbit</td>
            <td width="1%">:</td>
            <td>
                <input type="string" name="penerbit" value="<?php echo $item['penerbit'] ?>"></input>
            </td>
        </tr>
        <tr>
            <td width="10%">Tanggal Masuk Perpustakaan</td>
            <td width="1%">:</td>
            <td>
                <input type="date" name="tanggal_masuk_perpustakaan" value="<?php echo $item['tanggal_masuk_perpustakan'] ?>"></input>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <input type="submit" name="submit" value="Simpan"></input>
            </td>
        </tr>
    </table>
</form>