<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            "name" => "Ashish Negi",
            "email" => "admin@gmail.com",
            "password" => Hash::make("admin"),
            "last_login_at" => date("Y-m-d H:i:s")
        ]);
    }
}
