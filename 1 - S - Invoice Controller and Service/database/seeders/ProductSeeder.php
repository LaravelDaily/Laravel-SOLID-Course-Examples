<?php

namespace Database\Seeders;

use App\Models\Product;
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
        Product::create(['name' => 'Barbie', 'price' => 1999]);
        Product::create(['name' => 'LEGO', 'price' => 4999]);
        Product::create(['name' => 'Playmobil', 'price' => 3999]);
    }
}
