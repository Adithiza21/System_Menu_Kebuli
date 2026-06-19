<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit User</h1>
            </div>
        </div>
    </div>
</div>

<?php
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users WHERE id_user = '$id'"));

if(isset($_POST['edit'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $role = mysqli_real_escape_string($koneksi, $_POST['role']);
    $no_telepon = mysqli_real_escape_string($koneksi, $_POST['no_telepon']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    
    $update = mysqli_query($koneksi, "UPDATE users SET 
        username = '$username',
        email = '$email',
        nama = '$nama',
        role = '$role',
        no_telepon = '$no_telepon',
        alamat = '$alamat',
        is_active = '$is_active'
        WHERE id_user = '$id'");
    
    if($update) {
        echo '<div class="alert alert-success">Data Berhasil Diupdate</div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=users">';
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
                        <label>Username</label>
                        <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?= $data['email'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" class="form-control" required>
                            <option value="admin" <?= ($data['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                            <option value="kasir" <?= ($data['role'] == 'kasir') ? 'selected' : '' ?>>Kasir</option>
                            <option value="pelanggan" <?= ($data['role'] == 'pelanggan') ? 'selected' : '' ?>>Pelanggan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="no_telepon" value="<?= $data['no_telepon'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3"><?= $data['alamat'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="is_active" class="custom-control-input" id="is_active" <?= $data['is_active'] ? 'checked' : '' ?>>
                            <label class="custom-control-label" for="is_active">Aktif</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="edit" class="btn btn-primary">Update</button>
                        <a href="index.php?page=users" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>