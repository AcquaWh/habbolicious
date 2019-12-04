@extends('layouts.plantilla')
@section('title','Noticias • Detalles Noticia')

@section('customstyles')
@endsection

@section('content')
<div class="contenido-inicio">
          <div class="container">
               <div class="row justify-content-center">
                    <div class="col-lg-8 mt-3">
                         <div class="card">
                              <div class="contenedor-detalles">
                                   <div class="detalles">
                                        <span class="titulo">{{$noticias->titulo}}</span><br>
                                        <span class="descripcion">{{$noticias->descripcion}}</span>
                                   </div>
                                   @auth
                                   <button class="megusta btn btn-danger"><i class="far fa-heart"></i> 0</button>
                                   @else 
                                   <button class="btn btn-danger megusta"><i class="far fa-heart"></i> 0</button>
                                   @endauth
                              </div>
                              <div class="banner-noticia" style="background-image:url('/img/portada/{{$noticias->portada}}');"></div>
                              <div class="detalles-noticias">
                                   <div class="card-body row">   
                                        <div class="col-lg-12">
                                             {!!$noticias->cuerpo!!}
                                        </div>
                                        <div class="col-lg-12">
                                             <hr>
                                             <div class="detalles-footer">
                                                  <span class="autor"><i class="fas fa-user"></i> {{$noticias->name}}</span>
                                                  <span class="hora"><i class="far fa-clock"></i> {{$noticias->created_at->diffForHumans()}}</span>
                                                  <span class="comentarios"><i class="far fa-comment-dots"></i> {{$cuentacomentarios}} comentarios</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         @auth
                         <div class="publicar-comentario">
                              <form method="POST" action="{{route('noticomentario.store',$noticias->id)}}" class="row">
                                   @csrf
                                   <div class="col-lg-10">
                                        <textarea class="form-control" name="comentario" placeholder="Escribe tu comentario" rows="3"></textarea>
                                   </div>
                                   <div class="col-lg-2">
                                        <button type="submit" class="btn btn-primary enviarcomentario mb-2"><i class="far fa-paper-plane"></i> Enviar</button>
                                   </div>
                              </form>
                         </div>
                         @else 
                         <br>
                         <div class="alert alert-danger" role="alert">
                              Debes iniciar sesión primero para comentar esta publicación!
                         </div>
                         @endauth
                         @if(Session::has('error'))
                              <div class="alert alert-danger show" role="alert">
                              <strong>Error:</strong> {{Session::get('error')}}
                              </div>
                         @endif
                         @if(Session::has('exito'))
                              <div class="alert alert-success show" role="alert">
                              <strong>Acción exitosa:</strong> {{Session::get('exito')}}
                              </div>
                         @endif
                         @if(!$comentarios->isEmpty())
                         @foreach($comentarios as $comentario)
                         <div class="comentario">
                              <div class="cuenta">
                                   @if(!$comentario->foto)
                                   <a href="{{route('perfil',$comentario->name)}}"><div class="avatarcomentario" style="background-image:url(/img/extra/avatar.png);"></div></a>
                                   @else 
                                   <a href="{{route('perfil',$comentario->name)}}"><div class="avatarcomentario" style="background-image:url(/img/avatar/{{$comentario->foto}});"></div></a>
                                   @endif
                             
                                   <div class="detallesusuario">
                                        <span>
                                             <h1>{{$comentario->name}}</h1>
                                             <h2>{{$comentario->created_at->diffForHumans()}}</h2>
                                        </span>
                                   </div>
                              </div>
                              <div class="contenido">
                                   {{$comentario->cuerpo}}
                              </div>
                         </div>
                         @endforeach
                         @else 
                         <div class="alert alert-info" role="alert">
                              Se ha publicado ningún comentario, anímate a ser el primero!
                         </div>
                         @endif
                    </div>
                    <div class="col-lg-4 mt-3">
                         <div class="contenedor-titulo" style="background-image: url(/img/extra/lpromo_inventory_badges.png?w=760);">
                              <h4>Últimas placas</h4>
                         </div>
                         <div class="contenedor-placas">
                              @foreach($habbo['data'] as $placa)
                              <div class="placas" style="background-image: url({{ $placa['image'] }});" data-toggle="tooltip" data-placement="top" title="{{ $placa['name'] }}"></div>
                              @endforeach
                         </div>
                         <div class="contenedor-titulo" style="background-image: url(/img/extra/lpromo_cland_bundle.png);">
                              <h4>Twitter</h4>
                         </div>
                         <div class="contenedor-twitter">
                              <a class="twitter-timeline" data-height="330" href="https://twitter.com/HabboLiciousES?ref_src=twsrc%5Etfw">Twitter por Habbolicious</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection

@section('customscripts')
@endsection
