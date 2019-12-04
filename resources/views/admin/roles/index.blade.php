@extends('layouts.admin')
@section('title','HabboLicious • Roles')

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
               <a href="{{route('admin.roles.create')}}" class="btn btn-brand m-btn m-btn--custom m-btn--icon m-btn--pill">
                    <span>
                         <i class="fas fa-plus"></i>
                         <span>
                              Agregar nuevos roles
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
                                        Lista de roles
                                   </h3>
                              </div>
                         </div>
                    </div>
                    <div class="m-portlet__body">
                         <table id="roles" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                   <tr>
                                        <th>ID</th>
                                        <th>Tipo de rango</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @foreach($roleslista as $rol)
                                   <tr>
                                        <td>{{$rol->id}}</td>
                                        <td>{{$rol->nombre_rango}}</td>
                                   </tr>
                                   @endforeach
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
          <div class="col-lg-12">
               <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__head">
                         <div class="m-portlet__head-caption">
                              <div class="m-portlet__head-title">
                                   <span class="m-portlet__head-icon m--hide">
                                        <i class="la la-gear"></i>
                                   </span>
                                   <h3 class="m-portlet__head-text">
                                        Lista de usuarios
                                   </h3>
                              </div>
                         </div>
                    </div>
                    <div class="m-portlet__body">
                         <table id="usuariosrol" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                   <tr>
                                        <th>Usuario</th>
                                        <th>Rangos</th>
                                        <th>IP</th>
                                        <th>Editar</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @foreach($usuarios as $user)
                                   <tr>
                                        <td>{{$user->name}}</td>
                                        @if($user->rango->isEmpty())
                                        <td>No tiene rango asignado</td>
                                        @else
                                        <td>@foreach($user->rango as $derechos){{$derechos->rango}}<br>@endforeach</td>
                                        @endif
                                        <td>{{$user->ip}}</td>
                                        <td>
                                             <div class="btn-group">
                                                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                       Editar
                                                  </button>
                                                  <div class="dropdown-menu">
                                                       <a class="dropdown-item cursor" data-toggle="modal" data-target="#contra_{{$user->id}}">Cambiar contraseña</a>
                                                       <a class="dropdown-item cursor" data-toggle="modal" data-target="#rango_{{$user->id}}">Editar rango</a>
                                                       <a class="dropdown-item cursor" data-toggle="modal" data-target="#rango2_{{$user->id}}">Agregar rango</a>
                                                       <a class="dropdown-item cursor" data-toggle="modal" data-target="#baja_{{$user->id}}">Borrar usuario</a>
                                                  </div>
                                             </div>
                                             <div class="modal fade" id="contra_{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                       <div class="modal-content">
                                                            <div class="modal-header">
                                                                 <h5 class="modal-title">Cambiar contraseña</h5>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                 <span aria-hidden="true">&times;</span>
                                                                 </button>
                                                            </div>
                                                            <form method="POST" action="{{route('admin.roles.update',$user->id)}}">
                                                                 @csrf
                                                                 @method('PUT')
                                                                 <div class="modal-body">
                                                                      <div class="form-group">
                                                                           <label>Nueva contraseña</label>
                                                                           <input type="password" class="form-control" name="password" placeholder="Escribe la nueva contraseña" required>
                                                                      </div>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                                                                 </div>
                                                            </form>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="modal fade" id="rango_{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                       <div class="modal-content">
                                                            <div class="modal-header">
                                                                 <h5 class="modal-title">Editar rango</h5>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                 <span aria-hidden="true">&times;</span>
                                                                 </button>
                                                            </div>
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                 @if(!$user->rango->isEmpty())
                                                                 <table class="table table-striped table-bordered">
                                                                      <thead>
                                                                           <tr>
                                                                                <th>Rol</th>
                                                                                <th>Descripción rol</th>
                                                                                <th>Guardar</th>
                                                                                <th>Borrar</th>
                                                                           </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                           @foreach($user->rango as $derechos)
                                                                           <tr>
                                                                                <form method="POST" action="{{route('admin.roles.update',$user->id)}}">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                     <td>
                                                                                     <select class="form-control" name="rol" required>
                                                                                          @foreach($roleslista as $rol)
                                                                                          <option value="{{$rol->id}}" @if($derechos->id_rol == $rol->id) selected @endif>{{$rol->nombre_rango}}</option>
                                                                                          @endforeach
                                                                                     </select>
                                                                                     </td>
                                                                                     <td><input class="form-control m-input" type="text" name="descripcion" placeholder="Escribe la descripción del rol" value="{{$derechos->rango}}" required></td>
                                                                                     <td><button type="submit" class="btn btn-success"><i class="fas fa-check"></i></button></td>
                                                                                </form>
                                                                                <td>
                                                                                     <form action="{{route('admin.roles.rango.destroy',$derechos->id)}}" method="POST">
                                                                                          @method('DELETE')
                                                                                          @csrf
                                                                                          <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                                                     </form>
                                                                                </td>
                                                                           </tr>
                                                                           @endforeach
                                                                      </tbody>
                                                                 </table>
                                                                 @else 
                                                                 No tiene roles definidos
                                                                 @endif
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="modal fade" id="rango2_{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                       <div class="modal-content">
                                                            <div class="modal-header">
                                                                 <h5 class="modal-title">Agregar nuevo rango</h5>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                 <span aria-hidden="true">&times;</span>
                                                                 </button>
                                                            </div>
                                                            <form method="POST" action="{{route('admin.roles.secundario',$user->id)}}">
                                                                 @csrf
                                                                 <div class="modal-body">
                                                                      <div class="form-group">
                                                                           <label>Asignar rol</label>
                                                                           <select class="form-control" name="rol" required>
                                                                                @foreach($roleslista as $rol)
                                                                                <option value="{{$rol->id}}">{{$rol->nombre_rango}}</option>
                                                                                @endforeach
                                                                           </select>
                                                                      </div>
                                                                      <div class="form-group">
                                                                           <label>Descripción del rol</label>
                                                                           <input class="form-control m-input" type="text" name="descripcion" placeholder="Escribe la descripción del rol" required>
                                                                      </div>
                                                                      <div class="form-group">
                                                                           <label>Orden principal</label>
                                                                           <select class="form-control" name="orden" required>
                                                                                <option value="0">0</option>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                           </select>
                                                                      </div>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                                 </div>
                                                            </form>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="modal fade" id="baja_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                       <div class="modal-content">
                                                            <div class="modal-header">
                                                                 <h5 class="modal-title">¿Seguro que quieres borrar al usuario?</h5>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                 <span aria-hidden="true">&times;</span>
                                                                 </button>
                                                            </div>
                                                            <form method="POST" action="{{route('admin.roles.destroy',$user->id)}}">
                                                                 @method('DELETE')
                                                                 @csrf
                                                                 <div class="modal-body">
                                                                      <div class="form-group">
                                                                           <label><h3>Se borrarán noticias, sus sweets, perfil entre otras cosas relacionado a el</h3>No podras revertir los cambios, se eliminará permanentemente de la web!</label>
                                                                      </div>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="submit" class="btn btn-primary">Dar de baja usuario</button>
                                                                 </div>
                                                            </form>
                                                       </div>
                                                  </div>
                                             </div>
                                        </td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="/js/datatable.js"></script>
@endsection