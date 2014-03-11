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

        <style>
        @section('styles')
            body {
                padding-top: 60px;
                height: 100%;
            }


            footer {
                color: #ccc;
                background: #260;
                border-top: 1px solid #000;
            }

                /* Irena - these styles are for search page */

            fieldset {
                border: 1px groove #ddd !important;
                padding: 0 1.4em 1.4em 1.4em !important;
                margin: 0 0 1.5em 0 !important;
                -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
            }

            legend {
                width:inherit;
                padding:0 10px;
                border-bottom:none;

            }

        @show
        </style>
    </head>

    <body>
		@include("header")

        <!-- Container -->
        <div class="container">

            <!-- Content -->
            @yield('content')

        </div>

        @include("footer")
    </body>
</html>