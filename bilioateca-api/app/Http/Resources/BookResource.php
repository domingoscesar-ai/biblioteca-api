<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'titulo' => $this->titulo,
            'isbn' => $this->isbn,
            'descricao' => $this->descriacao,
            'genero' => $this->genero,
            'published_at' => $this->published_at,
            'total_copias' => $this->total_copias,
            'copias_avalidas' => $this->copias_avalidas,
            'price' => $this->price,
            'imagem_capa' => $this->imagem_capa,
            'status' => $this->status,
            'is_available' => $this->isAvailable(),
            'author' => new AuthorResource($this->whenLoaded('author')),
        ];
    }
}
