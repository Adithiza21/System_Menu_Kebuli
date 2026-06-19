<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Bahan Baku</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM bahan_baku WHERE id_bahan = '$id'");
    if($query) {
        echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Data Berhasil Dihapus
        </div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=bahan_baku">';
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_bahan" class="btn btn-primary btn-sm mb-3">
                    <i class="fas fa-plus"></i> Tambah Bahan Baku
                </a>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>Nama Bahan</th>
                            <th>Satuan</th>
                            <th>Stok</th>
                            <th>Minimal Stok</th>
                            <th>Harga Beli</th>
                            <th>Supplier</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query($koneksi, "SELECT * FROM bahan_baku ORDER BY id_bahan DESC");
                        while($row = mysqli_fetch_array($query)) {
                            $no++;
                            $stok_status = ($row['stok'] <= $row['minimal_stok']) ? 'danger' : 'success';
                            $stok_text = ($row['stok'] <= $row['minimal_stok']) ? 'Stok Menipis' : 'Stok Aman';
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nm_bahan'] ?></td>
                            <td><?= $row['satuan'] ?></td>
                            <td><?= $row['stok'] ?></td>
                            <td><?= $row['minimal_stok'] ?></td>
                            <td>Rp <?= number_format($row['harga_beli'], 0, ',', '.') ?></td>
                            <td><?= $row['supplier'] ?? '-' ?></td>
                            <td>
                                <span class="badge badge-<?= $stok_status ?>"><?= $stok_text ?></span>
                            </td>
                            <td>
                                <a href="index.php?page=bahan_baku&action=hapus&id=<?= $row['id_bahan'] ?>" 
                                   onclick="return confirm('Yakin hapus data ini?')"
                                   class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="index.php?page=edit_bahan&id=<?= $row['id_bahan'] ?>" 
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