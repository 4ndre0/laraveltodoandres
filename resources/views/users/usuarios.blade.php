<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f8fa;
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .user-container {
            background: linear-gradient(135deg, #ffffff 80%, #e3f2fd 100%);
            padding: 40px 48px 32px 48px;
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(44, 62, 80, 0.12);
            width: 900px;
            max-width: 98vw;
            text-align: center;
            position: relative;
            transition: box-shadow 0.2s;
        }
        .user-container:hover {
            box-shadow: 0 10px 40px rgba(44, 62, 80, 0.18);
        }
        .user-container h2 {
            margin-bottom: 20px;
            color: #22223b;
            font-size: 2rem;
        }
        .search-btn-container {
            position: absolute;
            top: 24px;
            right: 24px;
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
            border: 1px solid orange;
            transition: background 0.2s, color 0.2s;
        }
        .search-btn:hover {
            background: orange;
            color: #fff;
        }
        .logout-btn-container {
            position: absolute;
            top: 24px;
            left: 24px;
        }
        .logout-btn {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
        }
        .logout-btn:hover {
            text-decoration: underline;
        }
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            margin-top: 18px;
        }
        .user-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
            table-layout: fixed;
            word-break: break-word;
        }
        .user-table th, .user-table td {
            border: 1px solid #e0e0e0;
            padding: 12px 8px;
            text-align: center;
            font-size: 1rem;
            white-space: nowrap;
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
            white-space: nowrap;
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
        /* Mensaje de éxito */
        .alert-success {
            padding: 14px 40px 14px 18px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100vw;
            max-width: 100%;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 2000;
            font-size: 1.1rem;
            box-sizing: border-box;
        }
        .alert-success .close-btn {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #155724;
            font-size: 1.3rem;
            font-weight: bold;
            background: none;
            border: none;
            cursor: pointer;
            outline: none;
        }
        @media (max-width: 1000px) {
            .user-container {
                width: 99vw;
                padding: 12px 2vw 12px 2vw;
            }
            .user-table {
                min-width: 600px;
            }
        }
        @media (max-width: 700px) {
            .user-table, .user-table th, .user-table td {
                font-size: 0.95rem;
                padding: 8px 2px;
            }
        }
    </style>
</head>
<body>
    @if (session('mensaje_correo'))
    <div class="alert-success" id="alert-success">
        {{ session('mensaje_correo') }}
        <button class="close-btn" onclick="document.getElementById('alert-success').style.display='none'">&times;</button>
    </div>
    @endif

    <div class="user-container">
        <div class="logout-btn-container">
            <a href="/logout" class="logout-btn">Cerrar sesión</a>
        </div>
        <div class="search-btn-container">
            <a href="/usuarios/buscar" class="search-btn">Buscar</a>
        </div>
        <h2>Listar Usuarios</h2>
        <div class="table-responsive">
            <table class="user-table">
                <tr>
                    <th style="width: 60px;">ID</th>
                    <th style="width: 180px;">Nombre</th>
                    <th style="width: 320px;">Correo</th>
                    <th colspan="2" style="width: 160px;">Acciones</th>
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
    </div>
</body>
</html>