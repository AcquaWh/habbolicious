@extends('layouts.plantilla')
@section('title','Noticias • ¡Bienvenido a la selva!')

@section('customStyles')
@endsection

@section('content')
<div class="contenido-inicio">
     <div class="container">
          <div class="row ">
          <div class="col-lg-8">
               <div class="contenedor-titulo" style="background-image: url(/img/extra/noticias_habbo.png);">
                    <div class="ico-seccion-noticias"></div>
                    <h4>Todas nuestras noticias</h4>
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
               <div class="contenedor-noticias">
                    {{ $noticias->links() }}
               </div>
          </div>
          <div class="col-lg-4">
               <div class="contenedor-titulo" style="background-image: url(/img/extra/lpromo_cland_bundle.png);">
                    <h4>Twitter</h4>
               </div>
               <div class="contenedor-twitter">
                    <a class="twitter-timeline" data-height="530" href="https://twitter.com/HabboJungleFan?ref_src=twsrc%5Etfw">Twitter by HabboJungle</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
               </div>
               <div class="contenedor-titulo" style="background-image: url(/img/extra/lpromo_inventory_badges.png?w=760);">
                    <h4>Últimas placas</h4>
               </div>
               <div class="contenedor-placas">
                    @foreach($habbo['badges'] as $placa)
                    <div class="placas" style="background-image: url({{ $placa['url_habbo'] }});" data-toggle="tooltip" data-placement="top" title="{{ $placa['name'] }}"></div>
                    @endforeach
               </div>
          </div>
     </div>
</div>
@endsection

@section('customScripts')
@endsection
