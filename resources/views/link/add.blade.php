@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('New Shorten URL') }}</div>

                <div class="card-body">
                    @include('layouts.status')

                    <form method="POST" action="" id="recaptcha-form">
                    	
                        @csrf
                        
                        <div class="form-group">
                            <label for="destination">Please input the destination link:</label>
                        	<input type="text" name="destination" class="form-control @error('destination') is-invalid @enderror" id="destination" value="{{ old('destination') }}" autofocus required>
                            @error('destination')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">                            
                            <button type="submit" class="btn btn-primary g-recaptcha" id="btn_submit" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" data-callback="onSubmit" data-action="submit">
                                {{ __('Shorten') }}
                            </button>                            
                        </div>

                    </form>

                    @if (session('slug'))
                        <div class="alert alert-success col-lg-8 mx-auto" role="alert">
    {{ Session::get('success') }}
    <h4><a href="{{ Session::get('shortened_url') }}" target="_blank" class="underline-bar">{{ Session::get('shortened_url') }}</a></h4>
    <input type="text" value="{{ Session::get('shortened_url') }}" id="shortened_url">
    <button type="button" class="btn btn-light" onclick="copyThisLink()" id="shortened_btn">{{ __('Copy this link') }}</button>
</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection