<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsuarioResource;
use App\Models\Usuario;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function listAllUsers()
    {
        $userDatas = Usuario::all();

        return UsuarioResource::collection($userDatas);
    }

    public function listUser(string $id)
    {
        $userData = DB::table('usuarios')->where('id', $id)->get();

        return response()->json($userData);
    }

    public function createUser(Request $request)
    {
        $dataValidated = $request->validate([
            'nome' => 'string | required',
            'email' => 'string | required',
            'password' => 'string | required'
        ]);

        Usuario::create($dataValidated);

        return response()->json(['message' => 'Usuário criado com sucesso!'], 200);
    }

    public function updateUser(Request $request, Usuario $id)
    {
        $dataValidated = $request->validate([
            'nome' => 'string | required',
            'email' => 'string | required',
            'password' => 'string | required'
        ]);

        $id->fill($dataValidated);
        $id->save();

        return response()->json(['message' => 'Usuário atualizado com sucesso!'], 200);
    }

    public function deleteUser(Usuario $id){
        $id->delete();
        return response()->json(['message' => 'Usuário deletado com sucesso!'], 200);
    }
}
