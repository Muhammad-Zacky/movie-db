<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([

        
        [
         'category_name' => 'Action',
         'description' => 'Film dengan adegan yang menyenagkan',
         'created_at' => now(),
         'updated_at' => now(),
        ],
        [
         'category_name' => 'Drama',
         'description' => 'Film dengan penuh kisah',
         'created_at' => now(),
         'updated_at' => now(),
        ],
        [
         'category_name' => 'Romance',
         'description' => 'Film dengan penuh kisah cinta yang romantis',
         'created_at' => now(),
         'updated_at' => now(),
        ],
        [
         'category_name' => 'Horror',
         'description' => 'Film dengan banyak hal mistis dan menyeramkan',
         'created_at' => now(),
         'updated_at' => now(),
        ],
        [
         'category_name' => 'Thriller',
         'description' => 'Film dengan penuh kejadian seperti pembunuhan',
         'created_at' => now(),
         'updated_at' => now(),
           ],
       ]
      );
    }
}
