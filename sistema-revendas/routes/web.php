<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'reset' => false
]);

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('empresas', 'EmpresaController');
    Route::resource('produtos', 'ProdutoController');
    Route::resource('users', 'UserController');
    Route::resource('movimentos_financeiros', 'MovimentoFinanceiroController')->except([
        'edit', 'update'
    ]);

    Route::post('/empresas/buscar-por/nome', 'Selects\EmpresaNomeTipo');
    Route::post('/produtos/buscar-por/nome', 'Selects\ProdutoPorNome');
    Route::get('/empresas/relatorio/saldo/{empresa}', 'Relatorios\SaldoEmpresa')->name('empresas.relatorios.saldo');

    Route::delete('/movimentos_estoque/{id}', 'MovimentosEstoqueController@destroy')->name('movimentos_estoque.destroy');
    Route::post('/movimentos_estoque', 'MovimentosEstoqueController@store')->name('movimentos_estoque.store');
});
