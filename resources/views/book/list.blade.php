@extends('base/head')
@section('content')
    <section class="page-content">
        <h1 class="title">Livros da Biblioteca</h1>

        <div class="books">
            @foreach ($books as $book) 
                <div class="card book-card-body" style="width: 90%;">
                    <div class="card-body book-card-body">
                        <h5 class="card-title book-title">{{$book->title}}</h5>
                        <h6 class="card-subtitle book-author mb-2 text-muted">Autor(a): {{$book->author}}</h6>
                        <p class="card-text book-company">Editora: {{$book->publishing_company}}.</p>
                        <p class="card-text book-pages-count">Possui {{$book->pages_count}} páginas.</p>
                        <div class="links-section">
                            <a href="#" class="card-link see-more-button">Ver mais</a>
                            <div class="options-group">
                                <a href="#" class="card-link change-button">Alterar</a>
                                <a href="#" class="card-link delete-button">Deletar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="pagination-controls">
            {{$books->links()}}
            <button type="button" class="btn btn-success btn-new">Cadastrar livro</button>
        </div>

    </section>
    
@stop