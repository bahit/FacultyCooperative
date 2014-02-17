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
        
        <h1>View Public profile</h1>
      
        <h2>About {{$profile->screenName}}</h2>
        
       
       <p> {{$profile->screenName}}'s details:    {{$profile->bioDetails}} </p>
       <p> {{$profile->screenName}}'s career status:   {{$profile->careerStatus}} </p>
       <p> {{$profile->screenName}}'s institution: {{$profile->institution}} </p>
       
       <p> {{$profile->screenName}}'s skills: ??could be a <em>subview</em> ?? </p>
       
       <!--loop category hierachy-->
       
       {{$category = ''}}
       @foreach($skills as $key => $skill)
              
              
              @if ($category <> $skill->category)
                    <br>{{$category = $skill->category}}: &nbsp;
              @endif      
             {{ $skill->skillName }}, &nbsp;
            
       
       @endforeach
       
      
		
		
       
       
       <p> {{$profile->screenName}}'s investment offered: {{$profile->investmentOffered}} </p>
        
        
      
        
        
</body>
</html>




