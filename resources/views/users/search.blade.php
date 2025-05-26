<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Usuario</title>
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
            width: 300px;
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
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .search-container button:hover {
            background-color: #45a049;
        }
        .search-container a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #4CAF50;
        }
        .search-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="search-container">
        <h2>Buscar Usuario</h2>
        <form action="/usuarios/buscar" method="GET">
            <!-- ...estilos y formulario como ya tienes... -->
            @if(!is_null($user))
                @if($user)
                    <div style="margin-top:20px;">
                        <strong>Usuario encontrado:</strong><br>
                        ID: {{ $user->id }}<br>
                        Nombre: {{ $user->name }}<br>
                        Email: {{ $user->email }}
                    </div>
                @else
                    <div style="margin-top:20px; color: red;">
                        Usuario no encontrado.
                    </div>
                @endif
            @endif
            <div class="form-group">
                <label for="id">ID del usuario:</label>
                <input type="number" id="id" name="id" required placeholder="Escribe el ID del usuario">
            </div>
            <button type="submit">Buscar</button>
        </form>
        <a href="/usuarios">Volver a la lista de usuarios</a>
    </div>
</body>
</html>