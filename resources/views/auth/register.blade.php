@extends('layouts.habbolicious')
@section('title','HabboLicious • Regístrate')

@section('customstyles')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection

@section('content')
<div class="contenido-inicio">
     <div class="container">
          <div class="row justify-content-center">
          <div class="col-lg-8 mt-3">
               <div class="card">
                    <div class="card-body row">
                         <div class="col-lg-12">
                              <form method="POST" action="{{ route('register') }}">
                                   @csrf
                                   <div class="col-lg-12"><h1>Regístrate a Habbolicious</h1></div>
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
                                        <label for="habbo" class="col-md-12 col-form-label">{{ __('Habbo') }}</label>
                                        <div class="col-md-12">
                                             <input id="habbo" type="text" class="form-control @error('habbo') is-invalid @enderror" name="habbo" value="{{ old('habbo') }}" required autocomplete="habbo" autofocus>
                                             @error('habbo')
                                                  <span class="invalid-feedback" role="alert">
                                                       <strong>Ingresa tu usuario de Habbo</strong>
                                                  </span>
                                             @enderror
                                        </div>
                                   </div>
                                   <div class="form-group">
                                        <label for="email" class="col-md-12 col-form-label">{{ __('Correo (Será verificado)') }}</label>
          
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
               <div class="contenedor-titulo" style="background-image: url(/img/extra/lpromo_band19_gen.png);">
                    <h4>Contraseña segura</h4>
               </div>
               <div class="contenedor-contra">
                    En Habbolicious cuidamos la seguridad de los usuarios cifrando sus contraseñas y asegurando su enlace a la base de datos.
                    <br><br>
                    <strong>A pesar de que ciframos las contraseñas, recomendamos no utilizar la misma contraseña que utilizes en Habbo, entre otras redes.</strong>
               </div>
               <div class="contenedor-titulo" style="background-image: url(/img/extra/lpromo_cland_bundle.png);">
                    <h4>Twitter</h4>
               </div>
               <div class="contenedor-twitter">
                    <a class="twitter-timeline" data-height="330" href="https://twitter.com/HabboLiciousES?ref_src=twsrc%5Etfw">Twitter por Habbolicious</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
               </div>
          </div>
          </div>
     </div>
</div>
</div>
@endsection


@section('customscripts')
@endsection
