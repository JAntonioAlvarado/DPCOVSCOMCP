<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recycle;

class recycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recycle::create([
            'question' => 'Plástico',
        ]);

        Recycle::create([
            'question' => 'Vidrio',
        ]);

        Recycle::create([
            'question' => 'Papel',
        ]);

        Recycle::create([
            'question' => 'Otros materiales',
        ]);

        Recycle::create([
            'question' => 'Compra productos del mercado elaborados con materiales reciclados',
        ]);

        Recycle::create([
            'question' => 'Compra de insumos con empaques reusables',
        ]);

        Recycle::create([
            'question' => 'Compra productos que pueden reciclarse: aluminio, vidrio, plástico, etc.',
        ]);

        Recycle::create([
            'question' => 'Promueve el reuso de insumos',
        ]);

        Recycle::create([
            'question' => 'Utiliza el papel reciclado para imprimir',
        ]);

        Recycle::create([
            'question' => 'Proporciona contenedores de reciclaje claramente identificados en todas las áreas de la empresa',
        ]);

        Recycle::create([
            'question' => 'Realiza la separación adecuada de residuos en la fuente para facilitar su reciclaje',
        ]);
    }
}
