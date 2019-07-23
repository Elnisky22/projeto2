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
                            <th>Ações</th>
                        <tr>
                        @forelse ($books as $b)
                        <tr>
                            <td> {{ $b->title}} </td>
                            <td> {{ $b->author}} </td>
                            <td><a href="{{ route('book.show', $b->id) }}" class="btn" style="background-color:#f0f0f0;color:black">Detalhes</a>
                                @if ($b->is_loaned)
                                    @if ($b->loaner_id == Auth::user()->id)
                                        <a href="{{ route('devolution', $b->id) }}" class="btn" style="background-color:#f0f0f0;color:black"> Devolver</a>
                                    @endif
                                @else
                                <a href="{{ route('loan', $b->id) }}" class="btn" style="background-color:#f0f0f0;color:black"> Emprestar</a>
                                @endif
                            </td>
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
