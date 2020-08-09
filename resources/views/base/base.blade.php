<!doctype html>
<html>
    <head>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <input name="base_url" style="display:none" value="{{ url('/') }}">
        <div class="container" id="app">
            @csrf
            @yield('content')
        </div>
        
    @yield('js')    
    </body>

</html>