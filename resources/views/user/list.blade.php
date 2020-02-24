<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
    <link rel="stylesheet" href="{{ router()->getCurrentUrl() }}/resources/css/style.css">
</head>
<body>
<a href="{{ router()->getCurrentUrl() }}/User/Logout">Salir</a>
<div class="login-wrap">
    <h1>Busqueda</h1>
    <form method="post" class="customer-form login-form" action="{{ router()->getCurrentUrl() }}/CustomerData/Index">

        <div class="group">
            <input id="search" name="search" type="text" class="input" data-type="search"
                   placeholder="Email o Documento">
        </div>

        <div class="group">
            <input type="submit" class="button" value="Buscar">
        </div>


    </form>
</div>
</body>
</html>


