@extends('layouts.app')

@section('content')
@include('layouts.card.open')
<div class="card-body">
    <dl>
    	<dt>{{ __('Getting Started') }}</dt>
    	<dd>{{ __('Anonymous / Guest User: Stay anonymous and save notes without signing in. Your note will be public or protected with password. Be carefull, anonymous notes can NOT be edited.') }}</dd>
    	<dd>{{ __('Registered Free User: Sign up for a free account so you can save your notes as private and login from anywhere to edit them.') }}</dd>
    	<dt>{{ __('What you can do') }}</dt>
    	<dd>
    		<ul>
    			<li>{{ __('Save notes even without creating an account') }}</li>
    			<li>{{ __('Sign up for a free account and save notes as either "Private" or "Public"') }}</li>
    			<li>{{ __('You can make your note Password Protected so only people with password can read your note') }}</li>
    			<li>{{ __('You can use our powerful HTML editor to enhance the way your notes look') }}</li>
    			<li>{{ __('You can import from Word document and turn it into a note') }}</li>
    			<li>{{ __('You can put a note in trash bin and restore it anytime') }}</li>
    			<li>{{ __('Easily empty trash bin with a button') }}</li>                    			
    		</ul>
    	</dd>
    	<dt>{{ __('Why use ') . $app_name }}</dt>
    	<dd>
    		<ul>
    			<li>{{ __('Save notes and access it from any location, any time') }}</li>
    			<li>{{ __('Create to-do lists, web texts, paragraph, ...') }}</li>
    			<li>{{ __('Save your favourite links') }}</li>
    			<li>{{ __('Take Quick Notes during training sessions that you can easily share with others') }}</li>
    		</ul>
    	</dd>
    	<dt>{{ __('More on How To Use ') . $app_name . __(' - a free online notes editor') }}</dt>
    	<dd>{{ $app_name . __(' is free and can be accessed from anywhere.') }}</dd>
    	<dd>{{ $app_name . __(' is an online editor that provides the user simple tools to save notes. You can sign up a free account, save the notes which you can access and change as many times as you want. You can also treat it as an online diary. You can continue editing your notes and share them if you want to.') }}</dd>
    	<dd>{{ __('You can use rich text editor to enhance the way your notes look and can easily share them via Twitter, Facebook etc.') }}</dd>
    	<dd>{{ __('Because aNotepad makes no changes to files that it opens unless you make changes, it’s useful for examining and editing files which could be screwed up by more advanced programs. It can be used on HTML code as well. Likewise, if you have a file of unknown type because the extension has been deleted, opening it is a good way to make sure that you don’t ruin it up merely by opening it.') }}</dd>
    </dl>
</div>
@include('layouts.card.close')
@endsection