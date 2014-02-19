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
      
        <h2>About {{$profile->screen_name}}</h2>
        
       
       <p> {{$profile->screen_name}}'s details:    {{$profile->bio_details}} </p>
       <p> {{$profile->screen_name}}'s career status:   {{$profile->career_status}} </p>
       <p> {{$profile->screen_name}}'s institution: {{$profile->institution}} </p>
       
       <p> {{$profile->screen_name}}'s Loop skills offered: ??could be a <em>subview</em> ?? </p>
       
       
       
      @foreach($skillOffer as $key => $skillOffer)
              
              
             
             
            
           <?  
		//one-many not working with eloquent!
		//NEED to try and move this out of the view
	    $skills = Skill::find($skillOffer->skill_id);?>
		
		
	   {{$skills->category}}
	   {{$skills->skill_name}}
		
		<?  //$test= Skill::test($skillOffer->skill_id);
		//print_r($test->category);
		//print_r($test->skillName);?>
		
            <br><br>
       
       @endforeach
		
		
       
       
       <p> {{$profile->screenName}}'s investment offered: {{$profile->investmentOffered}} </p>
        
        
      
        
        
</body>
</html>


{{--loop category hierachy
       
       {{$category = ''}}
       @foreach($skills as $key => $skill)
              
              
              @if ($category <> $skill->category)
                    <br>{{$category = $skill->category}}: &nbsp;
              @endif      
             {{ $skill->skillName }}, &nbsp;
            
       
       @endforeach
       --}}

