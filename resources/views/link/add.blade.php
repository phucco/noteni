@extends('layouts.app')

@section('content')
@include('layouts.card.open')
<div class="card-header">{{ __('New Shorten URL') }}</div>

<div class="card-body">
    @include('layouts.status')

    <form method="POST" action="" id="recaptcha-form">
    	
        @csrf
        
        <div class="form-group">
            <label for="destination">{{ __('Please input the destination url:') }}</label>
        	<input type="text" name="destination" class="form-control @error('destination') is-invalid @enderror" id="destination" value="{{ old('destination') }}" autofocus required>
            @error('destination')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group mb-0">                            
            <button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" data-callback="onSubmit" data-action="submit">
                {{ __('Shorten') }}
            </button>                            
        </div>
    </form>
</div>
@include('layouts.card.close')
@endsection