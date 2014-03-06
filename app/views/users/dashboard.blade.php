@extends("main")
@section("content")
  <div class="container-fluid">
    <div class="row">

        <!--
        <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          <li class="active"><a href="#">Overview</a></li>
          <li><a href="../editProfile">Edit Profile</a></li>
          <li><a href="../search">Search</a></li>

        </ul>

      </div>
        -->

      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Hello {{$user->name}}</h1>


         <p> <img src='../images/{{$user->image}}' width="200px"/></p>

          <h3><a href="../editProfile">Update your profile</a></h3>

          <h3><a href="../createVenture">Create a new venture</a></h3>


          @if($teamInvolvement)
          <h3>Team Memberships</h3>
          <p>You are involved with the following ventures</p>
          @foreach($teamInvolvement as $team)
          <li><a href='../viewVenture/{{$team->venture_id}}'>{{$team->title}}</a></li>

          @endforeach
          @endif

         <!--
        <div class="row placeholders">
          <div class="col-xs-6 col-sm-3 placeholder">
            <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Label</h4>
            <span class="text-muted">Something else</span>
          </div>
          <div class="col-xs-6 col-sm-3 placeholder">
            <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Label</h4>
            <span class="text-muted">Something else</span>
          </div>
          <div class="col-xs-6 col-sm-3 placeholder">
            <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Label</h4>
            <span class="text-muted">Something else</span>
          </div>
          <div class="col-xs-6 col-sm-3 placeholder">
            <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
            <h4>Label</h4>
            <span class="text-muted">Something else</span>
          </div>
        </div>
-->

        </div>
      </div>
    </div>
  </div>

@stop