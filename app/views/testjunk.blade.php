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
        <h1>Hello, <?php echo $id; ?></h1>
        
        
        <?php $results = DB::select('select * from frogs where id = ?', array(1)); 
		//echo $results
		      foreach ($results as $value) {
                   print_r($value);
			  }
			  
			  
			  
			   $frog = Frog::find($id);
               echo '<br>frog name is ';
               print_r($frog->name);
			   
			   //addfrog/{name}
		
		?>
        
        
        
        <h2>View Public profile</h2>
        <p>Need to get from the Model passed into the View. Can be written out with double curly braces  which work same way as ?php echo $name; ?</p>
        
        
        {{$id}}<br/><br/>
        {{$frog->name}}<br/><br/>
        <h2>Test add to Frog table</h2>
        
        {{ Form::open(array('action' => 'MyController@addFrogForm')) }}
        
       
      
        
            {{ Form::text('name', null, array('class'=>'input-block-level', 'placeholder'=>'name')) }}
            {{ Form::text('pond', null, array('class'=>'input-block-level', 'placeholder'=>'name')) }}
        
         	
            {{ Form::submit('Update your Frogs',array('class' => 'form-button')) }}
        
   
		{{ Form::close() }}
        
         <h2>Public profile with minimal styling using blade</h2>
        
         {{ Form::open(array('url' => 'publicProfile')) }}
         
         <!-- We need to open a form model something along these lines: Form Model Binding -->
        <!-- echo Form::model($user, array('route' => array('user.update', $user->id)))-->
         
        
         {{ Form::label('screenName', 'Screen Name', array('class' => 'form-label')) }}
         {{ Form::text('screenName', null, array('class'=>'input-block-level', 'placeholder'=>$frog->name)) }}
         
         {{ Form::label('bioDetails', 'Tell us about yourself in 200 words or less') }}
         {{ Form::textarea('bioDetails', null, array('class'=>'input-block-level', 'placeholder'=>'Tell us')) }}
         
         {{ Form::label('careerStatus', 'Career Status') }}
         
         <!--We might want to populate these pull down boxes from the database-->
         {{ Form::select('careerStatus', array(
                  'default' => 'Please select',
  				  'academicProfessional' => 'Academic Professional',
 				  'businessProfessiona' => 'Business Professional',
 				  'postgraduateStudent' => 'Postgraduate Student',
                  'undergraduateStudent' => 'Undergraduate Student'
										),'default') }}
         
        {{ Form::label('institution', 'Institution', array('class' => 'form-label')) }}
        {{ Form::text('institution', null, array('class'=>'input-block-level', 'placeholder'=>'Institution')) }}
        
        
        <!--I think a public profile should not talk about investment amount - just a boolean yes/no here --> 
        {{ Form::label('investmentOffered', 'Are you willing to offer investment to potential ventures', array('class' => 'formlabel')) }}
        {{ Form::checkbox('investmentOffered', 'yes', false) }}
        
        
         <!--The skills heirachy needs to go in here somehow - or we simplify with just a text entry --> 
        {{ Form::label('skillsOffered', 'What skills can you offer') }}
        {{ Form::checkbox('skillsOffered', 'yes', false, array('class' => 'form-checkbox')) }}
        
        {{ Form::submit('Update your profile',array('class' => 'form-button')) }}
        
   
		{{ Form::close() }}
        
        <h2>Private profile temporarily stuck on same page</h2>
        
        <!-- I am sticking private profile on my same test page for now!! -->
        {{ Form::open(array('url' => 'privateProfile')) }}
         
         <!-- We need to open a form model something along these lines: Form Model Binding -->
        <!-- echo Form::model($user, array('route' => array('user.update', $user->id)))-->
         
        
         {{ Form::label('email', 'Email', array('class' => 'form-label')) }}
         {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email')) }}
         
          {{ Form::label('userName', 'User Name') }}
         {{ Form::text('userName', null, array('class'=>'input-block-level', 'placeholder'=>'User Name')) }}
         
         {{ Form::label('dateOfBirth', 'Date of Birth') }}
         {{ Form::text('dateOfBirth', null, array('class'=>'input-block-level', 'placeholder'=>'Date of Birth')) }}
         
          {{ Form::label('password', 'New password') }}
         {{ Form::password('password', null, array('class'=>'input-block-level', 'placeholder'=>'New password')) }}
         
           {{ Form::label('confirmPassword', 'Confirm password') }}
         {{ Form::password('confirmPassword', null, array('class'=>'input-block-level', 'placeholder'=>'Confirm password')) }}
      
         
      
        {{ Form::submit('Update your private profile',array('class' => 'form-button')) }}
        
   
		{{ Form::close() }}
        
        
        
        
        
        
</body>
</html>




