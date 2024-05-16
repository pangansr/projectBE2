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
<<<<<<< HEAD
                'name' => 'Áo khoác',
=======
                'name' => 'Áo Khoác',
>>>>>>> kien
               
            ],
            [
                'id' => 2,
<<<<<<< HEAD
                'name' => 'Sơ mi',
=======
                'name' => 'Quần dài',
>>>>>>> kien
               
            ],
            [
                'id' => 3,
<<<<<<< HEAD
                'name' => 'Áo thun',
=======
                'name' => 'Quần short',
>>>>>>> kien
               
            ],
            [
                'id' => 4,
<<<<<<< HEAD
                'name' => 'Quần dài',
=======
                'name' => 'Áo thun',
>>>>>>> kien
               
            ],
            [
                'id' => 5,
<<<<<<< HEAD
                'name' => 'Quần short',
=======
                'name' => 'Áo sơ mi',
>>>>>>> kien
               
            ],
        ]);
        
       
    }
}
