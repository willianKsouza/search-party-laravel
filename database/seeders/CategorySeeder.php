<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Action',
            'Adventure',
            'Platform',
            'FPS',
            'TPS',
            'RPG',
            'MMORPG',
            'RTS',
            'TBS',
            'Simulation',
            'Sports',
            'Racing',
            'Fighting',
            'Music/Rhythm',
            'Puzzle',
            'Horror/Survival Horror',
            'Stealth',
            'Sandbox/Open World',
            'Battle Royale',
            'Indie',
            'Casual',
            'Multiplayer',
            'Mobile',
            'VR',
            'AR'
        ];


        $data = [];

        foreach ($categories as $category) {
            $data[] = [
                'name' => $category,
                'slug' => Str::slug($category)
            ];
        }

        Category::upsert($data, ['name'], ['name']);
    }
}
