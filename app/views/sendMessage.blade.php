@extends('main')
@section('content')


<h3>Send Message to {{$user->name}}</h3>

<!--SEE profile controller - need to resize image when saved!!!  ST -->
<img src='../images/{{$user->image}}' width="100px"/>

@if(isset($success))
<!--hateful inline style temporary!-->
<h4 style="background-color:red;">Thank you - your message has been sent</h4>

@endif

<!--This picks up errors from validation-->
{{ HTML::ul($errors->all()) }}


{{ Form::open(array('url' => 'addMessage/'.$user->id, 'files' => false, 'method' => 'post')) }}



<br>

{{ Form::label('content', 'Message') }}
{{ Form::textarea('content', '', array('class'=>'input-block-level')) }}
<br>
<br>


<!--NEEDS hooking to authentication so we know who messsage is FROM *********  -->

{{ Form::submit('Send Message',array('class' => 'form-button')) }}


{{ Form::close() }}


@endsection




