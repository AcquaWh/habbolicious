@extends('layouts.plantilla')
@section('title','Equipo • ¡Bienvenido a la selva!')

@section('customStyles')
@endsection

@section('content')
<div class="contenido-inicio">
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-lg-8">
                    @foreach($equipo as $equip)
                    <div class="cuadro-staff">
                         <h3>{{$equip->nombre_rango}}</h3>
                         <div class="row">
                              @if(!$equip->datosnombre->isEmpty())
                              @foreach($equip->datosnombre as $datos)
                              <div class="col-lg-6">
                                   <div class="cuadro-staff-info">
                                        <div class="cuadro-staff-avatar">
                                             @if(!$datos->foto)
                                             <div style="background: url(/img/extra/avatar.png) no-repeat center;width: 62px;height: 62px;background-size: cover;border-radius: 50px;"></div>
                                             @else
                                             <div style="background: url(/img/avatar/{{$datos->foto}}) no-repeat center;width: 62px;height: 62px;background-size: cover;border-radius:50px;margin-top:13px;"></div>
                                             @endif
                                        </div>
                                        <div class="cuadro-staff-infoex">
                                             <strong>
                                                  <div class="user-style">
                                                       <a href="/perfil/{{$datos->name}}">
                                                            <span class="user-icon salt"></span> 
                                                            <span class="user-style slushy">{{$datos->name}}</span>
                                                            <br>Habbo: {{$datos->habbo}}
                                                       </a>
                                                  </div>
                                             </strong>
                                             <div class="cuadro-staff-texto">{{$datos->srol}}</div>
                                        </div>
                                        <div class="cuadro-staff-habbo">
                                             <img src="https://www.habbo.es/habbo-imaging/avatarimage?user={{$datos->habbo}}&amp;direction=4&amp;head_direction=4&amp;gesture=sml&amp;action=none&amp;size=b" onerror="this.src='/img/onerror_big.gif'">
                                        </div>
                                   </div>
                              </div>
                              @endforeach
                              @else 
                              <div class="col-lg-12">
                                   <div class="mt-3 alert alert-primary" role="alert">
                                        Aplica para este rango ahora mismo, anímate!
                                   </div>
                              </div>
                              @endif
                         </div>
                    </div>
                    @endforeach
               </div>
               <div class="col-lg-4">
                    <div class="contenedor-titulo" style="background-image: url(/img/extra/lpromo_cland_bundle.png);">
                         <h4>Twitter</h4>
                    </div>
                    <div class="contenedor-twitter">
                         <a class="twitter-timeline" data-height="530" href="https://twitter.com/HabboJungleFan?ref_src=twsrc%5Etfw">Twitter by HabboJungle</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection

@section('customScripts')
@endsection
