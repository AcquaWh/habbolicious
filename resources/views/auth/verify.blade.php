@extends('layouts.habbolicious')
@section('title','HabboLicious • Verifica tu correo')

@section('customstyles')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu correo') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado de nuevo un link de verificación a tu correo electrónico') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, revisa tu correo electrónico para verificar tu correo.') }}
                    {{ __('Si no recibiste el correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Enviar otro enlace') }}</button>.
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customscripts')
@endsection
