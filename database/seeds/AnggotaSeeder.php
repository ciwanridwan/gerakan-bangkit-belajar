<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `anggotas` (`id`, `nama`, `dapil`, `kode`, `created_at`, `updated_at`) VALUES
        (1, 'Irmawan, MM', 'Aceh', 1, '2020-09-29 11:55:55', '2020-09-29 11:55:55'),
        (2, 'Ruslan M Daud', 'Aceh', 2, '2020-09-29 11:55:55', '2020-09-29 11:55:55'),
        (3, 'Marwan Dasopang', 'Sumut', 2, '2020-09-29 11:55:55', '2020-09-29 11:55:55'),
        (4, 'Abdul Wahid, S.PdI', 'Riau', 2, '2020-09-29 11:55:55', '2020-09-29 11:55:55'),
        (5, 'sofyan Ali, M.Ag, M.Pd', 'Jambi', 0, '2020-09-29 11:55:55', '2020-09-29 11:55:55'),
        (6, 'Bertu Merlas, ST', 'Sumsel', 2, '2020-09-29 11:55:55', '2020-09-29 11:55:55'),
        (7, 'H. Muhammad Kadafi, SH, MH', 'Lampung', 1, '2020-09-29 11:55:55', '2020-09-29 11:55:55'),
        (8, 'Ela Siti Nuryamah, S.Sos.I', 'Lampung', 2, '2020-09-29 11:55:55', '2020-09-29 11:55:55'),
        (9, 'Cucun Ahmad Syamsurijal, S.Ag', 'Jabar', 2, '2020-09-29 11:55:55', '2020-09-29 11:55:55'),
        (10, 'Neng Eem Marhamah Zulfa Hiz, MM', 'Jabar', 3, '2020-09-29 11:55:55', '2020-09-29 11:55:55');");
    }
}
