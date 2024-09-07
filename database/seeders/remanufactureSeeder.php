<!-- 

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Remanufacture;

class remanufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Remanufacture::create([
            'question' => 'Se practica la re manufactura de productos, es decir, reconstruye y restaura productos usados para que funcionen como nuevos',
        ]);

        Remanufacture::create([
            'question' => 'Se han establecido procesos y estándares para garantizar la calidad de los productos remanufacturados',
        ]);

        Remanufacture::create([
            'question' => 'Se promueve la venta de productos remanufacturados como una opción sostenible para los clientes',
        ]);

        Remanufacture::create([
            'question' => 'Se ofrecen servicios de reparación para sus productos, incluso después de que haya expirado la garantía',
        ]);

        Remanufacture::create([
            'question' => 'Se promueve la cultura de la reparación, incentivando a los empleados y clientes a reparar en lugar de reemplazar',
        ]);
    }
} -->
