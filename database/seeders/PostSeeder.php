<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('post')->insert([
            [
                'post_id'=> 1,
                'title' => 'Bienvenido a mi blog',
                'excerpt' => 'Les contaré un poco sobre el juego',
                'body' => 'En un planeta devastado, sos el último ser vivo con una semilla capaz de restaurar la vida. Tendrás que explorar un pequeño mundo, recolectar recursos, enfrentarte al clima extremo y proteger la semilla mientras intentás hacer brotar la vida nuevamente.',
                'published_at' => now(),
            ],
            [
                'post_id'=> 2,
                'title' => 'El nombre de mi juego',
                'excerpt' => 'El nombre de mi juego es "Last Seed"',
                'body' => 'Es un juego de aventura y exploración en el que los jugadores asumen el papel de un ser vivo que debe restaurar la vida en un planeta devastado.',
                'published_at' => now(),
            ],
        ]);
    }
}
