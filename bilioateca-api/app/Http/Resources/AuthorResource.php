<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome' => strtoupper($this->nome),
            'bio' => $this->bio,
            'nacionalidade' => strtolower($this->nacionalidade),
            'books' => $this->when($this->relationLoaded('books'), $this->books->count()),
        ];
    }
}
