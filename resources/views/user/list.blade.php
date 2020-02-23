<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>User List</title>
</head>
<body>


<form class="border border-light p-5" method="post">

    <div class="text-center">
        <p class="h4 mb-4">Información de los usuarios</p>
    </div>

    <div class="group">
        <input data-type="search" name="search" placeholder="Email o Nombre"  id="search" class="input">
        @if(valid()->getMessageId('search')->countError())
            <div class="text-danger">{{valid()->getMessageId('search')->first()}}<br></div>
        @endif()
        <a href="../CustomerData/index/" class="btn btn-info" type="submit">Buscar</a>
    </div>



    <ul class="list-group">
        @foreach(valid()->messageList->allArray() as $k)
            <li class="list-group-item">{{$k}}</li>
        @endforeach
    </ul>
</form>
</body>
</html>

{{--
<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>User</th>
        <th>Title</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tickets as $ticket)
        <tr>
            <td>{{$ticket['IdTicket']}}</td>
            <td>{{$ticket['User']}}</td>
            <td>{{$ticket['Title']}}</td>
        </tr>
    @endforeach
    </tbody>

</table>--}}
