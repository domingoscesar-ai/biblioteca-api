<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::with('books')->paginate(10);
        
        // Esta aqui é a forma normal para o response da api.
        // return response()->json([
        //     'author' => $authors,
        //     'message' => 'Authors Fetched with success'
        // ], 200);
        return AuthorResource::collection($authors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $author = Author::create($request->validated());

        // Esta aqui é a forma normal para o response da api.
        // return response()->json([
        //     'author' => $author
        // ]);

        // O Resource é para mostrar apenas informações que importão para quem vai consumir a api.
        return new AuthorResource($author);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $author = Author::find($author);
        return new AuthorResource($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAuthorRequest $request, Author $author)
    {
        $author->update($request->validated());

        return new AuthorResource(($author));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return response()->json([
            'message' => 'Data was deleted successfully'
        ]);
    }
}
