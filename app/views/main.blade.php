<!DOCTYPE html>
<html>
    <head>

        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery.min.js') }}
        {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}

        <title>
            @section('title')
            Faculty Cooperative
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{ HTML::style('packages/bootstrap/css/bootstrap.css') }}
        {{ HTML::style('css/main.css') }}

    </head>

    <body>
        <!-- Container -->
        <div class="container">
        
            @include("header")


            <!-- Content -->
            @yield('content')

            @include("footer")
        
        </div>

    </body>
</html>