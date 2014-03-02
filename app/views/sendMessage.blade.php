@extends('main')
@section('content')


<h3>Send Message to {{$user->name}}</h3>

<!--SEE profile controller - need to resize image when saved!!!  ST -->
<img src='../images/{{$user->image}}' width="100px"/>



@if(isset($success))
<!--hateful inline style temporary!-->
<h4 style="background-color:red;">Thank you - your message has been sent</h4>

@endif


{{ Form::open(array('url' => 'addMessage/'.$user->id,
'files' => false, 'method' => 'post')) }}



<br>

{{ Form::label('subject', 'Subject') }}
{{ Form::text('subject', '', array('class'=>'input-block-level')) }}
{{ $errors->first('subject')}}
<br><br>
{{ Form::label('body', 'Message') }}
{{ Form::textarea('body', '', array('class'=>'input-block-level')) }}
{{ $errors->first('body')}}
<br>
<br>


<!--NEEDS hooking to authentication so we know who messsage is FROM *********  -->

{{ Form::submit('Send Message',array('class' => 'form-button')) }}


{{ Form::close() }}


@endsection




