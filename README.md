# Keloangg

Web budgeting berbahasa Indonesia yang membantu pengguna membagi pemasukan ke beberapa kategori, memantau pengeluaran harian, dan melihat grafik pemasukan vs pengeluaran secara real-time. Proyek ini dibangun dengan Laravel + Blade dan dirancang mobile friendly.

## Fitur Utama

- **Landing Page Marketing** – menjelaskan value Keloang, testimoni, FAQ, dan CTA untuk mencoba aplikasi.
- **Autentikasi dasar** – halaman login & signup dengan UX modern, tombol show/hide password, validasi klien.
- **Dashboard Budget**  
  - Hero card "Selamat datang kembali" dengan sisa budget bulan ini.  
  - Form penghasilan bulanan + input penambahan budget dengan limit angka dan placeholder yang rapih.  
  - Ringkasan alokasi 50/20/15/10/5 yang dapat disesuaikan.  
  - Grafik pemasukan & pengeluaran (Chart.js) dengan filter Hari/Minggu/Bulan/Tahun/Semua.  
  - Tabel pencatatan pengeluaran, modal tambah pengeluaran, riwayat penambahan budget, toast notifikasi.
- **Data Dummy 1 Tahun** – seeder `DummyUsageSeeder` membuat akun demo lengkap yang terlihat sudah memakai aplikasi selama 12 bulan.

## Tech Stack

- Laravel 11, Blade, Vite
- Plus Jakarta Sans + Font Awesome
- Chart.js 4 untuk visualisasi
- Local SQLite (default) atau database lain sesuai .env
- **CSS Biasa** (Tailwind CSS telah dihapus)

## Struktur Penting

- `resources/views/index.blade.php` – landing page utama.
- `resources/views/budget/index.blade.php` – dashboard setelah login.
- `resources/views/auth/*.blade.php` – login & signup.
- `public/css/style.css` – styling kustom landing & dashboard.
- `database/seeders/DummyUsageSeeder.php` – data dummy 12 bulan.

## Catatan Pengembangan

- Pastikan batas angka (Rp 1 miliar) pada input penghasilan/tambah budget tetap sinkron antara HTML & JS.
- Jika membuat akun baru lewat signup, pengguna otomatis diarahkan ke halaman login (tidak auto-login).
- Untuk mengganti data dummy, modifikasi `DummyUsageSeeder`.
- Proyek ini menggunakan CSS biasa, bukan Tailwind CSS.
