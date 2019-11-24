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
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     <title>@yield('title')</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet"/>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet"/>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
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
                              @if (Auth::check())
                              <li class="nav-item">
                                   <div class="dropdown">
                                        @if (!$fotousuario->foto)
                                        <button class="nav-link ini-habbo" id="menu-usuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><div class="ico-usuario" style="background-image:url(/img/extra/avatar.png);"></div>{{Auth::user()->name}}</button>
                                        @else
                                        <button class="nav-link ini-habbo" id="menu-usuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><div class="ico-usuario" style="background-image:url(/img/avatar/{{$fotousuario->foto}});"></div>{{Auth::user()->name}}</button>
                                        @endif
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menu-usuario">
                                             <a class="dropdown-item" href="{{route('perfil',Auth::user()->name)}}">Perfil</a>
                                             <a class="dropdown-item" href="{{route('perfil.edit',Auth::user()->id)}}">Editar Perfil</a>
											@if($roles)
                                             @if($roles->id_rol <= 13)
                                             <a class="dropdown-item" href="{{route('admin.index')}}">Panel de admin</a>
                                             @endif
									   @endif
                                             <form action="{{route('logout')}}" method="POST">
                                                  @csrf
                                                  <button type="submit" class="dropdown-item ini-habbo">Cerrar sesión</button>
                                             </form>
									   		
                                        </div>
                                   </div>
                              </li>
                              @else
                              <li class="nav-item">
                                   <button id="iniciarhabbo" class="nav-link ini-habbo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><div class="ico-iniciar"></div>Iniciar</button>
                              </li>
                              @endif
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
                                        <a href="{{ route('register') }}">Regístrate aquí</a>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-6 pad-iniciar">
                         <div class="formulario-habbo">
                              <form id="iniciarsesion" method="POST" action="{{ route('login') }}">
                                   @csrf
                                   <div class="form-group">
                                        <span>Iniciar sesión</span>
                                   </div>
                                   <div class="form-group">
                                        <label for="email" class="col-form-label">{{ __('Correo') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        <small id="mensajeinicio"></small>
                                        @error('email')
                                             <small>Comprueba sí el correo es correcto o contraseña</small>
                                        @enderror
                                   </div>
                                   <div class="form-group">
                                        <label for="password" class="col-form-label">{{ __('Contraseña') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          
                                        @error('password')
                                             <small>Comprueba sí la contraseña es correcta</small>
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
     <main role="main" class="flex-shrink-0">
          <div class="principal">
               <!-- Contenido principal -->
               <div class="fondo pag-seccion">
               <div class="globos"></div>
               <div class="container">
               <div class="row">
                    <div class="col-lg-6">
                         <div class="slider-noticias">
                              <div class="owl-carousel owl-theme">
                                   <div class="item" style="background-image:url(//images.habbo.com/web_images/habbo-web-articles/ny_large_promo.png);"><h4>Estamos en construcción</h4><p>Arreglando problemas técnicos, pronto volveremos.</p></div>
                                   <div class="item" style="background-image:url(//images.habbo.com/web_images/habbo-web-articles/lpromo_house18_gen.png);"><h4>Estamos enfriando tu postre</h4><p>Arreglando problemas técnicos, pronto volveremos.</p></div>
                                   <div class="item" style="background-image:url(//images.habbo.com/c_images/web_promo/lpromo_Star_Lounge.png);"><h4>Estamos creando dulces</h4><p>Arreglando problemas técnicos, pronto volveremos.</p></div>
                                   <div class="item" style="background-image:url(//images.habbo.com/web_images/habbo-web-articles/lpromo_UAloyaltycrowns.png);"><h4>Crea un nuevo mundo</h4><p>Arreglando problemas técnicos, pronto volveremos.</p></div>
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-6">
                         <div class="radio">
                              <div class="row">
                                   <div class="col-lg-8">
                                        <div class="menu-ra row">
                                             <div class="col-lg-12">
                                                  <div class="titulo-radio">
                                                       <span><i class="fas fa-user"></i></span> Fernanda Cruz
                                                  </div>
                                                  <div class="cancion-radio">
                                                       <span><i class="fas fa-music"></i></span> Skrillex & Alvin Risk - Try It Out
                                                  </div>
                                                  <div class="menu-radio">
                                                       <div class="dj"><i class="fas fa-heart"></i> 0 likes</div>
                                                       <div class="play"><i class="fas fa-play"></i></div>
                                                       <div class="stop"><i class="fas fa-stop"></i></div>
                                                       <div class="enviar-peticion"><i class="fas fa-envelope"></i></div>
                                                       <div class="volumen"><div id="slider"></div></div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-lg-4">
                                        <div class="avatar-radio">
                                             <div class="oyentes">Oyentes: 2 habbos</div>
                                             <div class="avatar"></div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     @yield('content')
     </main>
     <footer class="footer mt-auto">
          <div class="container">
               <div class="row">
                    <div class="col-lg-3 text-left m-auto">
                         <img class="habbolicious" src="/img/logo.png" alt=""/>
                    </div>
                    <div class="col-lg-9">
                    <p class="mapa"><a href="{{route('index')}}">Inicio</a> / <a href="{{route('noticias')}}">Noticias</a> / <a href="{{route('blogs')}}">Blog</a> / <a href="{{route('catalogo')}}">Catálogo</a> / <a href="{{route('eventos')}}">Eventos</a> / <a href="{{route('equipo')}}">Equipo</a> / <a href="{{route('vacantes')}}">Vacantes</a> / <a href="{{route('utilidades')}}">Utilidades</a> / <a href="{{route('normas')}}">Normas</a> / <a href="{{route('terminos')}}">Términos</a> /<br></p>
                         <span class="habboli">©2019, Habbolicious<br></span>
                         <span>Habbolicious no está afiliada a, respaldada, promocionada o aprobada específicamente por Sulake Oy o sus Afiliados. De acuerdo a la Política de Webs fans de Habbo, Habbolicious puede utilizar las marcas comerciales y otras propiedades intelectuales de Habbo.</span>
                    </div>
               </div>
          </div>
     </footer>
     <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="https://kit.fontawesome.com/4ad22adeec.js"></script>
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" type="text/javascript"></script>
     <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
     <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
     @yield('customscripts')
     <script src="/js/main.js" type="text/javascript"></script>
     @error('email')
          <script>
               $("#iniciar-sesion").css("width","100%");
          </script>
     @enderror
</body>
</html>