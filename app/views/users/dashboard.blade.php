@extends("main")
@section("content")
  <div class="container-fluid">
    <div class="row">



      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Hello {{$user->name}}</h1>


         <p> <img src='../images/{{$user->image}}' width="200px"/></p>

          <h3><a href="../editProfile">Update your profile</a></h3>

          <h3><a href="../publicProfile/{{$user->id}}">View your public profile</a></h3>

          <h3><a href="../createVenture">Create a new venture</a></h3>

          <h3><a href="../readMessage">Read your messages</a></h3>




          @if($teamInvolvement)
          <h3>Team Memberships</h3>
          <p>You are involved with the following ventures</p>
          @foreach($teamInvolvement as $team)
          <li><a href='../viewVenture/{{$team->venture_id}}'>{{$team->title}}</a></li>

          @endforeach
          @endif


          @if(count($venturesWantingUsersSkills)>0)
          <h3>These Ventures May be Interested in your Skills</h3>

          @foreach($venturesWantingUsersSkills as $venture)
          <li><a href='../viewVenture/{{$venture->venture_id}}'>{{$venture->title}}</a></li>

          @endforeach
          @endif






        </div>
      </div>
    </div>
  </div>

@stop