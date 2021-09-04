@extends('layouts.app')

@section('content')
@include('layouts.card.open')
<div class="card-header">{{ __('Decode Shorten URL') }}</div>                	

<div class="card-body text-center">            		
	@include('layouts.status')

	<p class="lead">{{ __('This is the destination:') }}</p>
	
	<p class="lead fw-bold">
		<a href="{{ $link->destination }}" class="" target="_blank">{{ $link->destination }}</a>
	</p>

	<a class="btn btn-success btn-lg text-center" href="{{ $link->destination }}" role="button" target="_blank">{{ __('Go to the destination ') }}»</a>

	<input type="text" value="{{ url()->current() }}" id="shortened_url" style="display: none;">

	<p class="mt-2"><a href="{{ url()->current() }}" class="btn btn-link" id="shortened_btn">Click here to copy this shorten URL</a></p>

	<p>{{ __('Created at: ') . $link->created_at . __(', visited ') .  $link->times . __(' times.')}}</p>
</div>
@include('layouts.card.close')
@endsection