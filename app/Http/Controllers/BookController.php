<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

    $query = Book::query(); //consulta para el modelo

    if ($request->filled('search')) { //valida si no está vacio
        $query->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('author', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('available')) {
        $query->where('available', true);
    }

    $books = $query->get(); //obtiene los resultados

    return view('books.index', compact('books')); //devuelve la vista junto con los resultados
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mostrar el formulario
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Registro del libro
        $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string',
        'genre' => 'nullable|string',
        'publication_year' => 'nullable|integer|min:1800|max:' . date('Y'),
        'available' => 'boolean',
        ]);

        //Valida en caso de que no esté marcado la casilla de "Disponible"
        $validatedData['available'] = $request->has('available') ? $request->available : false;
    
        Book::create($validatedData); 

        return redirect('/')->with('success', 'Libro registrado con éxito'); 
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $book = Book::find($id);
        return view('books.edit', compact('book'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string',
            'genre' => 'nullable|string',
            'publication_year' => 'nullable|integer|min:1800|max:' . date('Y'),
            'available' => 'boolean',
        ]);

        $book = Book::find($id);
        $book->update($validatedData);
        return redirect('/books')->with('success', 'Libro actualizado con éxito');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $book = Book::find($id);
        $book->delete();
        return redirect('/books')->with('success', 'Libro eliminado con éxito');

    }
}
