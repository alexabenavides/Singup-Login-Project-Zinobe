<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
    <link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Ingresar</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Registrarse</label>
        <div class="login-form">
            <form class="sign-in-htm" action="User/login" method="POST">
                <div class="group">
                    <label for="email" class="label">Email</label>
                    <input type="email" name="email" placeholder="email"  id="email" class="input">
                    @if(valid()->getMessageId('email')->countError())
                        <div class="text-danger">{{valid()->getMessageId('Email')->first()}}<br></div>
                    @endif()
                </div>
                <div class="group">
                    <label for="password" class="label">Contraseña</label>
                    <input data-type="password" name="password" placeholder="Contraseña"  id="password" class="input">
                    @if(valid()->getMessageId('password')->countError())
                        <div class="text-danger">{{valid()->getMessageId('password')->first()}}<br></div>
                    @endif()
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
            <form class="sign-up-htm" action="User/signup" method="POST">
                <div class="group">
                    <label for="user" class="label">Email</label>
                    <input id="email" name="email" type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="password2" name="password2" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Confirmar Password</label>
                    <input id="pass" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Registrarse">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <label for="tab-1">¿Ya estás registrado?</label>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>
