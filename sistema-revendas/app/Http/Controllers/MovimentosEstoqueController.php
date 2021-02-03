<?php

namespace App\Http\Controllers;

use App\Models\MovimentosEstoque;
use App\Http\Requests\MovimentoEstoqueRequest;

class MovimentosEstoqueController extends Controller
{    
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(MovimentoEstoqueRequest $request)
    {
        MovimentosEstoque::create($request->all());

        return \redirect()->back();
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy(int $id)
    {
        MovimentosEstoque::destroy($id);

        return redirect()->back();
    }
}
