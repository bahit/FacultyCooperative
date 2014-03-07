@extends('main')
@section('content')


<h2>Team Management Page</h2>
<h2><a href='/FacultyCooperative/public/viewVenture/{{$venture->id}}'>{{$venture->title}}</a></h2>

@if(isset($success))
<!--hateful inline style temporary!-->
<h4 style="background-color:red;">Thank you - your Team has been updated</h4>
@endif


<!--This picks up errors from validation-->
{{ HTML::ul($errors->all()) }}

<h3>Edit team member status</h3>

@foreach($teams as $team)
<li> <!--SEE profile controller - need to resize image when saved!!!  ST -->


    {{ Form::open(array('url' => 'editTeamUser/'.$team->id, 'method' => 'post')) }}

    <img src='/FacultyCooperative/public/images/{{$team->image}}' width="80px"/>{{$team->name}}

    {{ Form::select('position', array(

    '1' => 'Team Mentor',
    '2' => 'Team Leader',
    '3' => 'Team Member'

    ),$team->position) }}

    Delete Member: {{ Form::checkbox('delete', 'delete') }}

    {{ Form::submit('update',array('class' => 'form-button')) }}


    {{ Form::close() }}


</li>

@endforeach


<h3>Add a new member to team</h3>

<fieldset>
    <legend>Search for Faculty Cooperative user to add to team</legend>

    <p>Search for any user of the Faculty Cooperative by any part of their name</p>

    {{ Form::open(array('url' => 'searchUserToAdd/'.$venture->id, 'method' => 'post')) }}

    {{ Form::label('search', 'user name', array('class' => 'form-label')) }}
    {{ Form::text('search', '', array('class'=>'input-block-level', 'placeholder'=>'search')) }}



    {{ Form::submit('Search',array('class' => 'form-button')) }}


    {{ Form::close() }}


    @if(isset($users))

    <p>Search results {{$count}}</p>

    @foreach($users as $key => $users)

    <p><a href='../addUserToTeam/{{$users->id}}/{{$venture->id}}'>Add {{$users->name}} to the team</a></p>

    @endforeach
    @endif

</fieldset>

@endsection




