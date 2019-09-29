@extends('layouts.habbolicious')
@section('title','HabboLicious • Regístrate')

@section('customstyles')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@section('content')
<main role="main" class="flex-shrink-0">
    <div class="principal">
         <!-- Contenido principal -->
         <div class="fondo">
              <div class="globos"></div>
              <div class="container">
                   <div class="row">
                        <div class="col-lg-6">
                             <div class="owl-carousel owl-theme">
                                  <div class="item" style="background-image:url(https://images.habbo.com/web_images/habbo-web-articles/ny_large_promo.png);"><h4>Estamos en construcción</h4><p>Arreglando problemas técnicos, pronto volveremos.</p></div>
                                  <div class="item" style="background-image:url(https://images.habbo.com/web_images/habbo-web-articles/lpromo_house18_gen.png);"><h4>Estamos enfriando tu postre</h4><p>Arreglando problemas técnicos, pronto volveremos.</p></div>
                                  <div class="item" style="background-image:url(https://images.habbo.com/c_images/web_promo/lpromo_Star_Lounge.png);"><h4>Estamos creando dulces</h4><p>Arreglando problemas técnicos, pronto volveremos.</p></div>
                                  <div class="item" style="background-image:url(https://images.habbo.com/web_images/habbo-web-articles/lpromo_UAloyaltycrowns.png);"><h4>Crea un nuevo mundo</h4><p>Arreglando problemas técnicos, pronto volveremos.</p></div>
                             </div>
                        </div>
                        <div class="col-lg-6">
                             <div class="radio">
                                  <div class="row">
                                       <div class="col-lg-8">
                                            <div class="menu-ra row">
                                                 <div class="col-lg-12">
                                                      <div class="titulo-radio">
                                                           <span><i class="fas fa-user"></i></span> Fernanda Cruz
                                                      </div>
                                                      <div class="cancion-radio">
                                                           <span><i class="fas fa-music"></i></span> Skrillex & Alvin Risk - Try It Out
                                                      </div>
                                                      <div class="menu-radio">
                                                           <a href="#">
                                                                <div class="dj">
                                                                     <i class="fas fa-heart"></i> 2 likes
                                                                </div>
                                                           </a>
                                                           <a href="#">
                                                                <div class="play">
                                                                     <i class="fas fa-play"></i>
                                                                </div>
                                                           </a>
                                                           <a href="#">
                                                                <div class="stop">
                                                                     <i class="fas fa-stop"></i>
                                                                </div>
                                                           </a>
                                                           <a href="#">
                                                                <div class="enviar-peticion">
                                                                     <i class="fas fa-envelope"></i>
                                                                </div>
                                                           </a>
                                                           <div class="volumen">
                                                                <div id="slider"></div>
                                                           </div>
                                                      </div>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="col-lg-4">
                                            <div class="avatar-radio">
                                                 <div class="oyentes">Oyentes: 2 habbos</div>
                                                 <div class="avatar" style="background-image: url(data:image/png;base64,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);"></div>
                                            </div>
                                       </div>
                                  </div>
                             </div>
                        </div>
                        <div class="col-lg-12">
                             <div class="noticias-usuarios">
                                  <div class="row">
                                       <div class="col-lg-4">
                                            <div class="post-noticias">
                                                 <div class="imagen-post" style="background:url(https://images.habbo.com/habbo-web/america/es/assets/images/app_summary_image-1200x628.85a9f5dc.png);">
                                                      <div class="datos">
                                                           <div class="datos-img" style="background:url(data:image/png;base64,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);"></div>
                                                           <div class="datos-usuario"><i class="fas fa-user"></i>Publicado por: 0acqua0</div>
                                                      </div>
                                                 </div>
                                                 <div class="cuadro-noticias">
                                                      <div class="avatar-noticias" style="background-image: url(https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/4e6d8bbe-824e-4a20-abbd-dee36a634466/db7w79d-565c4f2b-a584-4e6b-9d8c-94a862881b4d.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzRlNmQ4YmJlLTgyNGUtNGEyMC1hYmJkLWRlZTM2YTYzNDQ2NlwvZGI3dzc5ZC01NjVjNGYyYi1hNTg0LTRlNmItOWQ4Yy05NGE4NjI4ODFiNGQucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.LJyxtB8QuKddBSYeex4O0CwExBrXyOLv0G3-An4vU4g);"></div>
                                                      <span class="titulo-post">Título post</span>
                                                      <p>Comentario de usuario</p>
                                                      <span class="tiempo-post">Hace 2 horas</span>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="col-lg-4">
                                            <div class="post-noticias">
                                                 <div class="imagen-post" style="background:url(https://i.imgur.com/fVlGql6.png);">
                                                      <div class="datos">
                                                           <div class="datos-img" style="background:url(data:image/png;base64,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);"></div>
                                                           <div class="datos-usuario"><i class="fas fa-user"></i>Publicado por: 0acqua0</div>
                                                      </div>
                                                 </div>
                                                 <div class="cuadro-noticias">
                                                      <div class="avatar-noticias" style="background-image: url(https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/4e6d8bbe-824e-4a20-abbd-dee36a634466/db7w79d-565c4f2b-a584-4e6b-9d8c-94a862881b4d.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzRlNmQ4YmJlLTgyNGUtNGEyMC1hYmJkLWRlZTM2YTYzNDQ2NlwvZGI3dzc5ZC01NjVjNGYyYi1hNTg0LTRlNmItOWQ4Yy05NGE4NjI4ODFiNGQucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.LJyxtB8QuKddBSYeex4O0CwExBrXyOLv0G3-An4vU4g);"></div>
                                                      <span class="titulo-post">Título post</span>
                                                      <p>Comentario de usuario</p>
                                                      <span class="tiempo-post">Hace 2 horas</span>
                                                 </div>
                                            </div>
                                       </div>
                                       <div class="col-lg-4">
                                            <div class="post-noticias">
                                                 <div class="imagen-post" style="background:url(https://help.habbo.com/hc/article_attachments/360003391388/Infobus_1.gif);">
                                                      <div class="datos">
                                                           <div class="datos-img" style="background:url(data:image/png;base64,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);"></div>
                                                           <div class="datos-usuario"><i class="fas fa-user"></i>Publicado por: 0acqua0</div>
                                                      </div>
                                                 </div>
                                                 <div class="cuadro-noticias">
                                                      <div class="avatar-noticias" style="background-image: url(https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/4e6d8bbe-824e-4a20-abbd-dee36a634466/db7w79d-565c4f2b-a584-4e6b-9d8c-94a862881b4d.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzRlNmQ4YmJlLTgyNGUtNGEyMC1hYmJkLWRlZTM2YTYzNDQ2NlwvZGI3dzc5ZC01NjVjNGYyYi1hNTg0LTRlNmItOWQ4Yy05NGE4NjI4ODFiNGQucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.LJyxtB8QuKddBSYeex4O0CwExBrXyOLv0G3-An4vU4g);"></div>
                                                      <span class="titulo-post">Título post</span>
                                                      <p>Comentario de usuario</p>
                                                      <span class="tiempo-post">Hace 2 horas</span>
                                                 </div>
                                            </div>
                                       </div>
                                  </div>
                             </div>
                        </div>
                   </div>
              </div>
         </div>
         <!-- Contenido -->
         <div class="contenido-inicio">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 mt-3">
                        <div class="card">
                            <div class="card-body row">
                                   <div class="col-lg-12">
                                        <form method="POST" action="{{ route('register') }}">
                                             @csrf
                                             <div class="form-group">
                                                  <label for="name" class="col-md-12 col-form-label">{{ __('Usuario') }}</label>
                                                  <div class="col-md-12">
                                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                  @error('name')
                                                       <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                       </span>
                                                  @enderror
                                                  </div>
                                             </div>
                    
                                             <div class="form-group">
                                                  <label for="email" class="col-md-12 col-form-label">{{ __('Correo') }}</label>
                    
                                                  <div class="col-md-12">
                                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    
                                                  @error('email')
                                                       <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                       </span>
                                                  @enderror
                                                  </div>
                                             </div>
                    
                                             <div class="form-group">
                                                  <label for="password" class="col-md-12 col-form-label">{{ __('Contraseña') }}</label>
                    
                                                  <div class="col-md-12">
                                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
                                                  @error('password')
                                                       <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                       </span>
                                                  @enderror
                                                  </div>
                                             </div>
                    
                                             <div class="form-group">
                                                  <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Confirma tu contraseña') }}</label>
                    
                                                  <div class="col-md-12">
                                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                  </div>
                                             </div>

                                             <div class="form-group">
                                                  <div class="col-md-12">
                                                       <div class="g-recaptcha" data-sitekey="6Lfi5roUAAAAAKGXZrz5tY6Lyk2emq2lZh3wWUiU"></div>
                                                       @if ($errors->has('g-recaptcha-response'))
                                                       <span class="help-block text-danger" role="alert">
                                                            <strong>Verifica sí no eres un robot</strong>
                                                       </span>
                                                       @endif
                                                  </div>
                                             </div>
                    
                                             <div class="form-group mb-0">
                                                  <div class="col-md-12">
                                                  <button type="submit" class="btn btn-primary">
                                                       {{ __('Regístrate') }}
                                                  </button>
                                                  </div>
                                             </div>
                                        </form>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-lg-4 mt-3">
                         <div class="card">
                              <div class="card-body row">
                                   <div class="col-lg-12">
                                       ada
                                   </div>
                              </div>
                         </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</main>
@endsection


@section('customscripts')
@endsection
