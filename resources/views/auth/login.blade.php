<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
                <div id="firstboxlogin">
                        <h1 id="logo_login">
                        <img src="/images/Glpi_ISCAE.jpg" alt="GLPI" title="GLPI" >
                        </h1>

                    <div id="text-login"></div>
                    <div id="boxlogin">
                        <form method="POST" action="{{ route('login') }}">
                            <div class="row">
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                    @csrf
                                    <div class="form-group">
                                        <i class="faw fa fa-user"></i>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Identifiant" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <i class="faw fa-lock"></i>
                                        <input type="password" placeholder="Mot de Passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group" id="login_input">
                                   <input type="submit" id="input" value=" {{ __('Envoyer') }}" name="submit" class="submit">
                                </div>
                                </div>
                                <div class="col-lg-4"></div>
                            </div>
                        </form>
                    </div>
                    <div id="display-login"></div>
          </div>
</body>
</html>
