@extends('layouts.habbolicious')
@section('title','HabboLicious • Recupera tu contraseña')

@section('customstyles')
@endsection

@section('content')
<div class="contenido-inicio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mt-3">
                <div class="card">
                    <div class="card-body row">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-lg-12"><h1>Recupera tu contraseña</h1></div>
                        <div class="col-lg-12">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña nueva') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirma tu contraseña nueva') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="form-groupmb-0">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Resetear contraseña') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
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
