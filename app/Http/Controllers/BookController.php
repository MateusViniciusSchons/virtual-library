<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Models\Book;
    use Illuminate\Support\Facades\DB;

    class BookController extends controller {
        public function index() {
            $books = DB::table('books')->simplePaginate(6);
            return view('book.list', [
                'books' => $books
            ]);
        }
    }