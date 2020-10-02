<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `abouts` (`id`, `judul`, `isi`, `gambar`, `status`,`created_at`, `updated_at`) VALUES
        (1, 'Program Gerakan Bangkit Belajar', 'Dalam kurun waktu beberapa bulan terakhir, dunia sedang digemparkan dengan sebuah
peristiwa yang dikenal sebagi Corona Virus 19 tak terkecuali di Indonesia. Menurut data
yang dikeluarkan tim gugus tugas nasional pencegahan COVID 19 menunjukkan bahwa
per modul ini dibuat terdapat 123.503 kasus terkonfirmasi, 79.306 pasien yang sembuh,
dan terdapat 5.658 pasien yang meninggal dunia. Kondisi ini mengakibatkan lumpuh
nya berbagai sektor mulai dari sektor ekonomi, kesejahteraan sosial, kesehatan, dan tak
terkecuali juga berdampak pada sektor pendidikan.
Kondisi ini memaksa pendidikan di lakukan secara jarak jauh atau daring. Sehingga
Kementerian Pendidikan dan Kebudayaan Republik Indonesia mengeluarkan surat
edaran nomor 15 tahun 2020 tentang Pedoman Penyelenggaraan Belajar Dari Rumah
Dalam Masa Darurat Penyebaran Covid-19. Pedoman tersebut mengatur tata cara
penyelenggaraan pembelajaran jarak jauh (PJJ) di masa new normal.
Namun, kebijakan pembelajaran jarak jauh banyak menuai masalah baru. Banyak orang
tua siswa yang mengeluhkan sistem pembelajaran tersebut dikarenakan beberapa hal
seperti kuota internet, tidak memiliki gudget, dan bahkan tidak ada akses internet. Hal
serupa juga di rasakan oleh guru yang mengajar. Menurut data dari Kementerian
Komunikasi dan Informatika bahwa terdapat 24.000 desa yang belum tersentuh oleh
jaringan internet. Hal ini menyulitkan buat mereka yang berada di daerah tersebut.
sehingga pembelajaran jarak jauh ini dinggap sangat tidak efektif bagi siswa miskin yang
tidak memiliki gudget dan juga akses internet.
Dalam merespon hal tersebut, Rumah Edukasi Kebangsaan berinisiasi untuk membantu
siswa-siswi miskin yang terdampak Pembelajaran Jarak Jauh untuk tetap belajar melalui
program Gerakan Bangkit belajar. Geraka tersebut diharapkan dapat memberikan solusi
bagi siswa miskin agar tetap belajar di masa new normal.', 'Sanggar-belajar_1601553639.jpg', 1, '2020-09-29 11:55:55', '2020-10-01 11:55:55');");
    }
}
