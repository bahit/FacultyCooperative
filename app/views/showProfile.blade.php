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
        
        
        
        <?php $profile = Profile::find($id);?>
        
        
        
        <h1>View Public profile</h1>
      
        <h2>Hello {{$profile->screenName}}</h2>
        
       
       <p> Your details:    {{$profile->bioDetails}} </p>
       <p> Your career status:   {{$profile->careerStatus}} </p>
       <p> Your institution: {{$profile->institution}} </p>
       <p> Your skills: ??loop skills table that stores skills & ids could be a <em>subview</em> ?? </p>
       <p> Your investment offered: {{$profile->investmentOffered}} </p>
        
        
      
        
        
</body>
</html>




