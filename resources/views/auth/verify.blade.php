@extends('layouts.verificar')
@section('title','HabboLicious • Verifica tu correo')

@section('customstyles')
@endsection

@section('content')
<div class="contenido-inicio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3 error">
                    <div class="card-body row">
                        <div class="col-lg-6 text-center">
                            <img class="img-fluid" src="/img/extra/register9.gif"/>
                        </div>
                        <div class="col-lg-6 mt-3">
                            @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Se ha enviado de nuevo un link de verificación a tu correo electrónico') }}
                            </div>
                            @endif
        
                            {{ __('Antes de continuar, revisa tu correo electrónico para verificar tu correo.') }}
                            {{ __('Si no recibiste el correo') }}
                            <br><br>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-secondary align-baseline">{{ __('Enviar correo') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

