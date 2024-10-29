<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Survey;
use App\Models\SurveySection;
use App\Models\SurveyQuestion;

class SustainabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $survey = Survey::create([
            'title' => 'Encuesta de Sostenibilidad',
            'description' => 'Esta encuesta evalúa las prácticas de sostenibilidad en diferentes áreas.'
        ]);

        $sections = [
            'Reducir consumo de insumos' => [
                'Se han implementado medidas para reducir el consumo de recursos naturales en sus procesos productivos',
                'Se han establecido objetivos para reducir el consumo de materiales en las operaciones de la empresa',
                'Se han establecido objetivos para reducir el consumo de Energía en las operaciones de la empresa',
                'Se han establecido objetivo para reducir el consumo de agua en las operaciones de la empresa',
                'Se descartan  productos innecesarios',
                'Se manufactura (simplificar y minimizar recursos)',
                'Se promueve el diseño de productos y embalajes que minimicen el uso de recursos durante el ciclo de vida',
                'El uso de recursos es de forma intensiva',
                'Cuentan con una estrategia de administración de desechos y emisiones',
                'Se enfocan en recuperar recursos tales como desechos',
                'Se enfocan en recuperar recursos tales como emisiones',
                'Se evita el exceso de embalaje (papel, plástico, aluminio, etc.)',
                'Se usan los medios electrónicos para hacer comunicados y trámites',
                'No se usan los utensilios desechables',
                'Se adquieren equipos de mayor durabilidad'
            ],
            'Reusar' => [
                'Se  han implementado prácticas para extender el ciclo de vida del producto  a través de reparaciones y mantenimiento',
                'Nos enfocamos en el reuso de productos o componentes en sus operaciones',
                'Nos enfocamos en el Reuso de productos desechados por otros consumidores cuando estos han cumplido su función original',
                'Se rellenan los cartuchos de tinta de las impresoras',
                'Se reutilizan los reutilizan sobres y carpetas',
                'Se reparan muebles y equipo para extender su vida útil',
                'Se donan artículos que ya no son necesarios pero siguen siendo funcionales'
            ],
            'Recuperar' => [
                'Reparación o mantenimiento de productos defectuosos',
                'Reacondicionar y restaurar productos antiguos y actualizarlos',
                'Remanufacturar (uso de componentes en el mismo tipo de productos)',
                'Reuso de componentes usándolos en sus productos o productos desechados en otro tipo de productos',
                'Participa en programas de recuperación de materiales como la recolección de desechos electrónicos o la recuperación de metales',
                'Establece alianzas con sus grupos de interés para recuperar materiales valiosos de los residuos generados por la empresa',
                'Realiza esfuerzos para recuperar energía a partir de residuos, como la producción de biogás o incineración controlada'
            ],
            'Reciclar' => [
                'Plástico',
                'Vidrio',
                'Papel',
                'Otros materiales',
                'Compra productos del mercado elaborados con materiales reciclados',
                'Compra de insumos con empaques reusables',
                'Compra productos que pueden reciclarse: aluminio, vidrio, plástico, etc.',
                'Promueve el reuso de insumos',
                'Utiliza el papel reciclado para imprimir',
                'Proporciona contenedores de reciclaje claramente identificados en todas las áreas de la empresa',
                'Realiza la separación adecuada de residuos en la fuente para facilitar su reciclaje'
            ],
            'Remanufacturar' => [
                'Se practica la re manufactura de productos, es decir, reconstruye y restaura productos usados para que funcionen como nuevos',
                'Se han establecido procesos y estándares para garantizar la calidad de los productos remanufacturados',
                'Se promueve la venta de productos remanufacturados como una opción sostenible para los clientes',
                'Se ofrecen servicios de reparación para sus productos, incluso después de que haya expirado la garantía',
                'Se promueve la cultura de la reparación, incentivando a los empleados y clientes a reparar en lugar de reemplazar'
            ]
        ];
        foreach ($sections as $sectionTitle => $questions) {
            $section = SurveySection::create([
                'survey_id' => $survey->id,
                'title' => $sectionTitle
            ]);

            foreach ($questions as $question) {
                SurveyQuestion::create([
                    'survey_section_id' => $section->id,
                    'question' => $question,
                    'type' => 'boolean'
                ]);
            }
        }
    }
}
