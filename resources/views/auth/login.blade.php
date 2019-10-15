@extends('layouts.habbolicious')
@section('title','HabboLicious • Error 404')

@section('customstyles')
@endsection

@section('content')
<div class="contenido-inicio">
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-lg-12 mt-3">
                    <div class="card error">
                         <div class="card-body row">
                              <div class="col-lg-12 text-center">
                                   <img class="img-fluid" src="/img/extra/register9.gif" alt=""/>
                              </div>
                              <div class="col-lg-12">
                                   <h1 class="errortitulo mt-3 text-center">Debes iniciar sesión para acceder a esta sección.</h1>
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
     $("#iniciar-sesion").css("width","100%");
</script>
@endsection