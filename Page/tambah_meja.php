<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Meja</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['tambah'])) {
    $nm_meja = mysqli_real_escape_string($koneksi, $_POST['nm_meja']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    $capacity = mysqli_real_escape_string($koneksi, $_POST['capacity']);
    $lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    
    $insert = mysqli_query($koneksi, "INSERT INTO meja (nm_meja, status, capacity, lokasi) 
                                     VALUES ('$nm_meja', '$status', '$capacity', '$lokasi')");
    if($insert) {
        echo '<div class="alert alert-success">Data Berhasil Disimpan</div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=meja">';
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
                        <label>Nama Meja</label>
                        <input type="text" name="nm_meja" class="form-control" placeholder="Contoh: Meja VIP 1" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="tersedia">Tersedia</option>
                            <option value="terisi">Terisi</option>
                            <option value="reserved">Reserved</option>
                            <option value="clean">Clean</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kapasitas</label>
                        <input type="number" name="capacity" class="form-control" value="4" min="1" required>
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <select name="lokasi" class="form-control">
                            <option value="indoor">Indoor</option>
                            <option value="outdoor">Outdoor</option>
                        </select>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                        <a href="index.php?page=meja" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>\<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Meja</h1>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST['tambah'])) {
    $nm_meja = mysqli_real_escape_string($koneksi, $_POST['nm_meja']);
    $status = mysqli_real_escape_string($koneksi, $_POST['status']);
    $capacity = mysqli_real_escape_string($koneksi, $_POST['capacity']);
    $lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    
    $insert = mysqli_query($koneksi, "INSERT INTO meja (nm_meja, status, capacity, lokasi) 
                                     VALUES ('$nm_meja', '$status', '$capacity', '$lokasi')");
    if($insert) {
        echo '<div class="alert alert-success">Data Berhasil Disimpan</div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=meja">';
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
                        <label>Nama Meja</label>
                        <input type="text" name="nm_meja" class="form-control" placeholder="Contoh: Meja VIP 1" required>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="tersedia">Tersedia</option>
                            <option value="terisi">Terisi</option>
                            <option value="reserved">Reserved</option>
                            <option value="clean">Clean</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kapasitas</label>
                        <input type="number" name="capacity" class="form-control" value="4" min="1" required>
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <select name="lokasi" class="form-control">
                            <option value="indoor">Indoor</option>
                            <option value="outdoor">Outdoor</option>
                        </select>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                        <a href="index.php?page=meja" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>\