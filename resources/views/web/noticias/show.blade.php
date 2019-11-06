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
                                   <div class="portadanoticia" style="background-image:url('/img/portada/{{$noticias->portada}}');"></div>
                                   <div class="detalles">
                                        <span class="titulo">{{$noticias->titulo}}</span><br>
                                        <span class="descripcion">{{$noticias->descripcion}}</span>
                                   </div>
                                   <a href="" class="megusta btn btn-danger"><i class="far fa-heart"></i> 0</a>
                              </div>
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
                                                  <span class="comentarios"><i class="far fa-comment-dots"></i> 0 comentarios</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="publicar-comentario">
                              <form class="row">
                                   <div class="col-lg-10">
                                        <textarea class="form-control" placeholder="Escribe tu comentario" rows="3"></textarea>
                                   </div>
                                   <div class="col-lg-2">
                                        <button type="submit" class="btn btn-primary enviarcomentario mb-2"><i class="far fa-paper-plane"></i> Enviar</button>
                                   </div>
                              </form>
                         </div>
                         <div class="comentario">
                              <div class="cuenta">
                                   <a href="{{route('perfil',$noticias->name)}}"><div class="avatarcomentario" style="background-image:url(//cdn.habtium.com/accounts/avatars/3a000e1572.gif);"></div></a>
                                   <div class="reaccion">
                                        <a href="">
                                             <i class="far fa-thumbs-up"></i> 2 Likes
                                        </a>
                                   </div>
                                   <div class="detallesusuario">
                                        <span>
                                             <h1>Miguel</h1>
                                             <h2>Hace 2 horas</h2>
                                        </span>
                                   </div>
                              </div>
                              <div class="contenido">
                                   Este es un comentario de prueba, aqui se veran los comentarios proximos
                              </div>
                         </div>
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
