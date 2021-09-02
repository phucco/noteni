@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Decode Shorten URL') }}</div>                	

            	<div class="card-body text-center">            		
            		@include('layouts.status')

            		<p class="lead">{{ __('This is the destination:') }}</p>
            		
    				<p class="lead fw-bold">
    					<a href="{{ $link->destination }}" class="" target="_blank">{{ $link->destination }}</a>
    				</p>

    				<a class="btn btn-success btn-lg text-center" href="{{ $link->destination }}" role="button" target="_blank">{{ __('Go to the destination ') }}»</a>
    				<p class="mt-4">Created at: {{ $link->created_at }}, visited {{ $link->times }} times.</p>
            	</div>
			</div>
		</div>
	</div>
</div>
@endsection