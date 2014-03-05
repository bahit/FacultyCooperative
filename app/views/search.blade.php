@extends('main')
@section('content')


<h2>Search Page</h2>

<h3>Search for People, Ventures, Skills Offered and Skills Wanted</h3>

<!--This picks up errors from validation
{{ HTML::ul($errors->all()) }}-->

@if(!isset($searchedFor))
    {{$searchedFor = ''}}
@endif


<fieldset>
    <legend>Search for user by name</legend>

    <p>Search for any user of the Faculty Cooperative by any part of their name</p>

{{ Form::open(array('url' => 'searchUserNames',  'method' => 'post')) }}

{{ Form::label('search', 'user name', array('class' => 'form-label')) }}
{{ Form::text('search', $searchedFor, array('class'=>'input-block-level', 'placeholder'=>'search')) }}


{{ Form::submit('Search',array('class' => 'form-button')) }}


{{ Form::close() }}




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
    <p>Search for current ventures by any match in their titles</p>

{{ Form::open(array('url' => 'searchVentureTitles',  'method' => 'post')) }}

{{ Form::label('search', 'title', array('class' => 'form-label')) }}
{{ Form::text('venture', $searchedVenture, array('class'=>'input-block-level', 'placeholder'=>'search')) }}


{{ Form::submit('Search',array('class' => 'form-button')) }}


{{ Form::close() }}







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

    <p>Search for skills that are currently offered by users. Clicking in the skill in the result will take you to a list of users
    with that skill. Click on the user to contact them.</p>

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

<li><!--SEE profile controller - need to resize image when saved!!!  ST -->

    <a href='../publicProfile/{{$userWith->user_id}}'>
        <img src='../images/{{$userWith->image}}' width="80px"/>
        View {{$userWith->name}}'s profile</a></li>


@endforeach


@endif
</fieldset>

<!--  begin search for  skills WANTED by skill name -->


@if(!isset($searchedSkillWanted))
{{$searchedSkillWanted = ''}}
@endif

<fieldset>
    <legend>Search for Skills Wanted by Ventures</legend>

    <p>Search for skills that are currently wanted by ventures. Clicking on a venture in the search result will take
        you to a list of ventures
        searching for that skill. Click on the venture to read about it.</p>


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


    <li>
    <a href='../viewVenture/{{$venturesWanting->venture_id}}'>
        <img src='../images/{{$venturesWanting->logo}}' width="80px"/>
        View {{$venturesWanting->title}}'s profile</a></li>


@endforeach


@endif

</fieldset>
@endsection





