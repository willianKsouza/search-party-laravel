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
            'Ação',
            'Aventura',
            'Plataforma',
            'FPS',
            'TPS',
            'RPG',
            'MMORPG',
            'RTS',
            'TBS',
            'Simulação',
            'Esporte',
            'Corrida',
            'Luta',
            'Música/Ritmo',
            'Puzzle/Quebra-cabeça',
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
