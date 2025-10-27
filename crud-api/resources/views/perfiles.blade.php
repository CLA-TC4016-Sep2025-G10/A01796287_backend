<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Perfiles</title>
</head>
<body>
    <h1>Lista de Perfiles</h1>

    <ul>
        @foreach($perfiles as $perfil)
            <li>
                <strong>{{ $perfil->nombre }}</strong> — {{ $perfil->correo }}  
                ({{ $perfil->telefono ?? 'sin teléfono' }})
            </li>
        @endforeach
    </ul>
</body>
</html>
