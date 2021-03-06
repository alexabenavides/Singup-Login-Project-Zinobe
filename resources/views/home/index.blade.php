<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
    <link rel="stylesheet" href="{{ router()->getCurrentUrl() }}/resources/css/style.css">
</head>
<body>
<div class="login-wrap">
    <div class='alert alert-danger' id="error_div" style="display: none">


        <p>Debes corregir los siguientes errores:</p>
        <ul id="errors"></ul>
    </div>
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                                                                                 class="tab">Ingresar</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>

        <div class="login-form">
            <form id="login-form" class="sign-in-htm form" action="{{ router()->getCurrentUrl() }}/User/login"
                  method="POST">
                <div class="group">
                    <label for="email" class="label">Email</label>
                    <input type="email" name="email" placeholder="email" id="email" class="input">
                </div>
                <div class="group">
                    <label for="password" class="label">Contraseña</label>
                    <input data-type="password" name="password" placeholder="Contraseña" id="password" class="input">
                </div>
                <div class="group">
                    <input id="check" type="checkbox" class="check" checked>
                    <label for="check"><span class="icon"></span> Mantenerme conectado</label>
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Ingresar">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <a href="#forgot">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
            <form id="sign-up-form" class="sign-up-htm form" action="{{ router()->getCurrentUrl() }}/User/signup"
                  method="POST">

                <div class="group">
                    <label for="name" class="name">Nombre y Apellido</label>
                    <input id="name" name="name" type="text" class="input">
                </div>
                <div class="group">
                    <label for="document" class="document">Número de Documento</label>
                    <input id="document" name="document" type="text" class="input">
                </div>
                <div class="group">
                    <label for="country" class="label">País</label>
                    <select id="country" name="country" class="select">
                        <option value=''>Seleccionar</option>
                        @foreach($countries as $country)
                            <option value='{{$country['Code']}}'>{{$country['Name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="group">
                    <label for="email2" class="label">Email</label>
                    <input id="email2" name="email" type="text" class="input">
                </div>
                <div class="group">
                    <label for="password2" class="label">Password</label>
                    <input id="password2" name="password" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Registrarse">
                </div>
                <div class="foot-lnk">
                    <label for="tab-1">¿Ya estás registrado?</label>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="{{ router()->getCurrentUrl() }}/resources/js/scriptFunctions.js"></script>
</html>
