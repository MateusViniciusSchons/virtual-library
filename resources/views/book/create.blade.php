@extends('base/head')
@section('content')
    <section class="page-content">
        <form action="{{ route('books.store') }}" method="POST" class="book-form card">
            @csrf
            <h1 class="book-form-title">Cadastrar Livro</h1>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Título:</span>
                <input type="text" name="título" class="form-control @error('título') is-invalid @enderror" placeholder="Digite o título do livro" aria-describedby="inputGroup-sizing-default" value="{{ old('título') }}">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Autor(a):</span>
                <input type="text" name="autor" class="form-control @error('autor') is-invalid @enderror" placeholder="Digite o nome do(a) Autor(a)" aria-describedby="inputGroup-sizing-default" value="{{ old('autor') }}">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Editora:</span>
                <input type="text" name="editora" class="form-control @error('editora') is-invalid @enderror" placeholder="Digite o nome da editora" aria-describedby="inputGroup-sizing-default" value="{{ old('editora') }}">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Nº de páginas:</span>
                <input type="number" name="páginas" class="form-control @error('páginas') is-invalid @enderror" placeholder="" aria-describedby="inputGroup-sizing-default" value="{{ old('páginas') }}">
            </div>
            <div class="buttons-group">
                <a href="{{ route('books.list') }}" class="btn btn-danger" >Cancelar</a>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                        {{ $errors->first() }}
                </div>
            @endif
        </form>
    </section>
@stop