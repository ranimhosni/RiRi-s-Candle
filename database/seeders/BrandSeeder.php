<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\brands;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        brands::create(
            [
                'name'=>'Dell',
                'slug'=>'dell'

            ]
        );
        brands::create(
            [
                'name'=>'Samsung',
                'slug'=>'dell'

            ]
        );
          brands::create(
            [
                'name'=>'Apple',
                'slug'=>'dell'

            ]
        );
    }
}
