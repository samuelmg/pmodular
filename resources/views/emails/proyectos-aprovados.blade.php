<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<body>
    <h2>Proyecto Aprovado</h2>

    <p>Estimando(a) {{ $proyecto->user->name }}</p>
    <p>
        Se le notifica que su proyecto <b>{{ $proyecto->nombre_proyecto }}</b>
        fue aprovado.
    </p>
</body>
</html>
