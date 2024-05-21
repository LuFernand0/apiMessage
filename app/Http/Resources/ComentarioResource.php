<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComentarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'comentario' => $this->comentario,
            'usuario' => [
                'id' => $this->user->id,
                'nome' => $this->user->nome,
                'email' => $this->user->email
            ],
            'data_comentario' => $this->created_at
        ];
    }
}
