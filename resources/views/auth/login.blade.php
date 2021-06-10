<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel='stylesheet' type='text/css' href="{{asset('css/login.css')}}">
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

