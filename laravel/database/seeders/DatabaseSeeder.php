<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'T-Shirt',

               
            ],
            [
                'id' => 2,
                'name' => 'Hoodie',
  
             
               
            ],
            [
                'id' => 3,
                'name' => 'Shorts',
  
            ],
            [
                'id' => 4,
 
                'name' => 'Jacket',
  
  
               
            ],
            [
                'id' => 5,
 
                'name' => 'Trousers',
  
               
            ],
        ]);
        
       
    }
}
