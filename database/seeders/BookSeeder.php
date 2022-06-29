<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Programming untuk Pelajar',
            'slug' => 'programming-untuk-pelajar',
            'category_id' => 2,
            'author_id' => 1
        ]);

        Book::create([
            'title' => 'Hujan',
            'slug' => 'hujan',
            'category_id' => 3,
            'author_id' => 2
        ]);
    }
}
