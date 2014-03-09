@extends('main')
@section('content')

<div class="container">
	<ul class="nav nav-tabs">
		<li class="active">
			<a href="#">Overview</a>
        </li>
    	<li>
			<a href="#">Account</a>
        </li>
        <li>
			<a href="#">Ventures</a>
        </li>
	</ul>
</div>
<div class="row show-grid">
	<div class="col-md-4">
    	<div class="thumbnail">

    	<img src='../images/{{$profile->image}}' />
		<ul class="list-group custom-set">
       	  <li class="list-group-item">
        		<span class="glyphicon glyphicon-briefcase"></span>
       
						Ventures
          </li>
          <li class="list-group-item">
        		<span class="glyphicon glyphicon-envelope"></span>
     
				<a href="../sendMessage/{{$profile->id}}">
						Send a message
                        </a>
          </li>
          <li class="list-group-item">
          		<p class="glyphicon-friends">
                <span class="glyphicon glyphicon-user"></span>
                <span class="glyphicon glyphicon-user"></span>
                </p>

						Teams
          </li>
            <li class="list-group-item">
            	<span class="glyphicon glyphicon-cog"></span>
                		
                        Edit
            </li>
          </ul>
   	  </div>
    </div>
    
</div>

<h2>{{$profile->name}}'s Public Profile Page</h2>




<!--Auto resize route  ST -->
<img src='../image2/medium/{{$profile->image}}' />



<h3>About</h3>

<p>{{$profile->bio_details}} </p>
<p> {{$profile->name}}'s career status: {{$profile->career_status}} </p>
<p> {{$profile->name}}'s institution: {{$profile->institution}} </p>


@if($profile->investmentOffered=1)
<h4>{{$profile->name}} is willing to offer investment</h4>
@else
<h4>{{$profile->name}} is not willing to offer investment</h4>
@endif

<h3> {{$profile->name}} Offers the following skills: </h3>



{{$category=''}}
@foreach($skillOffer as $skill)

@if ($category<>$skill->category)
<h4>{{$skill->category}}</h4>
@endif

<li>{{$skill->skill_name}}</li>

<?php $category=$skill->category ?>
@endforeach



<br>

@if($teamInvolvement)
<h3>Team Memberships</h3>
<p>{{$profile->name}} is involved with the following ventures</p>
@foreach($teamInvolvement as $team)
<li><a href='../viewVenture/{{$team->venture_id}}'>{{$team->title}}</a></li>

@endforeach
@endif


<h3><a href="../sendMessage/{{$profile->id}}">Send a message to {{$profile->name}}</a></h3>

<br>

@endsection