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
                                   @foreach($roles as $rol)
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
                                        <th>Rango</th>
                                        <th>IP</th>
                                        <th>Editar</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @foreach($usuarios as $user)
                                   <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->rango}}</td>
                                        <td>{{$user->ip}}</td>
                                        <td>
                                             <div class="btn-group">
                                                  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                       Editar
                                                  </button>
                                                  <div class="dropdown-menu">
                                                       <a class="dropdown-item cursor" data-toggle="modal" data-target="#contra_{{$user->id}}">Cambiar contraseña</a>
                                                       <a class="dropdown-item cursor" data-toggle="modal" data-target="#rango_{{$user->id}}">Cambiar rango</a>
                                                       <a class="dropdown-item cursor" data-toggle="modal" data-target="#baja_{{$user->id}}">Dar de baja</a>
                                                  </div>
                                             </div>
                                             <div class="modal fade" id="contra_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                             <div class="modal fade" id="rango_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                       <div class="modal-content">
                                                            <div class="modal-header">
                                                                 <h5 class="modal-title">Cambiar rol de usuario</h5>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                 <span aria-hidden="true">&times;</span>
                                                                 </button>
                                                            </div>
                                                            <form method="POST" action="{{route('admin.roles.update',$user->id)}}">
                                                                 @csrf
                                                                 @method('PUT')
                                                                 <div class="modal-body">
                                                                      <div class="form-group">
                                                                           <label>Nuevo rol a asignar</label>
                                                                           <select class="form-control" name="rol">
                                                                                @foreach($roles as $rol)
                                                                                <option value="{{$rol->id}}">{{$rol->nombre_rango}}</option>
                                                                                @endforeach
                                                                           </select>
                                                                      </div>
                                                                 </div>
                                                                 <div class="modal-footer">
                                                                      <button type="submit" class="btn btn-primary">Cambiar rol de usuario</button>
                                                                 </div>
                                                            </form>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="modal fade" id="baja_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                                       <div class="modal-content">
                                                            <div class="modal-header">
                                                                 <h5 class="modal-title">¿Seguro que quieres dar de baja?</h5>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                 <span aria-hidden="true">&times;</span>
                                                                 </button>
                                                            </div>
                                                            <form method="POST" action="{{route('admin.roles.destroy',$user->id)}}">
                                                                 @method('DELETE')
                                                                 @csrf
                                                                 <div class="modal-body">
                                                                      <div class="form-group">
                                                                           <label>No podras revertir los cambios</label>
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