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
       
       <p> {{$profile->screenName}}'s skills: ??loop skills table that stores skills & ids could be a <em>subview</em> ?? </p>
       
       
       
       <?php 
		//Need to WORK OUT HOW TO MOVE THIS TO MODEL
		$categories = Skill::where('id', '=', $profile->id)->distinct()->get(array('category'));
	     
		echo 'category: <br><br>';
		
		foreach ($categories as $category)
		{
    		
			var_dump($category->category);
			print_r($category->category.'<br>');
			//print_r('<br>category: '.$category);
			
			$skills = Skill::whereRaw('id = ? and category = ?', array($profile->id,$category->category))->get();
			
			foreach ($skills as $skill)
			{
    			var_dump($skill->skillName);
			
				echo($skill->skillName.'<br>');
			
			}
			
		}
		
		
		?>
       
       
       <p> {{$profile->screenName}}'s investment offered: {{$profile->investmentOffered}} </p>
        
        
      
        
        
</body>
</html>




