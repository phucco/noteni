<!DOCTYPE html>
<html lang="en">
<head>
    
    @include('layouts.head')
    
</head>
<body>
    <div id="app">
        
        @include('layouts.header')

        <main class="py-4">
            @yield('content')
        </main>       
        
    </div>
    
    <script async src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6141da2b2dc54fd9"></script>
    <script async src="{{ asset('js/app.js') }}"></script>
    <script>function onSubmit(token) { document.getElementById("recaptcha-form").submit(); }</script>
</body>
</html>
