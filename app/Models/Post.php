<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'corpo',
        'usuario_id',
    ];

    public function user()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comentario::class);
    }
}
