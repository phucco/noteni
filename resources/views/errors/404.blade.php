@extends('layouts.app')

@section('content')
@include('layouts.card.open')
<div class="card-body text-center">
	<span class="display-1 d-block">404</span>
	<div class="mb-4 lead">The page you are looking for was not found.</div>
</div>
@include('layouts.card.close')
@endsection