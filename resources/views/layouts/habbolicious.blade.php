<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="apple-touch-icon" sizes="180x180" href="/img/favicons/apple-touch-icon.png">
     <link rel="icon" type="image/png" sizes="32x32" href="/img/favicons/favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="16x16" href="/img/favicons/favicon-16x16.png">
     <link rel="manifest" href="/img/favicons/site.webmanifest">
     <link rel="mask-icon" href="/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
     <meta name="msapplication-TileColor" content="#9f00a7">
     <meta name="msapplication-TileImage" content="/img/favicons/mstile-144x144.png">
     <meta name="theme-color" content="#ffffff">
     <title>@yield('title')</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet"/>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet"/>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link href="/css/styles.css" rel="stylesheet" type="text/css" />
     @yield('customstyles')
</head>
<body class="d-flex flex-column h-100">
     <header>
          <nav class="navbar navbar-expand-md fixed-top">
               <div class="container">
                    <a class="navbar-brand" href="{{route('index')}}">
                         <img class="habbolicious" src="/img/logo.png" alt=""/>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                         <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                         <ul class="navbar-nav ml-md-auto">
                              <li class="nav-item active">
                                   <a class="nav-link" href="{{route('index')}}"><div class="ico-inicio"></div>Inicio</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="{{route('noticias')}}"><div class="ico-noticias"></div>Noticias</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="{{route('blogs')}}"><div class="ico-blogs"></div>Blogs</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="{{route('loteria')}}"><div class="ico-loteria"></div>Lotería</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="{{route('catalogo')}}"><div class="ico-catalogo"></div>Catálogo</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="{{route('eventos')}}"><div class="ico-eventos"></div>Eventos</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="{{route('equipo')}}"><div class="ico-equipo"></div>Equipo</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="{{route('vacantes')}}"><div class="ico-vacantes"></div>Vacantes</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="{{route('utilidades')}}"><div class="ico-utilidades"></div>Utilidades</a>
                              </li>
                              <li class="nav-item">
                                   <button id="iniciarhabbo" class="nav-link ini-habbo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><div class="ico-iniciar"></div>Iniciar</button>
                              </li>
                         </ul>
                    </div>
               </div>
          </nav>
     </header>
     <div id="iniciar-sesion">
          <button id="cerrarhabbo" class="closebtn habbomodal"><i class="fas fa-times"></i></button>
          <div class="h-100">
               <div class="row justify-content-center h-100">
                    <div class="col-lg-6 pad-iniciar">
                         <div class="bg-iniciar-sesion">
                              <div class="row">
                                   <div class="col-lg-12">
                                        <img class="img-fluid" src="/img/extra/frank.png">
                                   </div>
                                   <div class="col-lg-12">
                                        <a href="{{ route('register') }}">Registrate aquí</a>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-6 pad-iniciar">
                         <div class="formulario-habbo">
                              <form method="POST" action="{{ route('login') }}">
                                   @csrf
                                   <div class="form-group">
                                        <span>Iniciar sesión</span>
                                   </div>
                                   <div class="form-group">
                                        <label for="email" class="col-form-label">{{ __('Correo') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          
                                        @error('email')
                                             <span class="invalid-feedback" role="alert">
                                                  <strong>Comprueba sí el correo es correcto.</strong>
                                             </span>
                                        @enderror
                                   </div>
                                   <div class="form-group">
                                        <label for="password" class="col-form-label">{{ __('Contraseña') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          
                                        @error('password')
                                             <span class="invalid-feedback" role="alert">
                                                  <strong>Comprueba sí la contraseña es correcta.</strong>
                                             </span>
                                        @enderror
                                   </div>
                                   <div class="form-group">
                                        <div class="form-check">
                                             <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          
                                             <label class="form-check-label" for="remember">
                                                  {{ __('Recuérdame') }}
                                             </label>
                                        </div>
                                   </div>
                                   <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary">
                                             {{ __('Iniciar sesión') }}
                                        </button>
          
                                        @if (Route::has('password.request'))
                                             <a class="btn btn-link" href="{{ route('password.request') }}">
                                                  {{ __('Olvidaste tu contraseña?') }}
                                             </a>
                                        @endif
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>
             
     @yield('content')
     <footer class="footer mt-auto">
          <div class="container">
               <div class="row">
                    <div class="col-lg-3 text-left m-auto">
                         <img class="habbolicious" src="/img/logo.png" alt=""/>
                    </div>
                    <div class="col-lg-9">
                         <p class="mapa"><a href="">Inicio</a> / <a href="">Noticias</a> / <a href="">Blog</a> / <a href="">Catálogo</a> / <a href="">Eventos</a> / <a href="">Equipo</a> / <a href="">Vacantes</a> / <a href="">Utilidades</a> / <a href="">Normas</a> / <a href="">Términos</a> /<br> <a href="">Contáctanos</a></p>
                         <span class="habboli">©2019, Habbolicious<br></span>
                         <span>Habbolicious no está afiliado, respaldado, patrocinado o aprobado específicamente por Sulake Suomi o sus afiliados. Habbolicious puede usar las marcas comerciales y otras propiedades intelectuales de Habbo, lo cual está permitido bajo la Política del sitio de fans de Habbo.</span>
                    </div>
               </div>
          </div>
     </footer>
     <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="https://kit.fontawesome.com/4ad22adeec.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" type="text/javascript"></script>
     @yield('customscripts')
     <script src="/js/main.js" type="text/javascript"></script>
</body>
</html>