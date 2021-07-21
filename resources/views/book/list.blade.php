<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual</title>
</head>
<body>
    @foreach ($books as $book) 
    <p> Livro: {{$book->title}}</p>
    @endforeach
    {{$books->links()}}
</body>
</html>