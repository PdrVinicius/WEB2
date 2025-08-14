@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <h1 class="my-4">Lista de Autores</h1>

    <a href="{{ route('authors.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus"></i> Adicionar Autor
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($authors as $author)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $author->name }}</td>
                    <td>
                        <!-- Visualizar -->
                        <a href="{{ route('authors.show', $author) }}" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i> Visualizar
                        </a>

                        <!-- Editar -->
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil"></i> Editar
                        </a>

                        <!-- Excluir -->
                        <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este autor?')">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum autor encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
=======
    <div class="container">
        <h1>Lista de Autores</h1>
        @if(auth()->check() && auth()->user()->role != 'cliente')
        <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Adicionar Novo Autor</a>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->birth_date }}</td>
                        <td>
                            <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info">Ver</a>
                            @if(auth()->check() && auth()->user()->role != 'cliente')
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este autor?')">Excluir</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
>>>>>>> f0adba67c137d49410ec2fac8259345f38ab6095
@endsection