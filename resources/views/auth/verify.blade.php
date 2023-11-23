@extends('layouts.app-guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><p class="text-dark">{{ __('Verify Your Email Address') }}</p></div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                        <p class="text-dark">{{ __('A fresh verification link has been sent to your email address.') }}</p>
                        </div>
                    @endif

                    <p class="text-dark">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p class="text-dark">{{ __('If you did not receive the email') }},</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
