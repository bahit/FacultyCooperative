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

{{ Form::open(array('url' => 'searchUserNames',  'method' => 'post',
    'class'=>'navbar-form')) }}

    <div class="search-left">
    	<div class="form-group">
		{{ Form::text('search', $searchedFor, array('class'=>'input-block-level', 'placeholder'=>'search', 'class'=>'form-control')) }}
		</div>
		{{ Form::submit('Search',array('class' => 'form-button','class'=>'btn btn-warning')) }}
    </div>
    
    <div class="search-right">
		<p>Search for any user of the Faculty Cooperative by any part of their name</p>

@if(isset($users))

<p>Search results {{$count}}</p>

@foreach($users as $key => $users)

        <li class="thumb-list">
<a href='publicProfile/{{$users->id}}'><img src='{{URL::to('')}}/image2/tiny/{{$users->image}}' />View {{$users->name}}'s profile</a>
            </li>

@endforeach
@endif
    </div>

    {{ Form::close() }}

</fieldset>
<!--  begin search venture by name   -->

@if(!isset($searchedVenture))
    {{$searchedVenture = ''}}
@endif


<fieldset>
    <legend>Search for Venture by Title</legend>   

	{{ Form::open(array('url' => 'searchVentureTitles', 'method' => 'post', 'class'=>'navbar-form')) }}

	<div class="search-left">
    	<div class="form-group">
		{{ Form::text('venture', $searchedVenture, array('class'=>'input-block-level', 'placeholder'=>'search', 'class'=>'form-control')) }}
		</div>
	{{ Form::submit('Search',array('class' => 'form-button', 'class'=>'btn btn-primary')) }}
	</div>

	<div class="search-right">

<p>Search for current ventures by any match in their titles</p>

@if(isset($ventures))

<p>Search results {{$count}}</p>

@foreach($ventures as $key => $ventures)

        <li class="thumb-list">

            <a href='viewVenture/{{$ventures->id}}'>
                <img src='{{URL::to('')}}/image2/tiny/{{$ventures->logo}}' />View {{$ventures->title}}'s page</a>

        </li>

@endforeach
@endif


	</div>

{{ Form::close() }}



</fieldset>

<!--  begin search for  skills being offered by skill name -->


@if(!isset($searchedSkill))
    {{$searchedSkill = ''}}
@endif



<fieldset>
    <legend>Search for Skills being Offered</legend>

{{ Form::open(array('url' => 'searchSkillsOffered',  'method' => 'post', 'class'=>'navbar-form')) }}

	<div class="search-left">
    	<div class="form-group">

			{{ Form::text('skill', $searchedSkill, array('class'=>'input-block-level', 'placeholder'=>'search',  'class'=>'form-control')) }}

		</div>
		{{ Form::submit('Search',array('class' => 'form-button', 'class'=>'btn btn-success')) }}

	</div>

	<div class="search-right">

 <p>Search for skills that are currently offered by users. Clicking in the skill in the result will take you to a list of users
    with that skill. Click on the user to contact them.</p>


@if(isset($skills))
<p>Please click on a result to see a list of users with that skill</p>

@foreach($skills as  $skills)

    <p><a href='searchSkills/{{$skills->id}}'>View users with skill {{$skills->category}}: {{$skills->skill_name}} </a></p>



@endforeach
@endif


@if(isset($usersWithSkill))

<p>These are the users offering the skill {{$chosenSkill->skill_name}}</p>

@foreach($usersWithSkill as $userWith)

        <li class="thumb-list">

    <a href='/publicProfile/{{$userWith->user_id}}'>
        <img src='{{URL::to('')}}/image2/tiny/{{$userWith->image}}' />
        View {{$userWith->name}}'s profile</a></li>


@endforeach


@endif
</div>

{{ Form::close() }}

</fieldset>

<!--  begin search for  skills WANTED by skill name -->


@if(!isset($searchedSkillWanted))
{{$searchedSkillWanted = ''}}
@endif

<fieldset>
    <legend>Search for Skills Wanted by Ventures</legend>

    {{ Form::open(array('url' => 'searchSkillsWanted',  'method' => 'post', 'class'=>'navbar-form')) }}
    
    <div class="search-left">
    	<div class="form-group">
			{{ Form::text('skillWanted', $searchedSkill, array('class'=>'input-block-level', 'placeholder'=>'search', 'class'=>'form-control')) }}
		</div>
		{{ Form::submit('Search',array('class' => 'form-button', 'class'=>'btn btn-danger')) }}
	</div>

{{ Form::close() }}

<div class="search-right">
<p>Search for skills that are currently wanted by ventures. Clicking on a venture in the search result will take
        you to a list of ventures
        searching for that skill. Click on the venture to read about it.</p>


@if(isset($skillsWanted))
<p>Please click on a result to see a list of users with that skill</p>

@foreach($skillsWanted as  $skills)

<p><a href='venturesWantingSkill/{{$skills->id}}'>View ventures that want skill {{$skills->category}}: {{$skills->skill_name}} </a></p>



@endforeach
@endif


@if(isset($venturesWantingSkill))

<p>These are the ventures wanting the skill {{$chosenSkillWanted->skill_name}}</p>

@foreach($venturesWantingSkill as $venturesWanting)


    <li class="thumb-list">
    <a href='{{URL::to('')}}/viewVenture/{{$venturesWanting->venture_id}}'>
        <img src='{{URL::to('')}}/image2/tiny/{{$venturesWanting->logo}}' />
        View {{$venturesWanting->title}}'s profile</a></li>


@endforeach


@endif
</div>
</fieldset>
@endsection





