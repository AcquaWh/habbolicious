@extends('layouts.admin')
@section('title','HabboLicious • Agregar Eventos')

@section('customStyles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" type="text/css" />
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="m-subheader ">
     <div class="d-flex align-items-center">
          <div class="mr-auto">
               <a href="{{route('admin.eventos')}}" class="btn btn-secondary m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
                    <span><i class="fas fa-chevron-left"></i><span>Regresar</span></span>
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
                                       Agregar Eventos
                                   </h3>
                              </div>
                         </div>
                    </div>
                    <form id="frmEventos" class="m-form m-form--fit m-form--label-align-right" enctype="multipart/form-data" method="POST" action="{{route('admin.eventos.store')}}">
                         @csrf
                         <div class="m-portlet__body">
                              <div class="form-group m-form__group">
                                   <div class="needsclick dropzone" id="document-dropzone"></div>
                              </div>
                              <div class="form-group m-form__group">
                                   <label>Título</label>
                                   <input class="form-control m-input" name="titulo" type="text" maxlength="200" required>
                              </div>
                              <div class="form-group m-form__group">
                                   <label>Fecha de evento</label>
                                   <input id="fecha" type="text" class="form-control m-input" name="fecha" placeholder="Fecha de evento" value="{{now()->format("Y/m/d")}}" required>
                              </div>
                              <div class="form-group m-form__group">
                                   <label>Descripción</label>
                                   <textarea class="form-control" name="descripcion" type="text" maxlength="200" rows="3" required></textarea>
                              </div>
                              <div class="form-group m-form__group">
                                   <textarea id="eventos" name="cuerpo" class="form-control m-input" rows="3" required></textarea>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>
<script src="/js/summernote.js"></script>
<script>
     var uploadedDocumentMap = {}
     Dropzone.options.documentDropzone = {
          url: '{{route('admin.eventos.subir')}}',
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
               $('#frmEventos').append('<input type="hidden" name="portada" value="' + response.name + '">')
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
               $('#frmEventos').find('input[name="portada"][value="' + name + '"]').remove()
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