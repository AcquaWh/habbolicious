@extends('layouts.plantilla')
@section('title','Perfil • ¡Endulza tu Habbo vida!')

@section('customstyles')
@endsection

@section('content')
<div class="contenido-inicio">
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-lg-12 mt-3">
                    @if($infoperfil->portada)<div class="portada" style="background-image:url(/img/portada/{{$infoperfil->portada}});">@else<div class="portada"> @endif
                         @if($infoperfil->foto)<div class="avatarfoto" style="background-image:url(/img/avatar/{{$infoperfil->foto}});"></div>@else<div class="avatarfoto" style="background-image:url(/img/extra/avatar.png);"></div>@endif
                         <h3 class="avatarnombre">{{$usuario_perfil->name}}</h3>
                         <button id="likesperfil" class="megusta btn btn-danger"><i class="far fa-thumbs-up"></i> {{$likes}} likes</button>
                    </div>
               </div>
               <div class="col-lg-12">
                    <div class="cuadro-perfil">
                         <div class="container">
                              <div class="row mt-5">
                                   <div class="col-lg-6">
                                        @if($infoperfil->sobremi)
                                        <div class="descripcion">
                                             <h5><i class="pr-3 fas fa-user"></i>Acerca de mí</h5>
                                             {{$infoperfil->sobremi}}
                                        </div>
                                        @else 
                                        <div class="descripcion">
                                             <h5><i class="pr-3 fas fa-user pb-3"></i>Acerca de mí</h5>
                                             No tiene ninguna descripción personal
                                        </div>
                                        @endif
                                        <div class="datos">
                                             <h5><i class="fas fa-address-book pr-3 pb-3"></i>Datos personales</h5>
                                             <div class="seccion">
                                                  <i class="pr-3 far fa-clock"></i>Miembro {{$usuario_perfil->created_at->diffForHumans()}}
                                             </div>
                                             @if($infoperfil->twitter)
                                             <div class="seccion">
                                                  <i class="pr-3 fab fa-twitter"></i> {{$infoperfil->twitter}}
                                             </div>
                                             @endif
                                             @if($infoperfil->cumple)
                                             <div class="seccion">
                                                  <i class="pr-3 fas fa-birthday-cake"></i> {{$infoperfil->cumple}}
                                             </div>
                                             @endif
                                             <div class="seccion">
                                                  <i class="pr-3 far fa-comment-dots"></i> {{$comentarios}} comentarios publicados
                                             </div>
                                             <div class="seccion">
                                                  <i class="pr-3 far fa-user"></i> {{$usuario_perfil->name}}
                                             </div>
                                             <div class="seccion">
                                                  <i class="pr-3 fas fa-candy-cane"></i> {{$sweets->cantidad}} sweets
                                             </div>
                                             <div class="seccion">
                                                  <i class="pr-3 far fa-star"></i> {{$roles->nombre_rango}}
                                             </div>
                                        </div>
                                        @if($infoperfil->video_youtube)
                                        <div class="youtube">
                                             <iframe width="100%" height="315" src="{{$infoperfil->video_youtube}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                        @endif
                                   </div>
                                   <div class="col-lg-6">
                                        <div class="comentarios">
                                             @if(Session::has('error'))
                                                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                  <strong>Error:</strong> {{Session::get('error')}}
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  </div>
                                                  @endif
                                                  @if(Session::has('exito'))
                                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                  <strong>Acción exitosa:</strong> {{Session::get('exito')}}
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  </div>
                                             @endif
                                             <form action="{{route('comentario-perfil.store',$usuario_perfil->id)}}" method="post" role="form">
                                                  @csrf
                                                  <div class="form-group">
                                                       <textarea name="comentario" class="form-control" rows="3" placeholder="Escribe el comentario" maxlength="255"></textarea>
                                                  </div>
                                                  <div class="form-group text-right mt-3 enviar">
                                                       <button type="submit" class="btn btn-primary">Enviar</button>
                                                  </div>
                                             </form>
                                        </div>
                                        @if ($comentariosperfil)
                                             @foreach($comentariosperfil as $comenta)
                                             <div class="comentarios-div">
                                                  <div class="row">
                                                       <div class="col-lg-2">
                                                            @if(!$comenta->foto)<div class="avatarcomen" style="background-image:url(/img/extra/avatar.png);"></div>@else <div class="avatarcomen" style="background-image:url(/img/avatar/{{$comenta->foto}});"></div>@endif
                                                       </div>
                                                       <div class="col-lg-10">
                                                            <strong><a href="{{route('perfil',$comenta->name)}}">{{$comenta->name}}</a></strong>
                                                            @if(!Auth::user()->id == $infoperfil->id_user)
                                                            <form class="borrar d-inline" action="{{route('comentario-perfil.destroy',$comenta->id)}}" method="post">
                                                                 @method('delete')
                                                                 @csrf
                                                                 <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                            </form>
                                                            @endif
                                                            <p class="comenta">{{$comenta->cuerpo}}</p>
                                                            <span class="tiempo">Públicado {{$comenta->created_at->diffForHumans()}}</span>
                                                       </div>
                                                  </div>
                                             </div>
                                             @endforeach
                                        @endif
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection

@section('customscripts')
<script>
$("#likesperfil").on("click",function(){
     $.ajax({
          url: '/likeperfil/'+{{$fotousuario->id}},
          type: "POST",
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
          },
          success: function(response){
               $.ajax({
                    url: '/contadorlikes/'+{{$fotousuario->id}},
                    type: "GET",
                    success: function(json){
                         $("#likesperfil").html('<i class="far fa-thumbs-up"></i> '+json.contador+' likes');
                    }
               });
          }
     });
});
</script>

@endsection
