<?php

namespace App\Http\Controllers;

use App\Models\Author;
<<<<<<< HEAD
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Exibe uma lista de autores
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    // Mostra o formulário para criar um novo autor
    public function create()
    {
        return view('authors.create');
    }

    // Armazena um novo autor no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:authors|max:255',
        ]);

        Author::create($request->all());

        return redirect()->route('authors.index')->with('success', 'Autor criado com sucesso.');
    }

    // Exibe um autor específico
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    // Mostra o formulário para editar um autor existente
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    // Atualiza um autor no banco de dados
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|unique:authors,name,' . $author->id . '|max:255',
        ]);

        $author->update($request->all());

        return redirect()->route('authors.index')->with('success', 'Autor atualizado com sucesso.');
    }

    // Remove um autor do banco de dados
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Autor excluído com sucesso.');
=======
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::with('books')->get();
        return view('authors.index', compact('authors'));
    }
    public function show($id)
    {
        $author = Author::with('books')->findOrFail($id);
        return view('authors.show', compact('author'));
    }
    public function create()
    {
        Gate::authorize('bibliotecario', User::class);
        return view('authors.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('bibliotecario', User::class);
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'birth_date' => 'nullable|date',
        ]);
         Author::create($validateData);

         return redirect()->route('authors.index')->with('success','Autor criado com sucesso!');
    }

    public function edit($id)
    {
        Gate::authorize('bibliotecario', User::class);
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {
        Gate::authorize('bibliotecario', User::class);
        $validatedData = $request->validate([
                    'name' => 'required|string|max:255',
                    'birth_date' => 'nullable|date',
                ]);

                $author = Author::findOrFail($id);
                $author->update($validatedData);

                return redirect()->route('authors.index')->with('success', 'Autor atualizado com sucesso!');

    }

    public function destroy($id)
    {
        Gate::authorize('bibliotecario', User::class);
        $author = Author::findOrFail($id);
                $author->delete();

                return redirect()->route('authors.index')->with('success', 'Autor excluído com sucesso!');

>>>>>>> f0adba67c137d49410ec2fac8259345f38ab6095
    }
}