<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Menu</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM menu WHERE id_menu = '$id'"));

if(isset($_POST['edit'])) {
    $nm_menu = mysqli_real_escape_string($koneksi, $_POST['nm_menu']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $is_available = isset($_POST['is_available']) ? 1 : 0;
    
    $update = mysqli_query($koneksi, "UPDATE menu SET 
        nm_menu = '$nm_menu',
        kategori = '$kategori',
        harga = '$harga',
        stok = '$stok',
        deskripsi = '$deskripsi',
        is_available = '$is_available'
        WHERE id_menu = '$id'");
    
    if($update) {
        echo '<div class="alert alert-success">Data Berhasil Diupdate</div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=menu">';
    } else {
        echo '<div class="alert alert-danger">Gagal Update: '.mysqli_error($koneksi).'</div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" name="nm_menu" value="<?= $data['nm_menu'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control" required>
                            <option value="kebuli" <?= ($data['kategori'] == 'kebuli') ? 'selected' : '' ?>>Kebuli</option>
                            <option value="ayam" <?= ($data['kategori'] == 'ayam') ? 'selected' : '' ?>>Ayam</option>
                            <option value="daging" <?= ($data['kategori'] == 'daging') ? 'selected' : '' ?>>Daging</option>
                            <option value="minuman" <?= ($data['kategori'] == 'minuman') ? 'selected' : '' ?>>Minuman</option>
                            <option value="snack" <?= ($data['kategori'] == 'snack') ? 'selected' : '' ?>>Snack</option>
                            <option value="dessert" <?= ($data['kategori'] == 'dessert') ? 'selected' : '' ?>>Dessert</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" value="<?= $data['harga'] ?>" class="form-control" required min="0">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" value="<?= $data['stok'] ?>" class="form-control" required min="0">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3"><?= $data['deskripsi'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="is_available" class="custom-control-input" id="is_available" <?= $data['is_available'] ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="is_available">Tersedia</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Update</button>
                        <a href="index.php?page=menu" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>