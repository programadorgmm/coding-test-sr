<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
 * Exibe todos usuários cadastrados na tabela
 * @return string
 */
    public function index()
    {
        return Produto::all()->toJson();
    }


    /**
     * Insere dados na tabela
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objProduto = Produto::query()->where('email',$request->email)->get()->first();
        if($objProduto) {
            return response()->json(['error' => 'true', 'mensagem' => 'e-mail ja existente']);
        } else {
            $produto = new Produto();
            $produto->save($request->all());
            return response()->json(['error' => 'false', 'mensagem' => 'Usuário cadastrado com sucesso.']);
        }

    }

    /**
     * Exibe as informações de um id específico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Produto::findOrFail($id)->toJson();
    }

    /**
     * Atualiza as informações de um id específico
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {


        $produto = Produto::find($id);
        if($produto) {
            $produto->nome = $request->nome;
            $produto->email = $request->email;
            $produto->senha = $request->senha;
            $produto->save();
            return response()->json(['error' => 'false', 'mensagem' => 'Produto atualizado com sucesso']);
        } else {
            return response()->json(['error' => 'true', 'mensagem' => 'Usuário não encontrado']);
        }


    }

    /**
     * Deleta um id específico
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $produto = Produto::findorFail($id);
        $produto->delete();
        return response()->json(['error' => 'false', 'mensagem' => 'Produto deletado com sucesso']);
    }
}
