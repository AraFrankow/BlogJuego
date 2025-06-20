<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'categoria_id' => 1,
                'name' => 'Desarrollo', 
                'abbreviation' => 'Des',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 2,
                'name' => 'Arte Conceptual', 
                'abbreviation' => 'Art',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 3,
                'name' => 'Noticias del Juego', 
                'abbreviation' => 'Not',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 4,
                'name' => 'Musica y Sonido', 
                'abbreviation' => 'Mus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'categoria_id' => 5,
                'name' => 'Lore / Historia', 
                'abbreviation' => 'His',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
