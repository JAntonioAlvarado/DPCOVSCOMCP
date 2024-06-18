<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reuse;

class reuseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reuse::create([
            'question' => 'Se  han implementado prácticas para extender el ciclo de vida del producto  a través de reparaciones y mantenimiento',
        ]);

        Reuse::create([
            'question' => 'Nos enfocamos en el reuso de productos o componentes en sus operaciones',
        ]);

        Reuse::create([
            'question' => 'Nos enfocamos en el Reuso de productos desechados por otros consumidores cuando estos han cumplido su función original',
        ]);

        Reuse::create([
            'question' => 'Se rellenan los cartuchos de tinta de las impresoras',
        ]);

        Reuse::create([
            'question' => 'Se reutilizan los reutilizan sobres y carpetas',
        ]);

        Reuse::create([
            'question' => 'Se reparan muebles y equipo para extender su vida útil',
        ]);

        Reuse::create([
            'question' => 'Se donan artículos que ya no son necesarios pero siguen siendo funcionales',
        ]);
    }
}
