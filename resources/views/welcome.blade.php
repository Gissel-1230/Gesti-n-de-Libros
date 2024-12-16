<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Bienvenido a la Biblioteca</h1>
        </header>
        
        @if (session('success'))
            <div class="notification success">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <p>¿Que deseas hacer hoy?</p>
        <a href="/books/create" class="btn">Registrar un nuevo libro</a>
        <a href="/books" class="btn">Listar todos los libros</a>
    </div>
</body>
</html>
