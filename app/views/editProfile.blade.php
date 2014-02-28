@extends('main')
@section('content')


<h1>Edit your Profile, {{$profile->name}}</h1>

@if(!isset($success))
<h4>When a new user is registered a default profile should be created for them. They can then edit it with this
    form</h4>
@else
<!--hateful inline style temporary!-->
<h4 style="background-color:red;">Thank you - your profile has been updated</h4>
@endif

<!--This picks up errors from validation-->
{{ HTML::ul($errors->all()) }}


{{ Form::open(array('url' => 'updateProfile/'.$profile->id, 'files' => true, 'method' => 'post')) }}

{{ Form::label('name', 'Name', array('class' => 'form-label')) }}
{{ Form::text('name', $profile->name, array('class'=>'input-block-level', 'placeholder'=>$profile->screen_name)) }}
<br>

<!--SEE profile controller - need to resize image when saved!!!  ST -->
<img src='../images/{{$profile->image}}' width="200px"/>
{{Form::file('image')}}

<br>

{{ Form::label('bioDetails', 'Tell us about yourself in 200 characters or less') }}
{{ Form::textarea('bioDetails', $profile->bio_details, array('class'=>'input-block-level')) }}

<br>
{{ Form::label('careerStatus', 'Career Status') }}

<!--We might want to populate these pull down boxes from the database-->
{{ Form::select('careerStatus', array(
'default' => $profile->career_status,
'academicProfessional' => 'Academic Professional',
'businessProfessiona' => 'Business Professional',
'postgraduateStudent' => 'Postgraduate Student',
'undergraduateStudent' => 'Undergraduate Student'
),'default') }}

<br>
{{ Form::label('institution', 'Institution', array('class' => 'form-label')) }}
{{ Form::text('institution', $profile->institution, array('class'=>'input-block-level')) }}

<br>

<!--I think a public profile should not talk about investment amount - just a boolean yes/no here -->
{{ Form::label('investmentOffered', 'Are you willing to offer investment to potential ventures', array('class' => 'formlabel')) }}
{{ Form::checkbox('investmentOffered', 'yes', $profile->investmentOffered) }}

<br>


<!--The skills heirachy needs to go in here somehow - or we simplify with just a text entry -->
{{ Form::label('skillsOffered', 'What skills can you offer') }}

<p><em>!!Checkbox for skills list needs modifying!!</em></p>




@if(isset($skills))

{{$category=''}}

@foreach($skills as $key => $skill)

@if ($category<>$skill["category"])
<h4>{{$skill["category"]}}</h4>
@endif



{{$skill["skill_name"]}}

<input tabindex="1" type="checkbox" name="skillsCB[]" id="{{$skill["id"]}}"
       value="{{$skill["id"]}}" {{$skill["checked"]}}>
<!--@{{ Form::checkbox('skillsOffered', 'yes', false, array('class' => 'form-checkbox')) }} -->


<?php $category=$skill["category"]?>
@endforeach
@endif



<br><br>



{{ Form::submit('Update your Profile',array('class' => 'form-button')) }}


{{ Form::close() }}


@endsection




