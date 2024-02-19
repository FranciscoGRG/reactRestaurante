<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'fran',
                'email' => 'fran@gmail.com',
                'password' => 'mariscal',
                'phone' => '522 34 21 43',
                'allergy' => '',
            ],
            [
                'name' => 'pepe',
                'email' => 'fran2@gmail.com',
                'password' => 'mariscal',
                'phone' => '522 34 21 43',
                'allergy' => 'Tomate',
            ],
            [
                'name' => 'jose',
                'email' => 'fran3@gmail.com',
                'password' => 'mariscal',
                'phone' => '522 34 21 43',
                'allergy' => 'Lechuga',
            ],
            [
                'name' => 'luis',
                'email' => 'fran4@gmail.com',
                'password' => 'mariscal',
                'phone' => '522 34 21 43',
                'allergy' => '',
            ],
        ];

        //User::create($user);
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
