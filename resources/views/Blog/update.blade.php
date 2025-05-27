<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar entrada de blog</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; }
        .container { max-width: 600px; margin: 40px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 0 10px #eee; }
        label { font-weight: bold; }
        input[type="text"], textarea {
            width: 100%; padding: 8px; margin-bottom: 16px; border-radius: 4px; border: 1px solid #ccc;
        }
        button {
            background: #ffd54f; color: black; padding: 10px 24px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer;
        }
        button:hover { background:rgb(200, 231, 61); }
        a { margin-left: 16px; color: #555; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Actualizar entrada de blog</h2>
        <form action="{{ route('posts.update', $blog->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $blog->title) }}" required>

            <label for="content">Contenido:</label>
            <textarea id="content" name="content" required rows="6">{{ old('content', $blog->content) }}</textarea>

            <button type="submit">Actualizar</button>
            <a href="{{ route('posts.create') }}">Cancelar</a>
        </form>
    </div>
</body>
</html>
