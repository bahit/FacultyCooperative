<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            Faculty Cooperative
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

       
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/bootstrap-responsive.css') }}

        <style>
        @section('styles')
            body {
                padding-top: 60px;
            }

        @show
        </style>
    </head>

    <body>
        <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-brand">
                <div class="container">
                    <!-- .btn-navbar is used as the toggle for collapsed navbar content
                   -->

                    <a class="brand" href="../home">Faculty Cooperative</a>
                    <a class="brand" href="../search">Search</a>
                    <a class="brand" href="#">Link 3</a>


                </div>
            </div>
        </div> 

        <!-- Container -->
        <div class="container">

            <!-- Content -->
            @yield('content')

        </div>

        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery.v1.8.3.min.js') }}
        {{ HTML::script('js/bootstrap/bootstrap.min.js') }}

    </body>
</html>