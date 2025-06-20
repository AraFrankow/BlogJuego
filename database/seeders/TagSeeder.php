<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            [
                'tag_id' => 1,
                'name' => 'Gameplay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 2,
                'name' => 'Progreso',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 3,
                'name' => 'Actualización',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 4,
                'name' => 'Lanzamiento',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 5,
                'name' => 'Bugs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 6,
                'name' => 'Pixel art',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 7,
                'name' => 'Ambientes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 8,
                'name' => 'Animaciones',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 9,
                'name' => 'UI/UX',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 10,
                'name' => 'Estilo visual',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 11,
                'name' => 'Exploración',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 12,
                'name' => 'Recolección',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 13,
                'name' => 'Supervivencia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 14,
                'name' => 'Lore',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 15,
                'name' => 'Personajes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 16,
                'name' => 'Mapa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 17,
                'name' => 'Facciones',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 18,
                'name' => 'Música',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 19,
                'name' => 'Efectos de sonido',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 20,
                'name' => 'Ambientación sonora',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 21,
                'name' => 'Inspiraciones',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 22,
                'name' => 'Feedback',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 23,
                'name' => 'Demo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag_id' => 24,
                'name' => 'Beta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
