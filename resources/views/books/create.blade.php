<!DOCTYPE html>
<html>
<head>
    <title>Registrar Libro</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Registrar Nuevo Libro</h1>

        @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div>
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="author">Autor:</label>
                <input type="text" id="author" name="author" required>
            </div>
            <div>
                <label for="genre">Género:</label>
                <input type="text" id="genre" name="genre">
            </div>
            <div>
                <label for="publication_year">Año de Publicación:</label>
                <input type="number" id="publication_year" name="publication_year" min="1800" max="{{ date('Y') }}">
            </div>
            <div>
                <label for="available">Disponible:</label>
                <input type="hidden" name="available" value="0">
                <input type="checkbox" id="available" name="available" value="1" checked>
            </div>
            <div>
                <button type="submit">Registrar Libro</button>
            </div>
        </form>
    </div>
</body>
</html>
