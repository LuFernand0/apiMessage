<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComentarioResource;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function listAllComments()
    {
        $comments = Comentario::all();
        return ComentarioResource::collection($comments);
    }

    public function createComment(Request $request)
    {
        $comment = $request->validate([
            'comentario' => 'required',
            'post_id' => 'required',
            'usuario_id' => 'required',
        ]);

        Comentario::create($comment);

        return response()->json(['message'=> 'comentário criado com sucesso'], 200);
    }

    public function updateComment(Request $request, Comentario $id)
    {
        $comment = $request->validate([
            'comentario' => 'required',
            'post_id' => 'required',
            'usuario_id' => 'required',
        ]);

        $id->fill($comment)
        ->save();
        return response()->json(['message'=> 'comentário atualizado com sucesso'], 200);
    }

    public function deleteComment(Comentario $id)
    {
        $id->delete();
        return response()->json(['message'=> 'comentário deletado com sucesso'], 200);
    }
}
