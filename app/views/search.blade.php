@extends('main')
@section('content')


<h1>Search Page</h1>

<h2>We can do some searching here!</h2>

<!--This picks up errors from validation
{{ HTML::ul($errors->all()) }}-->

@if(!isset($searchedFor))
    {{$searchedFor = ''}}
@endif

{{ Form::open(array('url' => 'searchUserNames',  'method' => 'post')) }}

{{ Form::label('search', 'Search for user by name', array('class' => 'form-label')) }}
{{ Form::text('search', $searchedFor, array('class'=>'input-block-level', 'placeholder'=>'search')) }}


{{ Form::submit('Search',array('class' => 'form-button')) }}


{{ Form::close() }}



@if(isset($users))

<p>Search results {{$count}}</p>

@foreach($users as $key => $users)

<p><a href='publicProfile/{{$users->id}}'>View {{$users->name}}'s profile</a></p>

@endforeach
@endif

<!--  begin search venture by name   -->

@if(!isset($searchedVenture))
    {{$searchedVenture = ''}}
@endif

{{ Form::open(array('url' => 'searchVentureTitles',  'method' => 'post')) }}

{{ Form::label('search', 'Search for venture by title', array('class' => 'form-label')) }}
{{ Form::text('venture', $searchedVenture, array('class'=>'input-block-level', 'placeholder'=>'search')) }}


{{ Form::submit('Search',array('class' => 'form-button')) }}


{{ Form::close() }}



@if(isset($ventures))

<p>Search results {{$count}}</p>

@foreach($ventures as $key => $ventures)

<p><a href='viewVenture/{{$ventures->id}}'>View {{$ventures->title}}'s page</a></p>

@endforeach
@endif



<!--  begin search for  skills being offered by skill name -->


@if(!isset($searchedSkill))
    {{$searchedSkill = ''}}
@endif

{{ Form::open(array('url' => 'searchSkillsOffered',  'method' => 'post')) }}

{{ Form::label('skill', 'Search for skill being offered', array('class' => 'form-label')) }}
{{ Form::text('skill', $searchedSkill, array('class'=>'input-block-level', 'placeholder'=>'search')) }}


{{ Form::submit('Search',array('class' => 'form-button')) }}


{{ Form::close() }}

@if(isset($skills))
<p>Please click on a result to see a list of users with that skill</p>

@foreach($skills as  $skills)

    <p><a href='searchSkills/{{$skills->id}}'>View users with skill {{$skills->category}}: {{$skills->skill_name}} </a></p>



@endforeach
@endif


@if(isset($usersWithSkill))

<p>These are the users offering the skill {{$chosenSkill->skill_name}}</p>

@foreach($usersWithSkill as $userWith)

<p><!--SEE profile controller - need to resize image when saved!!!  ST -->
    <img src='../images/{{$userWith->image}}' width="80px"/>
    <a href='../publicProfile/{{$userWith->user_id}}'>View {{$userWith->name}}'s profile</a></p>


@endforeach


@endif


<!--  begin search for  skills WANTED by skill name -->


@if(!isset($searchedSkillWanted))
{{$searchedSkillWanted = ''}}
@endif

{{ Form::open(array('url' => 'searchSkillsWanted',  'method' => 'post')) }}

{{ Form::label('skill', 'Search for skills that are wanted by ventures', array('class' => 'form-label')) }}
{{ Form::text('skillWanted', $searchedSkill, array('class'=>'input-block-level', 'placeholder'=>'search')) }}


{{ Form::submit('Search',array('class' => 'form-button')) }}


{{ Form::close() }}

@if(isset($skillsWanted))
<p>Please click on a result to see a list of users with that skill</p>

@foreach($skillsWanted as  $skills)

<p><a href='venturesWantingSkill/{{$skills->id}}'>View ventures that want skill {{$skills->category}}: {{$skills->skill_name}} </a></p>



@endforeach
@endif


@if(isset($venturesWantingSkill))

<p>These are the ventures wanting the skill {{$chosenSkillWanted->skill_name}}</p>

@foreach($venturesWantingSkill as $venturesWanting)

<p><a href='../viewVenture/{{$venturesWanting->venture_id}}'>
        View {{$venturesWanting->title}}'s profile</a></p>


@endforeach


@endif


@endsection





