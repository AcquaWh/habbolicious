@extends('layouts.verificar')
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
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="col-form-label">{{ __('Correo electrónico') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enviar enlace de recuperación') }}
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
