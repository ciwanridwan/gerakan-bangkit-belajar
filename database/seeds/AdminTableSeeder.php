<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
    		'nama' => 'Admin',
    		'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'activate_token' => 'O4aUd5BKzUrbt20wn2mRKLJLlFCJwl',
            'status' => 1
    	]);
    }
}
