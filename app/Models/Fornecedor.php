<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use League\CommonMark\Extension\Table\Table;

class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Fornecedor agora passa a ser fornecedores
    protected $table = 'fornecedores';
    
    //permitindo que inserir dados
    protected $fillable = ['nome', 'site','uf','email'];

    public function produtos(){
        return $this->hasMany("App\Models\Item", "fornecedor_id", "id");
        //return $this->hasMany("App\Models\Item");
    }

}
