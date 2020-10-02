<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
    		'name' => 'user',
    		'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'email_verified_at' => '2019-08-29 12:55:52',
            'remember_token' => 'O4aUd5BKzUrbt20wn2mRKLJLlFCJwl'
    	]);
    }
}
