<ul>
    <li><strong>Nama : MUHAMMAD ADITHIZA</strong></li>
    <li><strong>NIM : 2511500010</strong></li>
    <ul>
        <li>Membuat database db_kebuli dengan 10 tabel utama</li>
        <li>Membuat tabel users untuk manajemen pengguna (admin, kasir, pelanggan)</li>
        <li>Membuat tabel meja untuk manajemen meja restoran</li>
        <li>Membuat tabel menu untuk daftar menu makanan dan minuman</li>
        <li>Membuat tabel pesanan untuk transaksi pemesanan</li>
        <li>Membuat tabel detail_pesanan untuk detail item pesanan</li>
        <li>Membuat tabel promo untuk manajemen diskon dan promo</li>
        <li>Membuat tabel pengeluaran untuk mencatat biaya operasional</li>
        <li>Membuat tabel bahan_baku untuk inventaris bahan makanan</li>
        <li>Membuat tabel resep untuk menghubungkan menu dengan bahan baku</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat Trigger dan View</strong></li>
    <ul>
        <li>Trigger update_pesanan_total - Otomatis menghitung total harga pesanan</li>
        <li>Trigger update_menu_stok_after_order - Otomatis mengurangi stok menu saat pesanan selesai</li>
        <li>Trigger update_meja_status_on_order - Otomatis mengubah status meja menjadi terisi</li>
        <li>Trigger update_meja_status_on_order_done - Otomatis mengubah status meja menjadi clean</li>
        <li>View v_pesanan_harian - Untuk laporan penjualan harian</li>
        <li>View v_menu_terlaris - Untuk melihat menu terlaris</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat File Koneksi Database</strong></li>
    <ul>
        <li>config/koneksi.php - File koneksi ke database MySQL</li>
        <li>Menggunakan fungsi password_hash untuk keamanan</li>
        <li>Menggunakan charset utf8mb4 untuk support emoji dan multibyte</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat Halaman Login dan Logout</strong></li>
    <ul>
        <li>login.php - Halaman login dengan validasi username dan password</li>
        <li>logout.php - Halaman untuk mengakhiri session</li>
        <li>Menggunakan session untuk manajemen login</li>
        <li>Menampilkan demo akun untuk admin, kasir, dan pelanggan</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat Halaman Utama (index.php)</strong></li>
    <ul>
        <li>Template AdminLTE 3 untuk tampilan yang responsif</li>
        <li>Sidebar dinamis berdasarkan role (admin, kasir, pelanggan)</li>
        <li>Routing halaman menggunakan parameter GET</li>
        <li>Menampilkan breadcrumb untuk navigasi</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat Halaman Dashboard</strong></li>
    <ul>
        <li>page/dashboard.php - Halaman dashboard dengan statistik</li>
        <li>Menampilkan total menu tersedia</li>
        <li>Menampilkan total pesanan</li>
        <li>Menampilkan total pendapatan</li>
        <li>Menampilkan jumlah meja tersedia</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat CRUD Users</strong></li>
    <ul>
        <li>page/users.php - Menampilkan daftar users dengan tabel</li>
        <li>page/tambah_user.php - Form tambah user baru</li>
        <li>page/edit_user.php - Form edit data user</li>
        <li>Fitur hapus data user dengan konfirmasi</li>
        <li>Role management (admin, kasir, pelanggan)</li>
        <li>Status aktif/nonaktif user</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat CRUD Meja</strong></li>
    <ul>
        <li>page/meja.php - Menampilkan daftar meja dengan status</li>
        <li>page/tambah_meja.php - Form tambah meja baru</li>
        <li>page/edit_meja.php - Form edit data meja</li>
        <li>Status meja: tersedia, terisi, reserved, clean</li>
        <li>Kapasitas meja dan lokasi (indoor/outdoor)</li>
        <li>Badge warna untuk setiap status</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat CRUD Menu</strong></li>
    <ul>
        <li>page/menu.php - Menampilkan daftar menu dengan rating</li>
        <li>page/tambah_menu.php - Form tambah menu baru</li>
        <li>page/edit_menu.php - Form edit data menu</li>
        <li>Kategori menu: kebuli, ayam, daging, minuman, snack, dessert</li>
        <li>Fitur rating dengan bintang</li>
        <li>Status ketersediaan menu</li>
        <li>Validasi harga dan stok</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat CRUD Pesanan</strong></li>
    <ul>
        <li>page/pesanan.php - Menampilkan daftar pesanan</li>
        <li>page/tambah_pesanan.php - Form tambah pesanan dengan multiple menu</li>
        <li>page/detail_pesanan.php - Detail pesanan lengkap</li>
        <li>Fitur update status pesanan (pending, proses, selesai, batal, delivery)</li>
        <li>Tipe pesanan: dine_in, takeaway, delivery</li>
        <li>Menampilkan total harga dan grand total</li>
        <li>Fitur tambah multiple menu dengan JavaScript</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat CRUD Promo</strong></li>
    <ul>
        <li>page/promo.php - Menampilkan daftar promo</li>
        <li>page/tambah_promo.php - Form tambah promo baru</li>
        <li>page/edit_promo.php - Form edit data promo</li>
        <li>Jenis promo: diskon (%), potongan_harga (Rp), gratis_ongkir</li>
        <li>Validasi tanggal berlaku</li>
        <li>Minimal pembelian untuk promo</li>
        <li>Status aktif/nonaktif promo</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat CRUD Pengeluaran</strong></li>
    <ul>
        <li>page/pengeluaran.php - Menampilkan daftar pengeluaran</li>
        <li>page/tambah_pengeluaran.php - Form tambah pengeluaran</li>
        <li>Kategori pengeluaran: bahan_baku, operasional, gaji, maintenance, lainnya</li>
        <li>Menampilkan user yang mencatat pengeluaran</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat CRUD Bahan Baku</strong></li>
    <ul>
        <li>page/bahan_baku.php - Menampilkan daftar bahan baku</li>
        <li>page/tambah_bahan.php - Form tambah bahan baku</li>
        <li>page/edit_bahan.php - Form edit bahan baku</li>
        <li>Fitur minimal stok untuk peringatan</li>
        <li>Status stok: Stok Aman / Stok Menipis</li>
        <li>Menampilkan harga beli dan supplier</li>
    </ul>
