@extends('main')
@section('content')


<h1>Edit Venture</h1>

@if(isset($success))
<!--hateful inline style temporary!-->
<h4 style="background-color:red;">Thank you - your venture has been updated</h4>
@endif

<!--This picks up errors from validation-->
{{ HTML::ul($errors->all()) }}


{{ Form::open(array('url' => 'updateVenture/'.$venture->id, 'files' => true, 'method' => 'post')) }}

{{ Form::label('title', 'Title', array('class' => 'form-label')) }}
{{ Form::text('title', $venture->title, array('class'=>'input-block-level', 'placeholder'=>'title')) }}
<br>

<!--SEE profile controller - need to resize image when saved!!!  ST -->
<img src='../images/{{$venture->logo}}' width="300px"/>
{{Form::file('logo')}}

<br>

<br>

{{ Form::label('description', 'Describe the venture') }}
{{ Form::textarea('description', $venture->description, array('class'=>'input-block-level')) }}
<br>
<br>
<em>!!Just in &pound's for now but we could add currency conversion if time allowed!!</em>
{{ Form::label('funding_target', 'Funding target £', array('class' => 'form-label')) }}
{{ Form::text('funding_target', $venture->funding_target, array('class'=>'input-block-level', 'placeholder'=>'title')) }}

<br>

{{ Form::label('funding_secured', 'Funding already secured £', array('class' => 'form-label')) }}
{{ Form::text('funding_secured', $venture->funding_secured, array('class'=>'input-block-level', 'placeholder'=>'title')) }}

<br>

<!--SEE profile controller - need to resize image when saved!!!  ST
<img src='../images/@{{$profile->image}}' width="200px"/>
{{Form::file('image')}}

<br>

{{ Form::label('bioDetails', 'Tell us about yourself in 200 characters or less') }}
@{{ Form::textarea('bioDetails', $profile->bio_details, array('class'=>'input-block-level')) }}

-->


<!--The skills heirachy needs to go in here somehow - or we simplify with just a text entry -->
{{ Form::label('skillsOffered', 'What skills does your venture seek?') }}

<p><em>!!Checkbox for skills list needs modifying!!</em></p>



@if(isset($skills))

{{$category=''}}

@foreach($skills as $skill)

@if ($category<>$skill->category)
<h4>{{$skill->category}}</h4>
@endif

{{$skill->skill_name}}
<input tabindex="1" type="checkbox" name="skillsCB[]" id="{{$skill->skill_name}}" value="{{$skill->skill_name}}">
<!--@{{ Form::checkbox('skillsOffered', 'yes', false, array('class' => 'form-checkbox')) }} -->

<?php $category=$skill->category?>

@endforeach
@endif



<br><br>



{{ Form::submit('Update your Profile',array('class' => 'form-button')) }}


{{ Form::close() }}


@endsection




