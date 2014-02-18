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
       
       <p> {{$profile->screenName}}'s Loop skills offered: ??could be a <em>subview</em> ?? </p>
       
       
       
      @foreach($skillOffer as $key => $skillOffer)
              
              
             
             {{ $skillOffer->skill_id }}, &nbsp;<br><br>
            
           
            
       
       @endforeach
		
		<?  
		//one-many not working!
		//$skillOffers = Skill::find(2)->skillOffers;
		//print_r($skillOffers->category);
		//print_r($skillOffers->skillName);
		?>
       
       
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

