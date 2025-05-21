<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
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
        .user-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
            position: relative;
        }
        .user-container h2 {
            margin-bottom: 20px;
            color: #333333;
        }
        .search-btn-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .search-btn {
            
            background: #fff;
            color: orange;
            padding: 8px 18px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }
      
        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .user-table th, .user-table td {
            border: 1px solid #cccccc;
            padding: 8px;
            text-align: center;
        }
        .user-table th {
            background-color: #f5f5f5;
            color: #333333;
        }
        .user-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .user-table a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .user-table a.eliminar {
            color: #e53935;
        }
        .user-table a.eliminar:hover {
            text-decoration: underline;
        }
        .user-table a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="user-container">
        <div class="logout-btn-container" style="position: absolute; top: 20px; left: 20px;">
            <a href="/logout" class="logout-btn" style="color: #007bff; font-weight: bold; text-decoration: none;">Cerrar sesión</a>
        </div>
        <div class="search-btn-container">
            <a href="/usuarios/buscar" class="search-btn">Buscar</a>
        </div>
        <h2>Listar Usuarios</h2>
        <table class="user-table">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th colspan="2">Acciones</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="/eliminar/usuario/{{ $user->id }}" class="eliminar">Eliminar</a></td>
                <td><a href="/usuarios/{{ $user->id }}/Actualizar">Actualizar</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>