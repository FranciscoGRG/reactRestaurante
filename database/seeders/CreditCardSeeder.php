<?php

namespace Database\Seeders;

use App\Models\CreditCard;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreditCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $creditCards = [
            [
                'owner' => 'Fran Garcia',
                'number' => '1234 5678 9012 3456',
                'expired' =>  Carbon::now(),
                'cvv' => 234,
                'user_id' => 1,
            ],
            [
                'owner' => 'Pepe Garcia',
                'number' => '1234 5678 9012 3456',
                'expired' => Carbon::now(),
                'cvv' => 234,
                'user_id' => 1,
            ],
            [
                'owner' => 'Marcos Garcia',
                'number' => '1234 5678 9012 3456',
                'expired' => Carbon::now(),
                'cvv' => 234,
                'user_id' => 2,
            ],
        ];
        

        foreach ($creditCards as $creditCard) {
            CreditCard::create($creditCard);
        }
        
    }
}
