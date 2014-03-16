@extends('main')
@section('content')


<h1>Create New Venture</h1>

@if(isset($success))

<!--Please someone style this page-->
<h4 class="alert alert-success">Thank you - your venture has been created</h4>

<h4 class="alert alert-success"><a href="{{URL::to('')}}/editVenture/{{$venture->id}}" >Follow this link to add details to your venture page now</a></h4>

@else

<!--This picks up errors from validation-->
{{ HTML::ul($errors->all()) }}


{{ Form::open(array('url' => 'createVenture', 'files' => false, 'method' => 'post')) }}

{{ Form::label('title', 'Title', array('class' => 'form-label')) }}
{{ Form::text('title', '', array('class'=>'input-block-level', 'placeholder'=>'title')) }}
<br>

<br>

{{ Form::submit('Create your Venture ',array('class' => 'form-button')) }}


{{ Form::close() }}
@endif

@endsection




