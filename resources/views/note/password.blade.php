@extends('layouts.app')

@section('content')
@include('layouts.card.open')
<div class="card-header">
    {{ __('Note: ') . $note->title }}
    <span class="float-right">{{ __('Last updated: ') . $note->updated_at }}</span>
</div>

<div class="card-body">

        <input type="hidden" name="slug" id="slug" value="{{ $note->slug }}">
        <div class="form-group">
            <label for="password">{{ __('You need to provide password to see this content.') }}</label>
            
            <input type="text" name="password" id="input-password" class="form-control">
        
            <button class="btn btn-primary mt-3" id="btn_submit">{{ __('Submit') }}</button>
            
        </div>
        
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