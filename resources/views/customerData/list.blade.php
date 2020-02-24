<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>

</head>
<body>
<a href="{{ router()->getCurrentUrl() }}/User/List">Regresar</a>
<a href="{{ router()->getCurrentUrl() }}/User/Logout">Salir</a>
<div>
    <h1>Busqueda de usuarios {{ isset($_SESSION["search_value"])?$_SESSION["search_value"]:""}}</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Cargo</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Documento</th>
            <th>Número de Teléfono</th>
            <th>País</th>
            <th>Estado</th>
            <th>Ciudad</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{$customer['id']}}</td>
                <td>{{$customer['job_title']}}</td>
                <td>{{$customer['email']}}</td>
                <td>{{$customer['first_name']}}</td>
                <td>{{$customer['last_name']}}</td>
                <td>{{$customer['document']}}</td>
                <td>{{$customer['phone_number']}}</td>
                <td>{{$customer['country']}}</td>
                <td>{{$customer['state']}}</td>
                <td>{{$customer['city']}}</td>
            </tr>
        @endforeach
        </tbody>

    </table>
</div>

</body>
</html>