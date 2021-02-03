<?php

use App\Models\Empresa;
use Illuminate\Database\Seeder;
use App\Models\MovimentosFinanceiro;

class MovimentosFinanceiroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($id = 1; $id <= 10; $id++) {

            $empresa =  Empresa::find($id);

            if ($empresa->tipo == 'cliente') {
                $tipoMov = 'saida';
            } else {
                $tipoMov = 'entrada';
            }

            factory(MovimentosFinanceiro::class, 5)->create(
                [
                    'empresa_id' => $id,
                    'tipo' => $tipoMov
                ]
            );
        }
    }
}
