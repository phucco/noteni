@extends('layouts.app')

@section('content')
@include('layouts.card.open')
<div class="card-header">{{ __('Decode Shorten URL') }}</div>

<div class="card-body text-center">            		
	@include('layouts.status')

	<p class="lead">{{ __('This is the destination:') }}</p>
	
	<p class="lead fw-bold">
		<a href="{{ $link->destination }}" target="_blank">{{ $link->destination }}</a>
	</p>

	<a class="btn btn-success btn-lg text-center" href="{{ $link->destination }}" role="button" target="_blank">{{ __('Go to the destination ') }}»</a>

	<div class="mt-4 mb-4">
		<div class="addthis_inline_share_toolbox"></div>
    </div>

	<p>{{ __('Created at: ') . $link->created_at . __(', visited ') .  $link->times . __(' times.')}}</p>
</div>
@include('layouts.card.close')
@endsection