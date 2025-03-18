<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            ['name' => 'Ahmed', 'email' => 'ahmed@gmail.com', 'password' => 'mahmoud123'],
            ['name' => 'Mohammed', 'email' => 'mohammed@gmail.com', 'password' => 'mahmoud123'],
            ['name' => 'Khaled', 'email' => 'khaled@gmail.com', 'password' => 'mahmoud123'],
            ['name' => 'Sara', 'email' => 'sara@gmail.com', 'password' => 'mahmoud123'],
            ['name' => 'Fatima', 'email' => 'fatima@gmail.com', 'password' => 'mahmoud123'],
        ]);
    }
}
