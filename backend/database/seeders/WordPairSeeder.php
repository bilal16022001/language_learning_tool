<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordPairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\WordPair::create([
            'english' => 'hello',
            'serbian' => 'zdravo',
            'image' => 'path/to/image1.jpg',
        ]);
        \App\Models\WordPair::create([
            'english' => 'cat',
            'serbian' => 'mačka',
            'image' => 'path/to/image2.jpg',
        ]);
    }
}
