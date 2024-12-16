<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Lista de Libros</h1>

        <form method="GET" action="{{ route('books.index') }}">
            <div>
                <input type="text" name="search" placeholder="Buscar por título o autor" value="{{ request('search') }}">
                <button type="submit" class="btn">Buscar</button>
            </div>
            <div>
                <label for="available">Mostrar solo disponibles:</label>
                <input type="checkbox" id="available" name="available" value="1" {{ request('available') ? 'checked' : '' }}>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Género</th>
                    <th>Año</th>
                    <th>Disponible</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>{{ $book->available ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn">Editar</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="/" class="btn">Regresar</a>
    </div>
</body>
</html>
