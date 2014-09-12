<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>rtoya</title>
        {!! HTML::style('css/foundation.css') !!}
        {!! HTML::style('css/rtoya.css') !!}
        {!! HTML::script('js/vendor/modernizr.js') !!}
    </head>
    <body>
        <div class="row">
            <div class="large-12 columns">
                <h1>Welcome to Foundation</h1>
            </div>
        </div>

        <div class="row">
            <div class="large-12 columns">
            @include('layouts.navigation-main')
            </div>
        </div>

        @yield('content')

        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>
</html>
