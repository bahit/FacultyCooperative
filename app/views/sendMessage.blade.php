@extends('main')
@section('content')
<!-- seems to be a bug effecting alignment of first item on page so this is a work around -->
<div style="visibility: hidden">&nbsp; </div>

<h3>Send Message to {{$user->name}}</h3>


<img src='{{URL::to('')}}/image2/thumb/{{$user->image}}' />



@if(isset($success))

<h4 class="alert alert-success">Thank you - your message has been sent</h4>

@endif


{{ Form::open(array('url' => 'addMessage/'.$user->id,
'files' => false, 'method' => 'post')) }}



<br>

{{ Form::label('subject', 'Subject') }}<br>
{{ Form::text('subject', '', array('class'=>'input-block-level')) }}
{{ $errors->first('subject')}}
<br><br>
{{ Form::label('body', 'Message') }}<br>
{{ Form::textarea('body', '', array('class'=>'input-block-level')) }}
{{ $errors->first('body')}}
<br>
<br>


<!--NEEDS hooking to authentication so we know who messsage is FROM *********  -->

{{ Form::submit('Send Message',array('class' => 'form-button')) }}


{{ Form::close() }}


@endsection




