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

    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        function onSubmit(token) { document.getElementById("recaptcha-form").submit(); }
    </script>
</body>
</html>
