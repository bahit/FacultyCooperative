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
       
       
        <h1>Edit your Profile, {{$profile->screenName}}</h1>
        
        <h2>When a new user is registered a default profile should be created for them. They can then edit it with this form</h2>
        
        <!--This picks up errors from validation-->
       {{ HTML::ul($errors->all()) }}
        
        
       
        
        {{ Form::open(array('url' => 'updateProfile/'.$profile->id,  'method' => 'post')) }}
       
       {{ Form::label('screenName', 'Screen Name', array('class' => 'form-label')) }}
         {{ Form::text('screenName', $profile->screenName, array('class'=>'input-block-level', 'placeholder'=>$profile->screenName)) }}
         
         {{ Form::label('bioDetails', 'Tell us about yourself in 200 characters or less') }}
         {{ Form::textarea('bioDetails', $profile->bioDetails, array('class'=>'input-block-level')) }}
         
         {{ Form::label('careerStatus', 'Career Status') }}
         
         <!--We might want to populate these pull down boxes from the database-->
         {{ Form::select('careerStatus', array(
                  'default' => $profile->careerStatus,
  				  'academicProfessional' => 'Academic Professional',
 				  'businessProfessiona' => 'Business Professional',
 				  'postgraduateStudent' => 'Postgraduate Student',
                  'undergraduateStudent' => 'Undergraduate Student'
										),'default') }}
         
        {{ Form::label('institution', 'Institution', array('class' => 'form-label')) }}
        {{ Form::text('institution', $profile->institution, array('class'=>'input-block-level')) }}
        
        
        <!--I think a public profile should not talk about investment amount - just a boolean yes/no here --> 
        {{ Form::label('investmentOffered', 'Are you willing to offer investment to potential ventures', array('class' => 'formlabel')) }}
        {{ Form::checkbox('investmentOffered', 'yes', $profile->investmentOffered) }}
        
        
         <!--The skills heirachy needs to go in here somehow - or we simplify with just a text entry --> 
        {{ Form::label('skillsOffered', 'What skills can you offer') }}
        
        <p><em>!!Checkbox for skills list needs building!!</em></p>
        {{ Form::checkbox('skillsOffered', 'yes', false, array('class' => 'form-checkbox')) }}
        
         	
            {{ Form::submit('Update your Profile',array('class' => 'form-button')) }}
        
   
		{{ Form::close() }}
        
        
        
</body>
</html>




