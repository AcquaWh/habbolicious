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
     <link href="/css/styles.css" rel="stylesheet" type="text/css" />
     @yield('customstyles')
</head>
<body class="d-flex flex-column h-100">
     <header>
          <nav class="navbar navbar-expand-md fixed-top">
               <div class="container">
                    <a class="navbar-brand" href="#">
                         <img class="habbolicious" src="/img/logo.png" alt=""/>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                         <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                         <ul class="navbar-nav ml-md-auto">
                              <li class="nav-item active">
                                   <a class="nav-link" href="#"><div class="ico-inicio"></div>Inicio</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#"><div class="ico-noticias"></div>Noticias</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#"><div class="ico-blogs"></div>Blogs</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#"><div class="ico-loteria"></div>Lotería</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#"><div class="ico-catalogo"></div>Catálogo</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#"><div class="ico-eventos"></div>Eventos</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#"><div class="ico-equipo"></div>Equipo</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#"><div class="ico-vacantes"></div>Vacantes</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#"><div class="ico-utilidades"></div>Utilidades</a>
                              </li>
                              <li class="nav-item">
                                   <a class="nav-link" href="#"><div class="ico-iniciar"></div>Iniciar</a>
                              </li>
                         </ul>
                    </div>
               </div>
          </nav>
     </header>
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
     @yield('customscripts')
</body>
</html>