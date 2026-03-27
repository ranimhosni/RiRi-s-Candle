<?php

namespace Database\Seeders;
use App\Models\products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         products::create(
            [
                'Title'=>'title1',
                'slug'=>'dell',
                'price'=>100,
                'quantity'=>3,
                'category_id'=>1,
                'brand_id'=>1,
                'description'=>'blalalablabla'

            ]
        );
    }
}
