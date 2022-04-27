<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('laporan/cetak_laporan/pinjam'); ?>" target="_blank" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
            <a href="<?= base_url('laporan/laporan_buku_pdf'); ?>" target="_blank" class="btn btn-warning mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
            <a href="<?= base_url('laporan/export_excel'); ?>" target="_blank" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
            <table class="table table-hover">
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
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->