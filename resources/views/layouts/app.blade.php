<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Noteni') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <div id="app">
        
        @include('layouts.header')

        <main class="py-4">
            @yield('content')
        </main>       
        
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
    function onSubmit(token) {
        document.getElementById("recaptcha-form").submit();
    }
    </script>
</body>
</html>
