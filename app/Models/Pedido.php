<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'cliente_id'];

     public function cliente(){
         return $this->belongsTo("App\Models\Cliente");
     }    

     public function produtos(){
        // return $this->belongsToMany("App\Models\Produto", "pedidos_produtos", );

        //Quando Muda o nome dos modelos, Ex: de Produto para Item
        return $this->belongsToMany("App\Models\Item", "pedidos_produtos", "pedido_id", "produto_id");

        /* PARAMETROS
            1 - Modelo do relacionamento N pra N que estamos implementando Ex:App\Models\Item
            2 - É a Tabela auxiliar que armazena os regiatros de relacionamento Ex:pedidos_produtos
            3 - Representa o nome da FK Mapeada pelo model na tabela de relacionamento Ex:pedido_id
            4 - Representa o nome da FK mapeada pelo model utilizado no relacionamento que estamos implementando Ex:produto_id
        */
    }   

}
