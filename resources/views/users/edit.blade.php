<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
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
        .edit-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        .edit-container h2 {
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
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .edit-container button {
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
        .edit-container button:hover {
            background-color: #45a049;
        }
        .edit-container a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #4CAF50;
        }
        .edit-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <h2>Editar Usuario</h2>
        <form action="/usuarios/{{ $user->id }}/Actualizar" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required placeholder="Ejemplo: Juan Pérez">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required placeholder="Ejemplo: correo@dominio.com">
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Nueva Contraseña (opcional)">
            </div>
            <button type="submit">Actualizar</button>
        </form>
        <a href="/usuarios">Volver a la lista de usuarios</a>
    </div>
</body>
</html>