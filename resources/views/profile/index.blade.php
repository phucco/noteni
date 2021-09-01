@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	
        @include('layouts.sidebar')

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Account Information') }}</div>

                <div class="card-body">
                    @include('layouts.status')

                	<table class="table borderless">
                		<tr class="first-row-borderless">
                			<td class="w-25">{{ __('Name: ') }}</td>
                			<td class="w-50">{{ $user->name }} <input type="text" class="form-control form-inline-table" id="name" value="{{ $user->name }}" style="display: none;"></td>
                			<td class="w-25"><a href="{{ route('profile.name') }}" class="float-right" alt="Edit Name"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                		</tr>
                		<tr>
                			<td>{{ __('Email: ') }}</td>
                			<td>{{ $user->email }}</td>
                			<td class=""><a href="{{ route('profile.email') }}" class="float-right" alt="Edit Email"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                		</tr>
                		<tr>
                			<td>{{ __('Email verification: ') }}</td>
                			<td colspan="2">{!! \App\Http\Helpers\Helper::showVerification($user->email_verified_at) !!}</td>
                		</tr>
                		<tr>
                			<td>{{ __('Password: ') }}</td>
                			<td colspan="2"><a href="{{ route('profile.password') }}" alt="Change Password">{{ __('Change Password') }}</a></td>
                		</tr>
                	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection