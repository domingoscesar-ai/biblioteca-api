<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo',
        'isbn',
        'descricao',
        'author_id',
        'genero',
        'published_at',
        'total_copias',
        'copias_avalidas',
        'price',
        'imagem_capa',
        'status'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function isAvailable(): bool
    {
        return $this->copias_avalidas > 0;
    }

    public function returnBook(): void
    {
        if($this->copias_avalidas < $this->total_copias) {
            $this->increment('copias_avalidas');
        }
    }
}
