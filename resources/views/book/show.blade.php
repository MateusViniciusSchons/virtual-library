@extends('base/head')
@include('book.partials.messages')
@section('content')
    @yield('messages')
    <section class="page-content">
        <div class="book-details card">
            <h1 class="book-details-title">Detalhes do Livro</h1>

            <span class="book-details-property"><strong>Título:</strong> {{$book->title}}</span> 

            <span class="book-details-property"><strong>Autor(a):</strong> {{$book->author}}</span>
            
            <span class="book-details-property"><strong>Editora:</strong> {{$book->publishing_company}}</span>

            <span class="book-details-property"><strong>Nº de páginas:</strong> {{$book->pages_count}}</span>
            <div class="book-details-links-section">
                <a href="{{ route('books.list') }}" class="btn btn-light btn-goback">Voltar</a>
                <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="card-link change-button">Editar</a>

                <!-- Abrir janela de confirmação para deletar -->
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal">
                    Deletar
                </a>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </section>
@stop