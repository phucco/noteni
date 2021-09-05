@extends('layouts.app')

@section('content')
@include('layouts.card.open')
<div class="card-header">
    {{ __('Your trash bin') }}
    <span class="float-right">{{ __('Total: ') . count($notes) }}</span>
</div>

<div class="card-body">
    @include('layouts.status')

	@if (count($notes) == 0)

	{{ __('You have not trashed any note or you have already deleted all notes permanently.') }}

	@else

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>{{ __('No.') }}</th>
				<th>{{ __('Title') }}</th>
				<th>{{ __('Content') }}</th>
				<th>{{ __('Status') }}</th>
				<th>{{ __('Deleted at') }}</th>
				<th class="col-lg-3">{{ __('Actions') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($notes as $key => $note)

    		<tr>
    			<td>{{ $key + 1 }}</td>
    			<td>{{ $note->title }}</td>
    			<td>{!! \App\Http\Helpers\Helper::strLimit($note->content) !!}</td>
    			<td>{!! \App\Http\Helpers\Helper::showStatus($note->status) !!}</td>
    			<td>{{ $note->deleted_at }}</td>
    			<td>
                    <form action="{{ route('notes.forceDelete', $note->slug) }}" method="post">
                        <a href="{{ route('notes.restore', $note->slug) }}" class="btn btn-sm btn-success">{{ __('Restore') }}</a>
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger" type="submit">{{ __('Permanently Delete') }}</button>
                    </form>
    			</td>
    		</tr>

    		@endforeach
		</tbody>                		
	</table>
    <div class="d-flex justify-content-center mt-3">
        {!! $notes->links('pagination::bootstrap-4') !!}      
    </div>
    <p class="text-transform-italic">Remember: Notes in trash will be automatically deleted after 30 days.</p>
    <form action="{{ route('notes.emptyTrash') }}" method="post">
        @method('DELETE')
        @csrf
        <button class="btn btn-sm btn-danger float-right" type="submit">{{ __('Empty Trash bin') }}</button>
    </form>
	@endif
</div>
@include('layouts.card.close')
@endsection