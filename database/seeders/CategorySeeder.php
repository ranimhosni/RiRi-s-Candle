<?php

namespace Database\Seeders;
use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Categorie::create(
            [
                'name'=>'Computer',
                'slug'=>'dell'

            ]
        );
        Categorie::create(
            [
                'name'=>'Phone',
                'slug'=>'dell'

            ]
        );
          Categorie::create(
            [
                'name'=>'Watch',
                'slug'=>'dell'

            ]
        );
    }
}
