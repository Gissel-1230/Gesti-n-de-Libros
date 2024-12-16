<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Editar Libro</h1>


        <!-- Verifica si hay errores o no -->
        @if ($errors->any()) 
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" value="{{ $book->title }}" required>
            </div>
            <div>
                <label for="author">Autor:</label>
                <input type="text" id="author" name="author" value="{{ $book->author }}" required>
            </div>
            <div>
                <label for="genre">Género:</label>
                <input type="text" id="genre" name="genre" value="{{ $book->genre }}">
            </div>
            <div>
                <label for="publication_year">Año de Publicación:</label>
                <input type="number" id="publication_year" name="publication_year" value="{{ $book->publication_year }}" min="1800" max="{{ date('Y') }}">
            </div>
            <div>
                <label for="available">Disponible:</label>
                <input type="hidden" name="available" value="0">
                <input type="checkbox" id="available" name="available" value="1" {{ $book->available ? 'checked' : '' }}>
            </div>
            <div>
                <button type="submit">Actualizar Libro</button>
            </div>
        </form>
        <a href="{{ route('books.index') }}" class="btn">Regresar</a>
    </div>
</body>
</html>
