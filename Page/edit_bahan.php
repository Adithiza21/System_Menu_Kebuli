<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Bahan Baku</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM bahan_baku WHERE id_bahan = '$id'"));

if(isset($_POST['edit'])) {
    $nm_bahan = mysqli_real_escape_string($koneksi, $_POST['nm_bahan']);
    $satuan = mysqli_real_escape_string($koneksi, $_POST['satuan']);
    $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);
    $minimal_stok = mysqli_real_escape_string($koneksi, $_POST['minimal_stok']);
    $harga_beli = mysqli_real_escape_string($koneksi, $_POST['harga_beli']);
    $supplier = mysqli_real_escape_string($koneksi, $_POST['supplier']);
    
    $update = mysqli_query($koneksi, "UPDATE bahan_baku SET 
        nm_bahan = '$nm_bahan',
        satuan = '$satuan',
        stok = '$stok',
        minimal_stok = '$minimal_stok',
        harga_beli = '$harga_beli',
        supplier = '$supplier'
        WHERE id_bahan = '$id'");
    
    if($update) {
        echo '<div class="alert alert-success">Data Berhasil Diupdate</div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=bahan_baku">';
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
                        <label>Nama Bahan</label>
                        <input type="text" name="nm_bahan" value="<?= $data['nm_bahan'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" name="satuan" value="<?= $data['satuan'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" value="<?= $data['stok'] ?>" class="form-control" min="0" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label>Minimal Stok</label>
                        <input type="number" name="minimal_stok" value="<?= $data['minimal_stok'] ?>" class="form-control" min="0" step="0.01">
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" name="harga_beli" value="<?= $data['harga_beli'] ?>" class="form-control" required min="0">
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" name="supplier" value="<?= $data['supplier'] ?>" class="form-control">
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Update</button>
                        <a href="index.php?page=bahan_baku" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
