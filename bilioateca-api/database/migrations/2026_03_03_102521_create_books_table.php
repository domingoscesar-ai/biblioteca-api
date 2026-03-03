<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('isbn')->unique();
            $table->text('descricao')->nullable();
            $table->foreignId('author_id')->constrained('authors', 'id')->cascadeOnDelete();
            $table->string('genero')->nullable();
            $table->date('published_at')->nullable();
            $table->integer('total_copias')->default(1);
            $table->integer('copias_avalidas')->default(1);
            $table->string('imagem_capa')->nullable();
            $table->decimal('price', 8,2)->nullable();
            $table->enum('status', ['ativo', 'inativo'])->default('ativo');
            $table->timestamps();

            # Performance
            $table->index(['titulo', 'author_id']);
            $table->index('isbn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
