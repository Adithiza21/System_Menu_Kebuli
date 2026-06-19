<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Bahan Baku</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['tambah'])) {
    $nm_bahan = mysqli_real_escape_string($koneksi, $_POST['nm_bahan']);
    $satuan = mysqli_real_escape_string($koneksi, $_POST['satuan']);
    $stok = mysqli_real_escape_string($koneksi, $_POST['stok']);
    $minimal_stok = mysqli_real_escape_string($koneksi, $_POST['minimal_stok']);
    $harga_beli = mysqli_real_escape_string($koneksi, $_POST['harga_beli']);
    $supplier = mysqli_real_escape_string($koneksi, $_POST['supplier']);
    
    $insert = mysqli_query($koneksi, "INSERT INTO bahan_baku (nm_bahan, satuan, stok, minimal_stok, harga_beli, supplier) 
                                     VALUES ('$nm_bahan', '$satuan', '$stok', '$minimal_stok', '$harga_beli', '$supplier')");
    if($insert) {
        echo '<div class="alert alert-success">Data Berhasil Disimpan</div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=bahan_baku">';
    } else {
        echo '<div class="alert alert-danger">Gagal Disimpan: '.mysqli_error($koneksi).'</div>';
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
                        <input type="text" name="nm_bahan" class="form-control" placeholder="Contoh: Beras" required>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" name="satuan" class="form-control" placeholder="Contoh: Kg, Liter, Pcs" required>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" value="0" min="0" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label>Minimal Stok</label>
                        <input type="number" name="minimal_stok" class="form-control" value="0" min="0" step="0.01">
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" name="harga_beli" class="form-control" placeholder="Harga per satuan" required min="0">
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" name="supplier" class="form-control" placeholder="Nama supplier">
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                        <a href="index.php?page=bahan_baku" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>