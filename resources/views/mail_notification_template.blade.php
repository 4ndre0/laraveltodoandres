<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notificación de registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 40px 0;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.08);
        }
        h2 {
            color: #22223b;
            margin-bottom: 20px;
            text-align: center;
        }
        p {
            font-size: 16px;
            color: #444;
            margin-bottom: 20px;
            text-align: center;
        }
        .btn {
            display: inline-block;
            background-color: #b3e0ff;
            color: #222;
            padding: 14px 28px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 16px;
            border: 1px solid #90caf9;
            margin-top: 10px;
            transition: background 0.2s;
        }
        .btn:hover {
            background-color: #90caf9;
            color: #111;
        }
        .footer {
            margin-top: 30px;
            font-size: 13px;
            text-align: center;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>¡Hola, {{ $user->name }}!</h2>
        <p>Gracias por registrarte. Para activar tu cuenta, haz clic en el siguiente botón:</p>
        <div style="text-align: center;">
            <a href="{{ url('/validar-cuenta/' . $user->remember_token) }}" class="btn">Validar cuenta</a>
        </div>
        <p>Si no reconoces esta acción, puedes ignorar este correo.</p>
        <div class="footer">
            © {{ date('Y') }} Tu Aplicación. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>