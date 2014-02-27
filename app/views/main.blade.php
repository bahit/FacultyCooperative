<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            Faculty Cooperative
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

       
        {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
        {{ HTML::style('css/main.css') }}


        <style>
        @section('styles')
            body {
                padding-top: 60px;
            }
        @show
        </style>
    </head>

    <body>
        <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          {{ HTML::link('home', 'Faculty Cooperative', array('class' => 'navbar-brand')) }}
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active">{{ HTML::link('home', 'Home') }}</li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>{{ HTML::link('users/register', 'Register') }}</li>   
            <li>{{ HTML::link('users/login', 'Login') }}</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


        <!-- Container -->
        <div class="container">

            <!-- Content -->
            @yield('content')

        </div>

        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery.min.js') }}
        {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}

    </body>
</html>