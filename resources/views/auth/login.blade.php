

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link type="text/css" href="{{ asset('fontawesome-free-5.15.3-web/css/all.css') }}" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
<div class="logo"><img src="/images/headeriscae.jpg" class="image"></div>
<div class="login-block">
{!! Form::open(['method' => 'POST','route' => 'login', 'class' => 'form-horizontal']) !!}
    <h1>Connexion</h1>
    <input type="text" value="" placeholder="Utilisateur" name="email" id="username" />
    <input type="password" value="" placeholder="Mot de Passe" name="password" id="password" />
    <button>Connexion</button>
{!! Form::close() !!}
</div>
<div class="footer"><b><h5>ISCAE-2021</h5></b></div>
</body>
</html>