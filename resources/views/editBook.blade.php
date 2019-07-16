@extends('form')

@section('title') - Editar Livro @endsection

@section('formulario')
</div>
<div class="card-body">
    <form method="POST" action="{{ route('book.update', $book->id) }}">
        @method('PUT')
        @csrf
        Título: <input type="text" name="title" class="form-control" value="{{$book->title}}" required/>
        <br>
        Autor: <input type="text" name="author" class="form-control" value="{{$book->author}}" required/>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="/home" class="btn btn-primary"> Voltar</a>
        </div>
    </form>
@endsection