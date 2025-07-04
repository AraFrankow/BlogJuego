<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->insert([
            [
                'blog_id'=> 1,
                'categoria_fk' => 5, // Lore / Historia
                'title' => 'Bienvenido a mi blog',
                'excerpt' => 'Les contaré un poco sobre el juego',
                'body' => 'En un planeta devastado, sos el último ser vivo con una semilla capaz de restaurar la vida. Tendrás que explorar un pequeño mundo, recolectar recursos, enfrentarte al clima extremo y proteger la semilla mientras intentás hacer brotar la vida nuevamente.',
                'published_at' => now()
            ],
            [
                'blog_id'=> 2,
                'categoria_fk' => 1, // Desarrollo
                'title' => 'El nombre de mi juego',
                'excerpt' => 'El nombre de mi juego es "Last Seed"',
                'body' => 'Es un juego de aventura y exploración en el que los jugadores asumen el papel de un ser vivo que debe restaurar la vida en un planeta devastado.',
                'published_at' => now()
            ],
        ]);

        DB::table('blogs_has_tags')->insert([
            [
                'blog_fk' => 1,
                'tag_fk' => 3 // Actualización
            ],
            [
                'blog_fk' => 1,
                'tag_fk' => 2 // Progreso
            ],
            [
                'blog_fk' => 1,
                'tag_fk' => 14 // Lore
            ],
            [
                'blog_fk' => 2,
                'tag_fk' => 3 // Actualización
            ],
            [
                'blog_fk' => 2,
                'tag_fk' => 2 // Progreso
            ],
        ]);
    }
}
