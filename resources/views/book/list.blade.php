@extends('base/head')
@section('content')

    @foreach ($books as $book) 
        <p> Livro: {{$book->title}}</p>
        @endforeach
        {{$books->links()}}
@stop