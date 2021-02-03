<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Empresa;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use Symfony\Component\HttpFoundation\Response;

class EmpresaController extends Controller
{
    private $empresa;
    
    /**
     * __construct
     *
     * @param  mixed $empresa
     * @return void
     */
    public function __construct(Empresa $empresa)
    {
        $this->empresa = $empresa;
    }
         
    /**
     * index
     *
     * @param  mixed $request
     * @return View
     */
    public function index(Request $request):View
    {
        $tipo = $request->tipo;
        $this->validaTipo($tipo);
        
        $busca = $request->search ?? '';

        $empresas = Empresa::todasPorTipo($tipo, $busca);

        return view('empresas.index', compact('empresas', 'tipo'));
    }
   
    /**
     * create
     *
     * @param  mixed $request
     * @return View
     */
    public function create(Request $request):View
    {
        $tipo = $request->tipo;
        $this->validaTipo($tipo);

        return view('empresas.create', compact('tipo'));
    }
  
    /**
     * store
     *
     * @param  mixed $request
     * @return Response
     */
    public function store(EmpresaRequest $request):Response
    {
        $empresa = $this->empresa::create($request->all());

        return redirect()->route('empresas.show', $empresa->id);
    }
          
    /**
     * show
     *
     * @param  mixed $empresa
     * @return View
     */
    public function show(Empresa $empresa):View
    {
        $empresa = Empresa::BuscaPorId($empresa->id);
        $tipo = $empresa->tipo;
        $this->validaTipo($tipo);

        return view('empresas.show', [
            'empresa' => Empresa::BuscaPorId($empresa->id),
            'saldo' => Saldo::ultimoDaEmpresa($empresa->id),
            'tipo'  => $tipo
        ]);
    }
 
    /**
     * edit
     *
     * @param  mixed $empresa
     * @return  View
     */
    public function edit(Empresa $empresa):View
    {
        $tipo = $empresa->tipo;
        $this->validaTipo($tipo);

        return view('empresas.edit', compact('empresa', 'tipo'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $empresa
     * @return Response
     */
    public function update(EmpresaRequest $request, Empresa $empresa):Response
    {
        $empresa->update($request->all());

        return redirect()->route('empresas.show', $empresa);
    }
    
    /**
     * destroy
     *
     * @param  mixed $empresa
     * @param  mixed $request
     * @return Response
     */
    public function destroy(Empresa $empresa, Request $request):Response
    {
        $this->validaTipo($request->tipo);
        $empresa->delete();

        return redirect()->route('empresas.index', ['tipo'=>$request->tipo]);
    }
    
    /**
     * validaTipo
     *
     * @param  mixed $tipo
     * @return void
     * 
     */
    private function validaTipo(string $tipo):Void
    {
        if ($tipo !== 'cliente' && $tipo !== 'fornecedor') {
            abort('404');
        }
    }
}
