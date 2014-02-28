@extends('main')
@section('content')

<h1>View Venture</h1>

<h2>About {{$venture->title}}</h2>

<p><img src='../images/{{$venture->logo}}' width="300px"/></p>

<p>{{$venture->description}}</p>

<h3>This venture is {{number_format($venture->funding_secured/$venture->funding_target*100,0)}}% funded</h3>
<em>!! This would look much nicer as a little graphic - could be done with css??  !!</em>



<h2>Team members</h2>


@foreach($team_members as $team_member)
<li> <!--SEE profile controller - need to resize image when saved!!!  ST -->
    <img src='../images/{{$team_member->image}}' width="80px"/>

    <a href="../publicProfile/{{$team_member->user_id}}">{{$team_member->name}}</a></li>

@endforeach

<p>The team leader is {{$team_leader->name}}</p>

<h2>Skills wanted by this venture</h2>


@foreach($skillsWanted as $skillsWanted)

<li>Skill category: {{$skillsWanted->category}} Skill: {{$skillsWanted->skill_name}}</li>
@endforeach


@endsection



