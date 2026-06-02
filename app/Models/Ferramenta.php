<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ferramenta extends Model
{
    protected $fillable = [
        'categorias_id',
        'nome','marca',
        'modelo',
        'material_cabo',
        'tamanho_chave',
        'tensao_eletrica',
        'peso',
        'quanti_estoque',
        'estoque_min'
    ];

    // Metodo para retornar o caminho completo da imagem
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

}
