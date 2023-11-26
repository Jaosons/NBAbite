<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function status() {
        return ['message' => 'ok!'];
    }

    public function create(Request $request) {

        try {
            $usuario = new Usuario();

            $usuario->nome = $request->nome;
            $usuario->sobrenome = $request->sobrenome;
            $usuario->nascimento = $request->nascimento;
            $usuario->cpf = $request->cpf;
            $usuario->email = $request->email;
            $usuario->senha = $request->senha;
            $usuario->genero = $request->genero;
            $usuario->estado = $request->estado;

            $usuario->save();

            return ['message' => 'OK'];
        } 
        catch (\Exception $erro) {
            return ['message' => 'erro', 'details' => $erro];
        }
    }

    public function read() {

        try {

            $usuario = Usuario::all();

            return $usuario;
        }
        catch (\Exception $erro) {
            return ['message' => 'erro', 'details' => $erro];
        }
    }

    public function select($id) {
        try {
        $usuario = Usuario::find($id);

        return $usuario;
        }
        catch (\Exception $erro) {
            return ['message' => 'erro', 'details' => $erro];
        }
    }

    public function update(Request $request, $id) {
        try {
            // Busca o usuário existente pelo ID
            $usuario = Usuario::find($id);
    
            // Se o usuário não existe, retorna uma resposta de erro
            if (!$usuario) {
                return response()->json(['error' => 'Usuário não encontrado'], 404);
            }
    
            // Mescla os valores existentes com os valores fornecidos no request
            $usuario->fill(array_filter($request->all()));
    
            // Salva as alterações no banco de dados
            $usuario->save();
    
            return response()->json(['message' => 'OK', 'data' => $usuario]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function delete($id) {
        try {
            
            $usuario = Usuario::find($id);

            $usuario->delete();

            return ['message' => 'OK'];

        }
        catch (\Exception $erro) {
            return ['message' => 'erro', 'details' => $erro];
        }
    }

    public function token() {
        return response()->json(['csrf-token' => csrf_token()]);
    }
}
