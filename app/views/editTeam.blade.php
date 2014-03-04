@extends('main')
@section('content')


<h1>Edit Team for {{$venture->title}}</h1>

@if(isset($success))
<!--hateful inline style temporary!-->
<h4 style="background-color:red;">Thank you - your Team has been updated</h4>

@endif

<!--This picks up errors from validation-->
{{ HTML::ul($errors->all()) }}
<p><em>This is a UNFINISHED</em></p>

<!--
@{{ Form::open(array('url' => 'updateVentureTeam/'.$venture->id, 'files' => true, 'method' => 'post')) }}

@{{ Form::label('leader', 'Leader', array('class' => 'form-label')) }}
@{{ Form::text('leader', $team_leader->email, array('class'=>'input-block-level', 'placeholder'=>'title')) }}
<br>





@{{ Form::submit('Update your Team',array('class' => 'form-button')) }}


@{{ Form::close() }}

-->
@foreach($teams as $team)
<li> <!--SEE profile controller - need to resize image when saved!!!  ST -->
    <img src='../images/{{$team->image}}' width="80px"/>

    <a href="../publicProfile/{{$team->user_id}}">{{$team->name}}</a>

<button>Delete from Team</button>
</li>

@endforeach




@endsection




