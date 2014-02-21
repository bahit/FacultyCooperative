@extends('main')
@section('content')
        
        <h1>View Venture</h1>
      
        <h2>About {{$venture->title}}</h2>
        
        <p>The team leader is {{$team_leader->screen_name}}</p>
       
      <p>Team members are</p>
       
       
        @foreach($team_members as $team_member)
          <a href="../publicProfile/{{$team_member->user_id}}" >{{$team_member->name}}</a>

        @endforeach
       
     
        
        
@endsection



