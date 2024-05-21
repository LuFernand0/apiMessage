<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'comentario',
        'post_id',
        'usuario_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'id', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }
}
