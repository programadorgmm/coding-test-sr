<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class UsuarioController extends Controller
{

    /**
     * Exibe todos usuários cadastrados na tabela
     * @return string
     */
    public function index()
    {
        return Usuario::all()->toJson();
    }


    /**
     * Insere dados na tabela
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objUsuario = Usuario::query()->where('email',$request->email)->get()->first();
        if($objUsuario) {
            return response()->json(['error' => 'true', 'mensagem' => 'e-mail ja existente']);
        } else {
            $usuario = new Usuario();
            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->senha = $request->senha;
            $usuario->save();
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
        return Usuario::findOrFail($id)->toJson();
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
        $request->validate([
            'nome'=>'required',
            'senha'=>'required'
        ]);

        $usuario = Usuario::find($id);
        if($usuario) {
                $usuario->nome = $request->nome;
                $usuario->senha = $request->senha;
                $usuario->save();
                return response()->json(['error' => 'false', 'mensagem' => 'Usuario atualizado com sucesso']);
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
        $usuario = Usuario::find($id);
        if($usuario) {
            $usuario->delete();
            return response()->json(['error' => 'false', 'mensagem' => 'Usuario deletado com sucesso']);
        } else {
            return response()->json(['error' => 'true', 'mensagem' => 'Não foi possivel encontrar o IDz']);
        }
    }
}
