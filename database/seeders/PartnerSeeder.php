<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Partner();

        $admin->name = 'Adis';
        $admin->email = 'adis@gmail.com';
        $admin->password = '$2y$10$kpPFDwzuuPtLw4ON8RbJX.pN5yKJGWe7TIz.wxGESu3rG0Ps/6sZ6'; //unlockme123

        $admin->save();
    }
}
