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
                         <div class="card-body row">
                              <div class="col-lg-12">
                                   {!!$noticias->cuerpo!!}
                              </div>
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
