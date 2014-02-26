@extends('main')
@section('content')
        
        <h1>View Venture</h1>
      
        <h2>About {{$venture->title}}</h2>
        
        <p>The team leader is {{$team_leader->screen_name}}</p>
       
      <h2>Team members</h2>
       
       
        @foreach($team_members as $team_member)
         <li> <a href="../publicProfile/{{$team_member->user_id}}" >{{$team_member->name}}</a></li>

        @endforeach

<h2>Skills wanted by this venture</h2>


@foreach($skillsWanted as $skillsWanted)

<li>Skill category: {{$skillsWanted->category}}  Skill: {{$skillsWanted->skill_name}}</li>
@endforeach
        
        
@endsection



