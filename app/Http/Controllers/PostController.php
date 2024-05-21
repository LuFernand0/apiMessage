<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function listAllPosts()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
    }

    public function listPost(Post $id)
    {

        $post = $id->load('comments.user');
        return new PostResource($post);
        
    }

    public function createPost(Request $request)
    {
        $dataValidated = $request->validate([
            'titulo' => 'required',
            'corpo' => 'required',
            'usuario_id' => 'required'
        ]);
        
        Post::create($dataValidated);

        return response()->json(['message' => 'Post criado com sucesso!'], 200);
    }

    public function updatePost(Request $request, Post $id)
    {
        $dataValidated = $request->validate([
            'titulo' => 'required',
            'corpo' => 'required',
            'usuario_id' => 'required'
        ]);

        $id->fill($dataValidated)
        ->save();

        return response()->json(['message' => 'Post atualizado com sucesso!'], 200);
    }

    public function deletePost(Post $id)
    {
        $id->delete();
        return response()->json(['message' => 'Post excluido com sucesso!'], 200);
    }
}
