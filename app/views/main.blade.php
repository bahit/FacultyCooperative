<!DOCTYPE html>
<html>
    <head>
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
            @if(Session::has('message'))
                <p class="alert alert-warning">{{ Session::get('message') }}</p>
            @endif
        
            @include("header")


            <!-- Content -->
            @yield('content')

            @include("footer")
        
        </div>
        <!-- Scripts are placed here so plage loads quicker-->
        {{ HTML::script('js/jquery.min.js') }}
        {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
        <!-- Helper script for putting placeholder image: more info on usage https://github.com/imsky/holder -->
        {{ HTML::script('js/docs.min.js') }}
    </body>
</html>