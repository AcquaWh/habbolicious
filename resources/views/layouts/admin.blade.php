<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>@yield('title')</title>
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
          <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
          <script>
               WebFont.load({
               google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
               active: function() {
                    sessionStorage.fonts = true;
               }
               });
          </script>
		<link href="/vendors/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
          <link href="/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
		<link href="/vendors/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
		<link href="/vendors/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
		<link href="/vendors/vendors/flaticon/css/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="/vendors/vendors/metronic/css/styles.css" rel="stylesheet" type="text/css" />
		<link href="/vendors/vendors/fontawesome5/css/all.min.css" rel="stylesheet" type="text/css" />
		<link href="/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		@yield('customStyles')
	</head>
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-brand  m-brand--skin-dark ">
							<div class="m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="/" class="m-brand__logo-wrapper">
										<img width="140" src="/img/logo.png" />
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">
									<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
										<span></span>
									</a>
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
							<button class="m-aside-header-menu-mobile-close m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										@auth
										<span>Hola, {{Auth::user()->name}}</span>
										<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													@if (!$fotousuario->foto)
													<img src="/img/extra/avatar.png" class="m--img-rounded m--marginless" alt="" />
													@else 
													<img src="/img/avatar/{{$fotousuario->foto}}" class="m--img-rounded m--marginless" alt="" />
													@endif
												</span>
												<span class="m-topbar__username m--hide">{{Auth::user()->name}}</span>
											</a>
											<div class="m-dropdown__wrapper">
												<div class="m-dropdown__inner">
													@if (!$fotousuario->portada)
													<div class="portada m-dropdown__header m--align-center">
													@else
													<div class="m-dropdown__header m--align-center" style="background: url(/img/portada/{{$fotousuario->portada}}); background-size: cover;">
													@endif
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																@if (!$fotousuario->foto)
																<img src="/img/extra/avatar.png" class="m--img-rounded m--marginless" alt="" />
																@else 
																<img src="/img/avatar/{{$fotousuario->foto}}" class="m--img-rounded m--marginless" alt="" />
																@endif
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">{{Auth::user()->name}}</span>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__separator m-nav__separator--fit">
																</li>
																<li class="m-nav__item">
                                                                    				<form action="{{route('logout')}}" method="POST">
																		@csrf
																		<button type="submit" class="btn btn-primary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Cerrar sesion</button>
																	</form>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
										@else
										<li><a href="{{route('login')}}" class="noSubrayado">Ingresar</a></li>
										@endauth
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__item" aria-haspopup="true">
								<a href="{{route('admin.index')}}" class="m-menu__link ">
									<i class="m-menu__link-icon fas fa-home"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">Escritorio</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Secciones por rangos
								</h4>
								<i class="m-menu__section-icon fas fa-angle-double-right"></i>
							</li>
							@if(Auth::user()->id_rol == 4)
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon far fa-newspaper"></i><span class="m-menu__link-text">Reporteros</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true"><a href="{{route('admin.noticias')}}" class="m-menu__link "><span class="m-menu__link-text">Noticias</span></a></li>
									</ul>
								</div>
							</li>
							@endif
							@if(Auth::user()->id_rol == 8)
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon far fa-calendar-alt"></i><span class="m-menu__link-text">Eventos</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true"><a href="#" class="m-menu__link "><span class="m-menu__link-text">Agregar eventos</span></a></li>
									</ul>
								</div>
							</li>
							@endif
							@if(Auth::user()->id_rol == 5)
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-headphones-alt"></i><span class="m-menu__link-text">DJ</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true"><a href="#" class="m-menu__link "><span class="m-menu__link-text">Horario</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="#" class="m-menu__link "><span class="m-menu__link-text">Ver Peticiones</span></a></li>
									</ul>
								</div>
							</li>
							@endif
							@if(Auth::user()->id_rol == 2)
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-user-tie"></i><span class="m-menu__link-text">Coordinación</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true"><a href="#" class="m-menu__link "><span class="m-menu__link-text">Administrar DJs</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="#" class="m-menu__link "><span class="m-menu__link-text">Añadir DJ</span></a></li>
									</ul>
								</div>
							</li>
							@endif
							@if(Auth::user()->id_rol == 1)
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon far fa-newspaper"></i><span class="m-menu__link-text">Reporteros</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true"><a href="{{route('admin.noticias')}}" class="m-menu__link "><span class="m-menu__link-text">Noticias</span></a></li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon far fa-calendar-alt"></i><span class="m-menu__link-text">Eventos</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true"><a href="#" class="m-menu__link "><span class="m-menu__link-text">Agregar eventos</span></a></li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-headphones-alt"></i><span class="m-menu__link-text">DJ</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true"><a href="#" class="m-menu__link "><span class="m-menu__link-text">Horario</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="#" class="m-menu__link "><span class="m-menu__link-text">Ver Peticiones</span></a></li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-user-tie"></i><span class="m-menu__link-text">Coordinación</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true"><a href="#" class="m-menu__link "><span class="m-menu__link-text">Administrar DJs</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="#" class="m-menu__link "><span class="m-menu__link-text">Añadir DJ</span></a></li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon far fa-star"></i><span class="m-menu__link-text">Administración</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
								<div class="m-menu__submenu "><span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true"><a href="#" class="m-menu__link "><span class="m-menu__link-text">Personalizar web</span></a></li>
										<li class="m-menu__item " aria-haspopup="true"><a href="#" class="m-menu__link "><span class="m-menu__link-text">Rangos</span></a></li>
									</ul>
								</div>
							</li>
							@endif
							<li class="m-menu__item" aria-haspopup="true">
								<a href="{{route('index')}}" class="m-menu__link ">
									<i class="m-menu__link-icon fas fa-chevron-left"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">Regresar a la web</span>
										</span>
									</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					@yield('content')
				</div>
			</div>
		</div>
          <div id="m_scroll_top" class="m-scroll-top"><i class="la la-arrow-up"></i></div>
          
		<script src="/vendors/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="/vendors/popper.js/dist/umd/popper.js" type="text/javascript"></script>
		<script src="/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/vendors/js-cookie/src/js.cookie.js" type="text/javascript"></script>
		<script src="/vendors/moment/min/moment.min.js" type="text/javascript"></script>
		<script src="/vendors/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
		<script src="/vendors/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
		<script src="/vendors/wnumb/wNumb.js" type="text/javascript"></script>
		<script src="/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		@yield('customScripts')
	</body>
</html>