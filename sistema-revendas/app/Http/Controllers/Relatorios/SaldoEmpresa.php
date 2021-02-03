<?php

namespace App\Http\Controllers\Relatorios;

use App\Models\Saldo;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaldoEmpresa extends Controller
{
    /**
     * __invoke
     *
     * @param  mixed $empresa
     * @param  mixed $request
     * @return void
     */
    public function __invoke(Empresa $empresa, Request $request)
    {
        $data_inicial = $request->get('data_inicial');
        $data_final = $request->get('data_final');

        if (!empty($data_inicial) || !empty($data_final)) {
            $saldo = Saldo::buscaPorIntervalo(
                $empresa->id,
                data_br_para_iso($data_inicial),
                data_br_para_iso($data_final)
            );
            return view('empresas.relatorios.saldo', compact('saldo', 'empresa', 'data_inicial', 'data_final'));
        } else {
            $saldo = Saldo::orderBy('id', 'desc')->paginate(15);
            $data_inicial = (new \DateTime('first day of this month'))->format('d/m/Y');
            $data_final = (new \DateTime('last day of this month'))->format('d/m/Y');
        }

        return view('empresas.relatorios.saldo', compact('saldo', 'empresa', 'data_inicial', 'data_final'));
    }
}
