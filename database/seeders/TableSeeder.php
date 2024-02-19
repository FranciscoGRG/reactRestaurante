<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tables = [
            [
                'numero' => 1,
                'disponible' => true,
            ],
            [
                'numero' => 2,
                'disponible' => true,
            ],
            [
                'numero' => 3,
                'disponible' => true,
            ],
            [
                'numero' => 4,
                'disponible' => true,
            ],
            [
                'numero' => 5,
                'disponible' => true,
            ],
            [
                'numero' => 6,
                'disponible' => true,
            ],
            [
                'numero' => 7,
                'disponible' => true,
            ],
        ];

        foreach ($tables as $table) {
            Table::create($table);
        }
    }
}
