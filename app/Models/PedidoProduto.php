<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    use HasFactory;
    protected $table = 'pedidos_produtos'; // coloquei isso pq por padrao o laravel entende que o model vai ser com +s no final (pedido_produtos), mas aqui eu coloquei pedidos_produtos
    protected $fillable = ['id', 'pedido_id', 'produto_id'];
}
