<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Daugiametės gėlės', 'icon' => 'fa fa-spa'],
            ['name' => 'Spygliuočiai', 'icon' => 'fa fa-tree'],
            ['name' => 'Tujos', 'icon' => 'fa fa-tree'],
            ['name' => 'Vaiskrūmiai', 'icon' => 'fa fa-apple-alt']
        ];
        foreach($categories as $category){
            Category::create([
                'name' => $category['name'],
                'icon' => $category['icon'],
            ]);
        }
    }
}
