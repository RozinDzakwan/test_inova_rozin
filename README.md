# Sistem Informasi Klinik

Disini saya membuat sistem informasi klinik berbasis web, dimana di web ini terdapat 4 hak akses yaitu User, Admin, Pegawai dan Tamu

## Instalasi

-   Disini saya menggunakan PHP 8.1.6 dengan Framework LARAVEL 9.19, jadi hanya bisa di run di PHP 8 atau lebih tinggi
-   Pertama download zip atau git clone di github saya, bisa di download [disini](https://github.com/RozinDzakwan/projek_test_innova/archive/refs/heads/main.zip)
-   Jika di download di ekstrak terlebih dahulu, kemudian di buka di text editor Vscode / Sublime / yang lainnya
-   Jika di clone maka buka git bash dan ketik git clone, lalu paste git clonenya dan enter, dan langsung buka folder tersebut di text editor, lalu buka folder .env.example dan copy isinya, lalu buat file di folder yang hasil clone tadi dengan nama .env, lalu copykan ke dalamnya, lalu sesuaikan databasenya, lalu ketik di terminal php artisan key:generate
-   karena disini saya menggunakan Database MySql maka, buka xampp dan start Mysqlnya, lalu bisa di buka di phpMyAdmin, atau link [ini](http://localhost/phpmyadmin/)
-   buat database baru bernama test_inova_medika, lalu impor database yang sudah saya siapkan di folder
-   Jika sudah maka buka terminal dan ketik php artisan serve
-   Setelah itu buka browser anda dan input http://127.0.0.1:8000/

## Alur

### Admin

email = admin@admin.com

password = admin

Di web ini hanya ada terdapat 1 admin yaitu dengan login seperti tertera di atas, Hak Admin adalah :

-   Dashboard Admin
-   Menambah/Mengedit/Menghapus data pegawai http://127.0.0.1:8000/adminpegawai
-   Menambah/Mengedit/Menghapus data wilayah http://127.0.0.1:8000/adminwilayah

### Pegawai

Di web ini pegawai tidak bisa mendaftarkan sendiri, jadi pegawai hanya bisa di tambah oleh admin, Hak Pegawai adalah :

-   Dashboard Pegawai http://127.0.0.1:8000/pegawai
-   Menambah/Mengedit/Menghapus data obat http://127.0.0.1:8000/pegawaiobat
-   Melihat data pasien http://127.0.0.1:8000/pegawaipasien
-   Memberi tindakan pada pasien http://127.0.0.1:8000/pegawaitindakan
-   Mengkonfirmasi pembayaran user http://127.0.0.1:8000/pegawaipembayaran

### User

Di web ini user bisa mendaftarkan diri untuk login, dan di 1 user bisa berkonsultasi kepada pegawai tidak hanya 1 kali

Di user ini ada riwayat konsultasi dan statusnya :

-   belum ditangani = User sudah konsultasi tetapi belum di tangani oleh pegawai
-   belum bayar = Pegawai sudah menangani tetapi User belum membayar. Dan nanti ada button untuk melihat penangan pegawai dan membayar tagihannya
-   menunggu konfirmasi = User sudah membayar, namun pegawai belum mengkonfirmasi pembayaran User
-   transaksi berhasil = Pegawai sudah mengkonfirmasi pembayran anda dan bisa mencetak nota

Hak User adalah :

-   Konsultasi dengan pegawai http://127.0.0.1:8000/userkonsultasi
-   Riwayat http://127.0.0.1:8000/userkonsultasi

### Tamu

Hak Tamu adalah :

-   Dashboard Inova Medika http://127.0.0.1:8000/user
-   Melihat Obat http://127.0.0.1:8000/userobat
-   Melihat Pegawai http://127.0.0.1:8000/userpegawai
-   Melihat Wilayah/Cabang Inova Medika http://127.0.0.1:8000/userwilayah

## Validasi

-   Nama = hanya bisa menginputkan abjad a-z
-   Foto/Gambar = hanya bisa file yang berekstensi JPG/JPEG/GIV
-   No Telepon = hanya bisa menginputkan angka
-   Nik = wajib angka 16

*   Obat :
    -   stok = minimal 1
    -   harga = minimal Rp.500
