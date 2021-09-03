@extends('layouts.app')

@section('content')
@include('layouts.card.open')
<div class="card-header">{{ __('New Note') }}</div>

<div class="card-body">
    @include('layouts.status')

    <form method="POST" action="{{ route('notes.add') }}" id="recaptcha-form">
    	
        @csrf
        
        <div class="form-group">
        	<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" placeholder="Note Title" autofocus required>
        </div>

        <div class="form-group">
        	<textarea name="content" class="form-control" id="content" placeholder="Your Content">{{ old('content') }}</textarea>
        </div>

    	<div class="form-check form-check-inline">
		    <input class="form-check-input" type="radio" name="status" id="status_1" value="1" checked>
		    <label class="form-check-label" for="status_1">Public </label>
		</div>
		<div class="form-check form-check-inline">
		    <input class="form-check-input" type="radio" name="status" id="status_2" value="2" @guest {{ __('disabled') }} @endguest>
		    <label class="form-check-label" for="status_2">Private @guest {{ __('(You are not logged in to save notes privately)') }} @endguest</label>
		</div>
		<div class="form-check form-check-inline">
		    <input class="form-check-input" type="radio" name="status" id="status_3" value="3">
		    <label class="form-check-label" for="status_3">Password protected </label>
            <input type="text" name="password" class="form-control" id="password" disabled required>
		</div>

        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" data-callback="onSubmit" data-action="submit">
                {{ __('Save') }}
            </button>
        </div>
    </form>
</div>
@include('layouts.card.close')
@endsection