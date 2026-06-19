<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Promo</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['tambah'])) {
    $kode_promo = mysqli_real_escape_string($koneksi, strtoupper($_POST['kode_promo']));
    $jenis = mysqli_real_escape_string($koneksi, $_POST['jenis']);
    $nilai = mysqli_real_escape_string($koneksi, $_POST['nilai']);
    $min_pembelian = mysqli_real_escape_string($koneksi, $_POST['min_pembelian']);
    $berlaku_mulai = mysqli_real_escape_string($koneksi, $_POST['berlaku_mulai']);
    $berlaku_sampai = mysqli_real_escape_string($koneksi, $_POST['berlaku_sampai']);
    
    $cek = mysqli_query($koneksi, "SELECT * FROM promo WHERE kode_promo = '$kode_promo'");
    if(mysqli_num_rows($cek) > 0) {
        echo '<div class="alert alert-warning">Kode Promo sudah ada!</div>';
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO promo (kode_promo, jenis, nilai, min_pembelian, berlaku_mulai, berlaku_sampai) 
                                         VALUES ('$kode_promo', '$jenis', '$nilai', '$min_pembelian', '$berlaku_mulai', '$berlaku_sampai')");
        if($insert) {
            echo '<div class="alert alert-success">Data Berhasil Disimpan</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=promo">';
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
                        <label>Kode Promo</label>
                        <input type="text" name="kode_promo" class="form-control" placeholder="Contoh: PROMO10" required>
                        <small class="text-muted">Huruf akan otomatis menjadi kapital</small>
                    </div>
                    <div class="form-group">
                        <label>Jenis Promo</label>
                        <select name="jenis" class="form-control" required>
                            <option value="">Pilih Jenis</option>
                            <option value="diskon">Diskon (%)</option>
                            <option value="potongan_harga">Potongan Harga (Rp)</option>
                            <option value="gratis_ongkir">Gratis Ongkir</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="number" name="nilai" class="form-control" placeholder="Nilai promo" required min="0">
                        <small class="text-muted">Jika diskon, isi dengan persentase (contoh: 10). Jika potongan harga, isi dengan nominal (contoh: 5000)</small>
                    </div>
                    <div class="form-group">
                        <label>Minimal Pembelian</label>
                        <input type="number" name="min_pembelian" class="form-control" value="0" min="0">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Berlaku Mulai</label>
                                <input type="datetime-local" name="berlaku_mulai" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Berlaku Sampai</label>
                                <input type="datetime-local" name="berlaku_sampai" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                        <a href="index.php?page=promo" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>