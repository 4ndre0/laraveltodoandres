<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group textarea {
            height: 200px;
        }
        .form-group button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    @php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp
    <div class="container">
        <h2>Crear nueva entrada de blog</h2>
        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Contenido:</label>
                <textarea id="content" name="content" required></textarea>
            </div>
          <div class="form-group" style="display: flex; align-items: center; gap: 16px;">
    <button type="submit">Publicar entrada</button>
    <a href="/usuarios" style="
        display: inline-block;
        background-color: #ffd54f;
        color: #222;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 4px;
        font-weight: bold;
        text-decoration: none;
        transition: background 0.2s, color 0.2s;
    ">
        Regresar a lista de usuarios
    </a>
    <a href="/blogs/buscar" style="
        display: inline-block;
        background-color: #ff5252;
        color: #222;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 4px;
        font-weight: bold;
        text-decoration: none;
        transition: background 0.2s, color 0.2s;
    ">
        Buscar
    </a>
</div>
         </form>
        <!-- Lista de blogs publicados -->
        <h2>Entradas publicadas</h2>
@if($blogs->count())
   <ul style="list-style: none; padding: 0;">
    @foreach($blogs as $blog)
    <li style="margin-bottom: 24px; border-bottom: 1px solid #eee; padding-bottom: 12px;">
        <div style="font-size: 13px; color: #888; margin-bottom: 4px;">
            <strong>Usuario:</strong> {{ $blog->user->name ?? 'Desconocido' }} |
            <strong>ID Usuario:</strong> {{ $blog->user->id ?? 'N/A' }} |
            <strong>ID BLOG:</strong> {{ $blog->id }}
        </div>
        <h3 style="margin: 0 0 8px 0;">{{ $blog->title }}</h3>
        <div style="color: #555;">{{ $blog->content }}</div>
        <div style="font-size: 13px; color: #888; margin-top: 6px;">
            Publicado el {{ $blog->created_at->format('d/m/Y H:i') }}
        </div>
        <div style="margin-top: 10px;">
            <a href="{{ route('posts.edit', $blog->id) }}" 
               style="background: #ffd54f; color: #333; padding: 6px 14px; border-radius: 4px; text-decoration: none; margin-right: 8px; font-weight: bold;">
                Actualizar
            </a>
            <form action="{{ route('posts.destroy', $blog->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        style="background-color: #f44336;; color: #fff; padding: 6px 14px; border: none; border-radius: 4px; font-weight: bold; cursor:pointer;"
                        onclick="return confirm('¿Seguro que deseas eliminar este blog?')">
                    Eliminar
                </button>
            </form>
        </div>
    </li>
@endforeach
</ul>
@else
    <p>No hay entradas publicadas.</p>
@endif
  
    </div>
</body>
</html>
    </div>
</body>
</html>
