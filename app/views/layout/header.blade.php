@section("header")
<!-- Navbar -->
<div class="navbar navbar navbar-fixed-top">
  <div class="navbar-brand">
    <div class="container">
      <!-- .btn-navbar is used as the toggle for collapsed navbar content
      -->
      <a class="brand" href="../home">Faculty Cooperative</a>
      <a class="brand" href="../search">Search</a>
      <a class="brand" href="#">Link 3</a>
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
              <li class="active">{{ HTML::link('search', 'Search') }}</li>
              <li><a href="faq">FAQs</a></li>
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
                @if(!Auth::check())
                    <li>{{ HTML::link('/register', 'Register') }}</li>   
                    <li>{{ HTML::link('/login', 'Login') }}</li>   
                @else
                    <li>{{ HTML::link('/logout', 'Logout') }}</li>
                @endif
            </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>
    </div>
  </div>
  @show