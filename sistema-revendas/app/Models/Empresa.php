<?php

namespace App\Models;

use App\Models\MovimentosEstoque;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;
        
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = ['tipo', 'nome', 'razao_social', 'documento', 'ie_rg', 'nome_contato', 'celular', 'email', 'telefone', 'cep', 'logradouro', 'bairro', 'cidade', 'estado', 'observacao'];
        
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
     * Cria acessor chamado text para serialização
     *
     * @return void
     */
    public function getTextAttribute(): string
    {
        return \sprintf(
            '%s (%s)',
            $this->attributes['nome'],
            $this->attributes['razao_social']
        );
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
     * retorna empresas por tipo
     *
     * @param  mixed $tipo
     * @param  mixed $quantidade
     * @return AbstractPaginator
     */
    public static function todasPorTipo(string $tipo, string $busca, int $quantidade=10): AbstractPaginator
    {
        return self::where('tipo', $tipo)
        ->where(function($q) use($busca) {
            $q->orWhere('nome', 'LIKE', "%$busca%")
                ->orWhere('razao_social', 'LIKE', "%$busca%")
                ->orWhere('nome_contato', 'LIKE', "%$busca%");
        })
        ->paginate($quantidade);
    }

    /**
     * Busca empresa por nome e tipo
     *
     * @param string $nome
     * @param string $tipo
     * @return void
     */
    public static function buscarPorNomeTipo(string $nome, string $tipo)
    {
        $nome = '%' . $nome . '%';

        return self::where('nome', 'LIKE', $nome)
                        ->where('tipo', $tipo)
                        ->get();
    }

    /**
    * Busca empresa com id e suas relações
     *
     * @param  mixed $id
     * @return void
     */
    public static function buscaPorId(int $id)
    {
        return self::with([
                'movimentosEstoque' => function($query) {
                    $query->latest()->take(5);
                }, 
                'movimentosEstoque.produto'
            ])
            ->findOrFail($id);
    }
}
