<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center>Laporan Data Buku Perputakaan Online</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Tanggal Pengemblian</th>
                <th scope="col">Total Denda</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $a = 1;
            foreach ($pinjam as $p) { ?>
                <tr>
                    <th scope="row"><?= $a++; ?></th>
                    <td><?= ambilData('users', ['id' => $p['id_user']], 'nama'); ?></td>
                    <td><?= ambilData('buku', ['id' => ambilData('detail_pinjam', ['no_pinjam' => $p['no_pinjam']], 'id_buku')], 'judul_buku'); ?></td>
                    <td><?= formattanggalprint($p['tgl_pinjam']); ?></td>
                    <td><?= formattanggalprint($p['tgl_kembali']); ?></td>
                    <td><?= formattanggalprint($p['tgl_pengembalian']); ?></td>
                    <td><?= $p['total_denda']; ?></td>
                    <td><?= $p['status']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>