<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Exibe todos usuários cadastrados na tabela
     * @return string
     */
    public function index()
    {
        return Pedido::all()->toJson();
    }


    /**
     * Insere dados na tabela
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objPedido = Pedido::query()->where('email',$request->email)->get()->first();
        if($objPedido) {
            return response()->json(['error' => 'true', 'mensagem' => 'e-mail ja existente']);
        } else {
            $pedido = new Pedido();
            $pedido->save($request->all());
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
        return Pedido::findOrFail($id)->toJson();
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


        $pedido = Pedido::find($id);
        if($pedido) {
            $pedido->nome = $request->nome;
            $pedido->email = $request->email;
            $pedido->senha = $request->senha;
            $pedido->save();
            return response()->json(['error' => 'false', 'mensagem' => 'Pedido atualizado com sucesso']);
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
        $pedido = Pedido::findorFail($id);
        $pedido->delete();
        return response()->json(['error' => 'false', 'mensagem' => 'Pedido deletado com sucesso']);
    }
}
