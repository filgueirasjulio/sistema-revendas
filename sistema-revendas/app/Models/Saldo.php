<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{ 
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['valor', 'empresa_id'];

    /**
     * table
     *
     * @var string
     */
    protected $table = 'saldo';

    /**
     * movimento
     *
     * @return void
     */
    public function movimento()
    {
        return $this->morphTo();
    }

    /**
     * busca último saldo da empresa
     *
     * @param integer $empresaId
     * @return void
     */
    public static function ultimoDaEmpresa(int $empresaId)
    {
        return self::where('empresa_id', $empresaId)
            ->latest()
            ->first();
    }

   /**
     * Busca os saldos de uma empresa por intervalo
     *
     * @param integer $empresa
     * @param string $inicio
     * @param string $fim
     * @return void
     */
    public static function buscaPorIntervalo(int $empresa, string $inicio, string $fim)
    {
        return self::with('movimento')
            ->whereBetween('created_at', [$inicio, $fim])
            ->where('empresa_id', $empresa)
            ->get();
    }
}
