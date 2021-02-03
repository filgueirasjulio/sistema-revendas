<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;
    
    /**
     * Define dados para serialização
     *
     * @var array
     */
    protected $visible = ['id', 'text'];

    /**
     * anexa acessores a serialização
     *
     * @var array
     */
    protected $appends = ['text'];
    
    /**
     * table
     *
     * @var string
     */
    protected $table = 'produtos';
    
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
    protected $fillable = ['nome', 'descricao'];

    
    /**
     * Cria acessor chamado text para serialização
     *
     * @return void
     */
    public function getTextAttribute(): string
    {
        return $this->attributes['nome'];
            
    }
 
    /**
     * movimentosEstoque
     *
     * @return void
     */
    public function movimentosEstoque()
    {
        return $this->hasMany(MovimentosEstoque::class);
    }

    /**
     * Busca produto por nome
     *
     * @param string $nome
     * @return void
     */
    public static function buscarPorNome(string $nome)
    {
        $nome = '%' . $nome . '%';

        return self::where('nome', 'LIKE', $nome)->get();
    }
       
}
