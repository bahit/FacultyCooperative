@extends('main')
@section('content')


<h1>Search Page</h1>

<h2>We can do some searching here!</h2>

<!--This picks up errors from validation
{{ HTML::ul($errors->all()) }}-->


{{ Form::open(array('url' => 'searchUserNames',  'method' => 'post')) }}

{{ Form::label('search', 'Search for user by name', array('class' => 'form-label')) }}
{{ Form::text('search', '', array('class'=>'input-block-level', 'placeholder'=>'search')) }}


{{ Form::submit('Search',array('class' => 'form-button')) }}


{{ Form::close() }}



@if(isset($users))

@foreach($users as $key => $users)

<p><a href='publicProfile/{{$users->id}}'>View {{$users->name}}'s profile</a></p>

@endforeach
@endif

<!--  begin search venture by name   -->

{{ Form::open(array('url' => 'searchVentureTitles',  'method' => 'post')) }}

{{ Form::label('search', 'Search for venture by title', array('class' => 'form-label')) }}
{{ Form::text('venture', '', array('class'=>'input-block-level', 'placeholder'=>'search')) }}


{{ Form::submit('Search',array('class' => 'form-button')) }}


{{ Form::close() }}



@if(isset($ventures))
hello
@foreach($ventures as $key => $ventures)

<p><a href='viewVenture/{{$ventures->id}}'>View {{$ventures->title}}'s page</a></p>

@endforeach
@endif



<!--  begin search for user by skill  -->

{{ Form::open(array('url' => 'searchSkills',  'method' => 'post')) }}

{{ Form::label('skill', 'Search for skill by title', array('class' => 'form-label')) }}
{{ Form::text('skill', '', array('class'=>'input-block-level', 'placeholder'=>'search')) }}


{{ Form::submit('Search',array('class' => 'form-button')) }}


{{ Form::close() }}

@if(isset($usersWithSkill))
hello skills

@foreach($usersWithSkill as $key => $users)

<p><a href='publicProfile/{{$users->id}}'>View {{$users->name}}'s profile</a></p>

@endforeach


@endif





@endsection




