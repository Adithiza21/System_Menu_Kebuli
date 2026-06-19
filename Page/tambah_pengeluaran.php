<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Pengeluaran</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['tambah'])) {
    $id_user = $_SESSION['id_user'];
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $nominal = mysqli_real_escape_string($koneksi, $_POST['nominal']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $tgl_pengeluaran = mysqli_real_escape_string($koneksi, $_POST['tgl_pengeluaran']);
    
    $insert = mysqli_query($koneksi, "INSERT INTO pengeluaran (id_user, kategori, nominal, deskripsi, tgl_pengeluaran) 
                                     VALUES ('$id_user', '$kategori', '$nominal', '$deskripsi', '$tgl_pengeluaran')");
    if($insert) {
        echo '<div class="alert alert-success">Data Berhasil Disimpan</div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=pengeluaran">';
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
                        <label>Kategori</label>
                        <select name="kategori" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <option value="bahan_baku">Bahan Baku</option>
                            <option value="operasional">Operasional</option>
                            <option value="gaji">Gaji</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="number" name="nominal" class="form-control" placeholder="Masukkan nominal" required min="0">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi pengeluaran" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pengeluaran</label>
                        <input type="datetime-local" name="tgl_pengeluaran" class="form-control" value="<?= date('Y-m-d\TH:i') ?>" required>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                        <a href="index.php?page=pengeluaran" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>