@extends('layouts.app')

@section('content')
@include('layouts.card.open')
<div class="card-body">
    <dl>
    	<dt>{{ __('About ') . $app_name }}</dt>
    	<dd>{{ __('This has been in existence since 2020, launched with the basic premise of providing a simple tool for users to save notes online.') }}</dd>
    	<dd>{{ __('We are very excited about interacting with this vibrant user community around this tool. We hope to work hard on your feedback and roll out useful features suggested by you soon.') }}</dd>
        <dd>{{ __('If you have any ideas, suggestions, thoughts, observations - just reach out to us either via email manage@noteni.com. We are eager to hear from you!') }}</dd>
        <dt>{{ __('Privacy Policy') }}</dt>
        <dd>{{ __('We share information with 3rd parties where required to identify or track abuse or prevent future abuse (e.g. we may check submitted URLs against 3rd party blacklists and may share information on malicious URLs or abusive users with 3rd parties).') }}</dd>
        <dd>{{ __('We use Google Analytics to collect and analyse site statistics. Google Analytics mainly uses first-party cookies to report on visitor interactions on this website. These cookies do not collect any personally identifiable information and are only used for the statistical collection of data such as visits and page hits.') }}</dd>
        <dd>{{ __('Public notes and shortened URLs are not private and should not be treated as such. Third parties could easily guess information in public notes and the short URL that you are using, so you should not use URLs to link to sensitive or secure data.') }}</dd>
        <dd>{{ __('Anonymous statistics on shortened URLs you create (such as number of visits to them, creation date etc.) are not treated as private and will be made available to anyone through the site.') }}</dd>
    </dl>
</div>
@include('layouts.card.close')
@endsection