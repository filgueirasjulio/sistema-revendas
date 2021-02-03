<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimentosEstoque extends Model
{    
    /**
     * table
     *
     * @var string
     */
    protected $table = 'movimentos_estoque';
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['produto_id', 'quantidade', 'valor', 'tipo', 'empresa_id'];
    
    /**
     * Indica que o Movimento de estoque 
     * sempre deve carregar a relação com produto
     *
     * @var array
     */
    protected $with = ['produto'];
      
    /**
     * produto
     *
     * @return void
     */
    public function produto()
    {
        return $this->belongsTo( Produto::class);
    }
    
    /**
     * empresa
     *
     * @return void
     */
    public function empresa()
    {
        return $this->belongsTo( Empresa::class);
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
}
