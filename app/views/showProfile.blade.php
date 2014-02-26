@extends('main')
@section('content')
        
        <h1>View Public profile</h1>
      
        <h2>About {{$profile->screen_name}}</h2>
        
       
       <p> {{$profile->screen_name}}'s details:    {{$profile->bio_details}} </p>
       <p> {{$profile->screen_name}}'s career status:   {{$profile->career_status}} </p>
       <p> {{$profile->screen_name}}'s institution: {{$profile->institution}} </p>
       
       <p> {{$profile->screen_name}}'s Offers the following skills -  <em>Loop skills offered: ??could be implemented as subview??</em></p>
       
       
       
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
		
		
       
       
       <p> {{$profile->screen_name}}'s investment offered: {{$profile->investment_offered}} <em>This is a boolean value and needs hooking to a checkbox </em></p>
        
        
      
        
@endsection



{{--loop category hierachy
       
       {{$category = ''}}
       @foreach($skills as $key => $skill)
              
              
              @if ($category <> $skill->category)
                    <br>{{$category = $skill->category}}: &nbsp;
              @endif      
             {{ $skill->skillName }}, &nbsp;
            
       
       @endforeach
       --}}

