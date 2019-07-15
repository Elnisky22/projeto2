@extends('form')

@section('title') - Adicionar Livro @endsection

@section('formulario')
Adicionar Livro
</div>
<div class="card-body">
    <form method="POST" action="{{ route('book.store') }}">
        @csrf
        Título: <input type="text" name="title" class="form-control" required/>
        <br>
        Autor: <input type="text" name="author" class="form-control" required/>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Adicionar</button>
            <a href="/home" class="btn btn-primary"> Voltar</a>
        </div>
    </form>
@endsection