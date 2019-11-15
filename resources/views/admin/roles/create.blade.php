@extends('layouts.admin')
@section('title','HabboLicious • Crear nuevo rol')

@section('customStyles')
@endsection

@section('content')
<div class="m-subheader ">
     <div class="d-flex align-items-center">
          <div class="mr-auto">
               <a href="{{route('admin.roles')}}" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
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
                                        Agregar Roles
                                   </h3>
                              </div>
                         </div>
                    </div>
                    <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="{{route('admin.roles.store')}}">
                         @csrf
                         <div class="m-portlet__body">
                              <div class="form-group m-form__group">
                                   <label>Nombre del nuevo rango</label>
                                   <input class="form-control m-input" name="rango" type="text" maxlength="50" required>
                              </div>
                         </div>
                         <div class="m-portlet__foot m-portlet__foot--fit">
                              <div class="m-form__actions text-right">
                                   <button type="submit" class="btn btn-primary">Agregar rango</button>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
@endsection

@section('customScripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection