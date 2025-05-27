<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .search-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 320px;
            text-align: center;
        }
        .search-container h2 {
            margin-bottom: 20px;
            color: #333333;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333333;
        }
        .form-group input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .search-container button {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background-color: #ff5252;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .search-container button:hover {
            background-color:rgb(17, 184, 25);
        }
        .search-container a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: black;
            
        }
        .search-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <h2>Buscar Blog</h2>
        <form action="/blogs/buscar" method="GET">
            <div class="form-group">
                <label for="id"></label>
                <input type="number" id="id" name="id" required placeholder="Escribe el ID del blog">
            </div>
            <button type="submit">Buscar</button>
            @if(!is_null($blog ?? null))
                @if($blog)
                    <div style="margin-top:20px;">
                        <strong>ID BLOG:</strong> {{ $blog->id }}<br>
                        <strong>ID Usuario:</strong> {{ $blog->user->id ?? 'N/A' }}<br>
                        <strong>Nombre Usuario:</strong> {{ $blog->user->name ?? 'Desconocido' }}<br>
                        <strong>Contenido:</strong> {{ $blog->content }}
                    </div>
                @else
                    <div style="margin-top:20px; color: red;">
                        Blog no encontrado.
                    </div>
                @endif
            @endif
        </form>
        <a href="/posts/create">Volver a la lista de blogs</a>
    </div>
</body>
</html>