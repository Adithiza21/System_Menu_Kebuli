<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2>Selamat Datang di Restoran Kebuli</h2>
                <p>Sistem Manajemen Restoran Kebuli</p>
                <hr>
                
                <?php
                $total_menu = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM menu WHERE is_available = 1"));
                $total_pesanan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM pesanan WHERE status != 'batal'"));
                $total_pendapatan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(total_harga) as total FROM pesanan WHERE status IN ('selesai', 'delivery')"));
                $total_meja = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM meja WHERE status = 'tersedia'"));
                ?>
                
                <div class="row">
                    <div class="col-md-3">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $total_menu['total'] ?? 0 ?></h3>
                                <p>Menu Tersedia</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?= $total_pesanan['total'] ?? 0 ?></h3>
                                <p>Total Pesanan</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>Rp <?= number_format($total_pendapatan['total'] ?? 0, 0, ',', '.') ?></h3>
                                <p>Total Pendapatan</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?= $total_meja['total'] ?? 0 ?></h3>
                                <p>Meja Tersedia</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chair"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.small-box {
    border-radius: 10px;
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    display: block;
    margin-bottom: 20px;
    position: relative;
}
.small-box .inner {
    padding: 10px;
}
.small-box .icon {
    position: absolute;
    right: 10px;
    top: 10px;
    font-size: 70px;
    opacity: 0.3;
}
.small-box h3 {
    font-size: 2.2rem;
    font-weight: 700;
    margin: 0 0 10px 0;
    color: #fff;
}
.small-box p {
    color: #fff;
    font-size: 1rem;
    margin: 0;
}
</style>