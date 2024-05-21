<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'password'
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class, 'usuario_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comentario::class, 'usuario_id', 'id');
    }
}
