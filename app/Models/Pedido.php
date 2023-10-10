<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos(){
        // return $this->belongsToMany('App\Models\Produto', 'pedidos_produtos');
        return $this->belongsToMany('App\Models\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('created_at', 'id');
        /* parametros
         1º - modelo do rel NxN em relacao ao modelo que estamos implementando
         2º - é a tabela do auxiliar que armazena os registros
         3º - representa o nome da FK da tabela mapeada pelo modelo da tabela de relacionamento
         4º - representa o nome da FK da tabela mapeada pelo model utilizado no relacionamento
         */
    }
}
