<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = [
         [
           'pegawai_id'=>'0',
           'email'=>'admin@admin.com',
           'unit_id'=>'0',
           'jabatan_id'=>'0',
           'password'=> bcrypt('12345678'),
         ]
     ];

     foreach ($user as $key => $value) {
         User::create($value);
     }
    }
}
