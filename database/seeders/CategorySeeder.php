<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Category::create([
            'name' => 'Religi',
            'slug' => 'religi',
            'description' => 'Ini deskripsi religi'
        ]);

        Category::create([
            'name' => 'non-Fiksi',
            'slug' => 'non-fiksi',
            'description' => 'Ini deskripsi non-Fiksi'
        ]);

        Category::create([
            'name' => 'Fiksi',
            'slug' => 'fiksi',
            'description' => 'Ini deskripsi Fiksi'
        ]);
    }
}
