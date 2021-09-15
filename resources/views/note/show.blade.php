@extends('layouts.app')

@section('content')
@include('layouts.card.open')
<div class="card-header">
    {{ __('Note: ') . $note->title }}
    <span class="float-right">{{ __('Last updated: ') . $note->updated_at }}</span>
</div>

<div class="card-body">
    {!! $note->content !!}

    <div class="addthis_inline_share_toolbox"></div>
    
    <div class="mt-4">
        @can('update', $note)
        <a href="{{ route('notes.edit', $note->slug) }}" class="btn btn-primary">{{ __('Edit') }}</a>
        {!! __('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') !!}
        @endcan

        {!! \App\Http\Helpers\Helper::showStatus($note->status) !!}
    </div>
</div>
@include('layouts.card.close')
@endsection