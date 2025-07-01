<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'producto_id' => 1,
                'nombre' => 'Demo del Juego', 
                'descripcion' => 'Una breve demostración del juego que permite a los jugadores explorar el mundo y experimentar la jugabilidad básica.',
                'precio' => '0.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'producto_id' => 2,
                'nombre' => 'Beta del Juego', 
                'descripcion' => 'Acceso anticipado a la versión beta del juego, donde los jugadores pueden probar nuevas características y proporcionar retroalimentación.',
                'precio' => '5000.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'producto_id' => 3,
                'nombre' => 'Juego Completo', 
                'descripcion' => 'Juego completo que ofrece una experiencia de aventura y exploración en un mundo devastado, con misiones, personajes y un sistema de progresión. (Disponible en Steam y Epic Games Store proximamente)',
                'precio' => '20000.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'producto_id' => 4,
                'nombre' => 'DLC 1', 
                'descripcion' => 'Expansión que agrega nuevas misiones, personajes y áreas al juego, ampliando la experiencia de juego.',
                'precio' => '10000.00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
