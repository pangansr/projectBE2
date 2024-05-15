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
                'name' => 'Áo Khoác',
               
            ],
            [
                'id' => 2,
                'name' => 'Quần dài',
               
            ],
            [
                'id' => 3,
                'name' => 'Quần short',
               
            ],
            [
                'id' => 4,
                'name' => 'Áo thun',
               
            ],
            [
                'id' => 5,
                'name' => 'Áo sơ mi',
               
            ],
        ]);
        
       
    }
}
