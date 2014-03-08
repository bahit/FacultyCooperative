@extends('main')
@section('content')

<div class="sbanner">
		<h2> Welcome to the search page!</h2>
		<p>Search for People, Ventures, Skills Offered and Skills Wanted</p>
</div>

<!--This picks up errors from validation
{{ HTML::ul($errors->all()) }}-->

@if(!isset($searchedFor))
    {{$searchedFor = ''}}
@endif


<fieldset>

    <legend>Search for user by name</legend>
    
    
    

<div class="left">
    
<form class="navbar-form navbar-left" role="search">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-warning">Search</button>
</form>

<!--
{{ Form::open(array('url' => 'searchUserNames',  'method' => 'post')) }}

{{ Form::label('search', 'user name', array('class' => 'form-label')) }}

{{ Form::text('search', $searchedFor, array('class'=>'input-block-level', 'placeholder'=>'search')) }}

{{ Form::submit('Search',array('class' => 'submit')) }}


{{ Form::close() }}
-->
</div>

<div class="right">

<p>Search for any user of the Faculty Cooperative by any part of their name</p>

</div>

@if(isset($users))

<p>Search results {{$count}}</p>

@foreach($users as $key => $users)

<p><a href='publicProfile/{{$users->id}}'>View {{$users->name}}'s profile</a></p>

@endforeach
@endif

</fieldset>
<!--  begin search venture by name   -->

@if(!isset($searchedVenture))
    {{$searchedVenture = ''}}
@endif

<fieldset>
    <legend>Search for Venture by Title</legend>
    
    <div class="left">
       
    <form class="navbar-form navbar-left" role="search">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-primary">Search</button>
</form>
<!--
{{ Form::open(array('url' => 'searchVentureTitles',  'method' => 'post')) }}

{{ Form::label('search', 'title', array('class' => 'form-label')) }}
{{ Form::text('venture', $searchedVenture, array('class'=>'input-block-level', 'placeholder'=>'search')) }}


{{ Form::submit('Search',array('class' => 'form-button')) }}


{{ Form::close() }}
-->
</div>

<div class="right">

	<p>Search for current ventures by any match in their titles</p>

</div>
@if(isset($ventures))

<p>Search results {{$count}}</p>

@foreach($ventures as $key => $ventures)

<p><a href='viewVenture/{{$ventures->id}}'>View {{$ventures->title}}'s page</a></p>

@endforeach
@endif

</fieldset>

<!--  begin search for  skills being offered by skill name -->


@if(!isset($searchedSkill))
    {{$searchedSkill = ''}}
@endif

<fieldset>
    <legend>Search for Skills being Offered</legend>
	
    <div class="left">
  	<form class="navbar-form navbar-left" role="search">
  		<div class="form-group">
    	<input type="text" class="form-control" placeholder="Search">
  		</div>
  		<button type="submit" class="btn btn-success">Search</button>
	</form>
<!--
{{ Form::open(array('url' => 'searchSkillsOffered',  'method' => 'post')) }}

{{ Form::label('skill', 'Search for skill being offered', array('class' => 'form-label')) }}
{{ Form::text('skill', $searchedSkill, array('class'=>'input-block-level', 'placeholder'=>'search')) }}


{{ Form::submit('Search',array('class' => 'form-button')) }}


{{ Form::close() }}

-->
</div>

<div class="right">
<p>Search for skills that are currently offered by users. Clicking in the skill in the result will take you to a list of users
    with that skill. Click on the user to contact them.</p>
</div>

@if(isset($skills))
<p>Please click on a result to see a list of users with that skill</p>

@foreach($skills as  $skills)

    <p><a href='searchSkills/{{$skills->id}}'>View users with skill {{$skills->category}}: {{$skills->skill_name}} </a></p>


@endforeach
@endif


@if(isset($usersWithSkill))

<p>These are the users offering the skill {{$chosenSkill->skill_name}}</p>

@foreach($usersWithSkill as $userWith)

<li><!--SEE profile controller - need to resize image when saved!!!  ST -->

    <a href='../publicProfile/{{$userWith->user_id}}'>
        <img src='../images/{{$userWith->image}}' width="80px"/>
        View {{$userWith->name}}'s profile</a></li>


@endforeach


@endif
</fieldset>

<!--  begin search for skills WANTED by skill name -->


@if(!isset($searchedSkillWanted))
{{$searchedSkillWanted = ''}}
@endif

<fieldset>
    <legend>Search for Skills Wanted by Ventures</legend>
    
    <div class="left">

<form class="navbar-form navbar-left" role="search">
  <div class="form-group">
    <input type="text" class="form-control" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-danger">Search</button>
</form>
<!--
{{ Form::open(array('url' => 'searchSkillsWanted',  'method' => 'post')) }}

{{ Form::label('skill', 'Search for skills that are wanted by ventures', array('class' => 'form-label')) }}
{{ Form::text('skillWanted', $searchedSkill, array('class'=>'input-block-level', 'placeholder'=>'search')) }}


{{ Form::submit('Search',array('class' => 'form-button')) }}


{{ Form::close() }}

-->
</div>

<div class="right">

<p>Search for skills that are currently wanted by ventures. Clicking on a venture in the search result will take
        you to a list of ventures
        searching for that skill. Click on the venture to read about it.</p>
</div>


@if(isset($skillsWanted))
<p>Please click on a result to see a list of users with that skill</p>

@foreach($skillsWanted as  $skills)

<p><a href='venturesWantingSkill/{{$skills->id}}'>View ventures that want skill {{$skills->category}}: {{$skills->skill_name}} </a></p>



@endforeach
@endif


@if(isset($venturesWantingSkill))

<p>These are the ventures wanting the skill {{$chosenSkillWanted->skill_name}}</p>

@foreach($venturesWantingSkill as $venturesWanting)


    <li>
    <a href='../viewVenture/{{$venturesWanting->venture_id}}'>
        <img src='../images/{{$venturesWanting->logo}}' width="80px"/>
        View {{$venturesWanting->title}}'s profile</a></li>


@endforeach


@endif

</fieldset>
@endsection





