<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            // [
            //     'event' => 'Cita #1',
            //     'start_date' => '2023-11-07 20:00:00',
            //     'end_date' => '2023-11-07 21:00:00',
            //     'name' => 'Hola',
            //     'email' => 'frangr1999@hotmail.com',
            //     'message' => 'Hola mundo',
            //     'menu' => 1,
            //     'telefono' => '622 45 23 22',
            //     'alergias' => 'Pepino',
            //     'comensales' => 2,
            //     'user_id' => 1,
            //     'table_id' => 2,
            // ],
            [
                'event' => 'Cita #2',
                'start_date' => '2023-10-16 20:00',
                'end_date' => '2023-10-15 21:00',
                'name' => 'Hola',
                'email' => 'frangr1999@hotmail.com',
                'message' => 'Hola mundo',
                'menu' => 2,
                'telefono' => '622 45 23 22',
                'alergias' => 'Pepino',
                'comensales' => 3,
                'user_id' => 2,
                'table_id' => 3,
            ],
            [
                'event' => 'Cita #3',
                'start_date' => '2023-10-17 20:00',
                'end_date' => '2023-10-15 21:00',
                'name' => 'Hola',
                'email' => 'frangr1999@hotmail.com',
                'message' => 'Hola mundo',
                'menu' => 3,
                'telefono' => '622 45 23 22',
                'alergias' => 'Pepino',
                'comensales' => 2,
                'user_id' => 3,
                'table_id' => 4,
            ],
            [
                'event' => 'Cita #4',
                'start_date' => '2023-10-18 20:00',
                'end_date' => '2023-10-15 21:00',
                'name' => 'Hola',
                'email' => 'frangr1999@hotmail.com',
                'message' => 'Hola mundo',
                'menu' => 2,
                'telefono' => '622 45 23 22',
                'alergias' => 'Pepino',
                'comensales' => 1,
                'user_id' => 4,
                'table_id' => 6,
            ],

        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
