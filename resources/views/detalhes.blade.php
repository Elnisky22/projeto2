@extends('layouts.app')

@section('title') - Detalhes @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detalhes do Livro
                </div>
                <div class="card-body">
                    Título: <input type="text" name="title" class="form-control" value="{{$book->title}}" readonly/>
                    <br>
                    Autor: <input type="text" name="author" class="form-control" value="{{$book->author}}" readonly/>
                    <br>
                    Quem trouxe: <input type="text" name="user" class="form-control" value="{{$book->user}}" readonly/>
                    <br>
                    Data de recebimento: <input type="text" name="created_at" class="form-control" value="{{ $book->created_at->format('d/m/Y')}}" readonly/>
                    <br>
                    <div class="form-group">
                        <a href="/home" class="btn btn-primary"> Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection