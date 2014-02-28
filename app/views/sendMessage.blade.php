@extends('main')
@section('content')


<h2>Send Message to {{$user->name}}</h2>

@if(isset($success))
<!--hateful inline style temporary!-->
<h4 style="background-color:red;">Thank you - your message has been sent</h4>

@endif

<!--This picks up errors from validation-->
{{ HTML::ul($errors->all()) }}


{{ Form::open(array('url' => 'addMessage/'.$user->id, 'files' => true, 'method' => 'post')) }}



<br>

{{ Form::label('content', 'Message') }}
{{ Form::textarea('content', '', array('class'=>'input-block-level')) }}
<br>
<br>

{{ Form::submit('Send Message',array('class' => 'form-button')) }}


{{ Form::close() }}


@endsection




