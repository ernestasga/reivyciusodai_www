<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            // Daugiametės gėlės
            1 => [
                [
                    'name' => 'Kalninis Astras',
                    'role_id' => 1,
                    'description' => '',
                    'price' => 0,
                    'stock' => 10,
                ],
                [
                    'name' => 'Alūnė',
                    'role_id' => 1,
                    'description' => '',
                    'price' => 0,
                    'stock' => 10,
                ],
                [
                    'name' => 'Mėlynoji Rūta',
                    'role_id' => 1,
                    'description' => '',
                    'price' => 0,
                    'stock' => 10,
                ],
                [
                    'name' => 'Pelkinė Kinrožė',
                    'role_id' => 1,
                    'description' => '',
                    'price' => 0,
                    'stock' => 10,
                ],
                [
                    'name' => 'Sirinė Kinrožė',
                    'role_id' => 1,
                    'description' => '',
                    'price' => 0,
                    'stock' => 10,
                ],
                [
                    'name' => 'Šluotelinė Hortenzija',
                    'role_id' => 1,
                    'description' => '',
                    'price' => 0,
                    'stock' => 10,
                ],
                [
                    'name' => 'Pūslenis',
                    'role_id' => 1,
                    'description' => '',
                    'price' => 0,
                    'stock' => 10,
                ],
                [
                    'name' => 'Pūkenis',
                    'role_id' => 1,
                    'description' => '',
                    'price' => 0,
                    'stock' => 10,
                ],
            ],
            // Spygliuočiai
            2 => [

            ],
            // Tujos
            3 => [

            ],
            // Vaiskrūmiai
            4 => [

            ]
        ];
    }
}
