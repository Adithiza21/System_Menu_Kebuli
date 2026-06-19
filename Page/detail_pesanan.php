<?php
$id = $_GET['id'];
$pesanan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT p.*, u.nama as pelanggan, m.nm_meja 
    FROM pesanan p 
    LEFT JOIN users u ON p.id_user = u.id_user
    LEFT JOIN meja m ON p.id_meja = m.id_meja
    WHERE p.id_pesanan = '$id'"));
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Pesanan #<?= $id ?></h1>
            </div>
            <div class="col-sm-6">
                <a href="index.php?page=pesanan" class="btn btn-default float-right">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Informasi Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID Pesanan</th>
                                <td><?= $pesanan['id_pesanan'] ?></td>
                            </tr>
                            <tr>
                                <th>Pelanggan</th>
                                <td><?= $pesanan['pelanggan'] ?></td>
                            </tr>
                            <tr>
                                <th>Meja</th>
                                <td><?= $pesanan['nm_meja'] ?? '-' ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td><?= date('d/m/Y H:i', strtotime($pesanan['tgl_pesan'])) ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><span class="badge badge-<?= $pesanan['status'] == 'selesai' ? 'success' : 'warning' ?>"><?= ucfirst($pesanan['status']) ?></span></td>
                            </tr>
                            <tr>
                                <th>Tipe</th>
                                <td><?= str_replace('_', ' ', ucfirst($pesanan['tipe_pesanan'])) ?></td>
                            </tr>
                            <tr>
                                <th>Total Harga</th>
                                <td><strong>Rp <?= number_format($pesanan['total_harga'], 0, ',', '.') ?></strong></td>
                            </tr>
                            <?php if($pesanan['catatan']) { ?>
                            <tr>
                                <th>Catatan</th>
                                <td><?= $pesanan['catatan'] ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Detail Menu</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Menu</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $detail = mysqli_query($koneksi, "SELECT d.*, m.nm_menu 
                                    FROM detail_pesanan d
                                    JOIN menu m ON d.id_menu = m.id_menu
                                    WHERE d.id_pesanan = '$id'");
                                $grand_total = 0;
                                while($row = mysqli_fetch_array($detail)) {
                                    $grand_total += $row['subtotal'];
                                ?>
                                <tr>
                                    <td><?= $row['nm_menu'] ?></td>
                                    <td><?= $row['jumlah'] ?></td>
                                    <td>Rp <?= number_format($row['harga_satuan'], 0, ',', '.') ?></td>
                                    <td>Rp <?= number_format($row['subtotal'], 0, ',', '.') ?></td>
                                </tr>
                                <?php } ?>
                                <tr class="bg-light">
                                    <td colspan="3" class="text-right"><strong>Grand Total</strong></td>
                                    <td><strong>Rp <?= number_format($grand_total, 0, ',', '.') ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>