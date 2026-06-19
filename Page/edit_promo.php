<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Promo</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM promo WHERE id_promo = '$id'"));

if(isset($_POST['edit'])) {
    $kode_promo = mysqli_real_escape_string($koneksi, strtoupper($_POST['kode_promo']));
    $jenis = mysqli_real_escape_string($koneksi, $_POST['jenis']);
    $nilai = mysqli_real_escape_string($koneksi, $_POST['nilai']);
    $min_pembelian = mysqli_real_escape_string($koneksi, $_POST['min_pembelian']);
    $berlaku_mulai = mysqli_real_escape_string($koneksi, $_POST['berlaku_mulai']);
    $berlaku_sampai = mysqli_real_escape_string($koneksi, $_POST['berlaku_sampai']);
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    
    $update = mysqli_query($koneksi, "UPDATE promo SET 
        kode_promo = '$kode_promo',
        jenis = '$jenis',
        nilai = '$nilai',
        min_pembelian = '$min_pembelian',
        berlaku_mulai = '$berlaku_mulai',
        berlaku_sampai = '$berlaku_sampai',
        is_active = '$is_active'
        WHERE id_promo = '$id'");
    
    if($update) {
        echo '<div class="alert alert-success">Data Berhasil Diupdate</div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=promo">';
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
                        <label>Kode Promo</label>
                        <input type="text" name="kode_promo" value="<?= $data['kode_promo'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Promo</label>
                        <select name="jenis" class="form-control" required>
                            <option value="diskon" <?= ($data['jenis'] == 'diskon') ? 'selected' : '' ?>>Diskon (%)</option>
                            <option value="potongan_harga" <?= ($data['jenis'] == 'potongan_harga') ? 'selected' : '' ?>>Potongan Harga (Rp)</option>
                            <option value="gratis_ongkir" <?= ($data['jenis'] == 'gratis_ongkir') ? 'selected' : '' ?>>Gratis Ongkir</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="number" name="nilai" value="<?= $data['nilai'] ?>" class="form-control" required min="0">
                    </div>
                    <div class="form-group">
                        <label>Minimal Pembelian</label>
                        <input type="number" name="min_pembelian" value="<?= $data['min_pembelian'] ?>" class="form-control" min="0">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Berlaku Mulai</label>
                                <input type="datetime-local" name="berlaku_mulai" value="<?= date('Y-m-d\TH:i', strtotime($data['berlaku_mulai'])) ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Berlaku Sampai</label>
                                <input type="datetime-local" name="berlaku_sampai" value="<?= date('Y-m-d\TH:i', strtotime($data['berlaku_sampai'])) ?>" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="is_active" class="custom-control-input" id="is_active" <?= $data['is_active'] ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="is_active">Aktif</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Update</button>
                        <a href="index.php?page=promo" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>