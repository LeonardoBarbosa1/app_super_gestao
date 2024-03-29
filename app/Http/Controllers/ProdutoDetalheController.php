<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
use App\Models\ItemDetalhe;
use Illuminate\Http\Request;
use App\Models\Unidade;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view("app.produto_detalhe.create", ["unidades" => $unidades ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        echo "Cadastro realizado com sucesso!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                                       //with() está fazendo um Eager Loading(Carregamento ansioso) de item
       $produto_detalhe = ItemDetalhe::with(["item"])->find($id);
        $unidades = Unidade::all();
        return view("app.produto_detalhe.edit", ["produto_detalhe" => $produto_detalhe, "unidades" => $unidades ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\ProdutoDetalhe  $produto_detalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProdutoDetalhe  $produto_detalhe)
    {
        $produto_detalhe->update($request->all());
        echo "Produto Atualizado com sucesso!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
