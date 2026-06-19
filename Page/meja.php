<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Meja</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM meja WHERE id_meja = '$id'");
    if($query) {
        echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Data Berhasil Dihapus
        </div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=meja">';
    }
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_meja" class="btn btn-primary btn-sm mb-3">
                    <i class="fas fa-plus"></i> Tambah Meja
                </a>
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>Nama Meja</th>
                            <th>Status</th>
                            <th>Kapasitas</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        $query = mysqli_query($koneksi, "SELECT * FROM meja ORDER BY id_meja ASC");
                        while($row = mysqli_fetch_array($query)) {
                            $no++;
                            $status_class = '';
                            switch($row['status']) {
                                case 'tersedia': $status_class = 'success'; break;
                                case 'terisi': $status_class = 'danger'; break;
                                case 'reserved': $status_class = 'warning'; break;
                                case 'clean': $status_class = 'info'; break;
                            }
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nm_meja'] ?></td>
                            <td><span class="badge badge-<?= $status_class ?>"><?= ucfirst($row['status']) ?></span></td>
                            <td><?= $row['capacity'] ?> orang</td>
                            <td><?= ucfirst($row['lokasi']) ?></td>
                            <td>
                                <a href="index.php?page=meja&action=hapus&id=<?= $row['id_meja'] ?>" 
                                   onclick="return confirm('Yakin hapus data ini?')"
                                   class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="index.php?page=edit_meja&id=<?= $row['id_meja'] ?>" 
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