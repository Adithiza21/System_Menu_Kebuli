<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Pengeluaran</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM pengeluaran WHERE id_pengeluaran = '$id'");
    if($query) {
        echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Data Berhasil Dihapus
        </div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=pengeluaran">';
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_pengeluaran" class="btn btn-primary btn-sm mb-3">
                    <i class="fas fa-plus"></i> Tambah Pengeluaran
                </a>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>Kategori</th>
                            <th>Nominal</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>User</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query($koneksi, "SELECT p.*, u.nama as user_name 
                            FROM pengeluaran p
                            LEFT JOIN users u ON p.id_user = u.id_user
                            ORDER BY p.id_pengeluaran DESC");
                        while($row = mysqli_fetch_array($query)) {
                            $no++;
                            $badge_class = '';
                            switch($row['kategori']) {
                                case 'bahan_baku': $badge_class = 'info'; break;
                                case 'operasional': $badge_class = 'warning'; break;
                                case 'gaji': $badge_class = 'success'; break;
                                case 'maintenance': $badge_class = 'danger'; break;
                                case 'lainnya': $badge_class = 'secondary'; break;
                            }
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><span class="badge badge-<?= $badge_class ?>"><?= ucfirst(str_replace('_', ' ', $row['kategori'])) ?></span></td>
                            <td>Rp <?= number_format($row['nominal'], 0, ',', '.') ?></td>
                            <td><?= $row['deskripsi'] ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($row['tgl_pengeluaran'])) ?></td>
                            <td><?= $row['user_name'] ?? '-' ?></td>
                            <td>
                                <a href="index.php?page=pengeluaran&action=hapus&id=<?= $row['id_pengeluaran'] ?>" 
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