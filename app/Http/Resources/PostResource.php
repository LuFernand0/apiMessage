<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'titulo' => $this->titulo,
            'corpo' => $this->corpo,
            'autor' => [
                'id' => $this->user->id,
                'nome' => $this->user->nome,
                'email' => $this->user->email
            ],
            'data' => $this->created_at
        ];
    }
}
