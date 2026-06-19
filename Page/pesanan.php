<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Pesanan</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_GET['action']) && $_GET['action'] == "status") {
    $id = $_GET['id'];
    $status = $_GET['status'];
    $update = mysqli_query($koneksi, "UPDATE pesanan SET status = '$status' WHERE id_pesanan = '$id'");
    if($update) {
        echo '<div class="alert alert-success">Status Berhasil Diupdate</div>';
    }
}

if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM pesanan WHERE id_pesanan = '$id'");
    if($query) {
        echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Data Berhasil Dihapus
        </div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=pesanan">';
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_pesanan" class="btn btn-primary btn-sm mb-3">
                    <i class="fas fa-plus"></i> Tambah Pesanan
                </a>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>ID Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Meja</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query($koneksi, "SELECT p.*, u.nama as pelanggan, m.nm_meja 
                            FROM pesanan p 
                            LEFT JOIN users u ON p.id_user = u.id_user
                            LEFT JOIN meja m ON p.id_meja = m.id_meja
                            ORDER BY p.id_pesanan DESC");
                        while($row = mysqli_fetch_array($query)) {
                            $no++;
                            $status_class = '';
                            switch($row['status']) {
                                case 'pending': $status_class = 'warning'; break;
                                case 'proses': $status_class = 'info'; break;
                                case 'selesai': $status_class = 'success'; break;
                                case 'batal': $status_class = 'danger'; break;
                                case 'delivery': $status_class = 'primary'; break;
                            }
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['id_pesanan'] ?></td>
                            <td><?= $row['pelanggan'] ?></td>
                            <td><?= $row['nm_meja'] ?? '-' ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($row['tgl_pesan'])) ?></td>
                            <td>Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></td>
                            <td>
                                <span class="badge badge-<?= $status_class ?>"><?= ucfirst($row['status']) ?></span>
                            </td>
                            <td><span class="badge badge-secondary"><?= str_replace('_', ' ', ucfirst($row['tipe_pesanan'])) ?></span></td>
                            <td>
                                <?php if($row['status'] != 'selesai' && $row['status'] != 'batal') { ?>
                                <a href="index.php?page=pesanan&action=status&id=<?= $row['id_pesanan'] ?>&status=proses" class="btn btn-info btn-sm">Proses</a>
                                <a href="index.php?page=pesanan&action=status&id=<?= $row['id_pesanan'] ?>&status=selesai" class="btn btn-success btn-sm">Selesai</a>
                                <?php } ?>
                                <a href="index.php?page=detail_pesanan&id=<?= $row['id_pesanan'] ?>" class="btn btn-primary btn-sm">Detail</a>
                                <a href="index.php?page=pesanan&action=hapus&id=<?= $row['id_pesanan'] ?>" 
                                   onclick="return confirm('Yakin hapus data ini?')"
                                   class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
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