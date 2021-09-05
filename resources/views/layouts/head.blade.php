<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Noteni is your online note pad on the web. It allows you to store notes on the go without having to login. You can use a rich text editor, make notes private or protect notes with password. Best of all - Noteni is a fast, clean, simple to use and FREE online web note pad." />
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ __('Noteni') }}</title>

<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ __('Noteni') }}" />
<meta property="og:description" content="Noteni is your online note pad on the web. It allows you to store notes on the go without having to login. You can use a rich text editor, make notes private or protect notes with password. Best of all - Noteni is a fast, clean, simple to use and FREE online web note pad." />
<meta property="og:image" content="{{ asset('img/noteni-thumbnail-image.png') }}" />

<link rel="icon" type="image/png" href="/favicon.png" sizes="16x16">
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<script src="https://www.google.com/recaptcha/api.js"></script>