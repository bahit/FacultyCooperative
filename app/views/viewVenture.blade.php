@extends('main')
@section('content')

<div class="container">
	<ul class="nav nav-tabs">
		<li class="active">
        <a href="#">
			<span class="glyphicon glyphicon-briefcase"></span> Venture
        </a></li>
    	
	</ul>
</div>

<div class="row show-grid">
	<div class="col-md-4">
    	<div class="thumbnail">
		 <img src='../image2/profile/{{$venture->logo}}' />
		<ul class="list-group custom-set">
        	<li class="list-group-item">
   		  	<span class="glyphicon glyphicon-gbp"></span>
                <b>Funding</b></br></br>
                @if($venture->funding_target>0)
                <div class="progress">
   				  <div class="bar" style="width: {{number_format($venture->funding_secured/$venture->funding_target*100,0)}}%;">
                    </div>
   				</div>
                This venture is {{number_format($venture->funding_secured/$venture->funding_target*100,0)}}% funded
                   @endif
                   
			</li>
        	<li class="list-group-item">
            	<span class="glyphicon glyphicon-cog"></span>
                        <b>Skills wanted</b></br></br>
            
            			{{$category=''}}
						@foreach($skillsWanted as $skill)
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
        		<h2>About {{$venture->title}}</h2></br>
                <p>{{$venture->description}}</p>
                
                <h3>Team members:</h3>
                @foreach($teams as $team)
                <li> <!--auto resize -->
                	<a href="../publicProfile/{{$team->user_id}}"><img src='../image2/thumb/{{$team->image}}' /> {{$team->name}}</a>
                	@if($team->position==2)
          			<strong>Team Leader</strong>
    				@endif

    				@if($team->position==1)
              		<strong>Team Mentor</strong>
    				@endif

				</li>
					@endforeach
                    
                @if($auth)
				<h3>You are a team leader for this venture</h3>
				<h3><a href='../editVenture/{{$venture->id}}'> click here to edit this venture</a></h3>
				<h3><a href='../editTeam/{{$venture->id}}'> click here to edit the team for this venture</a></h3>
				@endif
            </div>
     
    	</div>
    
    </div>
    
</div>

@endsection


