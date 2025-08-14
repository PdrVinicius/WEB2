@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <h1 class="my-4">Detalhes do Autor</h1>

    <div class="card">
        <div class="card-header">
            Autor: {{ $author->name }}
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $author->id }}</p>
            <p><strong>Nome:</strong> {{ $author->name }}</p>
        </div>
    </div>

    <a href="{{ route('authors.index') }}" class="btn btn-secondary mt-3">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>
=======
    <div class="container">
        <h1>{{ $author->name }}</h1>
        <p><strong>Data de Nascimento:</strong> {{ $author->birth_date }}</p>
        <h3>Livros:</h3>
        <ul>
            @foreach ($author->books as $book)
                <li>{{ $book->title }}</li>
            @endforeach
        </ul>
        <a href="{{ route('authors.index') }}" class="btn btn-primary">Voltar à Lista</a>
        @if(auth()->check() && auth()->user()->role != 'cliente')
        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este autor?')">Excluir</button>
        </form>
        @endif
    </div>
>>>>>>> f0adba67c137d49410ec2fac8259345f38ab6095
@endsection