@extends('base/head')
@section('content')

    @foreach ($books as $book) 
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$book->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$book->author}}</h6>
                <p class="card-text">Publicado por {{$book->publishing_company}}</p>
                <p class="card-text">Possui {{$book->pages_count}} páginas</p>
                <a href="#" class="card-link">Ver mais</a>
                <a href="#" class="card-link">Alterar</a>
                <a href="#" class="card-link">Deletar</a>
            </div>
        </div>
    @endforeach
    <div class="pagination-controls">
        {{$books->links()}}
    </div>
@stop