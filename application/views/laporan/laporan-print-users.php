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
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $a = 1;
            foreach ($users as $u) { ?>
                <tr>
                    <th scope="row"><?= $a++; ?></th>
                    <td><?= $u['nama']; ?></td>
                    <td><?= $u['alamat']; ?></td>
                    <td><?= $u['email']; ?></td>
                    <td><?= ambilData('role', ['id' => $u['role_id']], 'role'); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>