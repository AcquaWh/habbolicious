@extends('layouts.plantilla')
@section('title','Error 404 • ¡Endulza tu Habbo vida!')

@section('customstyles')
@endsection

@section('content')
<div class="contenido-inicio">
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-lg-12 mt-3">
                    <div class="card mt-5 error">
                         <div class="card-body row">
                              <div class="col-lg-6 text-center">
                                   <img class="img-fluid" src="/img/extra/register9.gif" alt=""/>
                              </div>
                              <div class="col-lg-6 mt-3">
                                   Hola Dulce,
                                   <br><br>
                                   No existe esta sección, lo sentimos!
                                   <br><br>
                                   <a href="{{route('index')}}" class="btn btn-secondary align-baseline">Regresar a la web</a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection

@section('customscripts')
@endsection
