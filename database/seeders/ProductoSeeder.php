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
                'nombre' => 'Skin del Protagonista', 
                'descripcion' => 'Skin exclusivo del protagonista del juego, que permite personalizar su apariencia con un diseño único y atractivo.',
                'fecha_lanzamiento' => '2025-12-01',
                'estado' => 'Proximamente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'producto_id' => 2,
                'nombre' => 'Skin 2 del Protagonista', 
                'descripcion' => 'Skin alternativo del protagonista del juego, que ofrece una apariencia diferente y fresca para los jugadores.',
                'fecha_lanzamiento' => '2025-12-01',
                'estado' => 'Proximamente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'producto_id' => 3,
                'nombre' => 'Aspecto de arma', 
                'descripcion' => 'Aspecto exclusivo de un arma del juego, que permite a los jugadores personalizar su equipo con un diseño único y atractivo.',
                'fecha_lanzamiento' => '2026-02-01',
                'estado' => 'En desarrollo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'producto_id' => 4,
                'nombre' => 'Mascota exclusiva', 
                'descripcion' => 'Mascota exclusiva del juego, que acompaña al jugador en sus aventuras y ofrece beneficios únicos en la jugabilidad. Unicamente disponible para los primeros jugadores que ingresen al juego.',
                'fecha_lanzamiento' => '2026-05-01',
                'estado' => 'En desarrollo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
