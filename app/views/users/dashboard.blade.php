@extends("main")
@section("content")

<div class="container">
	<ul class="nav nav-tabs">
		<li class="active">
        <a href="#">
			<span class="glyphicon glyphicon-user"></span> Dashboard
        </a></li>
    	
	</ul>
</div>

<div class="row show-grid">
	<div class="col-md-4">
    	<div class="thumbnail">
		<img src='{{URL::to('')}}/image2/profile/{{$user->image}}' />
    	
		<ul class="list-group custom-set">
        <li class="list-group-item">
          		<p class="glyphicon-friends">
                <span class="glyphicon glyphicon-user"></span>
                <span class="glyphicon glyphicon-user"></span>
                </p>

						<a href="../editProfile">Update your profile</a>
          </li>
        <li class="list-group-item">
        		<span class="glyphicon glyphicon-envelope"></span>
    			<a href="/readMessage">Read your messages</a>
          </li>
          <li class="list-group-item">
        		<span class="glyphicon glyphicon-briefcase"></span>
                <a href="/createVenture">Create a new venture</a>
               
          </li>
          <li class="list-group-item">
                <span class="glyphicon glyphicon-user"></span>
						<a href="/publicProfile/{{$user->id}}">View your public profile</a>
          </li>
          
       	  </ul>
    	</div>
    
    </div>


<div class="col-md-8 left-block">
    	<div class="info-block">
        	<div class="info-text">
            <h1 class="page-header">Hello {{$user->name}}!</h1>
            @if($teamInvolvement)
          	<h3>Team Memberships</h3>
          	<p>You are involved with the following ventures:</p>
          	@foreach($teamInvolvement as $team)
          	<li class="thumb-list">

                <a href='/viewVenture/{{$team->venture_id}}'>
                    <img src='{{URL::to('')}}/image2/tiny/{{$team->logo}}' />{{$team->title}}</a></li>

          	@endforeach
          	@endif


          	@if(count($venturesWantingUsersSkills)>0)
          	<h3>These ventures may be interested in your skills:</h3>

          	@foreach($venturesWantingUsersSkills as $venture)
          	<li class="thumb-list">
                <a href='/viewVenture/{{$venture->venture_id}}'>
                    <img src='{{URL::to('')}}/image2/tiny/{{$venture->logo}}' />{{$venture->title}}</a></li>

          	@endforeach
          	@endif
            
            </div>
     
    	</div>
    
    </div>
  </div>

@stop