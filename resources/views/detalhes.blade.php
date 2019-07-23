@extends('layouts.app')

@section('title') - Detalhes @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b>Detalhes do Livro</b>
                </div>
                <div class="card-body">
                    <label><b>Título:</b> {{$book->title}}</label>
                    <br>
                    <label><b>Autor:</b> {{$book->author}}</label>
                    <br>
                    <label><b>Quem trouxe:</b> {{$dono->name}}</label>
                    <br>
                    <label><b>Data de recebimento:</b> {{ $book->created_at->format('d/m/Y')}}</label>
                    <br>
                    <b>Emprestado:</b>
                    @if ($book->is_loaned) sim
                        <br>
                        <label><b>Para:</b> {{App\Http\Controllers\BookController::getLoaner($book->loaner_id)->name}}</label>
                        <br>
                        <label><b>Desde:</b> {{$book->loan_date->format('d/m/Y')}}</label>
                    @else não
                    @endif
                    <hr>
                    <div class="form-group">
                        <a href="/home" class="btn btn-primary"> Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //dd($book->is_loaned); ?>
@endsection