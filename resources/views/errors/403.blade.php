@extends('layouts.app')

@section('content')
@include('layouts.card.open')
<div class="card-body text-center">
	<span class="display-1 d-block">403</span>
	<div class="mb-4 lead">You do not have permission to perform this action.</div>
</div>
@include('layouts.card.close')
@endsection