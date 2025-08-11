# ⚒️ EA FC Squad Builder – West Ham United FC Edition

Website **squad builder** bertema **West Ham United FC** untuk EA FC Mobile.
Menampilkan formasi dinamis, daftar pemain starter & cadangan, serta panel admin untuk mengelola skuad secara terpusat.

---

## ✨ Fitur Utama

* 🎯 **Formasi Dinamis** – Default 4-3-3 Holding, dapat disesuaikan
* 🧢 **Kapten & Wakil Kapten** – Atur urutan C1, C2, dst.
* 🔄 **Daftar Pemain** – Starter, cadangan, dan substitusi
* 🌓 **Mode Gelap/Terang** – Tampilan nyaman di berbagai kondisi
* 📊 **Statistik Skuad** – Total pemain, starter, sub, cadangan
* 📝 **CRUD Pemain** – Tambah, edit, hapus pemain melalui dashboard admin
* 🖱️ **Drag & Drop** – Penempatan pemain di formasi lebih interaktif

---

## 🛠️ Teknologi yang Digunakan

* PHP Native
* MySQL / MariaDB
* HTML5 & CSS3 (Bootstrap 5.3)
* JavaScript (Mode gelap/terang, drag & drop)

---

## 🚀 Cara Instalasi & Setup

1. Clone atau salin folder proyek ke direktori server lokal (XAMPP, Laragon, dll)
2. Buat database MySQL baru, misalnya `westham_squad`
3. Import struktur tabel dari file SQL yang disediakan di folder `database/`
4. Sesuaikan konfigurasi koneksi database di file `koneksi.php`
5. Akses halaman publik di `index.php`
6. Login admin di `admin/login.php` dengan akun yang sudah terdaftar di tabel `admin`

---

## 👤 Akun Admin Default

* Username: `admin`
* Password: `123`

---

## 📋 Catatan

* Dibuat dengan PHP Native tanpa framework
* Desain responsif untuk desktop dan perangkat mobile
* Cocok untuk penggemar West Ham United di EA FC Mobile
* Bisa dikembangkan dengan fitur tambahan seperti:

  * Pemilihan formasi lebih banyak
  * Simpan & muat preset skuad
  * Statistik performa pemain

---

## 🧑‍💻 Developer

**Dimas Fahri Alfareza**
SMK TI Airlangga Samarinda
Proyek PKL 2025

---

## 📄 Lisensi

Terbuka untuk pembelajaran dan pengembangan non-komersial.
Silakan dimodifikasi sesuai kebutuhan.