<!-- 

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
 use Illuminate\Database\Seeder;
 use App\Models\Recover;

class recoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recover::create([
            'question' => 'Reparación o mantenimiento de productos defectuosos',
        ]);

        Recover::create([
            'question' => 'Reacondicionar y restaurar productos antiguos y actualizarlos',
        ]);

        Recover::create([
            'question' => 'Remanufacturar (uso de componentes en el mismo tipo de productos)',
        ]);

        Recover::create([
            'question' => 'Reuso de componentes usándolos en sus productos o productos desechados en otro tipo de productos',
        ]);

        Recover::create([
            'question' => 'Participa en programas de recuperación de materiales como la recolección de desechos electrónicos o la recuperación de metales',
        ]);

        Recover::create([
            'question' => 'Establece alianzas con sus grupos de interés para recuperar materiales valiosos de los residuos generados por la empresa',
        ]);

        Recover::create([
            'question' => 'Realiza esfuerzos para recuperar energía a partir de residuos, como la producción de biogás o incineración controlada',
        ]);
    }
} -->
