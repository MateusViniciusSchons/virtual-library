@extends('base/head')
@section('content')
    <section class="page-content">
        <form action="{{ route('books.update', ['id' => $book->id]) }}" method="POST" class="book-form card">
            @csrf
            @method('PUT')
            <h1 class="book-form-title">Editar Livro</h1>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Título:</span>
                <input type="text" name="título" class="form-control @error('título') is-invalid @enderror" placeholder="Digite o título do livro" aria-describedby="inputGroup-sizing-default" value="@if(old('título')){{old('título')}}@else{{$book->title}}@endif">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Autor(a):</span>
                <input type="text" name="autor" class="form-control @error('autor') is-invalid @enderror" placeholder="Digite o nome do(a) Autor(a)" aria-describedby="inputGroup-sizing-default" value="@if(old('autor')){{old('autor')}}@else{{$book->author}}@endif">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Editora:</span>
                <input type="text" name="editora" class="form-control @error('editora') is-invalid @enderror" placeholder="Digite o nome da editora" aria-describedby="inputGroup-sizing-default" value="@if(old('editora')){{old('editora')}}@else{{$book->publishing_company}}@endif">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Nº de páginas:</span>
                <input type="number" name="páginas" class="form-control @error('páginas') is-invalid @enderror" placeholder="" aria-describedby="inputGroup-sizing-default" value="@if(old('páginas')){{old('páginas')}}@else{{$book->pages_count}}@endif">
            </div>
            <div class="buttons-group">
                <a href="{{ route('books.list') }}" class="btn btn-danger" >Cancelar</a>
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                        {{ $errors->first() }}
                </div>
            @endif
        </form>
    </section>
@stop