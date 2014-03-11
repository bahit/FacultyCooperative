@section("header")
<!-- Navbar
<div class="navbar navbar navbar-fixed-top">-->
    <div class="navbar-brand">
        <!--  <div class="container">-->

            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">


                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>


                        {{ HTML::link('home', 'Faculty Cooperative', array('class' => 'navbar-brand')) }}
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav  ">
                            <li>{{ HTML::link('home', 'Home') }}</li>
                            <li>{{ HTML::link('search', 'Search') }}</li>
                            <li>{{ HTML::link('faq', 'FAQs') }}</li>




                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if(!Auth::check())
                            <li>{{ HTML::link('/register', 'Register') }}</li>
                            <li>{{ HTML::link('/login', 'Login') }}</li>

                            @else

                            <?php
                            $id = Auth::user()->id;
                            $user = User::find($id);?>
                            <li><img src='../image2/tiny/{{$user->image}}'/></li>
                            <li>{{ HTML::link('dashboard', 'Dashboard') }}</li>
                            <li>{{ HTML::link('/logout', 'Logout') }}</li>

                            @endif
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
      <!--  </div>
    </div>-->
</div>
@show