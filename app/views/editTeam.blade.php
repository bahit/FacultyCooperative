@extends('main')
@section('content')


<h2>Team Management Page for @{{$venture->title}}</h2>

<p><a href=''>Add member to team</a></p>

<p><a href=''>Remove member from team</a></p>

<p><a href=''>Edit members position in team</a></p>

@if(isset($success))
<!--hateful inline style temporary!-->
<h4 style="background-color:red;">Thank you - your Team has been updated</h4>

@endif

<!--This picks up errors from validation-->
{{ HTML::ul($errors->all()) }}
<p><em>This is a UNFINISHED</em></p>
<h3>Edit team member status or remove member from team</h3>




@if(isset($editPosition))

@foreach($teams as $team)
<li> <!--SEE profile controller - need to resize image when saved!!!  ST -->
    <img src='../images/{{$team->image}}' width="80px"/>

    <a href="../publicProfile/{{$team->user_id}}">{{$team->name}}</a>




    {{ Form::open(array('url' => 'editTeamUser/'.$team->id,  'method' => 'post')) }}

    {{ Form::select('position', array(

    '1' => 'Team Mentor',
    '2' => 'Team Leader',
    '3' => 'Team Member'

    ),$team->position) }}



    {{ Form::submit('Change Team Member Position',array('class' => 'form-button')) }}


    {{ Form::close() }}


    <button>Delete from Team</button>



</li>

@endforeach

@endif

<h3>Add a new member to team</h3>

<fieldset>
    <legend>Search for Faculty Cooperative user to add to team</legend>

    <p>Search for any user of the Faculty Cooperative by any part of their name</p>

    {{ Form::open(array('url' => 'searchUserToAdd',  'method' => 'post')) }}

    {{ Form::label('search', 'user name', array('class' => 'form-label')) }}
    {{ Form::text('search', '', array('class'=>'input-block-level', 'placeholder'=>'search')) }}


    {{ Form::submit('Search',array('class' => 'form-button')) }}


    {{ Form::close() }}


    @if(isset($users))

    <p>Search results {{$count}}</p>

    @foreach($users as $key => $users)

    <p><a href='addUserToTeam/{{$users->id}}'>Add {{$users->name}} to the team</a></p>

    @endforeach
    @endif



    @endsection




