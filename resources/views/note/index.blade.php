@extends('layouts.app')

@section('content')
@include('layouts.card.open')
<div class="card-header">
    {{ __('Your notes') }}
    <span class="float-right">{{ __('Total: ') . count($notes) }}</span>
</div>

<div class="card-body">
    @include('layouts.status')

	@if (count($notes) == 0)

	{{ __('You have not created any note or you deleted all notes.') }}
    <div class="float-right">
        <a href="{{ route('notes.trash') }}" class="btn btn-sm btn-warning">{{ __('Trash bin') }}</a>
    </div>

	@else

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>{{ __('No.') }}</th>
				<th>{{ __('Title') }}</th>
				<th>{{ __('Content') }}</th>
				<th>{{ __('Status') }}</th>
				<th>{{ __('Last updated') }}</th>
				<th class="col-lg-2">{{ __('Actions') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($notes as $key => $note)

    		<tr>
    			<td>{{ $key + 1 }}</td>
    			<td>{{ $note->title }}</td>
    			<td>{!! \App\Http\Helpers\Helper::strLimit($note->content) !!}</td>
    			<td>{!! \App\Http\Helpers\Helper::showStatus($note->status) !!}</td>
    			<td>{{ $note->updated_at }}</td>
    			<td>
                    <form action="{{ route('notes.destroy', $note->slug) }}" method="post">
                        <a href="{{ route('notes.show', $note->slug) }}" class="btn btn-sm btn-success">{{ __('View') }}</a>
                        <a href="{{ route('notes.edit', $note->slug) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger" type="submit">{{ __('Delete') }}</button>
                    </form>
    			</td>
    		</tr>

    		@endforeach
		</tbody>                		
	</table>

    <div class="d-flex justify-content-center mt-3">
        {!! $notes->links('pagination::bootstrap-4') !!}      
    </div>

    <div class="float-right">
        <a href="{{ route('notes.trash') }}" class="btn btn-sm btn-warning">{{ __('Trash bin') }}</a>
    </div>
    
	@endif
</div>
@include('layouts.card.close')
@endsection