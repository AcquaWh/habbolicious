@extends('layouts.admin')
@section('title','HabboLicious • Lista de Noticias')

@section('customStyles')
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
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
               <a href="{{route('admin.noticias.create')}}" class="btn btn-brand m-btn m-btn--custom m-btn--icon m-btn--pill">
                    <span>
                         <i class="fas fa-plus"></i>
                         <span>
                              Agregar noticia
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
                                        Lista de Noticias
                                   </h3>
                              </div>
                         </div>
                    </div>
                    <div class="m-portlet__body">
                         <table id="noticias" class="table table-striped table-bordered">
                              <thead>
                                   <tr>
                                        <th>Fecha</th>
                                        <th>Usuario</th>
                                        <th>Título</th>
                                        <th>Descripción</th>
                                        <th>Editar</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @foreach($noticias as $noti)
                                   <tr>
                                        <td>{{$noti->created_at->diffForHumans()}}</td>
                                        <td>{{$noti->name}}</td>
                                        <td>{{$noti->titulo}}</td>
                                        <td>{{$noti->descripcion}}</td>
                                        <td class="editarnoti">
                                             <a href="{{route('admin.noticias.edit',$noti->id)}}" class="btn btn-success"><i class="far fa-edit"></i></a>
                                             <button class="btn btn-danger" data-toggle="modal" data-target="#m_modal_{{$noti->id}}"><i class="far fa-trash-alt"></i></button>
                                        </td>
                                        <div class="modal fade" id="m_modal_{{$noti->id}}" tabindex="-1" role="dialog" aria-labelledby="titulomodal" aria-hidden="true">
                                             <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                       <div class="modal-header">
                                                            <h5 class="modal-title" id="titulomodal">
                                                                 Eliminar noticia
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                 <span aria-hidden="true">
                                                                      ×
                                                                 </span>
                                                            </button>
                                                       </div>
                                                       <div class="modal-body">
                                                            ¿Estás seguro de que quieres eliminarla?
                                                       </div>
                                                       <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                 Cerrar
                                                            </button>
                                                            <form action="{{route('admin.noticias.destroy',$noti->id)}}" method="POST">
                                                                 @method('DELETE')
                                                                 @csrf
                                                                 <button type="submit" class="btn btn-danger">
                                                                      Eliminar
                                                                 </button>
                                                            </form>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </tr>
                                   @endforeach
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection

@section('customScripts')
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="/js/datatable.js"></script>
@endsection