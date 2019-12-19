@extends('layouts.admin')
@section('title','HabboLicious • Editar Noticias')

@section('customStyles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" type="text/css" />
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
               <a href="{{route('admin.noticias')}}" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
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
          <div class="col-md-12">
               <div class="m-portlet m-portlet--tab">
                    <div class="m-portlet__head">
                         <div class="m-portlet__head-caption">
                              <div class="m-portlet__head-title">
                                   <span class="m-portlet__head-icon m--hide">
                                        <i class="la la-gear"></i>
                                   </span>
                                   <h3 class="m-portlet__head-text">
                                        Editar noticias
                                   </h3>
                              </div>
                         </div>
                    </div>
                    <form id="frmNoticias" class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" method="POST" action="{{route('admin.noticias.update',$noticias->id)}}">
                         @csrf
                         @method('PUT')
                         <div class="m-portlet__body">
                              <div class="form-group m-form__group">
                                   <div class="needsclick dropzone" id="document-dropzone"></div>
                                   @if($noticias->portada)
                                   <div class="mt-3 text-center">
                                        <img class="img-fluid" width="200" src="/img/portada/{{$noticias->portada}}"/>
                                        <input type="hidden" name="portada" value="{{$noticias->portada}}">
                                   </div>
                                   @endif
                              </div>
                              <div class="form-group m-form__group">
                                   <label>Título</label>
                                   <input class="form-control m-input" name="titulo" type="text" maxlength="200" value="{{$noticias->titulo}}" required>
                              </div>
                              <div class="form-group m-form__group">
                                   <label>Descripción</label>
                                   <input class="form-control m-input" name="descripcion" type="text" maxlength="200" value="{{$noticias->descripcion}}" required>
                              </div>
                              <div class="form-group m-form__group">
                                   <textarea id="summernote" name="cuerpo" class="form-control m-input" rows="3" required>{{$noticias->cuerpo}}</textarea>
                              </div>
                         </div>
                         <div class="m-portlet__foot m-portlet__foot--fit">
                              <div class="m-form__actions text-right">
                                   <button type="submit" class="btn btn-primary">
                                        Actualizar
                                   </button>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
@endsection

@section('customScripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script src="/js/summernote.js"></script>
<script>
     var uploadedDocumentMap = {}
     Dropzone.options.documentDropzone = {
          url: '{{route('admin.noticias.subir')}}',
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
          $('#frmNoticias').append('<input type="hidden" name="portada" value="' + response.name + '">')
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
          $('#frmNoticias').find('input[name="portada"][value="' + name + '"]').remove()
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