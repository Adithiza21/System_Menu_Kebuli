<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Resep</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM resep WHERE id_resep = '$id'");
    if($query) {
        echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Data Berhasil Dihapus
        </div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=resep">';
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_resep" class="btn btn-primary btn-sm mb-3">
                    <i class="fas fa-plus"></i> Tambah Resep
                </a>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>Menu</th>
                            <th>Bahan Baku</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query($koneksi, "SELECT r.*, m.nm_menu, b.nm_bahan, b.satuan as bahan_satuan
                            FROM resep r
                            JOIN menu m ON r.id_menu = m.id_menu
                            JOIN bahan_baku b ON r.id_bahan = b.id_bahan
                            ORDER BY r.id_resep DESC");
                        while($row = mysqli_fetch_array($query)) {
                            $no++;
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nm_menu'] ?></td>
                            <td><?= $row['nm_bahan'] ?></td>
                            <td><?= $row['jumlah'] ?></td>
                            <td><?= $row['bahan_satuan'] ?></td>
                            <td>
                                <a href="index.php?page=resep&action=hapus&id=<?= $row['id_resep'] ?>" 
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