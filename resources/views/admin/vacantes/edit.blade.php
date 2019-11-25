@extends('layouts.admin')
@section('title','HabboLicious • Crear Vacantes')

@section('customStyles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@endsection

@section('content')
@if(Session::has('error'))
  <div class="alert alert-danger show" role="alert">
    <strong>Error:</strong> {{Session::get('error')}}
  </div>
@endif
@if(Session::has('exito'))
  <div class="alert alert-success show" role="alert">
    <strong>Acción exitosa:</strong> {{Session::get('exito')}}
  </div>
@endif
<div class="m-subheader ">
     <div class="d-flex align-items-center">
          <div class="mr-auto">
               <a href="{{route('admin.vacantes')}}" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                    <span>
                         <i class="fas fa-chevron-left"></i>
                         <span>
                              Regresar
                         </span>
                    </span>
               </a>
          </div>
          
     </div>
</div>
<div class="m-content">
     <div class="row">
          <div class="col-lg-12">
               <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__head">
                         <div class="m-portlet__head-caption">
                              <div class="m-portlet__head-title">
                                   <span class="m-portlet__head-icon m--hide">
                                        <i class="la la-gear"></i>
                                   </span>
                                   <h3 class="m-portlet__head-text">
                                        Editar Vacante
                                   </h3>
                              </div>
                         </div>
                    </div>
                    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{route('admin.vacantes.update',$formulario->id)}}">
                         @csrf
                         @method('PUT')
                         <div class="m-portlet__body">
                              <div class="form-group m-form__group">
                                   <label>Título</label>
                                   <input class="form-control m-input" name="titulo" type="text" maxlength="200" placeholder="Escribe el título del departamento" value="{{$formulario->titulo}}" required>
                              </div>
                              <div class="form-group m-form__group">
                                   <label>Cuerpo</label>
                                   <textarea id="vacantes" name="cuerpo" class="form-control m-input" rows="3" required>{{$formulario->cuerpo}}</textarea>
                              </div>
                              <div class="form-group m-form__group">
                                   <label>Pregunta 1</label>
                                   <input class="form-control m-input" name="pregunta1" type="text" maxlength="200" placeholder="Escribe la pregunta 1" value="{{$formulario->pregunta1}}" required>
                              </div>
                              <div class="form-group m-form__group">
                                   <label>Pregunta 2</label>
                                   <input class="form-control m-input" name="pregunta2" type="text" maxlength="200" placeholder="Escribe la pregunta 2" value="{{$formulario->pregunta2}}" required>
                              </div>
                              <div class="form-group m-form__group">
                                   <label>Pregunta 3</label>
                                   <input class="form-control m-input" name="pregunta3" type="text" maxlength="200" placeholder="Escribe la pregunta 3" value="{{$formulario->pregunta3}}" required>
                              </div>
                              <div class="form-group m-form__group">
                                   <label>Pregunta 4</label>
                                   <input class="form-control m-input" name="pregunta4" type="text" maxlength="200" placeholder="Escribe la pregunta 4" value="{{$formulario->pregunta4}}" required>
                              </div>
                         </div>
                         <div class="m-portlet__foot m-portlet__foot--fit">
                              <div class="m-form__actions text-right">
                                   <button type="submit" class="btn btn-primary">Guardar cambios</button>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
@endsection

@section('customScripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script src="/js/summernote.js"></script>
@endsection