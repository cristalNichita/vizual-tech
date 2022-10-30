<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    @if(count($books) > 0)
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Authors</th>
                <th scope="col">Publisher</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td>{{ $book->title }}</td>
                    <td>
                        @foreach($book->authors as $author)
                            <div>{{ $author->title }}</div>
                        @endforeach
                    </td>
                    <td>
                        @foreach($book->publishers as $publisher)
                            <div>{{ $publisher->title }}</div>
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <h1>No results</h1>
    @endif
</div>
</body>
</html>
