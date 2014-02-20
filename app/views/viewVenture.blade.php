<html>
    <head>
    
    <style type="text/css">
    .input-block-level {
	font-family: Arial, Helvetica, sans-serif;
	display: block;
	}
	.form-label, form-button {
	font-family: Arial, Helvetica, sans-serif;
	display: block;
	}
    </style>
    </head>
    <body>
        
        <h1>View Venture</h1>
      
        <h2>About {{$venture->title}}</h2>
        
        <p>The team leader is {{$team_leader->screen_name}}</p>
       
      <p>Team members are</p>
       
       
        @foreach($team_members as $team_member)
          <a href="../publicProfile/{{$team_member->user_id}}" >{{$team_member->name}}</a>

        @endforeach
       
     
        
        
</body>
</html>


