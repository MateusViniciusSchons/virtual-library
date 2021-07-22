@extends('base/head')
@include('book.partials.empty-list')
@include('book.partials.messages')

@section('content')
<section class="page-content">
        @yield('messages')
        <h1 class="title">Livros da Biblioteca</h1>

        @if(count($books) > 0)
            <div class="books">
                @foreach ($books as $book) 
                    <div class="card book-card-body" style="width: 90%;">
                        <div class="card-body book-card-body">
                            <h5 class="card-title book-title">{{$book->title}}</h5>
                            <h6 class="card-subtitle book-author mb-2 text-muted">Autor(a): {{$book->author}}</h6>
                            <p class="card-text book-company">Editora: {{$book->publishing_company}}.</p>
                            <p class="card-text book-pages-count">Possui {{$book->pages_count}} páginas.</p>
                            <div class="links-section">
                                <a href="{{ route('books.show', ['slug' => $book->slug]) }}" class="card-link see-more-button">Ver mais</a>
                                <div class="options-group">
                                    <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="card-link change-button">Alterar</a>
                                    
                                    <!-- Abrir janela de confirmação para deletar -->
                                    <a type="button" class="card-link delete-button" data-bs-toggle="modal" data-bs-target="#modal-{{$book->title}}">
                                        Deletar
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-{{$book->title}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Deletar livro</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Tem certeza que deseja deletar o livro {{$book->title}}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">cancelar</button>
                                            <form action="{{ route('books.destroy', ['id' => $book->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger">Deletar</button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
            
        @else
            @yield('empty-list')
        @endif
        
        <div class="pagination-controls">
            @if(count($books) > 0)
                {{$books->links()}}
            @endif
                <a href="{{ route('books.create') }}" >
                    <button class="btn btn-success btn-new">
                        Cadastrar livro
                    </button>
                </a>
        </div>
        
    </section>
    
@stop