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

            $usuario = Usuario::find($id);

            $usuario->nome = $request->nome;
            $usuario->sobrenome = $request->sobrenome;
            $usuario->nascimento = $request->nascimento;
            $usuario->cpf = $request->cpf;
            $usuario->email = $request->email;
            $usuario->senha = $request->senha;
            $usuario->genero = $request->genero;
            $usuario->estado = $request->estado;

            $usuario->save();

            return ['message' => 'OK', 'data' => $request->all()];

        }
        catch (\Exception $erro) {
            return ['message' => 'erro', 'details' => $erro];
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
}
