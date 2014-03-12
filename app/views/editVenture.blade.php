@extends('main')
@section('content')


<h1>Edit Venture</h1>

<h2><a href='../viewVenture/{{$venture->id}}'>{{$venture->title}}</a></h2>

@if(isset($success))
<!--hateful inline style temporary!-->
<h4 style="background-color:red;">Thank you - your venture has been updated</h4>

<h4><a href="../viewVenture/{{$venture->id}}" >Follow this link to see how your venture page looks now</a></h4>

@endif

<!--This picks up errors from validation-->
{{ HTML::ul($errors->all()) }}


{{ Form::open(array('url' => 'updateVenture/'.$venture->id, 'files' => true, 'method' => 'post')) }}

{{ Form::label('title', 'Title', array('class' => 'form-label')) }}
{{ Form::text('title', $venture->title, array('class'=>'input-block-level', 'placeholder'=>'title')) }}
<br>

<!--SEE profile controller - need to resize image when saved!!!  ST -->
<img src='../image2/profile/{{$venture->logo}}' />
{{Form::file('logo')}}

<br>

<br>

{{ Form::label('description', 'Describe the venture') }}
{{ Form::textarea('description', $venture->description, array('class'=>'input-block-level')) }}
<br>
<br>
<em>!!Just in &pound's for now but we could add currency conversion if time allowed!!</em>
{{ Form::label('funding_target', 'Funding target £', array('class' => 'form-label')) }}
{{ Form::text('funding_target', $venture->funding_target, array('class'=>'input-block-level', 'placeholder'=>'')) }}

<br>

{{ Form::label('funding_secured', 'Funding already secured £', array('class' => 'form-label')) }}
{{ Form::text('funding_secured', $venture->funding_secured, array('class'=>'input-block-level', 'placeholder'=>'')) }}

<br>




<h3>What skills does your venture seek?</h3>



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



{{ Form::submit('Update your Venture Page',array('class' => 'form-button')) }}


{{ Form::close() }}


@endsection




