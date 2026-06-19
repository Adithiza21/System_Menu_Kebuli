<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Promo</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM promo WHERE id_promo = '$id'");
    if($query) {
        echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Data Berhasil Dihapus
        </div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=promo">';
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_promo" class="btn btn-primary btn-sm mb-3">
                    <i class="fas fa-plus"></i> Tambah Promo
                </a>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>Kode Promo</th>
                            <th>Jenis</th>
                            <th>Nilai</th>
                            <th>Min Pembelian</th>
                            <th>Berlaku</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query($koneksi, "SELECT * FROM promo ORDER BY id_promo DESC");
                        while($row = mysqli_fetch_array($query)) {
                            $no++;
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><span class="badge badge-primary"><?= $row['kode_promo'] ?></span></td>
                            <td><?= ucfirst(str_replace('_', ' ', $row['jenis'])) ?></td>
                            <td>
                                <?php if($row['jenis'] == 'diskon') { ?>
                                    <?= $row['nilai'] ?>%
                                <?php } else { ?>
                                    Rp <?= number_format($row['nilai'], 0, ',', '.') ?>
                                <?php } ?>
                            </td>
                            <td>Rp <?= number_format($row['min_pembelian'], 0, ',', '.') ?></td>
                            <td>
                                <?= date('d/m/Y', strtotime($row['berlaku_mulai'])) ?> - 
                                <?= date('d/m/Y', strtotime($row['berlaku_sampai'])) ?>
                            </td>
                            <td>
                                <?php if($row['is_active']) { ?>
                                    <span class="badge badge-success">Aktif</span>
                                <?php } else { ?>
                                    <span class="badge badge-danger">Nonaktif</span>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="index.php?page=promo&action=hapus&id=<?= $row['id_promo'] ?>" 
                                   onclick="return confirm('Yakin hapus data ini?')"
                                   class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="index.php?page=edit_promo&id=<?= $row['id_promo'] ?>" 
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>