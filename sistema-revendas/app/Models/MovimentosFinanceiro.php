<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimentosFinanceiro extends Model
{
    
    /**
     * table
     *
     * @var string
     */
    protected $table = 'movimentos_financeiros';

    /**
     * primaryKey
     *
     * @var string
     */
    protected $primaryKey = 'id';
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['descricao', 'valor', 'tipo', 'empresa_id'];
    
    /**
     * empresa
     *
     * @return void
     */
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa');
    }
    
    /**
     * saldo
     *
     * @return void
     */
    public function saldo()
    {
        return $this->MorphOne('App\Models\Saldo', 'movimento');
    }

    /**
     * Busca movimentos por intervalo de data
     *
     * @param string $inicio
     * @param string $fim
     * @param integer $quantidade
     * @return void
     */
    public static function buscaPorIntervalo(string $inicio, string $fim, int $quantidade = 20)
    {
        return self::whereBetween('created_at', [$inicio, $fim])
        ->with('empresa')
        ->orderBy('data', 'asc')
        ->paginate($quantidade);
    }
}
