@extends('layouts.app')

@section('title') - Biblioteca @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header navbar-nav">
                    <li class="nav-item"> Livros </li>
                    <li class="nav-item ml-auto"> <a href=" {{ route('book.create') }}">Adicionar Livro</a> </li>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Dono</th>
                            <th>Data de Cadastro</th>
                            <th>Ações</th>
                        <tr>
                        @forelse ($books as $b)
                        <tr>
                            <td> {{ $b->title}} </td>
                            <td> {{ $b->author}} </td>
                            <td> {{ $b->user}} </td>
                            <td> {{ $b->created_at->format('d/m/Y')}} </td>
                            <td>
                                <form method="PUT" action="{{ route('book.edit', $b->id) }}">
                                    @csrf
                                    <button type="submit" class="btn">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('book.destroy', $b->id) }}">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="btn">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            Ainda não há livros cadastrados.
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
