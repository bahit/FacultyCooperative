@extends('main')
@section('content')

<div class="container">
	<ul class="nav nav-tabs">
		<li class="active">
        <a href="#">
			<span class="glyphicon glyphicon-user"></span> Profile
        </a></li>
    	
	</ul>
</div>
<div class="row show-grid">
	<div class="col-md-4">
    	<div class="thumbnail">

    	<img src='/image2/profile/{{$profile->image}}' />
		<ul class="list-group custom-set">
        <!--<li class="list-group-item">
        		<span class="glyphicon glyphicon-envelope"></span>
     
				<a href="../sendMessage/{{$profile->id}}">
						Send a message
                        </a>
          </li>
       	  --><li class="list-group-item">
        		<span class="glyphicon glyphicon-briefcase"></span>
				<b>Ventures</b>

			@if($teamInvolvement)
			<p>{{$profile->name}} is involved with the following ventures:</p>
			</li> 
			
            @foreach($teamInvolvement as $team)
			<li class="list-group-item"><a href='../viewVenture/{{$team->venture_id}}'>{{$team->title}}</a></li>
            @endforeach
            @endif       
                                 
          <!--
          <li class="list-group-item">
          		<p class="glyphicon-friends">
                <span class="glyphicon glyphicon-user"></span>
                <span class="glyphicon glyphicon-user"></span>
                </p>

						Teams
          </li>-->
           <li class="list-group-item">
            	<span class="glyphicon glyphicon-cog"></span>
                        <b>Skills</b>
                        </br>{{$profile->name}} offers the following skills:
            
            
            {{$category=''}}
			@foreach($skillOffer as $skill)
				@if ($category<>$skill->category)
			
            	<b><i>{{$skill->category}}</i></b></br>
				@endif

				{{$skill->skill_name}}</br>
				<?php $category=$skill->category ?>
			@endforeach
            </li>
          </ul>
   	  </div>
    </div>
    
    <div class="col-md-8 left-block">
    	<div class="info-block">
        	<div class="info-text">
        		<h2>{{$profile->name}}'s Public Profile Page</h2></br>
                <h3>About</h3>
            	<p>{{$profile->bio_details}} </p>
				<p> {{$profile->name}}'s career status: {{$profile->career_status}} </p>
				<p> {{$profile->name}}'s institution: {{$profile->institution}} </p>
                @if($profile->investmentOffered=1)
				<h4>{{$profile->name}} is willing to offer investment</h4>
				@else
				<h4>{{$profile->name}} is not willing to offer investment</h4>
				@endif
                </br>

                <h3> <span class="glyphicon glyphicon-envelope"></span> <a href="../sendMessage/{{$profile->id}}">Send a message to {{$profile->name}}</a></h3>
            </div>
            </br>

     	<ul class="social-icon">
        	<li><a class="social twitter" href="">Google+</a></li>
            <li><a class="social google_plus" href="">@Twitter</a></li>
            <li><a class="social facebook" href="">Facebook</a></li>
            <li><a class="social skype" href="">Skype</a></li>
     
     	</ul>

     
    	</div>
    
    </div>
</div>
<!--


<br>
-->
@endsection