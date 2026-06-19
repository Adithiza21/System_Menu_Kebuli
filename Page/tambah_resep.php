<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Resep</h1>
            </div>
        </div>
    </div>
</div>

<?php
$menu = mysqli_query($koneksi, "SELECT * FROM menu WHERE is_available = 1");
$bahan = mysqli_query($koneksi, "SELECT * FROM bahan_baku");

if(isset($_POST['tambah'])) {
    $id_menu = mysqli_real_escape_string($koneksi, $_POST['id_menu']);
    $id_bahan = mysqli_real_escape_string($koneksi, $_POST['id_bahan']);
    $jumlah = mysqli_real_escape_string($koneksi, $_POST['jumlah']);
    
    $cek = mysqli_query($koneksi, "SELECT * FROM resep WHERE id_menu = '$id_menu' AND id_bahan = '$id_bahan'");
    if(mysqli_num_rows($cek) > 0) {
        echo '<div class="alert alert-warning">Resep untuk menu dan bahan ini sudah ada!</div>';
    } else {
        // Ambil satuan dari bahan baku
        $bahan_data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT satuan FROM bahan_baku WHERE id_bahan = '$id_bahan'"));
        $satuan = $bahan_data['satuan'];
        
        $insert = mysqli_query($koneksi, "INSERT INTO resep (id_menu, id_bahan, jumlah, satuan) 
                                         VALUES ('$id_menu', '$id_bahan', '$jumlah', '$satuan')");
        if($insert) {
            echo '<div class="alert alert-success">Data Berhasil Disimpan</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=resep">';
        } else {
            echo '<div class="alert alert-danger">Gagal Disimpan: '.mysqli_error($koneksi).'</div>';
        }
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Menu</label>
                        <select name="id_menu" class="form-control" required>
                            <option value="">Pilih Menu</option>
                            <?php while($m = mysqli_fetch_array($menu)) { ?>
                                <option value="<?= $m['id_menu'] ?>"><?= $m['nm_menu'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bahan Baku</label>
                        <select name="id_bahan" class="form-control" required>
                            <option value="">Pilih Bahan Baku</option>
                            <?php while($b = mysqli_fetch_array($bahan)) { ?>
                                <option value="<?= $b['id_bahan'] ?>"><?= $b['nm_bahan'] ?> (<?= $b['satuan'] ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah yang dibutuhkan" required min="0.01" step="0.01">
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                        <a href="index.php?page=resep" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>