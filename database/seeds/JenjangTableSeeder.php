<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenjangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `jenjangs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
        (1, 'DPR RI', '2020-09-29 11:55:55', '2020-09-29 11:55:55'),
        (2, 'DPRD PROVINSI', '2020-09-29 11:55:55', '2020-09-29 11:55:55'),
        (3, 'DPRD KABUPATEN/KOTA', '2020-09-29 11:55:55', '2020-09-29 11:55:55');");
    }
}
