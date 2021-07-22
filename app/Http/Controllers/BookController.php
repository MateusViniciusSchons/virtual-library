<?php
    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use App\Models\Book;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use Illuminate\Routing\Redirector;
    use Illuminate\Support\Str;

    class BookController extends controller {
        public function index() {
            $books = DB::table('books')->simplePaginate(6);
            return view('book.list', [
                'books' => $books
            ]);
        }

        public function create() {
            return view('book.create');
        }

        public function store(Request $request) {
            $validated = $request->validate([
                'título' => 'required|max:255',
                'autor' => 'required|max:255',
                'editora' => 'required|max:255',
                'páginas' => 'required|numeric|integer',
            ]);

            $title = $request->input('título');
            $author = $request->input('autor');
            $publishingCompany = $request->input('editora');
            $pagesCount = $request->input('páginas');
            $slug = Str::of($title)->slug('-');
            try {

                $results = DB::select("SELECT count(id) AS slugs_count FROM books WHERE slug LIKE :slug", ['slug' => $slug."%"]);
                $slugsCount = $results[0]->slugs_count;

                if($slugsCount > 0) {
                    $slug = $slug."-$slugsCount";
                }
                DB::insert("INSERT INTO books (title, author, publishing_company, pages_count, slug) VALUES (?, ?, ?, ?, ?)",
                [$title, $author, $publishingCompany, $pagesCount, $slug]);

                return redirect()->route('books.list')->with('success-message', 'Livro criado!');

            } catch(\Illuminate\Database\QueryException $ex) {
                return redirect()->route('books.list')->with('error-message', 'Não foi possível criar o livro, tente novamente!');
            }
        }

        public function edit($id) {
            try {
                $results = DB::select("SELECT * FROM books WHERE id = ? LIMIT 1", [$id]);
                $book = $results[0];
                return view('book.edit', ['book' => $book]);
            } catch(\Illuminate\Database\QueryException $ex) {
                return redirect()->route('books.list')->with('error-message', 'Não foi possível encontrar o livro!');
            }
        }

        public function update(Request $request, $id) {
            $validated = $request->validate([
                'título' => 'required|max:255',
                'autor' => 'required|max:255',
                'editora' => 'required|max:255',
                'páginas' => 'required|numeric|integer',
            ]);

            $title = $request->input('título');
            $author = $request->input('autor');
            $publishingCompany = $request->input('editora');
            $pagesCount = $request->input('páginas');
            $slug = Str::of($title)->slug('-');
            try {

                $results = DB::select("SELECT count(id) AS slugs_count FROM books WHERE slug LIKE :slug", ['slug' => $slug."%"]);
                $slugsCount = $results[0]->slugs_count;

                if($slugsCount > 0) {
                    $slug = $slug."-$slugsCount";
                }

                DB::update("UPDATE books SET title = ?, author = ?, publishing_company = ?, pages_count = ?, slug = ? WHERE id = ?",
                [$title, $author, $publishingCompany, $pagesCount, $slug, $id]);

                return redirect()->route('books.list')->with('success-message', 'Livro alterado!');

            } catch(\Illuminate\Database\QueryException $ex) {
                return redirect()->route('books.list')->with('error-message', 'Não foi possível alterar o livro, tente novamente!');
            }
        }

        
    }