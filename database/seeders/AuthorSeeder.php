<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'name' => 'Tantri Apriani',
            'slug' => 'tantriapriani',
            'gender' => 'Wanita'
        ]);

        Author::create([
            'name' => 'Tereliye',
            'slug' => 'tereliye',
            'gender' => 'Pria'
        ]);
    }
}
