@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Note: ') . $note->title }}
                    <span class="float-right">Last updated: {{ $note->updated_at }}</span>
                </div>

                <div class="card-body">

                    {!! $note->content !!}
                    <div class="mt-4">
                        @can('update', $note)
                        <a href="{{ route('notes.edit', $note->slug) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                        {!! __('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;') !!}
                        @endcan

                        {!! \App\Http\Helpers\Helper::showStatus($note->status) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection