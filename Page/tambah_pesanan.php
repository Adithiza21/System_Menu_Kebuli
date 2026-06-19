<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Pesanan</h1>
            </div>
        </div>
    </div>
</div>

<?php
$users = mysqli_query($koneksi, "SELECT * FROM users WHERE role = 'pelanggan' AND is_active = 1");
$meja = mysqli_query($koneksi, "SELECT * FROM meja WHERE status IN ('tersedia', 'clean')");
$menu = mysqli_query($koneksi, "SELECT * FROM menu WHERE is_available = 1 AND stok > 0");

if(isset($_POST['tambah'])) {
    $id_user = mysqli_real_escape_string($koneksi, $_POST['id_user']);
    $id_meja = mysqli_real_escape_string($koneksi, $_POST['id_meja']);
    $tipe_pesanan = mysqli_real_escape_string($koneksi, $_POST['tipe_pesanan']);
    $catatan = mysqli_real_escape_string($koneksi, $_POST['catatan']);
    
    $insert = mysqli_query($koneksi, "INSERT INTO pesanan (id_user, id_meja, tipe_pesanan, catatan) 
                                     VALUES ('$id_user', '$id_meja', '$tipe_pesanan', '$catatan')");
    
    if($insert) {
        $id_pesanan = mysqli_insert_id($koneksi);
        
        if(isset($_POST['id_menu']) && count($_POST['id_menu']) > 0) {
            for($i = 0; $i < count($_POST['id_menu']); $i++) {
                $id_menu = mysqli_real_escape_string($koneksi, $_POST['id_menu'][$i]);
                $jumlah = mysqli_real_escape_string($koneksi, $_POST['jumlah'][$i]);
                
                $harga_menu = mysqli_fetch_array(mysqli_query($koneksi, "SELECT harga FROM menu WHERE id_menu = '$id_menu'"));
                $harga_satuan = $harga_menu['harga'];
                
                mysqli_query($koneksi, "INSERT INTO detail_pesanan (id_pesanan, id_menu, jumlah, harga_satuan) 
                                       VALUES ('$id_pesanan', '$id_menu', '$jumlah', '$harga_satuan')");
            }
        }
        
        echo '<div class="alert alert-success">Pesanan Berhasil Disimpan</div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=pesanan">';
    } else {
        echo '<div class="alert alert-danger">Gagal Disimpan: '.mysqli_error($koneksi).'</div>';
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="" id="formPesanan">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pelanggan</label>
                                <select name="id_user" class="form-control" required>
                                    <option value="">Pilih Pelanggan</option>
                                    <?php while($u = mysqli_fetch_array($users)) { ?>
                                        <option value="<?= $u['id_user'] ?>"><?= $u['nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Meja</label>
                                <select name="id_meja" class="form-control">
                                    <option value="">Pilih Meja</option>
                                    <?php while($m = mysqli_fetch_array($meja)) { ?>
                                        <option value="<?= $m['id_meja'] ?>"><?= $m['nm_meja'] ?> (Kapasitas: <?= $m['capacity'] ?>)</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipe Pesanan</label>
                                <select name="tipe_pesanan" class="form-control" required>
                                    <option value="dine_in">Dine In</option>
                                    <option value="takeaway">Takeaway</option>
                                    <option value="delivery">Delivery</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Catatan</label>
                                <input type="text" name="catatan" class="form-control" placeholder="Catatan pesanan">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h5>Detail Menu</h5>
                    
                    <div id="detail-container">
                        <div class="detail-row row mb-3">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Menu</label>
                                    <select name="id_menu[]" class="form-control" required>
                                        <option value="">Pilih Menu</option>
                                        <?php while($m = mysqli_fetch_array($menu)) { ?>
                                            <option value="<?= $m['id_menu'] ?>"><?= $m['nm_menu'] ?> - Rp <?= number_format($m['harga'], 0, ',', '.') ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah[]" class="form-control" value="1" min="1" required>
                                </div>
                            </div>
                            <div class="col-md-1 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-sm remove-row" style="margin-bottom:15px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="tambah-detail" class="btn btn-info btn-sm mb-3">
                        <i class="fas fa-plus"></i> Tambah Menu
                    </button>

                    <div class="card-footer">
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                        <a href="index.php?page=pesanan" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
document.getElementById('tambah-detail').addEventListener('click', function() {
    const container = document.getElementById('detail-container');
    const originalRow = container.querySelector('.detail-row');
    const newRow = originalRow.cloneNode(true);
    
    newRow.querySelectorAll('select').forEach(select => select.value = '');
    newRow.querySelectorAll('input').forEach(input => input.value = '1');
    
    container.appendChild(newRow);
});

document.addEventListener('click', function(e) {
    if(e.target && e.target.closest('.remove-row')) {
        const rows = document.querySelectorAll('.detail-row');
        if(rows.length > 1) {
            e.target.closest('.detail-row').remove();
        } else {
            alert('Minimal harus ada 1 menu!');
        }
    }
});
</script>

<style>
.detail-row {
    background-color: #f9f9f9;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
}
.detail-row:hover {
    background-color: #f0f0f0;
}
</style>