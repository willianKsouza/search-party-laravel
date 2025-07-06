<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::upsert(
            [
                ['name' => 'FPS', 'slug' => Str::slug('FPS')],
                ['name' => 'TPS', 'slug' => Str::slug('TPS')],
                ['name' => 'RPG', 'slug' => Str::slug('RPG')],
                ['name' => 'Metroidvania', 'slug' => Str::slug('Metroidvania')],
                ['name' => 'Hack and Slash', 'slug' => Str::slug('Hack and Slash')],
                ['name' => 'Terror', 'slug' => Str::slug('Terror')],
                ['name' => 'Mundo aberto', 'slug' => Str::slug('Mundo aberto')],
                ['name' => 'Jogo de Festa', 'slug' => Str::slug('Jogo de Festa')],
            ],
            ['name'],
            ['name']
        );
    }
}
