@extends('layouts.admin')
@section('title','HabboLicious • Panel de administración')

@section('customstyles')
@endsection

@section('content')
<div class="m-content"> 
     <div class="alert alert-brand" role="alert">
          <strong>Bienvenidos a la nueva versión Habbolicious v1.0!</strong>
          Este panel de administración se creo para que tu puedas manejarlo facilmente.
     </div>
     <div class="row">
          <div class="col-xl-4">
               <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__body">
                         <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Usuarios registrados</div>
                         <div class="h1 mb-0 text-gray-800">{{$usuarios}}</div>
                         <small>Estos son los usuarios registrados en total</small>
                    </div>
               </div>
          </div>
          <div class="col-xl-4">
               <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__body">
                         <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Noticias registradas</div>
                         <div class="h1 mb-0 text-gray-800">{{$noticias}}</div>
                         <small>Este es el contador de las noticias registradas</small>
                    </div>
               </div>
          </div>
          <div class="col-xl-4">
               <div class="m-portlet m-portlet--full-height ">
                    <div class="m-portlet__body">
                         <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Usuarios Dj's</div>
                         <div class="h1 mb-0 text-gray-800">{{$usuariosdj}}</div>
                         <small>Estos son los usuarios que tienen el rango de DJ</small>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection

@section('customscripts')
@endsection