@extends('layouts.plantilla')
@section('title','Editar Perfil • ¡Endulza tu Habbo vida!')

@section('customstyles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="contenido-inicio">
     <div class="container">
          <div class="row">
               <div class="col-lg-12 mt-3">
                    <div class="cuadro-perfil">
                         <form id="frmActualizarPerfil" action="{{route('perfil.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                              <div class="row">
                                   <div class="col-lg-6">
                                        <div class="contenedor-titulo">
                                             <h4>Contraseña</h4>
                                        </div>
                                        <div class="descripcion">
                                             <div class="form-group">
                                                  <label>Nueva Contraseña</label>
                                                  <input type="password" id="contra" name="contra" class="form-control" placeholder="Nueva contraseña">
                                             </div>
                                             <div class="form-group">
                                                  <label>Confirma tu Contraseña</label>
                                                  <input type="password" id="confirmarcontra" class="form-control" placeholder="Confirmar contraseña">
                                                  <span class="help-block red" id="passwordError"></span>
                                             </div>
                                        </div>
                                        <div class="contenedor-titulo">
                                             <h4>Datos personales</h4>
                                        </div>
                                        <div class="datos">
                                             <div class="form-group">
                                                  <label>Nombre</label>
                                                  <input type="text" name="nombre" class="form-control" placeholder="AcquaWh" value="{{$usuario_perfil->name}}" required>
                                             </div>
                                             <div class="form-group">
                                                  <label>Habbo</label>
                                                  <input type="text" name="habbo" class="form-control" placeholder="0acqua0" value="{{$usuario_perfil->habbo}}" required>
                                             </div>
                                             <div class="form-group">
                                                  <label>Cumpleaños</label>
                                                  <input id="fecha" type="text" name="cumple" class="form-control" placeholder="Cumpleaños" value="{{$fotousuario->cumple}}">
                                             </div>
                                             <div class="form-group">
                                                  <label>Twitter</label>
                                                  <input type="text" name="twitter" class="form-control" placeholder="@acquawh" value="{{$fotousuario->twitter}}">
                                             </div>
                                             <div class="form-group">
                                                  <label>URL Video Youtube</label>
                                                  <input type="text" name="youtube" class="form-control" placeholder="https://www.youtube.com/embed/6U1PCr2dIQ0" value="{{$fotousuario->video_youtube}}">
                                             </div>
                                             <div class="form-group">
                                                  <label>Sobre mí</label>
                                                  <textarea class="form-control" rows="3" maxlength="255" placeholder="Escribe más sobre ti" name="sobremi">{{$fotousuario->sobremi}}</textarea>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-lg-6">
                                        <div class="contenedor-titulo">
                                             <h4>Portada</h4>
                                        </div>
                                        <div class="descripcion">
                                             <div class="needsclick dropzone" id="document-dropzone"></div>
                                             @if($fotousuario->portada)
                                             <div class="mt-3 text-center">
                                                  <img class="img-fluid" width="200" src="/img/portada/{{$fotousuario->portada}}"/>
                                                  <input type="hidden" name="portada" value="{{$fotousuario->foto}}">
                                             </div>
                                             @endif
                                        </div>
                                        <div class="contenedor-titulo">
                                             <h4>Avatar</h4>
                                        </div>
                                        <div class="datos">
                                             <div class="needsclick dropzone" id="avatar-dropzone"></div>
                                             @if($fotousuario->foto)
                                             <div class="mt-3 text-center">
                                                  <img class="img-fluid" width="200" src="/img/avatar/{{$fotousuario->foto}}"/>
                                                  <input type="hidden" name="fotos" value="{{$fotousuario->foto}}">
                                             </div>
                                             @endif
                                        </div>
                                        <div class="form-group w-100 text-right">
                                             <button type="submit" class="guardarperfil btn btn-primary">Guardar perfil</button>
                                        </div>
                                   </div>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection

@section('customscripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script>
     var uploadedDocumentMap = {}
     Dropzone.options.documentDropzone = {
          url: '{{route('portada')}}',
          dictDefaultMessage: "<i class='far fa-image'></i> <br>Arrastra una imagen para la portada",
          maxFilesize: 10,
          maxFiles:1,
          addRemoveLinks: true,
          dictRemoveFile: "Eliminar",
          dictFileTooBig: "Archivo grande",
          dictInvalidFileType: "Formato invalido",
          dictCancelUpload: "Cargando",
          acceptedFiles: 'image/png,image/jpeg,image/jpg',
          headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          success: function (file, response) {
          $('#frmActualizarPerfil').append('<input type="hidden" name="portada" value="' + response.name + '">')
          uploadedDocumentMap[file.name] = response.name
          },
          removedfile: function (file) {
          file.previewElement.remove()
          var name = ''
          if (typeof file.file_name !== 'undefined') {
               name = file.file_name
          } else {
               name = uploadedDocumentMap[file.name]
          }
          $('#frmActualizarPerfil').find('input[name="portada"][value="' + name + '"]').remove()
          },
          init: function () {
               this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
               });
          }
     }
     var uploadedDocumentMap = {}
     Dropzone.options.avatarDropzone = {
          url: '{{route('avatar')}}',
          dictDefaultMessage: "<i class='far fa-image'></i> <br>Arrastra una imagen para el avatar",
          maxFiles:1,
          maxFilesize: 10,
          addRemoveLinks: true,
          dictRemoveFile: "Eliminar",
          dictFileTooBig: "Archivo grande",
          dictInvalidFileType: "Formato invalido",
          dictCancelUpload: "Cargando",
          acceptedFiles: 'image/png,image/jpeg,image/jpg',
          headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          success: function (file, response) {
          $('#frmActualizarPerfil').append('<input type="hidden" name="fotos" value="' + response.name + '">')
          uploadedDocumentMap[file.name] = response.name
          },
          removedfile: function (file) {
          file.previewElement.remove()
          var name = ''
          if (typeof file.file_name !== 'undefined') {
               name = file.file_name
          } else {
               name = uploadedDocumentMap[file.name]
          }
          $('#frmActualizarPerfil').find('input[name="fotos"][value="' + name + '"]').remove()
          },
          init: function () {
               this.on("maxfilesexceeded", function(file) {
                    this.removeAllFiles();
                    this.addFile(file);
               });
          }
     }
</script>    
@endsection
