@extends('layouts.plantilla')
@section('title','Vacantes • ¡Bienvenido a la selva!')

@section('customstyles')
@endsection

@section('content')
<div class="contenido-inicio">
     <div class="container">
          <div class="row">
               <div class="col-lg-8">
                    <div class="contenedor-vacantes">
                         <h3><strong>Envía tu solicitud de Vacantes</strong></h3>
                         <p>¿Quieres pasarlo bien? Te ofrecemos nuevas experiencias en Habbojungle, podrás presenciar el crecimiento de esta gran comunidad. ¡Simplemente solicita a continuación y nos pondremos en contacto lo antes posible!</p>
                    </div>
                    <div class="contenedor-vacantes">
                         @if(Session::has('error'))
                         <div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
                         <strong>Error:</strong> {{Session::get('error')}}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                         </div>
                         @endif
                         @if(Session::has('exito'))
                         <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                         <strong>Acción exitosa:</strong> {{Session::get('exito')}}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                         </div>
                         @endif
                         @if($formulario->isEmpty())
                         <div class="mt-3 alert alert-primary" role="alert">
                              No hay disponibles nuevas vacantes en la fansite
                         </div>
                         @else 
                         @foreach($formulario as $form)
                         <h3><strong>{{$form->titulo}}</strong></h3>
                         <p>
                              {{$form->cuerpo}}
                              <br>
                              <button type="button" class="btn btn-rose" data-toggle="modal" data-target="#vacantes_{{$form->id}}">
                                   Aplicar para esta posición
                              </button>
                              @if(!Auth::check())
                              <div class="mt-3 alert alert-danger" role="alert">
                                   Dulcesito, necesitas iniciar sesión antes de aplicar
                              </div>
                              @endif
                         </p>
                         @auth
                         <div class="modal fade" id="vacantes_{{$form->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                   <div class="modal-content">
                                        <div class="modal-header">
                                             <h5 class="modal-title">Solicitud de vacante</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <i class="fas fa-times"></i>
                                             </button>
                                        </div>
                                        <form action="{{route('vacante.enviar')}}" method="post">
                                             @csrf
                                             <div class="modal-body">
                                                  <div class="form-group">
                                                       <label>{{$form->pregunta1}}</label>
                                                       <input type="text" class="form-control" name="pregunta1" placeholder="Escribe la respuesta" required maxlength="200">
                                                  </div>
                                                  <div class="form-group">
                                                       <label>{{$form->pregunta2}}</label>
                                                       <input type="text" class="form-control" name="pregunta2" placeholder="Escribe la respuesta" value="{{$form->titulo}}" required maxlength="200">
                                                  </div>
                                                  <div class="form-group">
                                                       <label>{{$form->pregunta3}}</label>
                                                       <input type="text" class="form-control" name="pregunta3" placeholder="Escribe la respuesta" required maxlength="200">
                                                  </div>
                                                  <div class="form-group">
                                                       <label>{{$form->pregunta4}}</label>
                                                       <input type="text" class="form-control" name="pregunta4" placeholder="Escribe la respuesta" required maxlength="200">
                                                  </div>
                                             </div>
                                             <div class="modal-footer">
                                                  <button type="submit" class="btn btn-enviar">Enviar solicitud</button>
                                             </div>
                                        </form>
                                   </div>
                              </div>
                         </div>
                         @endauth
                         @endforeach
                         @endif
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
</div>
@endsection

@section('customscripts')
@endsection
