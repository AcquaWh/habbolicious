@extends('layouts.habbolicious')
@section('title','HabboJungle • ¡Bienvenido a la selva!')

@section('customstyles')
@endsection

@section('content')
<!-- Contenido -->
<div class="contenido-inicio">
     <div class="container">
          <div class="row">
               <div class="col-lg-8">
                    <div class="contenedor-titulo" style="background-image: url(/img/extra/noticias_habbo.png);">
                         <div class="ico-seccion-noticias"></div>
                         <h4>Últimas noticias</h4>
                         <p>Noticias y actualizaciones en Habbo y en todo el mundo.</p>
                    </div>
                    <div class="contenedor-noticias">
                         @if(!$noticias->isEmpty())
                         @foreach($noticias as $noticia)
                         <a href="{{route('noticias.show',$noticia->id)}}">
                              <div class="noticia">
                                   <div class="row">
                                        <div class="col-lg-9">
                                             <div class="noticia-texto">
                                                  <h4>{{$noticia->titulo}}</h4>
                                                  <p>{{$noticia->descripcion}}</p>
                                                  <div class="usuario-noticia"><i class="fas fa-user"></i> {{$noticia->name}}</div>
                                                  <div class="tiempo-noticia"><i class="far fa-calendar-alt"></i> {{$noticia->created_at->diffForHumans()}}</div>
                                             </div>
                                        </div>
                                        <div class="col-lg-3">
                                             <div class="noticia-img" style="background-image: url(/img/portada/{{$noticia->portada}});">
                                                  <div class="capa1">
                                                       <span><i class="far fa-comment-dots"></i> {{$noticia->cuenta}} Comentarios</span>
                                                       <span><i class="fas fa-heart"></i> 0 Me gusta</span>
                                                       <div class="usuario-noticia-img" style="background-image: url(https://www.habbo.es/habbo-imaging/avatarimage?&user={{$noticia->habbo}}&action=&direction=3&head_direction=3&img_format=png&gesture=&headonly=0&size=l);"></div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </a>
                         @endforeach
                         @else 
                         <div class="mt-3 alert alert-primary" role="alert">
                              No existe ninguna noticia aun
                         </div>
                         @endif
                    </div>
                    <div class="contenedor-titulo" style="background-image: url(/img/extra/lpromo_march18UA.png);">
                         <h4>Actividad reciente en blog</h4>
                    </div>
                    <div class="contenedor-blogs">
                         <div class="row">
                              @if(!$blogs->isEmpty())
                              @foreach($blogs as $blog)
                              <div class="col-lg-4">
                                   <div class="blog">
                                        <div class="img-blog" style="background-image: url();">
                                             <div class="capa1">
                                                  <div class="datos">
                                                       <div class="datos-img" style="background-image:url(https://www.habbo.es/habbo-imaging/avatarimage?user=0acqua0&direction=2&head_direction=3&gesture=sml&action=none&size=b);"></div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="cuadro-blog">
                                             <h4>Título</h4>
                                             <span><i class="fas fa-user"></i> <strong>0acqua0</strong></span>
                                             <span><i class="far fa-clock"></i> hace 1 día</span>
                                        </div>
                                   </div>
                              </div>
                              @endforeach
                              @else 
                              <div class="col-lg-12">
                                   <div class="mt-3 alert alert-primary" role="alert">
                                        No existe ningun post en el Blog
                                   </div>
                              </div>
                              @endif
                         </div>
                    </div>
               </div>
               <div class="col-lg-4">
                    <div class="contenedor-titulo" style="background-image: url(/img/extra/lpromo_cland_bundle.png);">
                         <h4>Twitter</h4>
                    </div>
                    <div class="contenedor-twitter">
                        <a class="twitter-timeline" href="https://twitter.com/HabboJungleFan?ref_src=twsrc%5Etfw">Tweets by HabboJungle</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                    <div class="contenedor-titulo" style="background-image: url(/img/extra/lpromo_inventory_badges.png?w=760);">
                         <h4>Últimas placas</h4>
                    </div>
                    <div class="contenedor-placas">
                         @foreach($habbo['badges'] as $placa)
                         <div class="placas" style="background-image: url({{ $placa['url_habbo'] }});" data-toggle="tooltip" data-placement="top" title="{{ $placa['name'] }}"></div>
                         @endforeach
                    </div>
                    <div class="contenedor-titulo" style="background-image: url(/img/extra/ff271d_lpromo_HCClub_Bundle.png);">
                         <h4>Eventos</h4>
                    </div>
                    <div class="contenedor-eventos">
                         @if(!$eventos->isEmpty())
                              <div class="evento">
                                   <div class="row">
                                        <div class="col-lg-4">
                                             <div class="evento-img" style="background-image:url();">
                                                  <div class="capa1"></div>
                                             </div>
                                        </div>
                                        <div class="col-lg-8">
                                             <div class="evento-cont">
                                                  <h4>Día de la Inauguración</h4>
                                                  <span><i class="far fa-clock"></i> Es hoy a las 8:00 <strong>hora española</strong></span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         @else
                         <div class="mt-3 alert alert-primary" role="alert">
                              No existe ningún evento actual
                         </div>
                         @endif
                    </div>
               </div>
          </div>
     </div>
    <a href="https://discord.gg/FbBteVbMPe" target="_blank">
    <div class="btn btn-dark floating-btn">
    <i class="icon fab fa-discord"></i>
    <div class="expanded">
      <span>
        <i class="far fa-comments"></i>¡Únete a nuestro Discord!</span>
    </div>
  </div>
</a>

</div>
</div>
@endsection

@section('customscripts')
@endsection