</ul>

<ul>
    <li><strong>Membuat CRUD Resep</strong></li>
    <ul>
        <li>page/resep.php - Menampilkan daftar resep</li>
        <li>page/tambah_resep.php - Form tambah resep</li>
        <li>Menghubungkan menu dengan bahan baku</li>
        <li>Menampilkan jumlah dan satuan bahan</li>
        <li>Validasi duplikasi resep</li>
    </ul>
</ul>

<ul>
    <li><strong>Fitur Keamanan dan Validasi</strong></li>
    <ul>
        <li>Session management untuk login</li>
        <li>Password menggunakan hash (bcrypt)</li>
        <li>Validasi input menggunakan mysqli_real_escape_string</li>
        <li>Konfirmasi hapus data dengan JavaScript</li>
        <li>Check constraint pada database</li>
        <li>Foreign key untuk integritas data</li>
    </ul>
</ul>

<ul>
    <li><strong>Fitur UI/UX</strong></li>
    <ul>
        <li>Menggunakan AdminLTE 3 untuk template</li>
        <li>Font Awesome untuk icon</li>
        <li>Badge warna untuk status</li>
        <li>Breadcrumb untuk navigasi</li>
        <li>Alert notification untuk pesan sukses/gagal</li>
        <li>Responsive design untuk mobile</li>
    </ul>
</ul>

<ul>
    <li><strong>Data Sample yang Dimasukkan</strong></li>
    <ul>
        <li>Admin: admin / 12345</li>
        <li>Kasir: kasir / 12345</li>
        <li>Pelanggan: pelanggan1 / 12345</li>
        <li>5 Meja dengan status tersedia</li>
        <li>8 Menu dengan berbagai kategori</li>
        <li>Trigger untuk update otomatis</li>
        <li>View untuk laporan</li>
    </ul>
</ul>

<ul>
    <li><strong>Kesimpulan</strong></li>
    <ul>
        <li>Sistem Restoran Kebuli selesai dibuat dengan 11 tabel</li>
        <li>Total 27 file PHP yang dibuat</li>
        <li>Fitur CRUD lengkap untuk semua modul</li>
        <li>Keamanan database dengan constraint dan foreign key</li>
        <li>Trigger untuk otomatisasi proses</li>
        <li>Siap digunakan untuk manajemen restoran</li>
    </ul>
</ul>