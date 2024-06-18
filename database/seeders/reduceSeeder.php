<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reduce;

class reduceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reduce::create([
            'question' => 'Se han implementado medidas para reducir el consumo de recursos naturales en sus procesos productivos',
        ]);

        Reduce::create([
            'question' => 'Se han establecido objetivos para reducir el consumo de materiales en las operaciones de la empresa',
        ]);

        Reduce::create([
            'question' => ' Se han establecido objetivos para reducir el consumo de Energía en las operaciones de la empresa',
        ]);

        Reduce::create([
            'question' => ' Se han establecido objetivo para reducir el consumo de agua en las operaciones de la empresa',
        ]);

        Reduce::create([
            'question' => 'Se descartan  productos innecesarios',
        ]);

        Reduce::create([
            'question' => 'Se manufactura (simplificar y minimizar recursos)',
        ]);

        Reduce::create([
            'question' => 'Se promueve el diseño de productos y embalajes que minimicen el uso de recursos durante el ciclo de vida',
        ]);

        Reduce::create([
            'question' => 'El uso de recursos es de forma intensiva',
        ]);

        Reduce::create([
            'question' => 'Cuentan con una estrategia de administración de desechos y emisiones',
        ]);

        Reduce::create([
            'question' => 'Se enfocan en recuperar recursos tales como desechos',
        ]);

        Reduce::create([
            'question' => 'Se enfocan en recuperar recursos tales como emisiones',
        ]);

        Reduce::create([
            'question' => 'Se evita el exceso de embalaje (papel, plástico, aluminio, etc.)',
        ]);

        Reduce::create([
            'question' => 'Se usan los medios electrónicos para hacer comunicados y trámites',
        ]);

        Reduce::create([
            'question' => 'No se usan los utensilios desechables',
        ]);

        Reduce::create([
            'question' => 'Se adquieren equipos de mayor durabilidad',
        ]);
    }
}
