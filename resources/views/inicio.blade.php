<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="/css/inicio.css">
</head>

<body>
    <div class="container">
        <h1 class="titulo">Bienvenido</h1>
        <div class="transparent-div">
            <p>Crea tus listas de películas y series, marca, valora y sigue tu contenido favorito.</p>
        </div>
        <div class="button-container">
            <div class="button-wrapper">
                <a class="route" href="{{ route('login') }}">Login</a>
            </div>
            <div class="button-wrapper">
                <a class="route" href="{{ route('register') }}" class="btn btn-primary btn-red">Registro</a>
            </div>
        </div>
    </div>
</body>

</html>
