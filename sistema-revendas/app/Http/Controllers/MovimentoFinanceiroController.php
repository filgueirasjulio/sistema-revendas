<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MovimentosFinanceiro;
use App\Http\Requests\MovimentoFinanceiroRequest;

class MovimentoFinanceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data_inicial = $request->get('data_inicial');
        $data_final = $request->get('data_final');

        if (!empty($data_inicial) || !empty($data_final)) {
            $movimentos_financeiros = MovimentosFinanceiro::buscaPorIntervalo(
                data_br_para_iso($data_inicial),
                data_br_para_iso($data_final)
            );
            return view('movimentos_financeiros.index', compact('movimentos_financeiros','data_inicial', 'data_final'));
        } else {
            $movimentos_financeiros = MovimentosFinanceiro::orderBy('id', 'desc')->paginate(20);
            $data_inicial = (new \DateTime('first day of this month'))->format('d/m/Y');
            $data_final = (new \DateTime('last day of this month'))->format('d/m/Y');
        }

        return view('movimentos_financeiros.index', compact('movimentos_financeiros','data_inicial', 'data_final'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('movimentos_financeiros.create');
    }
    
     /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\MovimentoFinanceiroRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MovimentoFinanceiroRequest $request)
    {   
        MovimentosFinanceiro::create($request->all());

        return redirect('movimentos_financeiros')->with('flash_message', 'Movimentos_financeiro added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $movimentos_financeiro = MovimentosFinanceiro::findOrFail($id);

        return view('movimentos_financeiros.show', compact('movimentos_financeiro'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        MovimentosFinanceiro::destroy($id);

        return redirect('movimentos_financeiros')->with('flash_message', 'Movimentos_financeiro deleted!');
    }
}
